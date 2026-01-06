<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * GET: /transaction
     * Render halaman (Blade)
     */
    public function index()
    {
        return view('transaction');
    }

    /**
     * GET: /transactions/data/{type}
     * AJAX data loader (income / expense)
     */
    public function data(Request $request, $type)
    {
        $tipe = $type === 'income' ? 'pemasukan' : 'pengeluaran';

        $transactions = Transaction::with('category')
            ->where('id_user', Auth::id())
            ->whereHas('category', fn ($q) => $q->where('tipe', $tipe))
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('catatan', 'like', "%{$request->search}%")
                        ->orWhereHas('category', function ($cat) use ($request) {
                            $cat->where('nama_kategori', 'like', "%{$request->search}%");
                        });
                });
            })
            ->when($request->start_date, fn ($q) =>
                $q->whereDate('tanggal_transaksi', '>=', $request->start_date)
            )
            ->when($request->end_date, fn ($q) =>
                $q->whereDate('tanggal_transaksi', '<=', $request->end_date)
            )
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

        return response()->json([
            'transactions' => $transactions->map(fn ($t) => [
                'id' => $t->id,
                'date' => $t->tanggal_transaksi->toDateString(),
                'category' => $t->category->nama_kategori,
                'notes' => $t->catatan,
                'amount' => $t->jumlah_transaksi,
            ]),
            'total' => $transactions->sum('jumlah_transaksi'),
            'chart' => $transactions
                ->groupBy('category.nama_kategori')
                ->map(fn ($group) => $group->sum('jumlah_transaksi')),
        ]);
    }

    /**
     * POST: /transactions
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        $tipe = $request->type === 'income' ? 'pemasukan' : 'pengeluaran';

        $kategori = Category::firstOrCreate([
            'id_user' => Auth::id(),
            'nama_kategori' => $request->category,
            'tipe' => $tipe
        ]);

        Transaction::create([
            'id_user' => Auth::id(),
            'id_kategori' => $kategori->id,
            'tanggal_transaksi' => $request->date,
            'jumlah_transaksi' => $request->amount,
            'catatan' => $request->notes,
            'saldo_sebelumnya' => 0
        ]);

        return response()->json(['message' => 'created']);
    }

    /**
     * PUT: /transactions/{id}
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaction::where('id_user', Auth::id())->findOrFail($id);

        $tipe = $request->type === 'income' ? 'pemasukan' : 'pengeluaran';

        $kategori = Category::firstOrCreate([
            'id_user' => Auth::id(),
            'nama_kategori' => $request->category,
            'tipe' => $tipe
        ]);

        $transaksi->update([
            'id_kategori' => $kategori->id,
            'tanggal_transaksi' => $request->date,
            'jumlah_transaksi' => $request->amount,
            'catatan' => $request->notes
        ]);

        return response()->json(['message' => 'updated']);
    }

    /**
     * DELETE: /transactions/{id}
     */
    public function destroy($id)
    {
        Transaction::where('id_user', Auth::id())
            ->where('id', $id)
            ->delete();

        return response()->json(['message' => 'deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * GET: /transactions/type/{type}
     */
    public function byType($type)
    {
        $tipe = $type === 'income' ? 'pemasukan' : 'pengeluaran';

        $data = Transaction::with('category')
            ->where('id_user', Auth::id())
            ->whereHas('category', fn($q) => $q->where('tipe', $tipe))
            ->orderBy('tanggal_transaksi', 'desc')
            ->get()
            ->map(fn($t) => [
                'id' => $t->id,
                'date' => Carbon::parse($t->tanggal_transaksi)->toDateString(),
                'category' => $t->category->nama_kategori,
                'notes' => $t->catatan,
                'amount' => $t->jumlah_transaksi,
            ]);

        return response()->json($data);
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
        ]);

        $tipe = $request->type === 'income' ? 'pemasukan' : 'pengeluaran';

        // cari / buat kategori
        $kategori = Category::firstOrCreate(
            [
                'id_user' => Auth::id(),
                'nama_kategori' => $request->category,
                'tipe' => $tipe
            ]
        );

        Transaction::create([
            'id_user' => Auth::id(),
            'id_kategori' => $kategori->id,
            'tanggal_transaksi' => $request->date,
            'jumlah_transaksi' => $request->amount,
            'catatan' => $request->notes,
            'saldo_sebelumnya' => 0 // bisa kamu kembangkan nanti
        ]);

        return response()->json(['message' => 'success']);
    }

    /**
     * PUT: /transactions/{id}
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaction::where('id_user', Auth::id())->findOrFail($id);

        $kategori = Category::firstOrCreate(
            [
                'id_user' => Auth::id(),
                'nama_kategori' => $request->category,
                'tipe' => $request->type === 'income' ? 'pemasukan' : 'pengeluaran'
            ]
        );

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

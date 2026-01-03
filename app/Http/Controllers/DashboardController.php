<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $today = Carbon::today();
        $last30Days = Carbon::now()->subDays(30);
        $year = Carbon::now()->year;

        // Total Income
        $totalIncomeAll = Transaction::where('id_user', $userId)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pemasukan');
            })
            ->sum('jumlah_transaksi');

        // Total Expense
        $totalExpenseAll = Transaction::where('id_user', $userId)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pengeluaran');
            })
            ->sum('jumlah_transaksi');

        // Saldo Sekarang
        $saldo = $totalIncomeAll - $totalExpenseAll;

        // Total pemasukan hari ini
        $todayIncome = Transaction::where('id_user', $userId)
            ->whereDate('tanggal_transaksi', $today)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pemasukan');
            })
            ->sum('jumlah_transaksi');

        // Total pengeluaran hari ini
        $todayExpense = Transaction::where('id_user', $userId)
            ->whereDate('tanggal_transaksi', $today)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pengeluaran');
            })
            ->sum('jumlah_transaksi');

        // Total Income 30 hari terakhir
        $totalIncome30Days = Transaction::where('id_user', $userId)
            ->whereDate('tanggal_transaksi', '>=', $last30Days)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pemasukan');
            })
            ->sum('jumlah_transaksi');

        // Total Expense 30 hari terakhir
        $totalExpense30Days = Transaction::where('id_user', $userId)
            ->whereDate('tanggal_transaksi', '>=', $last30Days)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pengeluaran');
            })
            ->sum('jumlah_transaksi');

        // Total transaksi 30 hari terakhir
        $totalTransaction = Transaction::where('id_user', $userId)
            ->whereDate('tanggal_transaksi', '>=', $last30Days)
            ->count();

        //data bulanan user (chart)
        $monthlyData = DB::table('transactions')
            ->join('categories', 'transactions.id_kategori', '=', 'categories.id')
            ->selectRaw('
            MONTH(tanggal_transaksi) as bulan,
            SUM(CASE WHEN categories.tipe = "pemasukan" THEN jumlah_transaksi ELSE 0 END) as income,
            SUM(CASE WHEN categories.tipe = "pengeluaran" THEN jumlah_transaksi ELSE 0 END) as expense
        ')
            ->where('transactions.id_user', $userId)
            ->whereYear('tanggal_transaksi', $year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Siapkan array 12 bulan (biar kalau kosong tetap 0)
        $income = array_fill(1, 12, 0);
        $expense = array_fill(1, 12, 0);

        foreach ($monthlyData as $row) {
            $income[$row->bulan] = (int) $row->income;
            $expense[$row->bulan] = (int) $row->expense;
        }

        $tableAllTransactions = Transaction::with('category')
            ->where('id_user', Auth::id())
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate(10);

        return view('dashboard', array_merge(compact(
            'saldo',
            'totalIncomeAll',
            'totalExpenseAll',
            'todayIncome',
            'todayExpense',
            'totalIncome30Days',
            'totalExpense30Days',
            'totalTransaction',
            'tableAllTransactions',
        ), [
            'incomeData' => array_values($income),
            'expenseData' => array_values($expense),
        ]));
    }
}

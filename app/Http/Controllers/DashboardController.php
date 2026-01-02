<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total Income
        $totalIncome = Transaction::where('id_user', $userId)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pemasukan');
            })
            ->sum('jumlah_transaksi');

        // Total Expense
        $totalExpense = Transaction::where('id_user', $userId)
            ->whereHas('category', function ($q) {
                $q->where('tipe', 'pengeluaran');
            })
            ->sum('jumlah_transaksi');

        // Saldo Sekarang
        $saldo = $totalIncome - $totalExpense;

        return view('dashboard', compact(
            'saldo',
            'totalIncome',
            'totalExpense'
        ));
    }
}

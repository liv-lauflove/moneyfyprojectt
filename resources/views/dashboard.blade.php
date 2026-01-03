<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <x-app-layout>
        @include('layouts.sidebar')
        <main class="flex-1 md:ml-64 bg-gray-100">
            @include ('layouts.navigation')

            <div class="bg-gray-50 font-sans">
                <section>
                    <div class="container mx-auto p-4 md:p-6">
                        <!-- Header with animation -->
                        <header class="flex justify-between items-center mb-8 animate-fadeIn"
                            style="animation-delay: 0.1s">
                            <h1 class="text-3xl font-bold text-indigo-700 transform transition duration-500">
                                <div>
                                    <h1>Hello, {{ Auth::user()->name }}</h1>
                                </div>
                            </h1>
                        </header>

                        <!-- Earnings Card with counter animation -->
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl p-6 text-white mb-8 shadow-lg transform transition duration-500 hover:scale-[1.01] card-hover animate-fadeIn"
                            style="animation-delay: 0.2s">
                            <h2 class="text-lg font-medium mb-1">Current Balance</h2>
                            <p class="text-3xl font-bold mb-4"> Rp {{ number_format($saldo, 0, ',', '.') }}</p>
                            <div class="flex justify-between items-center">
                            </div>
                        </div>

                        <!-- Stats Grid with staggered animations -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Today's Income Card -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 transform transition duration-500 hover:scale-[1.02] card-hover animate-fadeIn"
                                style="animation-delay: 0.3s">
                                <h3 class="text-lg font-medium text-gray-700 mb-4">Today's Income</h3>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-800" id="sales-percent">Rp0</p>
                                        <p class="text-green-500 text-sm font-medium">Your income today</p>
                                    </div>
                                    <div
                                        class="bg-green-100 p-3 rounded-lg transform transition duration-500 hover:rotate-12">
                                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Today's Expenses Card -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 transform transition duration-500 hover:scale-[1.02] card-hover animate-fadeIn"
                                style="animation-delay: 0.4s">
                                <h3 class="text-lg font-medium text-gray-700 mb-4">Today's Expenses</h3>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-800" id="revenue-counter">Rp0</p>
                                        <p class="text-gray-500 text-sm">Your expenses today </p>
                                    </div>
                                    <div
                                        class="bg-blue-100 p-3 rounded-lg transform transition duration-500 hover:rotate-12">
                                        <i class="fas fa-shopping-bag text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="flex items-center justify-center text-gray-800 p-10 bg-gray-200">
                        <!-- Component Start -->
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">

                            <!-- Tile 1 -->
                            <div class="flex items-center p-4 bg-white rounded">
                                <div
                                    class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                    <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-grow flex flex-col ml-4">
                                    <span class="text-xl font-bold">Rp
                                        {{ number_format($totalIncome30Days, 0, ',', '.') }}</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Last 30 days income</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tile 2 -->
                            <div class="flex items-center p-4 bg-white rounded">
                                <div
                                    class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
                                    <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-grow flex flex-col ml-4">
                                    <span class="text-xl font-bold">Rp
                                        {{ number_format($totalExpense30Days, 0, ',', '.') }}</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Last last 30 days expense</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tile 3 -->
                            <div class="flex items-center p-4 bg-white rounded">
                                <div
                                    class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                                    <svg class="w-6 h-6 fill-current text-green-700" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-grow flex flex-col ml-4">
                                    <span class="text-xl font-bold">{{ $totalTransaction }}</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Last 30 days transactions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Component End  -->
                    </div>
                </section>
                <section class="px-4 md:px-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">

                        <!-- BAR CHART (KIRI) -->
                        <div class="bg-white rounded-xl p-6 shadow-sm h-[420px] flex flex-col">
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">
                                Income Charts
                            </h3>
                            <p class="text-sm text-gray-400 mb-4">
                                Monthly Overview
                            </p>

                            <div class="flex-1 relative">
                                <canvas id="incomeChart"></canvas>
                            </div>
                        </div>

                        <!-- CURVE CHART (KANAN - INCOME vs EXPENSE) -->
                        <div class="bg-white rounded-xl p-6 shadow-sm h-[420px] flex flex-col">
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">
                                Income vs Expense
                            </h3>
                            <p class="text-sm text-gray-400 mb-4">
                                Monthly Overview
                            </p>

                            <div class="flex-1 relative">
                                <canvas id="incomeExpenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="col-span-12 rounded-2xl border border-gray-200 bg-white pt-4 mt-10">

                        <div class="px-6 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                Latest Transactions
                            </h3>
                        </div>

                        <div class="overflow-x-auto px-6">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-y text-gray-600">
                                        <th class="py-3 text-left">Date</th>
                                        <th class="py-3 text-left">Category</th>
                                        <th class="py-3 text-left">Note</th>
                                        <th class="py-3 text-left">Amount</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y">
                                    @forelse ($tableAllTransactions as $item)
                                        <tr>
                                            <td class="py-4">
                                                {{ $item->tanggal_transaksi->format('d M Y') }}
                                            </td>

                                            <td>
                                                <span
                                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $item->category->tipe === 'pemasukan'
                                                        ? 'bg-green-100 text-green-700'
                                                        : 'bg-red-100 text-red-700' }}">
                                                    {{ $item->category->nama_kategori }}
                                                </span>
                                            </td>

                                            <td>
                                                {{ $item->catatan ?? '-' }}
                                            </td>

                                            <td
                                                class="font-semibold
                                                {{ $item->category->tipe === 'pemasukan'
                                                    ? 'text-green-600'
                                                    : 'text-red-600' }}">
                                                {{ $item->category->tipe === 'pemasukan' ? '+' : '-' }}
                                                {{ number_format($item->jumlah_transaksi, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-6 text-center text-gray-500">
                                                Belum ada transaksi
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                </section>
            </div>
        </main>
    </x-app-layout>

    <!-- Scripts -->
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <script>
        // Counter animations
        function animateValue(id, start, end, duration, prefix = '') {
            const obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                obj.innerHTML = prefix + value.toLocaleString() + (id === 'earnings-counter' || id === 'revenue-counter' ? '' : '');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Animate progress bars
        function animateProgressBars() {
            document.querySelectorAll('.progress-bar').forEach(bar => {
                const targetWidth = bar.getAttribute('data-width');
                bar.style.width = targetWidth;

                // Animate the percentage counters
                const percent = parseInt(targetWidth);
                const counterId = bar.parentElement.parentElement.nextElementSibling.id;
                animateValue(counterId, 0, percent, 1500);
            });
        }

        // Initialize animations when page loads
        document.addEventListener('DOMContentLoaded', () => {
            // Animate counters
            const saldo = parseInt(
                document.getElementById('earnings-counter').dataset.saldo
            );

            animateValue('earnings-counter', 0, saldo, 2000, 'Rp ');
        });
        animateValue('revenue-counter', 0, {{ $todayExpense }}, 1500, 'Rp');
        animateValue('sales-percent', 0, {{ $todayIncome }}, 1000, 'Rp');

        // Animate progress bars after a slight delay
        setTimeout(animateProgressBars, 500);

        // Add hover effect to cards
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.add('shadow-lg');
            });
            card.addEventListener('mouseleave', () => {
                card.classList.remove('shadow-lg');
            });
        });
    </script>

    <script>
        const incomeData = @json($incomeData);
        const expenseData = @json($expenseData);

        const labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
    </script>

    <!-- chart kiri -->
    <canvas id="incomeChart"></canvas>

    <script>
        const incomeCtx = document.getElementById('incomeChart');

        new Chart(incomeCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Income',
                    data: incomeData,
                    backgroundColor: '#2563eb',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- chart kanan -->
    <canvas id="incomeExpenseChart"></canvas>

    <script>
        const ctx = document.getElementById('incomeExpenseChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Income',
                        data: incomeData,
                        borderColor: '#16a34a',
                        backgroundColor: 'rgba(22,163,74,0.15)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Expense',
                        data: expenseData,
                        borderColor: '#dc2626',
                        backgroundColor: 'rgba(220,38,38,0.15)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
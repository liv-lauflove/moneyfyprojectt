<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            transition: width 1.5s ease-in-out;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(79, 70, 229, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(79, 70, 229, 0);
            }
        }
    </style>
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
                                    <h1>Hallo, {{ Auth::user()->name }}</h1>
                                </div>
                            </h1>
                        </header>

                        <!-- Earnings Card with counter animation -->
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl p-6 text-white mb-8 shadow-lg transform transition duration-500 hover:scale-[1.01] card-hover animate-fadeIn"
                            style="animation-delay: 0.2s">
                            <h2 class="text-lg font-medium mb-1">Saldo Sekarang</h2>
                            <p class="text-3xl font-bold mb-4"> Rp {{ number_format($saldo, 0, ',', '.') }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-indigo-100">IDX changes on profit</span>
                                <span
                                    class="bg-white text-indigo-600 px-3 py-1 rounded-full text-sm font-medium transform transition duration-300 hover:scale-110">+3.2%</span>
                            </div>
                        </div>

                        <!-- Stats Grid with staggered animations -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Sales Card -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 transform transition duration-500 hover:scale-[1.02] card-hover animate-fadeIn"
                                style="animation-delay: 0.3s">
                                <h3 class="text-lg font-medium text-gray-700 mb-4">Sales Per Day</h3>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-800" id="sales-percent">0%</p>
                                        <p class="text-green-500 text-sm font-medium">+1.2% from yesterday</p>
                                    </div>
                                    <div
                                        class="bg-green-100 p-3 rounded-lg transform transition duration-500 hover:rotate-12">
                                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Revenue Card -->
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 transform transition duration-500 hover:scale-[1.02] card-hover animate-fadeIn"
                                style="animation-delay: 0.4s">
                                <h3 class="text-lg font-medium text-gray-700 mb-4">Revenue</h3>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-800" id="revenue-counter">$0</p>
                                        <p class="text-gray-500 text-sm">321 Today Sales</p>
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
                                    <span class="text-xl font-bold">$8,430</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Revenue last 30 days</span>
                                        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
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
                                    <span class="text-xl font-bold">211</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Sales last 30 days</span>
                                        <span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
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
                                    <span class="text-xl font-bold">140</span>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-500">Customers last 30 days</span>
                                        <span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
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
                                Product Sales
                            </h3>
                            <p class="text-sm text-gray-400 mb-4">
                                Monthly Average
                            </p>

                            <div class="flex-1 relative">
                                <canvas id="salesBarChart"></canvas>
                            </div>
                        </div>

                        <!-- CURVE CHART (KANAN) -->
                        <div class="bg-white rounded-xl p-6 shadow-sm h-[420px] flex flex-col">
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">
                                Product Sales
                            </h3>
                            <p class="text-sm text-gray-400 mb-4">
                                Monthly Average
                            </p>

                            <div class="flex-1 relative">
                                <canvas id="salesCurveChart"></canvas>
                            </div>
                        </div>

                    </div>
                </section>

                <section>
                    <div class="col-span-12 rounded-2xl border border-gray-200 bg-white pt-4"
                        x-data="transactionsTable()">

                        <!-- Header -->
                        <div class="flex items-center justify-between px-6 mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                Latest Transactions
                            </h3>

                            <input type="text" x-model="searchQuery" placeholder="Search..."
                                class="h-[42px] rounded-lg border px-4 text-sm" />
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto px-6">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="border-y">
                                        <th class="py-3 text-left">Name</th>
                                        <th class="py-3 text-left">Date</th>
                                        <th class="py-3 text-left">Price</th>
                                        <th class="py-3 text-left">Category</th>
                                        <th class="py-3 text-left">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y">
                                    <template x-for="(item, index) in paginatedData" :key="index">
                                        <tr>
                                            <td class="py-4">
                                                <div class="flex items-center gap-3">
                                                    <span x-text="item.name"></span>
                                                </div>
                                            </td>

                                            <td x-text="item.date"></td>
                                            <td x-text="item.price"></td>
                                            <td x-text="item.category"></td>

                                            <td>
                                                <span x-text="item.status" class="px-2 py-1 rounded-full text-xs"
                                                    :class="{
                                    'bg-green-100 text-green-600': item.status === 'Success',
                                    'bg-yellow-100 text-yellow-600': item.status === 'Pending',
                                    'bg-red-100 text-red-600': item.status === 'Failed'
                                }"></span>
                                            </td>

                                            <!-- ACTION DROPDOWN -->
                                            <td class="py-4 text-right">
                                                <div class="relative inline-block" x-data="{ open: false }"
                                                    @click.away="open = false">

                                                    <!-- Button -->
                                                    <button @click="open = !open"
                                                        class="p-2 rounded-full hover:bg-gray-100">
                                                        <svg width="20" height="20" fill="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M6 12a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4zm6 0a2 2 0 110-4 2 2 0 010 4z" />
                                                        </svg>
                                                    </button>

                                                    <!-- Dropdown -->
                                                    <div x-show="open" x-transition x-cloak
                                                        class="absolute right-0 mt-2 w-40 rounded-xl border bg-white shadow-lg z-[9999]">

                                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">
                                                            Edit
                                                        </a>

                                                        <a href="#"
                                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-between px-6 py-4 border-t">
                            <button @click="prevPage" :disabled="currentPage === 1">
                                Previous
                            </button>

                            <span x-text="`Page ${currentPage} of ${totalPages}`"></span>

                            <button @click="nextPage" :disabled="currentPage === totalPages">
                                Next
                            </button>
                        </div>
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
                obj.innerHTML = prefix + value.toLocaleString() + (id === 'earnings-counter' || id === 'revenue-counter' ? '' : '%');
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
        animateValue('revenue-counter', 0, 4230, 1500, 'Rp');
        animateValue('sales-percent', 0, 3, 1000);

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
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('salesCurveChart').getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    datasets: [{
                        label: 'Sales',
                        data: [112, 225, 134, 80, 200, 225, 134, 80, 200],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.15)',
                        fill: true,
                        tension: 0.45, // 🔥 bikin curve / smooth
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: '#2563eb',
                        pointBorderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            grid: {
                                color: '#e5e7eb'
                            },
                            ticks: {
                                stepSize: 50
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* =======================
               BAR CHART (LEFT)
            ======================= */
            const barCtx = document.getElementById('salesBarChart').getContext('2d');

            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    datasets: [{
                        label: 'Sales',
                        data: [112, 225, 134, 101, 80, 225, 134, 50, 200],
                        backgroundColor: '#2563eb',
                        borderRadius: 6,
                        barThickness: 22,
                        maxBarThickness: 26
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return ' Rp ' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e7eb'
                            },
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value;
                                }
                            }
                        }
                    }
                }
            });

        });
    </script>

    <script>
        function transactionsTable() {
            return {
                tableData: [
                    {
                        name: "Bought PYPL",
                        date: "Nov 23, 01:00 PM",
                        price: "$2,567.88",
                        category: "Finance",
                        status: "Success",
                    },
                    {
                        name: "Bought AAPL",
                        date: "Nov 22, 09:00 PM",
                        price: "$3,987.45",
                        category: "Technology",
                        status: "Pending",
                    },
                    {
                        name: "Sell AMZN",
                        date: "Feb 35, 08:00 PM",
                        price: "$5,698.55",
                        category: "E-commerce",
                        status: "Failed",
                    },
                ],

                itemsPerPage: 5,
                currentPage: 1,
                searchQuery: "",

                get filteredData() {
                    if (!this.searchQuery) return this.tableData;
                    return this.tableData.filter(item =>
                        item.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        item.category.toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                },

                get totalPages() {
                    return Math.ceil(this.filteredData.length / this.itemsPerPage);
                },

                get paginatedData() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    return this.filteredData.slice(start, start + this.itemsPerPage);
                },

                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) this.currentPage++;
                },

                init() {
                    this.$watch("searchQuery", () => {
                        this.currentPage = 1;
                    });
                },
            };
        }

        /* 🔽 DROPDOWN ACTION COMPONENT */
        function actionDropdown() {
            return {
                isOpen: false,
                popperInstance: null,

                init() {
                    this.$nextTick(() => {
                        this.popperInstance = createPopper(
                            this.$refs.button,
                            this.$refs.content,
                            {
                                placement: 'bottom-end',
                                strategy: 'fixed',
                                modifiers: [
                                    {
                                        name: 'offset',
                                        options: { offset: [0, 4] },
                                    },
                                ],
                            }
                        );
                    });
                },

                toggle() {
                    this.isOpen = !this.isOpen;
                    this.popperInstance && this.popperInstance.update();
                },
            };
        }
    </script>
</body>

</html>
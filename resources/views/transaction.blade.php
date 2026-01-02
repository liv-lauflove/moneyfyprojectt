<x-app-layout>
    <style>
        html,
        body {
            overflow: hidden;
            height: 100%;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="flex h-screen w-full overflow-hidden bg-gray-100">

        <div class="flex-shrink-0 hidden md:flex">
            @include('layouts.sidebar')
        </div>

        <div class="flex-1 flex flex-col h-full md:ml-64 min-w-0">

            <div class="flex-shrink-0 bg-white shadow z-10 relative">
                @include('layouts.navigation')
            </div>

            <main class="flex-1 overflow-y-auto bg-gray-100 p-8 scroll-smooth">

                <div class="flex gap-8 border-b border-gray-200 mb-8">
                    <button class="tab-btn active px-4 py-3 border-b-2 border-blue-900 font-semibold text-gray-800"
                        data-tab="income">Income</button>
                    <button
                        class="tab-btn px-4 py-3 border-b-2 border-transparent font-semibold text-gray-500 hover:text-gray-700"
                        data-tab="expense">Expense</button>
                </div>

                <div id="income-tab" class="tab-content">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="col-span-2 space-y-6">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" id="searchIncome" placeholder="Type to search category/note..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="date" id="startDateIncome"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 text-sm">
                                    <span class="text-gray-500">-</span>
                                    <input type="date" id="endDateIncome"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 text-sm">
                                </div>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Add income</h3>
                                <form id="incomeForm" class="space-y-4">
                                    <input type="hidden" id="incomeId">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                            <input type="date" id="incomeDate" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                            <select id="incomeCategory" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                                <option value="">-- select category --</option>
                                                <option value="Salary">Salary</option>
                                                <option value="Freelance">Freelance</option>
                                                <option value="Investment">Investment</option>
                                                <option value="Bonus">Bonus</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                        <textarea id="incomeNotes" placeholder="Add notes..."
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 h-20 resize-none"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Amount (Rp)</label>
                                        <input type="number" id="incomeAmount" placeholder="Rp. 0" required
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                                    </div>
                                    <button type="submit" id="btnSaveIncome"
                                        class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2 rounded-lg transition">Add
                                        Income</button>
                                </form>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Latest income transactions</h3>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="bg-gray-100 border-b border-gray-300">
                                            <tr>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">DATE</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">CATEGORY
                                                </th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">NOTE</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">AMOUNT</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="incomeTableBody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1 space-y-6">
                            <div
                                class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg p-6 text-white shadow-lg">
                                <h4 class="text-sm font-medium opacity-90 mb-2">Total income</h4>
                                <p class="text-3xl font-bold" id="totalIncome">Rp 0</p>
                            </div>
                            <div class="relative w-full h-64">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Income by category</h3>
                                <canvas id="incomeChart" class="mx-auto"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="expense-tab" class="tab-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="col-span-2 space-y-6">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" id="searchExpense" placeholder="Type to search..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="date" id="startDateExpense"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 text-sm">
                                    <span class="text-gray-500">-</span>
                                    <input type="date" id="endDateExpense"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 text-sm">
                                </div>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Add expense</h3>
                                <form id="expenseForm" class="space-y-4">
                                    <input type="hidden" id="expenseId">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                            <input type="date" id="expenseDate" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                            <select id="expenseCategory" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                                <option value="">-- select category --</option>
                                                <option value="Food">Food</option>
                                                <option value="Transport">Transport</option>
                                                <option value="Entertainment">Entertainment</option>
                                                <option value="Utilities">Utilities</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes</label>
                                        <textarea id="expenseNotes" placeholder="Add notes..."
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 h-20 resize-none"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Amount (Rp)</label>
                                        <input type="number" id="expenseAmount" placeholder="Rp. 0" required
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                                    </div>
                                    <button type="submit" id="btnSaveExpense"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg transition">Add
                                        Expense</button>
                                </form>
                            </div>

                            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Latest expense transactions</h3>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="bg-gray-100 border-b border-gray-300">
                                            <tr>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">DATE</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">CATEGORY
                                                </th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">NOTE</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">AMOUNT</th>
                                                <th class="px-4 py-3 text-left font-semibold text-gray-700">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody id="expenseTableBody"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-1 space-y-6">
                            <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-lg p-6 text-white shadow-lg">
                                <h4 class="text-sm font-medium opacity-90 mb-2">Total expense</h4>
                                <p class="text-3xl font-bold" id="totalExpense">Rp 0</p>
                            </div>
                            <div class="relative w-full h-64">
                                <h3 class="text-lg font-semibold text-gray-800 mb-6">Expense by category</h3>
                                <canvas id="expenseChart" class="mx-auto"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // --- KONFIGURASI UMUM ---
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Tab switching logic
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                tabBtns.forEach(b => {
                    b.classList.remove('border-blue-900', 'text-gray-800');
                    b.classList.add('border-transparent', 'text-gray-500');
                });
                tabContents.forEach(content => content.classList.add('hidden'));
                this.classList.remove('border-transparent', 'text-gray-500');
                this.classList.add('border-blue-900', 'text-gray-800');
                document.getElementById(this.dataset.tab + '-tab').classList.remove('hidden');
            });
        });

        // --- GLOBAL VARIABLES (State from DB) ---
        let incomeTransactions = [];
        let expenseTransactions = [];
        let incomeChart = null;
        let expenseChart = null;

        document.getElementById('incomeDate').valueAsDate = new Date();
        document.getElementById('expenseDate').valueAsDate = new Date();

        // --- HELPER FUNCTIONS (API CALLS) ---

        // 1. Fetch Data dari Database
        async function fetchTransactions(type) {
            try {
                const response = await fetch(`/transactions/type/${type}`);
                const data = await response.json();
                if (type === 'income') {
                    incomeTransactions = data;
                    renderIncomeTransactions();
                    updateIncomeChart();
                } else {
                    expenseTransactions = data;
                    renderExpenseTransactions();
                    updateExpenseChart();
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }


        // 2. Save/Update Data ke Database
        async function saveTransaction(type, id = null) {
            const url = id ? `/transactions/${id}` : '/transactions';
            const method = id ? 'PUT' : 'POST';

            const prefix = type; // 'income' or 'expense'
            const payload = {
                type: type,
                date: document.getElementById(`${prefix}Date`).value,
                category: document.getElementById(`${prefix}Category`).value,
                notes: document.getElementById(`${prefix}Notes`).value,
                amount: document.getElementById(`${prefix}Amount`).value
            };

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(payload)
                });

                if (response.ok) {
                    // Refresh data setelah save sukses
                    resetForm(type);
                    fetchTransactions(type);
                } else {
                    alert('Failed to save transaction');
                }
            } catch (error) {
                console.error('Error saving:', error);
            }
        }

        // 3. Delete Data dari Database
        async function deleteTransaction(id, type) {
            if (!confirm('Are you sure?')) return;

            try {
                const response = await fetch(`/transactions/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                if (response.ok) {
                    fetchTransactions(type); // Refresh data
                }
            } catch (error) {
                console.error('Error deleting:', error);
            }
        }

        // --- EVENT LISTENERS & LOGIC ---

        // INCOME FORM SUBMIT
        document.getElementById('incomeForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('incomeId').value;
            saveTransaction('income', id ? id : null);
        });

        // EXPENSE FORM SUBMIT
        document.getElementById('expenseForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const id = document.getElementById('expenseId').value;
            saveTransaction('expense', id ? id : null);
        });

        // RENDER FUNCTIONS (Diadaptasi untuk array dari DB)
        function renderIncomeTransactions() {
            const tbody = document.getElementById('incomeTableBody');
            const searchTerm = document.getElementById('searchIncome').value.toLowerCase();
            const startDateVal = document.getElementById('startDateIncome').value;
            const endDateVal = document.getElementById('endDateIncome').value;

            // Filter Client-side (Data sudah diload semua dari DB, filter tampilan saja)
            let filtered = incomeTransactions.filter(t => {
                const transactionDate = new Date(t.date);
                const searchMatch = t.category.toLowerCase().includes(searchTerm) || (t.notes && t.notes.toLowerCase().includes(searchTerm));
                let dateMatch = true;
                if (startDateVal) dateMatch = dateMatch && (transactionDate >= new Date(startDateVal));
                if (endDateVal) dateMatch = dateMatch && (transactionDate <= new Date(endDateVal));
                return searchMatch && dateMatch;
            });

            if (filtered.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">No transactions found</td></tr>';
                document.getElementById('totalIncome').textContent = 'Rp 0';
                return;
            }

            tbody.innerHTML = filtered.map(t => `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3">${new Date(t.date).toLocaleDateString('id-ID')}</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 bg-teal-100 text-teal-700 rounded text-xs font-medium">${t.category}</span></td>
                    <td class="px-4 py-3">${t.notes || '-'}</td>
                    <td class="px-4 py-3 font-semibold text-teal-600">Rp ${parseInt(t.amount).toLocaleString('id-ID')}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <button onclick="editTransaction('income', ${t.id})" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs font-medium">EDIT</button>
                        <button onclick="deleteTransaction(${t.id}, 'income')" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs font-medium">DELETE</button>
                    </td>
                </tr>
            `).join('');

            const total = filtered.reduce((sum, t) => sum + parseFloat(t.amount), 0);
            document.getElementById('totalIncome').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        function renderExpenseTransactions() {
            const tbody = document.getElementById('expenseTableBody');
            const searchTerm = document.getElementById('searchExpense').value.toLowerCase();
            const startDateVal = document.getElementById('startDateExpense').value;
            const endDateVal = document.getElementById('endDateExpense').value;

            let filtered = expenseTransactions.filter(t => {
                const transactionDate = new Date(t.date);
                const searchMatch = t.category.toLowerCase().includes(searchTerm) || (t.notes && t.notes.toLowerCase().includes(searchTerm));
                let dateMatch = true;
                if (startDateVal) dateMatch = dateMatch && (transactionDate >= new Date(startDateVal));
                if (endDateVal) dateMatch = dateMatch && (transactionDate <= new Date(endDateVal));
                return searchMatch && dateMatch;
            });

            if (filtered.length === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">No transactions found</td></tr>';
                document.getElementById('totalExpense').textContent = 'Rp 0';
                return;
            }

            tbody.innerHTML = filtered.map(t => `
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-4 py-3">${new Date(t.date).toLocaleDateString('id-ID')}</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">${t.category}</span></td>
                    <td class="px-4 py-3">${t.notes || '-'}</td>
                    <td class="px-4 py-3 font-semibold text-red-600">Rp ${parseInt(t.amount).toLocaleString('id-ID')}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <button onclick="editTransaction('expense', ${t.id})" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-xs font-medium">EDIT</button>
                        <button onclick="deleteTransaction(${t.id}, 'expense')" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-xs font-medium">DELETE</button>
                    </td>
                </tr>
            `).join('');

            const total = filtered.reduce((sum, t) => sum + parseFloat(t.amount), 0);
            document.getElementById('totalExpense').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        // Helper untuk Edit (Populate Form)
        function editTransaction(type, id) {
            const list = type === 'income' ? incomeTransactions : expenseTransactions;
            const transaction = list.find(t => t.id === id);

            if (transaction) {
                document.getElementById(`${type}Id`).value = transaction.id;
                document.getElementById(`${type}Date`).value = transaction.date;
                document.getElementById(`${type}Category`).value = transaction.category;
                document.getElementById(`${type}Notes`).value = transaction.notes;
                document.getElementById(`${type}Amount`).value = Math.floor(transaction.amount); // remove decimals for input

                // Ubah teks tombol agar user tahu sedang edit
                const btn = type === 'income' ? document.getElementById('btnSaveIncome') : document.getElementById('btnSaveExpense');
                btn.textContent = 'Update Transaction';

                document.getElementById(`${type}Date`).focus();
            }
        }

        function resetForm(type) {
            document.getElementById(`${type}Form`).reset();
            document.getElementById(`${type}Id`).value = ''; // Clear ID
            document.getElementById(`${type}Date`).valueAsDate = new Date();

            // Kembalikan teks tombol
            const btn = type === 'income' ? document.getElementById('btnSaveIncome') : document.getElementById('btnSaveExpense');
            btn.textContent = type === 'income' ? 'Add Income' : 'Add Expense';
        }

        function updateIncomeChart() {
            const byCategory = {};
            incomeTransactions.forEach(t => {
                byCategory[t.category] = (byCategory[t.category] || 0) + parseFloat(t.amount);
            });
            const ctx = document.getElementById('incomeChart').getContext('2d');
            if (incomeChart) incomeChart.destroy();
            incomeChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(byCategory).length ? Object.keys(byCategory) : ['No data'],
                    datasets: [{
                        data: Object.values(byCategory).length ? Object.values(byCategory) : [0],
                        backgroundColor: ['#ff6b6b', '#ffd93d', '#6bcf7f', '#4d96ff', '#c77dff'],
                        borderColor: 'white',
                        borderWidth: 2
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
            });
        }

        function updateExpenseChart() {
            const byCategory = {};
            expenseTransactions.forEach(t => {
                byCategory[t.category] = (byCategory[t.category] || 0) + parseFloat(t.amount);
            });
            const ctx = document.getElementById('expenseChart').getContext('2d');
            if (expenseChart) expenseChart.destroy();
            expenseChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(byCategory).length ? Object.keys(byCategory) : ['No data'],
                    datasets: [{
                        data: Object.values(byCategory).length ? Object.values(byCategory) : [0],
                        backgroundColor: ['#ff6b6b', '#ffd93d', '#6bcf7f', '#4d96ff', '#c77dff'],
                        borderColor: 'white',
                        borderWidth: 2
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
            });
        }

        // Search Filters
        document.getElementById('searchIncome').addEventListener('input', renderIncomeTransactions);
        document.getElementById('startDateIncome').addEventListener('change', renderIncomeTransactions);
        document.getElementById('endDateIncome').addEventListener('change', renderIncomeTransactions);

        document.getElementById('searchExpense').addEventListener('input', renderExpenseTransactions);
        document.getElementById('startDateExpense').addEventListener('change', renderExpenseTransactions);
        document.getElementById('endDateExpense').addEventListener('change', renderExpenseTransactions);

        // INITIAL LOAD
        fetchTransactions('income');
        fetchTransactions('expense');

    </script>
</x-app-layout>
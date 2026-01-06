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

                <div id="expense-tab" class="tab-content">
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
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    
    let incomeChart = null;
    let expenseChart = null;

/* ================= TAB ================= */
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('border-blue-900','text-gray-800');
            b.classList.add('border-transparent','text-gray-500');
        });
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));

        btn.classList.add('border-blue-900','text-gray-800');
        document.getElementById(btn.dataset.tab + '-tab').classList.remove('hidden');
    });
});

/* ================= LOAD DATA ================= */
async function load(type, params = '') {
    const res = await fetch(`/transactions/data/${type}?${params}`);
    const data = await res.json();

    renderTable(type, data.transactions);
    renderTotal(type, data.total);
    renderChart(type, data.chart);
}

/* ================= RENDER ================= */
function renderTable(type, rows) {
    const tbody = document.getElementById(type + 'TableBody');

    tbody.innerHTML = rows.length
        ? rows.map(t => `
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">${new Date(t.date).toLocaleDateString('id-ID')}</td>
                <td class="px-4 py-3">${t.category}</td>
                <td class="px-4 py-3">${t.notes ?? '-'}</td>
                <td class="px-4 py-3 font-semibold">
                    Rp ${Number(t.amount).toLocaleString('id-ID')}
                </td>
                <td class="px-4 py-3 flex gap-2">
                    <button onclick="edit('${type}', ${t.id})"
                        class="px-3 py-1 bg-blue-500 text-white rounded text-xs">EDIT</button>
                    <button onclick="removeTx(${t.id}, '${type}')"
                        class="px-3 py-1 bg-red-500 text-white rounded text-xs">DELETE</button>
                </td>
            </tr>
        `).join('')
        : `<tr><td colspan="5" class="py-6 text-center text-gray-400">No data</td></tr>`;
}

function renderTotal(type, total) {
    document.getElementById(type === 'income' ? 'totalIncome' : 'totalExpense')
        .innerText = `Rp ${total.toLocaleString('id-ID')}`;
}

function renderChart(type, chartData) {
    const ctx = document.getElementById(type + 'Chart');
    const chartRef = type === 'income' ? incomeChart : expenseChart;
    if (chartRef) chartRef.destroy();

    const chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(chartData),
            datasets: [{
                data: Object.values(chartData),
                backgroundColor: ['#4CAF50','#FFC107','#03A9F4','#E91E63','#9C27B0']
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    type === 'income' ? incomeChart = chart : expenseChart = chart;
}

/* ================= SUBMIT ================= */
async function submitForm(type) {
    const prefix = type;
    const id = document.getElementById(prefix + 'Id').value;

    const payload = {
        type,
        date: document.getElementById(prefix + 'Date').value,
        category: document.getElementById(prefix + 'Category').value,
        notes: document.getElementById(prefix + 'Notes').value,
        amount: document.getElementById(prefix + 'Amount').value
    };

    await fetch(id ? `/transactions/${id}` : '/transactions', {
        method: id ? 'PUT' : 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify(payload)
    });

    document.getElementById(prefix + 'Form').reset();
    document.getElementById(prefix + 'Id').value = '';
    load(type);
}

/* ================= DELETE ================= */
async function removeTx(id, type) {
    if (!confirm('Delete transaction?')) return;

    await fetch(`/transactions/${id}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': csrf }
    });

    load(type);
}

/* ================= EDIT ================= */
async function edit(type, id) {
    const res = await fetch(`/transactions/data/${type}`);
    const data = await res.json();
    const t = data.transactions.find(x => x.id === id);

    document.getElementById(type + 'Id').value = t.id;
    document.getElementById(type + 'Date').value = t.date;
    document.getElementById(type + 'Category').value = t.category;
    document.getElementById(type + 'Notes').value = t.notes;
    document.getElementById(type + 'Amount').value = t.amount;
}

/* ================= FILTER ================= */
['Income','Expense'].forEach(type => {
    ['search','startDate','endDate'].forEach(f => {
        document.getElementById(f + type)?.addEventListener('input', () => {
            const q = new URLSearchParams({
                search: document.getElementById('search' + type).value,
                start_date: document.getElementById('startDate' + type).value,
                end_date: document.getElementById('endDate' + type).value
            });
            load(type.toLowerCase(), q.toString());
        });
    });
});

/* ================= INIT ================= */
document.getElementById('incomeForm').onsubmit = e => {
    e.preventDefault(); submitForm('income');
};
document.getElementById('expenseForm').onsubmit = e => {
    e.preventDefault(); submitForm('expense');
};

load('income');
load('expense');
</script>
</x-app-layout>
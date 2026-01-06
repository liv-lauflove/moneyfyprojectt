<x-app-layout>
    <style>
        html,
        body {
            overflow: hidden;
            height: 100%;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--laravel wajib pakai CSRF token utk post, put, delete, nnti js akan ambil di bawah-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- panggil chart.js dari cdn -->

    <div class="flex h-screen w-full overflow-hidden bg-gray-100">

        <div class="flex-shrink-0 hidden md:flex">
            @include('layouts.sidebar') <!-- panggil sidebar dari layouts/sidebar.blade.php -->
        </div>

        <div class="flex-1 flex flex-col h-full md:ml-64 min-w-0">

            <div class="flex-shrink-0 bg-white shadow z-10 relative">
                @include('layouts.navigation')
            </div>

            <main class="flex-1 overflow-y-auto bg-gray-100 p-8 scroll-smooth">

                <div class="flex gap-8 border-b border-gray-200 mb-8">
                    <!-- tab income n expense -->
                    <button class="tab-btn active px-4 py-3 border-b-2 border-blue-900 font-semibold text-gray-800"
                        data-tab="income">Income</button>
                    <button
                        class="tab-btn px-4 py-3 border-b-2 border-transparent font-semibold text-gray-500 hover:text-gray-700"
                        data-tab="expense">Expense</button>
                </div>

                <!-- id: income-tab class:tab-content berhubungan dgn data-tab diatas -> id="income-tab" agar js tau tab mana yang ditampilkan -->
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
        //cari meta diatas tdi, ambil isinya n simpan ke variabel csrf 
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        // chart state, null krn chart blm dibuat n akan diisi object chart.js, disimpan biar bisa chart.destroy() kalau engga nnti chart numpuk
        let incomeChart = null;
        let expenseChart = null;

        /* ================= TAB SWITCHING ================= */
        document.querySelectorAll('.tab-btn').forEach(btn => { //ambil smua tombol tab, akan lakukan perulangn dan beri nama btn
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => { //klu diklik, panggil lagi smua tombol tab, loop lagi akan reset tampilan semua tab(inactive)
                    b.classList.remove('border-blue-900', 'text-gray-800'); //hapus kelas yg bikin tombol terlihat aktif
                    b.classList.add('border-transparent', 'text-gray-500'); //tambahin class yg buat tombol terlihat tidak atif
                });
                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden')); //tambah class hidden ke semua konten agar sembunyikan smua isi tab

                btn.classList.add('border-blue-900', 'text-gray-800'); //tambahkan style aktif, klu tabbutton di klik
                document.getElementById(btn.dataset.tab + '-tab').classList.remove('hidden'); //btn.dataset.. ambil nilai dari atribut html data-tab, hapus class hidden biar konten muncul
            });
        });

        /* ================= LOAD DATA DARI SERVER ================= */
        async function load(type, params = '') { //fungsi async untuk fetch transction data. params itu string kosong for filter
            const res = await fetch(`/transactions/data/${type}?${params}`); //akan nunggu krn ada await, variabel res blm terisi smpe server ada datanya
            // req ke controller data() then return json with transactions, total sum, chart data
            const data = await res.json(); //ubah data mentah diatas n uabh ke json ambil response json dari controller

            // render function to update UI, data json dipecah dan kirim ke fungsi tampilan
            renderTable(type, data.transactions); //render functions to update UI
            renderTotal(type, data.total);
            renderChart(type, data.chart);
        }

        /* ================= RENDER ================= */
        function renderTable(type, rows) {  //rows itu list data transaksi/array
            const tbody = document.getElementById(type + 'TableBody');

            // ternary operator, klu ada data tampikan data,, klu gada data ya no data
            tbody.innerHTML = rows.length //apakah datanya > 0?, klu iya? buat baris tabel, t adalah singkatan dari satu item transaksi
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
        `).join('') //hasil .map itu array, ahrus ada join krn html gabisa baca array, join satukan semua tr jdi satu teks panjang
                : `<tr><td colspan="5" class="py-6 text-center text-gray-400">No data</td></tr>`;
        }

        function renderTotal(type, total) {
            // drpd bikin if-else panjang, dia lgsng cek dlm kurung, klu type nya income cari elemen id totalincome,kalau bukan cari total expense
            document.getElementById(type === 'income' ? 'totalIncome' : 'totalExpense')
                .innerText = `Rp ${total.toLocaleString('id-ID')}`; //innertext utk ganti tulisan di elemen tsb dgn format rupiah
        }

        function renderChart(type, chartData) {
            //ctx cari kanvas tmpt gambar grafik
            const ctx = document.getElementById(type + 'Chart');
            // cek variabel global, apakah sbelumnya sudah ada grafik yg tergambar disitu 
            const chartRef = type === 'income' ? incomeChart : expenseChart;
            // destroys any existing chart to avoid overlaps, klu ada grafik lama buang dulu
            if (chartRef) chartRef.destroy();

            // bikin chart.js baru dgn labels (nama kategori) n data sum dari chartdata
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(chartData), //ambil keys kategori,"salary", "freelance"
                    datasets: [{
                        data: Object.values(chartData), //ambil valuenya, total per kategori, "400000", "200000"
                        backgroundColor: ['#4CAF50', '#FFC107', '#03A9F4', '#E91E63', '#9C27B0']
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            // stelah grafik baru dibuat simpan hasilnya ke variabel global (incomechart), suapaya klu fungsi renderchart dipanggil ada referensi untuk destroy
            type === 'income' ? incomeChart = chart : expenseChart = chart;
        }

        /* ================= SUBMIT ================= */
        async function submitForm(type) {
            const prefix = type;
            const id = document.getElementById(prefix + 'Id').value; //cek input hidden di html biasanya di incomeId, jika id koson brrti user mau tambah data baru, klu ada isi bbrti edit data dgn id gtu

            const payload = { //data dari form yg iinoput user, simpan ke objek js nmnya payload
                type,
                date: document.getElementById(prefix + 'Date').value, //value ambil nilai saat t ini dlm formulir
                category: document.getElementById(prefix + 'Category').value,
                notes: document.getElementById(prefix + 'Notes').value,
                amount: document.getElementById(prefix + 'Amount').value
            };

            // gunakan fetch tergantung variabel id tdi, klu ada id kirim ke transaction yg id nya brp, klu gada kirim ke transactions umum
            await fetch(id ? `/transactions/${id}` : '/transactions', {
                method: id ? 'PUT' : 'POST', //klu ada id put, klu gada kita post
                headers: {
                    'Content-Type': 'application/json', //britahu bahwa kirim data dlm format json
                    'X-CSRF-TOKEN': csrf //dri line 220, dipakai untuk ini, agar lolos stapam laravel
                },
                body: JSON.stringify(payload) //server tidak ngeti objek js mentah, hrus ubah payload jadi string/text agar bisa dikirim lewat internet
            });

            // stelah data terkirim (krn ada await, yg ini baru jln klu sukses)
            document.getElementById(prefix + 'Form').reset(); //hapus smua tulisan di form biar jdi kosong lgi
            document.getElementById(prefix + 'Id').value = ''; //bayangin hbis edit, form emg kosong, tpi input hideen id masih berisi angka,
            //  klu ga dikosongkan nnti sitem ngira masih edit id itu, jdi dikosongkan id nya

            load(type); //panggil fungsi load yg tadi utk refresh tabel n grafik
        }

        /* ================= DELETE ================= */
        async function removeTx(id, type) { //dia membuat function removeTx yg butuh id transaksi n type income/expense, dia punya tugas hapus transaksi tpi harus nunggu servernya load dulu
            if (!confirm('Delete transaction?')) return; //konfirmasi dulu klu user yakin mau hapus, klu ga ya return biar ga lanjut

            await fetch(`/transactions/${id}`, {//ngirim permintaan delete ke server berdasarkan id_trasnsaksi
                method: 'DELETE', //method delete yang nyambung ke route delete di web.php
                headers: { 'X-CSRF-TOKEN': csrf }//token keamanan laravel
            });

            load(type);//dia akan load type (income/expense) biar tabel n grafik terupdate)
        }

        /* ================= EDIT ================= */
        async function edit(type, id) {//membuat fungsi edit yang butuh type (income/expense) dan id transaksi, punya tugas untuk edit data tpi harus nunggu server lamanya load (async)
            const res = await fetch(`/transactions/data/${type}`);//kirim request ke server berdasarkan type utk dapetin data transaksi
            const data = await res.json();//menerima data yang dikirmkan dari server (controller) yang diubah ke json
            const t = data.transactions.find(x => x.id === id);//ini digunkan untuk mencari transaksi yang spesifik berdasarkan id yang dikirim dan id nya harus sama

            document.getElementById(type + 'Id').value = t.id;//getelemenbyid tu kita ambil (income/expense)Id, lalu diisi dgn id transaksi yg mau diedit
            document.getElementById(type + 'Date').value = t.date;//ambil data dari transaksi dan masukan untuk edit data
            document.getElementById(type + 'Category').value = t.category;
            document.getElementById(type + 'Notes').value = t.notes;
            document.getElementById(type + 'Amount').value = t.amount;
        }

        /* ================= FILTER ================= */
        ['Income', 'Expense'].forEach(type => {//ini gunanya untuk melakukan filter data berdasarkan input user di search dan date range, income dan expense di jalankan juga
            ['search', 'startDate', 'endDate'].forEach(f => {//loop untuk tiap input filter seperti dia akan mencari dari tanggal sekian ke tanggal sekian
                document.getElementById(f + type)?.addEventListener('input', () => {//dia akan mencari data berdasarkan income/expense (?) gunanya kalau ga ada dia ga error. 
                    const q = new URLSearchParams({ //ini untuk membuat query string dari input user
                        search: document.getElementById('search' + type).value,//menerima input user dari search (kaetegori/note)
                        start_date: document.getElementById('startDate' + type).value,//menerima input user dari tanggal mulai
                        end_date: document.getElementById('endDate' + type).value//menerima input user dari tanggal akhir
                    });
                    load(type.toLowerCase(), q.toString());//load query string yg sudah dibuat diatas, type diubah ke lowercase (income/expense)
                });
            });
        });

        /* ================= INIT ================= */
        document.getElementById('incomeForm').onsubmit = e => {//cari elemen HTML dengan id incomeForm, lalu pasang event onsubmit. jika tekan tombol submit atau enter akan menjalankan fungsi berikut
            e.preventDefault(); submitForm('income'); //preventDefault mencegah form melakukan submit default (reload halaman), lalu panggil fungsi submitForm dengan argumen 'income'
        };// memanggil fungsi submitForm dengan argumen 'income' lalu dikirimkan ke server menggunakan fetch dan menyimpan di database
        document.getElementById('expenseForm').onsubmit = e => {
            e.preventDefault(); submitForm('expense');
        };

        //memanggil data dari server untuk menampilkan data income dan expense saat halaman pertama kali dimuat
        load('income');
        load('expense');
    </script>
</x-app-layout>
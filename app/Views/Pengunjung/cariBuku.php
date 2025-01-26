<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan ADP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #fff;
            color: #000;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header img {
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            height: 100px;
            width: 100px;
        }

        .header .text {
            text-align: left;
        }

        .header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .header p {
            margin: 0;
            font-size: 0.9rem;
        }

        .menu {
            background-color: #f44336;
            padding: 20px 15px;
            display: flex;
            gap: 20px;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 1rem;
        }

        .menu a:hover {
            color: #f44336;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        .sidebar {
            width: 20%;
            padding: 15px;
            background-color: #f1f1f1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            width: 70%;
            padding: 15px;
            background-color: #f1f1f1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .content h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #d32f2f;
        }

        .stats {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
            /* Tambahkan shadow lembut */
        }

        .stats h3 {
            text-align: left;
            /* Rata kiri */
            text-transform: uppercase;
            /* Huruf besar */
            background-color: blue;
            /* Latar belakang biru */
            color: white;
            /* Teks putih agar kontras */
            padding: 15px;
            /* Tambahkan padding untuk estetika */
            border-radius: 5px;
            /* Opsional: membuat sudut agak melengkung */
            margin-bottom: 20px;
        }

        .calendar {
            margin-top: 20px;
            text-align: center;
            background-color: white;
            /* Latar belakang putih */
            padding: 15px;
            /* Tambahkan padding */
            border-radius: 8px;
            /* Membuat sudut melengkung */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.06);
            /* Tambahkan shadow lembut */
            border: 1px solid #ddd;
            /* Opsional: menambahkan border tipis */
        }

        .calendar .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Memastikan kolom memiliki lebar tetap */
        }

        .calendar th,
        .calendar td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            word-wrap: break-word;
            /* Menghindari overflow teks */
        }

        .calendar h3 {
            text-transform: uppercase;
            /* Huruf kapital semua */
            background-color: blue;
            /* Latar belakang biru */
            color: white;
            /* Teks putih */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1rem;
            /* Ukuran teks */
        }

        .calendar th {
            font-size: 0.5rem;
            /* Memperkecil ukuran nama hari */
            background-color: #f44336;
            /* Tetap merah untuk kolom header tabel */
            color: white;
            padding: 5px;
            border-radius: 0;
            /* Tidak melengkung */
        }


        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content {
                margin-left: 0;
            }
        }

        /* Styling tabel agar lebih responsif */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto;
            /* Tambahkan scroll horizontal jika tabel melebihi lebar container */
            display: block;
        }

        thead {
            background-color: #f44336;
            /* Warna header tabel */
            color: white;
            /* Teks putih */
        }

        thead th {
            padding: 10px;
            text-align: left;
            font-size: 0.9rem;
            /* Ukuran font lebih kecil */
            white-space: nowrap;
            /* Mencegah teks header tabel terpotong */
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
            /* Warna berbeda untuk baris ganjil */
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
            /* Warna berbeda untuk baris genap */
        }

        td {
            padding: 10px;
            text-align: left;
            font-size: 0.9rem;
            border-bottom: 1px solid #ddd;
            /* Garis bawah setiap sel */
        }

        tbody td {
            white-space: nowrap;
            /* Mencegah teks dalam tabel terpotong */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Teks panjang akan ditampilkan dengan "..." */
        }

        @media (max-width: 768px) {
            table {
                display: block;
                /* Tabel akan menjadi blok */
                overflow-x: auto;
                /* Tambahkan scroll horizontal */
            }

            thead th,
            tbody td {
                font-size: 0.8rem;
                /* Ukuran font lebih kecil untuk perangkat kecil */
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="logo.png" alt="Logo">
        <div class="text">
            <h1>Perpustakaan ADP</h1>
            <p>Alamat: Jl. Lintas Timur No. 1, BSD City</p>
        </div>
    </div>

    <div class="menu">
        <a href="<?= base_url('/'); ?>">Beranda</a>
        <a href="<?= base_url('/profil'); ?>">Profil Perpustakaan</a>
        <a href="<?= base_url('/cari-buku'); ?>">Cari Buku</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <div class="stats">
                <h3>STATISTIK HARI INI</h3>
                <p>Anda pengunjung ke:</p>
                <h1><?= $pengunjungKe; ?></h1>
                <p>Total hari ini: <?= $totalHariIni; ?></p>
                <p>Total bulan ini: <?= $totalBulanIni; ?></p>
            </div>

            <div class="calendar">
                <h3>KALENDER</h3>
                <div class="calendar-header">
                    <button id="prev-month">&#9664;</button>
                    <span id="current-month">Bulan Tahun</span>
                    <button id="next-month">&#9654;</button>
                </div>
                <div id="calendar-body">
                    <!-- Kalender dinamis akan di-render di sini -->
                </div>
            </div>
        </div>

        <div class="content">
            <h2>Cari Buku</h2>
            <p>Gunakan fitur pencarian di bawah ini untuk menemukan buku yang Anda butuhkan.</p>
            <div class="form-group">
                <label for="search">Kata Kunci:</label>
                <input type="text" id="search" placeholder="Cari berdasarkan judul, pengarang, ISBN, atau kategori...">
            </div>
            <table id="book-table" border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>ISBN</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diisi oleh JavaScript -->
                </tbody>
            </table>
        </div>

        <script>
            // Data buku diambil dari PHP
            const books = <?= json_encode($dataBuku); ?>;

            // Fungsi untuk render data ke tabel
            function renderTable(data) {
                const tbody = document.querySelector("#book-table tbody");
                tbody.innerHTML = ""; // Hapus isi sebelumnya
                if (data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="7" style="text-align: center;">Tidak ada data buku</td></tr>`;
                } else {
                    data.forEach((book) => {
                        const row = `
                <tr>
                    <td>${book.id_buku}</td>
                    <td>${book.judul}</td>
                    <td>${book.pengarang}</td>
                    <td>${book.tahun_terbit}</td>
                    <td>${book.isbn}</td>
                    <td>${book.kategori}</td>
                    <td>${book.deskripsi}</td>
                </tr>
                `;
                        tbody.insertAdjacentHTML("beforeend", row);
                    });
                }
            }

            // Fungsi pencarian
            function searchBooks(keyword) {
                const filtered = books.filter((book) =>
                    book.judul.toLowerCase().includes(keyword.toLowerCase()) ||
                    book.pengarang.toLowerCase().includes(keyword.toLowerCase()) ||
                    book.isbn.toLowerCase().includes(keyword.toLowerCase()) ||
                    book.kategori.toLowerCase().includes(keyword.toLowerCase())
                );
                renderTable(filtered);
            }

            // Event Listener untuk pencarian
            document.getElementById("search").addEventListener("input", (e) => {
                searchBooks(e.target.value);
            });

            // Render awal tabel
            renderTable(books);
        </script>

    </div>

    <script>
        function generateCalendar(year, month) {
            const calendarBody = document.getElementById('calendar-body');
            const currentMonth = document.getElementById('current-month');
            const date = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0).getDate();
            const startDay = date.getDay();

            // Update current month
            currentMonth.textContent = date.toLocaleDateString('id-ID', {
                month: 'long',
                year: 'numeric'
            });

            // Clear previous calendar
            calendarBody.innerHTML = '';

            const table = document.createElement('table');
            const headerRow = document.createElement('tr');
            const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

            days.forEach(day => {
                const th = document.createElement('th');
                th.textContent = day;
                headerRow.appendChild(th);
            });
            table.appendChild(headerRow);

            let row = document.createElement('tr');
            for (let i = 0; i < startDay; i++) {
                const cell = document.createElement('td');
                row.appendChild(cell);
            }

            for (let day = 1; day <= lastDay; day++) {
                const cell = document.createElement('td');
                cell.textContent = day;
                row.appendChild(cell);

                if ((startDay + day) % 7 === 0 || day === lastDay) {
                    table.appendChild(row);
                    row = document.createElement('tr');
                }
            }

            calendarBody.appendChild(table);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const today = new Date();
            let currentYear = today.getFullYear();
            let currentMonth = today.getMonth();

            generateCalendar(currentYear, currentMonth);

            document.getElementById('prev-month').addEventListener('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentYear, currentMonth);
            });

            document.getElementById('next-month').addEventListener('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentYear, currentMonth);
            });
        });
    </script>
</body>

</html>
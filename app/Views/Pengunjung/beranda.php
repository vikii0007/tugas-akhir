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
            min-width: 250px;
            padding: 15px;
            background-color: #f1f1f1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex: 1;
            min-width: 300px;
            margin-left: 20px;
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
            <h2>Selamat Datang di Perpustakaan ADP</h2>
            <p>Silakan masukkan data kunjungan Anda sebelum masuk ke perpustakaan. Terima kasih.</p>
            <?php if (session()->has('success')): ?>
                <div style="color: green; margin-bottom: 15px;">
                    <?= session('success'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('errors')): ?>
                <div style="color: red; margin-bottom: 15px;">
                    <?= implode('<br>', session('errors')); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/pengunjung/tambah'); ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" placeholder="Masukan nama..." id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="jenis-kelamin">Jenis Kelamin:</label>
                    <select id="jenis-kelamin" name="jk" required>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis-anggota">Jenis Anggota:</label>
                    <select id="jenis-anggota" name="jenis" required>
                        <option value="Dosen">Dosen</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keperluan">Patu/Keperluan:</label>
                    <textarea id="keperluan" placeholder="Masukan keperluan.." name="patu" required></textarea>
                </div>

                <div class="form-group">
                    <label for="saran">Saran:</label>
                    <textarea id="saran" placeholder="Masukan saran.." name="saran"></textarea>
                </div>

                <button type="submit" class="btn">Absensi Kunjungan</button>
            </form>

        </div>
    </div>

    <script>
        function generateCalendar(year, month) {
            const calendarBody = document.getElementById('calendar-body');
            const currentMonth = document.getElementById('current-month');
            const today = new Date();
            const todayDate = today.getDate();
            const todayMonth = today.getMonth();
            const todayYear = today.getFullYear();

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

                // Highlight tanggal hari ini
                if (day === todayDate && month === todayMonth && year === todayYear) {
                    cell.style.backgroundColor = '#f44336'; // Warna latar untuk tanggal hari ini
                    cell.style.color = 'white'; // Warna teks
                    cell.style.fontWeight = 'bold'; // Teks tebal
                    cell.title = 'Hari ini'; // Tooltip
                }

                // Tambahkan event listener untuk memilih tanggal
                cell.addEventListener('click', () => selectDate(year, month, day, cell));

                row.appendChild(cell);

                if ((startDay + day) % 7 === 0 || day === lastDay) {
                    table.appendChild(row);
                    row = document.createElement('tr');
                }
            }

            calendarBody.appendChild(table);
        }

        function selectDate(year, month, day, cell) {
            const selectedDate = new Date(year, month, day);
            const formattedDate = selectedDate.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });

            // Tampilkan tanggal yang dipilih di bawah kalender
            document.getElementById('selected-date').textContent = `Tanggal yang dipilih: ${formattedDate}`;

            // Hapus kelas "selected" dari semua sel
            const allCells = document.querySelectorAll('.calendar td');
            allCells.forEach(c => c.classList.remove('selected'));

            // Tambahkan kelas "selected" ke sel yang dipilih
            cell.classList.add('selected');
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
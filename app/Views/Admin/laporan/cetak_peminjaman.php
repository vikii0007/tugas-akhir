<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Peminjaman Buku</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Telat (Hari)</th>
                <th>Denda (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($peminjaman)): ?>
                <?php foreach ($peminjaman as $row): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nama_anggota']; ?></td>
                        <td><?= $row['judul_buku']; ?></td>
                        <td><?= $row['tgl_pinjam']; ?></td>
                        <td><?= $row['tgl_kembali']; ?></td>
                        <td><?= ucfirst($row['status']); ?></td>
                        <td><?= $row['telat'] ?? 0; ?></td>
                        <td class="text-right">Rp <?= number_format($row['denda'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>
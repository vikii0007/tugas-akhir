<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2 class="mb-4">Laporan Peminjaman Buku</h2>

    <!-- Filter Tanggal -->
    <form method="get" action="<?= base_url('/admin/laporan/peminjaman'); ?>" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Tanggal Mulai:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $startDate ?? ''; ?>">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Tanggal Selesai:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?= $endDate ?? ''; ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <button type="button" class="btn btn-success" onclick="document.getElementById('cetak-form').submit()">Cetak PDF</button>
            </div>
        </div>
    </form>

    <!-- Form Cetak -->
    <form id="cetak-form" method="post" action="<?= base_url('/admin/laporan/peminjaman/cetak'); ?>">
        <input type="hidden" name="start_date" value="<?= $startDate ?? ''; ?>">
        <input type="hidden" name="end_date" value="<?= $endDate ?? ''; ?>">
    </form>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                        <td><?= number_format($row['denda'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data peminjaman.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('Admin/template/footer'); ?>
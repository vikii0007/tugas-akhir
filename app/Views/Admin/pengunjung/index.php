<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Data Pengunjung</h2>

    <!-- Filter Tanggal -->
    <form method="get" action="<?= base_url('/admin/data-pengunjung'); ?>" class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $startDate ?? ''; ?>">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?= $endDate ?? ''; ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
 
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jenis</th>
                <th>Patu/Keperluan</th>
                <th>Saran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataPengunjung)) : ?>
                <?php foreach ($dataPengunjung as $pengunjung) : ?>
                    <tr>
                        <td><?= $pengunjung['id']; ?></td>
                        <td><?= $pengunjung['nama']; ?></td>
                        <td><?= $pengunjung['jk'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                        <td><?= $pengunjung['jenis']; ?></td>
                        <td><?= $pengunjung['patu']; ?></td>
                        <td><?= $pengunjung['saran']; ?></td>
                        <td><?= $pengunjung['tgl']; ?></td>
                        <td>
                            <a href="<?= base_url('/admin/delete-pengunjung/' . $pengunjung['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengunjung ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pengunjung.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('Admin/template/footer'); ?>
<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <div class="content">
        <h2 class="mb-4">Data Anggota</h2>
        <a href="<?= base_url('/admin/create-anggota'); ?>" class="btn btn-success mb-3">Tambah Anggota</a>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <!-- Filter Tanggal -->
        <form method="get" action="<?= base_url('/admin/data-anggota'); ?>" class="mb-4">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" value="<?= $startDate ?? ''; ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date" value="<?= $endDate ?? ''; ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data Anggota -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dataAnggota)) : ?>
                        <?php foreach ($dataAnggota as $anggota) : ?>
                            <tr>
                                <td><?= $anggota['id_anggota']; ?></td>
                                <td><?= $anggota['nama']; ?></td>
                                <td><?= $anggota['alamat']; ?></td>
                                <td><?= $anggota['jk'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                <td><?= $anggota['agama']; ?></td>
                                <td><?= $anggota['tempat_lahir']; ?></td>
                                <td><?= $anggota['tgl_lahir']; ?></td>
                                <td><?= $anggota['tgl_daftar']; ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/edit-anggota/' . $anggota['id_anggota']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('/admin/delete-anggota/' . $anggota['id_anggota']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data anggota.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include('Admin/template/footer'); ?>
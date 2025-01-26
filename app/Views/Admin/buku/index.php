<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Data Buku</h2>
    <a href="<?= base_url('/admin/create-buku'); ?>" class="btn btn-success mb-3">Tambah Buku</a>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dataBuku)) : ?>
                <?php foreach ($dataBuku as $buku) : ?>
                    <tr>
                        <td><?= $buku['id_buku']; ?></td>
                        <td><?= $buku['judul']; ?></td>
                        <td><?= $buku['pengarang']; ?></td>
                        <td><?= $buku['tahun_terbit']; ?></td>
                        <td><?= $buku['isbn']; ?></td>
                        <td><?= $buku['kategori']; ?></td>
                        <td>
                            <a href="<?= base_url('/admin/edit-buku/' . $buku['id_buku']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('/admin/delete-buku/' . $buku['id_buku']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data buku.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('Admin/template/footer'); ?>
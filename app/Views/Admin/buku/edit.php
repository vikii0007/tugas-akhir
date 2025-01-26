<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Edit Buku</h2>
    <form action="<?= base_url('/admin/update-buku/' . $buku['id_buku']); ?>" method="post">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= $buku['judul']; ?>" placeholder="Masukkan judul buku" required>
        </div>
        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" class="form-control" value="<?= $buku['pengarang']; ?>" placeholder="Masukkan nama pengarang" required>
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit']; ?>" placeholder="Masukkan tahun terbit" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="<?= $buku['isbn']; ?>" placeholder="Masukkan ISBN buku" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $buku['kategori']; ?>" placeholder="Masukkan kategori buku" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi buku"><?= $buku['deskripsi']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="<?= base_url('/admin/data-buku'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->include('Admin/template/footer'); ?>
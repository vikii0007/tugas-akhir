<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Tambah Pengunjung</h2>
    <form action="<?= base_url('/admin/store-pengunjung'); ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-select" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Anggota</label>
            <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Masukkan jenis anggota" required>
        </div>
        <div class="mb-3">
            <label for="patu" class="form-label">Patu/Keperluan</label>
            <textarea name="patu" id="patu" class="form-control" placeholder="Masukkan keperluan" required></textarea>
        </div>
        <div class="mb-3">
            <label for="saran" class="form-label">Saran</label>
            <textarea name="saran" id="saran" class="form-control" placeholder="Masukkan saran"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<?= $this->include('Admin/template/footer'); ?>
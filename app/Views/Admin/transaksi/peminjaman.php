<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Transaksi Peminjaman Buku</h2>
    <form action="<?= base_url('/admin/transaksi/peminjaman/store'); ?>" method="post">
        <div class="mb-3">
            <label for="id_anggota" class="form-label">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-select" required>
                <option value="" disabled selected>Pilih Anggota</option>
                <?php foreach ($anggota as $row): ?>
                    <option value="<?= $row['id_anggota']; ?>"><?= $row['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">Buku</label>
            <select name="id_buku" id="id_buku" class="form-select" required>
                <option value="" disabled selected>Pilih Buku</option>
                <?php foreach ($buku as $row): ?>
                    <option value="<?= $row['id_buku']; ?>"><?= $row['judul']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ref" class="form-label">Keterangan/Catatan</label>
            <textarea name="ref" id="ref" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
    </form>
</div>

<?= $this->include('Admin/template/footer'); ?>
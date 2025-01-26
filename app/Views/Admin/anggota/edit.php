<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<div class="container mt-4">
    <h2>Edit Anggota</h2>
    <form action="<?= base_url('/admin/update-anggota/' . $anggota['id_anggota']); ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $anggota['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $anggota['alamat']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-select" required>
                <option value="L" <?= $anggota['jk'] === 'L' ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="P" <?= $anggota['jk'] === 'P' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select name="agama" id="agama" class="form-select" required>
                <option value="Islam" <?= $anggota['agama'] === 'Islam' ? 'selected' : ''; ?>>Islam</option>
                <option value="Kristen" <?= $anggota['agama'] === 'Kristen' ? 'selected' : ''; ?>>Kristen</option>
                <option value="Katolik" <?= $anggota['agama'] === 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                <option value="Hindu" <?= $anggota['agama'] === 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                <option value="Buddha" <?= $anggota['agama'] === 'Buddha' ? 'selected' : ''; ?>>Buddha</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $anggota['tempat_lahir']; ?>">
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $anggota['tgl_lahir']; ?>">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

<?= $this->include('Admin/template/footer'); ?>
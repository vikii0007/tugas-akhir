<?= $this->include('Admin/template/header'); ?>
<?= $this->include('Admin/template/navbar'); ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle JS (dengan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<div class="container mt-4">
    <h2>Pengembalian Buku</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Telat</th>
                <th>Denda</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)): ?>
                <?php foreach ($transaksi as $trans): ?>
                    <tr>
                        <td><?= $trans['id']; ?></td>
                        <td><?= $trans['nama_anggota']; ?></td>
                        <td><?= $trans['judul_buku']; ?></td>
                        <td><?= $trans['tgl_pinjam']; ?></td>
                        <td><?= $trans['tgl_kembali']; ?></td>
                        <td><?= $trans['telat']; ?></td>
                        <td><?= $trans['denda']; ?></td>
                        <td><?= $trans['status']; ?></td>
                        <td>
                            <?php if ($trans['status'] === 'dipinjam'): ?>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pengembalianModal<?= $trans['id']; ?>">Proses Pengembalian</button>
                            <?php else: ?>
                                <span class="text-muted">Sudah Dikembalikan</span>
                            <?php endif; ?>
                        </td>
                    </tr>

                    <!-- Modal Pengembalian -->
                    <?php if ($trans['status'] === 'dipinjam'): ?>
                        <div class="modal fade" id="pengembalianModal<?= $trans['id']; ?>" tabindex="-1" aria-labelledby="pengembalianModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pengembalianModalLabel">Proses Pengembalian Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('/admin/transaksi/pengembalian/update/' . $trans['id']); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="telat" class="form-label">Hari Telat</label>
                                                <input type="number" name="telat" id="telat" class="form-control" placeholder="Masukkan jumlah hari telat (jika ada)">
                                            </div>
                                            <div class="mb-3">
                                                <label for="denda" class="form-label">Denda (Rp)</label>
                                                <input type="number" name="denda" id="denda" class="form-control" placeholder="Masukkan jumlah denda (jika ada)">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data transaksi untuk pengembalian.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->include('Admin/template/footer'); ?>
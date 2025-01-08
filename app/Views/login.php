<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kode Akses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
    }

    .card {
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>

<body>
  <div class="card shadow">
    <div class="card-body">
      <h5 class="card-title text-center mb-4">Masukkan Kode Akses</h5>
      <!-- Form Kode Akses -->
      <form action="<?= base_url('validateAccessCode'); ?>" method="post">
        <div class="mb-3">
          <label for="access_code" class="form-label">Kode Akses</label>
          <input type="password" name="access_code" class="form-control" id="access_code" placeholder="Masukkan Kode Akses" required>
        </div>
        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
      </form>
    </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan ADP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #fff;
            color: #000;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header img {
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            height: 100px;
            width: 100px;
        }

        .header .text {
            text-align: left;
        }

        .header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .header p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="<?= base_url(); ?>/logo.png" alt="Logo">
        <div class="text">
            <h1>Perpustakaan ADP</h1>
            <p>Alamat: Jl. Lintas Timur No. 1, BSD City</p>
        </div>
    </div>
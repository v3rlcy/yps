<?php
require '../../function.php';
$dok = query("SELECT * FROM dokter");

if(isset($_POST["cari"])){
    $dok = caridokter($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <h1 class = "text-center">LIST DOKTER</h1>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <div>
    <form action="" method="post">
        <input type="text" name="keyword" size = 40 placeholder = "Search..." autocomplete = "off" class="outline-dark">
        <button type="submit" name="cari" class="btn btn-primary">Search</button>
    </form>
    </div>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="tambah_dokter.php">TAMBAHKAN DATA</a>
        </button>
    </div>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="../../../index.php">KEMBALI</a>
        </button>
    </div>

</div>

<table border=1 cellpadding=20 cellspacing=0 class="table table-bordered">
    <tr class="table-primary">
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
        <th>Alamat</th>
        <th>Nomot Telepon</th>
    </tr>

    <?php $i = 1;
    foreach ($dok as $row) : ?>
    <tr>
    <td><?= $row['id_dokter']; ?></td>
    <td>
        <button class="btn btn-outline-danger">
        <a href="hapus_dokter.php?id_dokter=<?= $row['id_dokter'] ?>">HAPUS</a>
        </button>
        <button class="btn btn-outline-info">
        <a href="ubah_dokter.php?id_dokter=<?= $row['id_dokter'] ?>">UBAH</a>
        </button>
    </td>
    <td><?= $row['nama_dokter']; ?></td>
    <td><?= $row['spesialis']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['no_telpon']; ?></td>
    <?php endforeach; ?>
    </tr>
</table>

</body>
</html>
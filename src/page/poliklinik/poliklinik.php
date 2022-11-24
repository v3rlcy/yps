<?php
require '../../function.php';
$poli = query("SELECT * FROM poliklinik");

if(isset($_POST["cari"])){
    $poli = caripoli($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <h1 class = "text-center">LIST POLI</h1>

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
        <a href="tambah_poli.php">TAMBAHKAN DATA</a>
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
        <th>ID</th>
        <th>Nama Poli</th>
        <th>Gedung</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($poli as $row) : ?>
    <tr>
    <td><?= $row['id_poli']; ?></td>
    <td><?= $row['nama_poli']; ?></td>
    <td><?= $row['gedung']; ?></td>
    <td>
        <button class="btn btn-outline-danger">
        <a href="hapus_poli.php?id_poli=<?= $row['id_poli'] ?>">HAPUS</a>
        </button>
        <button class="btn btn-outline-info">
        <a href="ubah_poli.php?id_poli=<?= $row['id_poli'] ?>">UBAH</a>
        </button>
    </td>
    <?php endforeach; ?>
    </tr>
</table>


</body>
</html>
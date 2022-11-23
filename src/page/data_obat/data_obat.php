<?php
require '../../function.php';
$obat = query("SELECT * FROM tb_obat");

if(isset($_POST["cari"])){
    $obat = cariobat($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <h1 class = "text-center">LIST OBAT</h1>

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
        <a href="tambah_obat.php">TAMBAHKAN DATA</a>
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
        <th>Nama Obat</th>
        <th>Keterangan Obat</th>
    </tr>

    <?php $i = 1;
    foreach ($obat as $row) : ?>
    <tr>
    <td><?= $row['id_obat']; ?></td>
    <td>
        <button class="btn btn-outline-danger">
        <a href="hapus_obat.php?id_obat=<?= $row['id_obat'] ?>">HAPUS</a>
        </button>
        <button class="btn btn-outline-info">
        <a href="ubah_obat.php?id_obat=<?= $row['id_obat'] ?>">UBAH</a>
        </button>
    </td>
    <td><?= $row['nama_obat']; ?></td>
    <td><?= $row['ket_obat']; ?></td>
    <?php endforeach; ?>
    </tr>
</table>


</body>
</html>
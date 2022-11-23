<?php
require '../../function.php';
$pas = query("SELECT * FROM pasien");

if(isset($_POST["cari"])){
    $pas = caripasien($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <h1 class = "text-center">LIST PASIEN</h1>

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

    <label> Jenis Kelamin : </label>
    <input type="radio" id="L" name="jenis_kelamin" value="L">
    <label for="L">Laki-Laki</label>
    <input type="radio" id="P" name="jenis_kelamin" value="P">
    <label for="P">Perempuan</label></li>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="tambah_pasien.php">TAMBAHKAN DATA</a>
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
        <th>No. Pasien</th>
        <th>Nama Pasien</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($pas as $row) : ?>
    <tr>
    <td><?= $row['id_pasien']; ?></td>
    <td><?= $row['nomor_identitas']; ?></td>
    <td><?= $row['nama_pasien']; ?></td>
    <td><?= $row['jenis_kelamin']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['no_telpon']; ?></td>
    <td>
        <button class="btn btn-outline-danger">
        <a href="hapus_pasien.php?id_pasien=<?= $row['id_pasien'] ?>">HAPUS</a>
        </button>
        <button class="btn btn-outline-info">
        <a href="ubah_pasien.php?id_pasien=<?= $row['id_pasien'] ?>">UBAH</a>
        </button>
    </td>
    <?php endforeach; ?>
    </tr>
</table>

</body>
</html>
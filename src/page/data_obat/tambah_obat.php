<?php
require '../../function.php';

if(isset($_POST["submit"])){
    if(tambahobat($_POST) > 0 ){
        echo "<script>
                alert ('data obat berhasil ditambahkan');
                document.location.href = 'data_obat.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data obat tidak berhasil ditambahkan');
                document.location.href = 'data_obat.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1 style="text-align:center;">Tambah Data Obat</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container pt-3 mt-5">
    <form action="" method="POST">
    <div class="form-outline mb-4">
        <label class="form-label" for="id_obat">ID Obat :</label>
        <input class="form-control" type="text" name="id_obat" id="id_obat" required>
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="nama_obat">Nama Obat :</label>
        <input class="form-control" type="text" name="nama_obat" id="nama_obat" required>
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="ket_obat">Keterangan Obat :</label>
        <input class="form-control" type="text" name="ket_obat" id="ket_obat" required>
    </div>
    <div class="mb-4">
      <button type="submit" class="btn btn-primary btnm-block w-100 mt-3" name="submit">Tambah Data Obat</button>
    </div>
    </form>

    <div class ="text-end">
            <button class="btn btn-outline-info mt-2">
            <a href="../../page/data_obat/data_obat.php">KEMBALI</a>
            </button>
    </div>
</div>
</body>
</html>

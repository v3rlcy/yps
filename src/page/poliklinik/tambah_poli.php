<?php
require '../../function.php';

if(isset($_POST["submit"])){
    if(tambahpoli($_POST) > 0 ){
        echo "<script>
                alert ('data poliklinik berhasil ditambahkan');
                document.location.href = 'poliklinik.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data poliklinik tidak berhasil ditambahkan');
                document.location.href = 'poliklinik.php';
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
    <title>Tambah data Poliklinik</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container mt-5">
        <h1>Tambah Data Poliklinik</h1
        <form action="" method="POST">
        
        <div class="form-group">
            <label for="id_poli">ID Poliklinik :</label>
            <input type="text" name="id_poli" id="id_poli" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama_poli">Nama Poliklinik :</label>
            <input type="text" name="nama_poli" id="nama_poli" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gedung">Gedung :</label>
            <input type="text" name="gedung" id="gedung" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-warning w-100 mt-3">Tambah Data Poliklinik</button>
    </form>
    
    <div class ="text-end">
            <button class="btn btn-outline-info mt-2">
            <a href="../../page/poliklinik/poliklinik.php">KEMBALI</a>
            </button>
    </div>

</body>
</html>
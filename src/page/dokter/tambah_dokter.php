<?php
require '../../function.php';

if(isset($_POST["submit"])){
    if(tambahdokter($_POST) > 0 ){
        echo "<script>
                alert ('data dokter berhasil ditambahkan');
                document.location.href = 'dokter.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data dokter tidak berhasil ditambahkan');
                document.location.href = 'dokter.php';
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
    <title>Tambah data Obat</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container mt-5">
        <h1>Tambah Data Obat</h1
        
        <form action="" method="POST">
       
        <div class="form-group">
            <label for="id_dokter">ID Dokter :</label>
            <input type="text" name="id_dokter" id="id_dokter" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="nama_dokter">Nama Dokter :</label>
            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="spesialis">Spesialis :</label>
            <input type="text" name="spesialis" id="spesialis" class="form-control" required>
        </div>

        <div clsass="form-group">
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_telpon">No. Telepon :</label>
            <input type="text" name="no_telpon" id="no_telpon" class="form-control" required>
        </div>
        
            <button class="btn btn-primary mt-3" type="submit" name="submit">Tambah Data Obat</button>
        </form>
    </div>
</body>
</html>
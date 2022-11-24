<?php
require '../../function.php';

if(isset($_POST["submit"])){
    if(tambahpasien($_POST) > 0 ){
        echo "<script>
                alert ('data pasien berhasil ditambahkan');
                document.location.href = 'pasien.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data pasien tidak berhasil ditambahkan');
                document.location.href = 'pasien.php';
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
    <title>Tambah data Pasien</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container mt-5">
        <h1>Tambah Data Pasien</h1
        <form action="" method="POST">
        
        <div class="form-group">
            <label for="id_pasien">ID Pasien :</label>
            <input type="text" name="id_pasien" id="id_pasien" required class="form-control">
        </div>

        <div class="form-group">
            <label for="nomor_identitas">Nomor Identitas :</label>
            <input type="text" name="nomor_identitas" id="nomor_identitas" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="nama_pasien">Nama Pasien :</label>
            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required></li>
            

        <div class="form-group">
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_telpon">No. Telepon :</label>
            <input type="text" name="no_telpon" id="no_telpon" class="form-control" required>
        </div>

        <div class="form-group mt-3 mb-3">
            <label for="jenis_kelamin">Jenis Kelamin :</label>
            <input type="radio" id="L" name="jenis_kelamin" value="L">
            <label for="L">Laki-Laki</label>
            <input type="radio" id="L" name="jenis_kelamin" value="P">
            <label for="P">Perempuan</label></li>
        </div>

        <button type="submit" name="submit" class="btn btn-info w-100 mt-3">Tambah Data Pasien</button>
    </form>
    <div class ="text-end">
            <button class="btn btn-outline-info mt-2">
            <a href="../../page/pasien/pasien.php">KEMBALI</a>
            </button>
    </div>

</body>
</html>
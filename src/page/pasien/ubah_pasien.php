<?php
require '../../function.php';

$id_pasien = $_GET['id_pasien'];

$data = query("SELECT * FROM pasien WHERE id_pasien = '$id_pasien'")[0];

if(isset($_POST['submit'])){
    if(ubahPasien($_POST) > 0 ){
        echo "<script>
                alert ('data berhasil diubah');
                document.location.href = 'pasien.php';
                </script>";
    } else{
        echo "<script>
                alert ('data tidak berhasil diubah');
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
    <title>Ubah data Pasien</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container mt-5">
<h1>Ubah data pasien</h1>
<form action="" method="post">
    <input type="hidden" name="id_pasien" id="id_pasien" value = "<?= $data['id_pasien'] ?>">
    
    <div class="form-group">
        <label for="id_pasien">ID Pasien :</label>
        <input type="text" name="id_pasien" id="id_pasien" value = "<?= $data['id_pasien']?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="nomor_identitas">Nomor Pasien :</label>
        <input type="text" name="nomor_identitas" id="nomor_identitas" value = "<?= $data['nomor_identitas']?>"class="form-control">
    </div>

    <div class="form-group">
        <label for="nama_pasien">Nama Pasien :</label>
        <input type="text" name="nama_pasien" id="nama_pasien" value = "<?= $data['nama_pasien']?>"class="form-control">
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin :</label>
        <input type="text" name="jenis_kelamin" id="jenis_kelamin" value = "<?= $data['jenis_kelamin']?>"class="form-control">
    </div>

    <div class="form-group">
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" value = "<?= $data['alamat']?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="no_telpon">No. Telpon :</label>
        <input type="text" name="no_telpon" id="no_telpon" value = "<?= $data['no_telpon']?>" class="form-control">
    </div>

    <button type="submit" name="submit" class="btn btn-warning w-100 mt-2">Ubah Data Pasien</button>

</form>
</body>
</html>
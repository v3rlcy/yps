<?php
require '../../function.php';

$id_dokter = $_GET['id_dokter'];

$data = query("SELECT * FROM dokter WHERE id_dokter = '$id_dokter'")[0];

if(isset($_POST['submit'])){
    if(ubahDokter($_POST) > 0 ){
        echo "<script>
                alert ('data berhasil diubah');
                document.location.href = 'dokter.php';
                </script>";
    } else{
        echo "<script>
                alert ('data tidak berhasil diubah');
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
    <title>ubah data dokter</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container mt-5">
    <h1>Ubah data dokter</h1>
<form action="" method="post">
    
        <input type="hidden" name="id_dokter" id="id_dokter" value = "<?= $data['id_dokter'] ?>">
    
    
    <div class="form-group">
        <label for="id_dokter">ID Dokter :</label>
        <input type="text" name="id_dokter" id="id_dokter" value = "<?= $data['id_dokter']?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="nama_dokter">Nama Dokter :</label>
        <input type="text" name="nama_dokter" id="nama_dokter" value = "<?= $data['nama_dokter']?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="spesialis">Spesialis :</label>
        <input type="text" name="spesialis" id="spesialis" value = "<?= $data['spesialis']?>"class="form-control">
    </div>

    <div class="form-group">
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" value = "<?= $data['alamat']?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="no_telpon">No. Telpon :</label>
        <input type="text" name="no_telpon" id="no_telpon" value = "<?= $data['no_telpon']?>"class="form-control">
    </div>

    <button type="submit" name="submit" class="btn btn-primary w-100 mt-2">Ubah Data Dokter</button>

</form>
</body>
</html>
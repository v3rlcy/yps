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
    <title>Document</title>
    <h1>Tambah Data Obat</h1>
</head>
<body>

    <form action="" method="POST">
        <li><label for="id_dokter">ID Dokter :</label>
        <input type="text" name="id_dokter" id="id_dokter" required></li>

        <li><label for="nama_dokter">Nama Dokter :</label>
        <input type="text" name="nama_dokter" id="nama_dokter" required></li>

        <li><label for="spesialis">Spesialis :</label>
        <input type="text" name="spesialis" id="spesialis" required></li>

        <li><label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" required></li>

        <li><label for="no_telpon">No. Telepon :</label>
        <input type="text" name="no_telpon" id="no_telpon" required></li>

        <button type="submit" name="submit">Tambah Data Obat</button>
    </form>
    <div class ="text-end">
            <button class="btn btn-outline-info">
            <a href="../../page/dokter/dokter.php">KEMBALI</a>
            </button>
    </div>
</body>
</html>
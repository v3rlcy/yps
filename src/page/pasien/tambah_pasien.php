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
    <title>Document</title>
    <h1>Tambah Data Obat</h1>
</head>
<body>

    <form action="" method="POST">
        <li><label for="id_pasien">ID Pasien :</label>
        <input type="text" name="id_pasien" id="id_pasien" required></li>

        <li><label for="nomor_identitas">Nomor Identitas :</label>
        <input type="text" name="nomor_identitas" id="nomor_identitas" required></li>

        <li><label for="nama_pasien">Nama Pasien :</label>
        <input type="text" name="nama_pasien" id="nama_pasien" required></li>

        <li><label for="jenis_kelamin">Jenis Kelamin :</label>
        <input type="radio" id="L" name="jenis_kelamin" value="L">
        <label for="L">Laki-Laki</label>
        <input type="radio" id="L" name="jenis_kelamin" value="P">
        <label for="P">Perempuan</label></li>

        <li><label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" required></li>

        <li><label for="no_telpon">No. Telepon :</label>
        <input type="text" name="no_telpon" id="no_telpon" required></li>

        <button type="submit" name="submit">Tambah Data Obat</button>
    </form>
    
</body>
</html>
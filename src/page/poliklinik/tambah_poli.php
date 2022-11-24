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
    <title>Document</title>
    <h1>Tambah Data Poliklinik</h1>
</head>
<body>

    <form action="" method="POST">
        <li><label for="id_poli">ID Poliklinik :</label>
        <input type="text" name="id_poli" id="id_poli" required></li>

        <li><label for="nama_poli">Nama Poliklinik :</label>
        <input type="text" name="nama_poli" id="nama_poli" required></li>

        <li><label for="gedung">Gedung :</label>
        <input type="text" name="gedung" id="gedung" required></li>

        <button type="submit" name="submit">Tambah Data Poliklinik</button>
    </form>
    
</body>
</html>
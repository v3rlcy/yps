<?php
require '../../function.php';

$id_poli = $_GET['id_poli'];

$data = query("SELECT * FROM poliklinik WHERE id_poli = $id_poli")[0];

if(isset($_POST['submit'])){
    if(ubahpoli($_POST) > 0 ){
        echo "<script>
                alert ('data berhasil diubah');
                document.location.href = 'poliklinik.php';
                </script>";
    } else{
        echo "<script>
                alert ('data tidak berhasil diubah');
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
</head>
<body>

<form action="" method="post">
    <input type="hidden" name="id_poli" id="id_poli" value = "<?= $data['id_poli'] ?>">
    
    <li><label for="id_poli">ID Poliklinik :</label>
    <input type="text" name="id_poli" id="id_poli" value = "<?= $data['id_poli']?>"></li>

    <li><label for="nama_poli">Nama Poliklinik :</label>
    <input type="text" name="nama_poli" id="nama_poli" value = "<?= $data['nama_poli']?>"></li>

    <li><label for="gedung">Gedung :</label>
    <input type="text" name="gedung" id="gedung" value = "<?= $data['gedung']?>"></li>

    <button type="submit" name="submit">Ubah Data Poliklinik</button>

</form>
</body>
</html>
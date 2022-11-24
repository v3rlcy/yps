<?php
require '../../function.php';

if(isset($_POST["submit"])){
    if(tambahrm($_POST) > 0 ){
        echo "<script>
                alert ('data poliklinik berhasil ditambahkan');
                document.location.href = 'rekam_medis.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data poliklinik tidak berhasil ditambahkan');
                document.location.href = 'rekam_medis.php';
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
    <h1>Tambah Data Rekam_Medis</h1>
</head>
<body>
    
</body>
</html>
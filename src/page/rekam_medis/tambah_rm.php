<?php
require '../../function.php';

$tbrm = query('SELECT id_rm FROM rekam_medis'); 
$tb_obat = query('SELECT nama_obat FROM tb_obat');
$pasien = query('SELECT nama_pasien FROM pasien');
$dokter = query('SELECT nama_dokter FROM dokter');

if(isset($_POST["submit"])){
    if(tambahrm($_POST) > 0 ){
        echo "<script>
                alert ('data berhasil ditambahkan');
                document.location.href = 'rekam_medis.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data tidak berhasil ditambahkan');
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
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <div class="container mt-5">
    <h1 class="text-center">Tambah Data Rekam Medis Obat</h1>
        <form action="" method="POST">
            <div class="form-group">
            <label>Pilih Nama Pasien!</label>
                <select name="nama_pasien" id="nama_pasien" required>
                <option selected value=""></option>
            </div>
        <?php
        $pasien = mysqli_query($conn, "SELECT * FROM pasien") or die (mysqli_error($conn));
            while($data_pasien = mysqli_fetch_array($pasien)){
                echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
            }
        ?>
        </select>
        </div>

        <label for="keluhan" class="mt-2">Keluhan</label>
        <input type="text" name="keluhan" id="keluhan" required class="form-control">


        <div class="mt-2">
        <label>Pilih Nama Dokter!</label>
        <select name="nama_dokter" id="nama_dokter" required>
        <option selected value=""></option>
        <?php
        $dokter = mysqli_query($conn, "SELECT * FROM dokter") or die (mysqli_error($conn));
            while($data_dokter = mysqli_fetch_array($dokter)){
                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
            }
        ?>
        </select>
        </div>

        <label for="diagnosa" class="mt-2">Diagnosa</label>
        <input type="text" name="diagnosa" id="diagnosa" required class="form-control">

        <div class="mt-2">
        <label>Pilih Poliklinik!</label>
        <select name="nama_poli" id="nama_poli" required>
        <option selected value=""></option>
        <?php
        $poli = mysqli_query($conn, "SELECT * FROM poliklinik") or die (mysqli_error($conn));
            while($data_poli = mysqli_fetch_array($poli)){
                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
            }
        ?>
        </select>
        </div>

        <div class="mt-2">
        <label>Pilih Obat!</label>
        <select name="nama_obat" id="nama_obat" required>
        <option selected value=""></option>
        <?php
        $obat = mysqli_query($conn, "SELECT * FROM tb_obat") or die (mysqli_error($conn));
            while($data_obat = mysqli_fetch_array($obat)){
                echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
            }
        ?>
        </select>
        </div>

        <button type="submit" name="submit" class="btn btn-warning mt-3 w-100">Tambah Data</button>
        </form> 
        </div>
</body>
</html>
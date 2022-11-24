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
    <form action="" method="POST">
    <div>
    <select name="nama_pasien" id="nama_pasien" required>
    <option selected value=""></option>
    <?php
    $pasien = mysqli_query($conn, "SELECT * FROM pasien") or die (mysqli_error($conn));
        while($data_pasien = mysqli_fetch_array($pasien)){
            echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
        }
    ?>
    </select>
    <label>Pilih Nama Pasien!</label>
    </div>

    <input type="text" name="keluhan" id="keluhan" required>
    <label for="keluhan">Keluhan</label>


    <div>
    <select name="nama_dokter" id="nama_dokter" required>
    <option selected value=""></option>
    <?php
    $dokter = mysqli_query($conn, "SELECT * FROM dokter") or die (mysqli_error($conn));
        while($data_dokter = mysqli_fetch_array($dokter)){
            echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
        }
    ?>
    </select>
    <label>Pilih Nama Dokter!</label>
    </div>

    <input type="text" name="diagnosa" id="diagnosa" required>
    <label for="diagnosa">Diagnosa</label>

    <div>
    <select name="nama_poli" id="nama_poli" required>
    <option selected value=""></option>
    <?php
    $poli = mysqli_query($conn, "SELECT * FROM poliklinik") or die (mysqli_error($conn));
        while($data_poli = mysqli_fetch_array($poli)){
            echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
        }
    ?>
    </select>
    <label>Pilih Poliklinik!</label>
    </div>

    <div>
    <select name="nama_obat" id="nama_obat" required>
    <option selected value=""></option>
    <?php
    $obat = mysqli_query($conn, "SELECT * FROM tb_obat") or die (mysqli_error($conn));
        while($data_obat = mysqli_fetch_array($obat)){
            echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
        }
    ?>
    </select>
    <label>Pilih Obat!</label>
    </div>

    <button type="submit" name="submit">Tambah Data</button>
    </form> 
    
</body>
</html>
<?php
require '../../function.php';

$id_pasien = $_GET["id_pasien"];
if(hapusPasien($id_pasien) > 0 ){
    echo "<script>
                alert ('data pasien berhasil dihapus');
                document.location.href = 'pasien.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data pasien tidak berhasil dihapus');
                document.location.href = 'pasien.php';
                </script>";
    }
?>
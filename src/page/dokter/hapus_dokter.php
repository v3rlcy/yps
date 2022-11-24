<?php
require '../../function.php';

$id_dokter = $_GET["id_dokter"];
if(hapusDokter($id_dokter) > 0 ){
    echo "<script>
                alert ('data dokter berhasil dihapus');
                document.location.href = 'dokter.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data dokter tidak berhasil dihapus');
                document.location.href = 'dokter.php';
                </script>";
    }
?>
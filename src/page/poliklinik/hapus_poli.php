<?php
require '../../function.php';

$id_poli = $_GET["id_poli"];
if(hapuspoli($id_poli) > 0 ){
    echo "<script>
                alert ('data poli berhasil dihapus');
                document.location.href = 'poliklinik.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data poli tidak berhasil dihapus');
                document.location.href = 'poliklinik.php';
                </script>";
    }
?>
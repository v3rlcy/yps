<?php
require '../../function.php';

$id_rm = $_GET["id_rm"];
if(hapusrm($id_rm) > 0 ){
    echo "<script>
                alert ('data poli berhasil dihapus');
                document.location.href = 'rekam_medis.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data poli tidak berhasil dihapus');
                document.location.href = 'rekam_medis.php';
                </script>";
    }
?>
<?php
require 'function.php';

$id_obat = $_GET["id_obat"];
if(hapusobat($id_obat) > 0 ){
    echo "<script>
                alert ('data obat berhasil dihapus');
                document.location.href = 'dataobat.php';
                </script>";
    }
    else {
        echo "<script>
                alert ('data obat tidak berhasil dihapus');
                document.location.href = 'dataobat.php';
                </script>";
    }
?>
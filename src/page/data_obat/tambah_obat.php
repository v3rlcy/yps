<?php
require './function.php';

if (isset($_POST["submit"])) {
  if (tambahObat($_POST) > 0) {
    echo "<script>
                alert ('data obat berhasil ditambahkan');
                document.location.href = 'dataobat.php';
                </script>";
  } else {
    echo "<script>
                alert ('data obat tidak berhasil ditambahkan');
                document.location.href = 'dataobat.php';
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
  <h1>Tambah Data Obat</h1>
</head>

<body>

  <form action="" method="POST">
    <li><label for="id_obat">ID Obat :</label>
      <input type="text" name="id_obat" id="id_obat" required>
    </li>

    <li><label for="nama_obat">Nama Obat :</label>
      <input type="text" name="nama_obat" id="nama_obat" required>
    </li>

    <li><label for="ket_obat">Keterangan Obat :</label>
      <input type="text" name="ket_obat" id="ket_obat" required>
    </li>

    <button type="submit" name="submit">Tambah Data Obat</button>
  </form>

</body>

</html>
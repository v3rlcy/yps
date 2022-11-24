<?php
require './function.php';

$id_obat = $_GET['id_obat'];

$data = query("SELECT * FROM tb_obat WHERE id_obat = $id_obat")[0];

if (isset($_POST['submit'])) {
  if (ubahObat($_POST) > 0) {
    echo "<script>
                alert ('data berhasil diubah');
                document.location.href = 'dataobat.php';
                </script>";
  } else {
    echo "<script>
                alert ('data tidak berhasil diubah');
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
</head>

<body>

  <form action="" method="post">
    <input type="hidden" name="id_obat" id="id_obat" value="<?= $data['id_obat'] ?>">

    <li><label for="id_obat">ID obat :</label>
      <input type="text" name="id_obat" id="id_obat" value="<?= $data['id_obat'] ?>">
    </li>

    <li><label for="nama_obat">Nama Obat :</label>
      <input type="text" name="nama_obat" id="nama_obat" value="<?= $data['nama_obat'] ?>">
    </li>

    <li><label for="ket_obat">Keterangan Obat :</label>
      <input type="text" name="ket_obat" id="ket_obat" value="<?= $data['ket_obat'] ?>">
    </li>

    <button type="submit" name="submit">Ubah Data Obat</button>

  </form>
</body>

</html>
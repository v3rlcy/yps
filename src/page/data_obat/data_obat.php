<?php
require '..\..\function.php';
$obat = query("SELECT * FROM tb_obat");

if (isset($_POST["cari"])) {
  $obat = cariObat($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style> 
body{
  background-color: #d9d9d9;
}

.wrapper {
  display: flex;
  width: 100%;
  align-items: stretch;
}

</style>

<body>

<div class="wrapper">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light" style="height: 1080px; width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4 text-dark fw-bold">YPS Hospital</span>
      </a>
      <hr>
      

      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
        <li>
          <a href="..\index.php" class="nav-link text-dark">Dashboard</a>
        </li>
        <li>
          <a href="dataObat/dataobat.php" class="nav-link text-dark">Data Dokter
          </a>
        </li>

        <li>
          <a href="dataObat/dataobat.php" class="nav-link text-dark">Data Pasien
          </a>
        </li>
        
        <li>
          <a href="dataObat/dataobat.php" class="nav-link text-dark">Poli Klinik
          </a>
        </li>

        <li>
          <a href="dataObat/dataobat.php" class="nav-link text-dark">Rekam Medis
          </a>
        </li>

        <li>
          <a href="dataObat/dataobat.php" class="nav-link active text-light aria-current="page"">Data Obat
          </a>
        </li>  

        <li>
          <a href="dataObat/dataobat.php" class="nav-link text-dark">Rm obat ni tulis ape cok
          </a>
        </li>  

      </ul>
      <hr>
    </div>

  <div class="container">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">YPS Hospital</h1>
        <p class="fs-5 text-muted">Data Obat</p>
    </div>

      <div class="form-group">
          <form action="" method="post" >
              <div class="row">
                  <div class="input-group mb-2">
                      <input type="text" name="keyword" class="form-control" autofocus placeholder="Masukkan keyword pencaharian" autocomplete="off" id="keyword">
                      <button class="btn btn-info" type="submit" name="cari" id="tombol-cari">Cari!</button>
                  </div>
          </form>
      </div>
      <a class="btn btn-primary" href="tambah.php">Tambah data siswa</a>

  
      <table class="table table-bordered border-primary text-center mt-2">
          <tr class="table-success">
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama Obat</th>
            <th>Keterangan Obat</th>
          </tr>

        <?php $i = 1;
        foreach ($obat as $row) : ?>
          <tr>
            <td><?= $row['id_obat']; ?></td>
            <td>
                <a class="btn btn-danger" href="hapusobat.php?id_obat=<?= $row['id_obat'] ?>">HAPUS</a>
                <a class="btn btn-info" href="ubahobat.php?id_obat=<?= $row['id_obat'] ?>">UBAH</a>
            </td>
            <td><?= $row['nama_obat']; ?></td>
            <td><?= $row['ket_obat']; ?></td>
          <?php endforeach; ?>
          </tr>
        </table>
  </div> 
</div>
</body>

</html>
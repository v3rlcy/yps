<?php
require '../../function.php';
$poli = query("SELECT * FROM poliklinik");

if(isset($_POST["cari"])){
    $poli = caripoli($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Poliklinik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }
</style>
<body>

<div class="wrapper">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-light" id="sidebar" style="height: 1080px; width: 280px;">
      <a href="..\..\..\" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4 text-dark fw-bold">YPS Hospital</span>
      </a>
      <hr>
      
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
        <li>
          <a href="..\..\..\" class="nav-link text-dark">Dashboard</a>
        </li>

        <li>
          <a href="../../page/dokter/dokter.php" class="nav-link text-dark">Data Dokter
          </a>
        </li>

        <li>
          <a href="../../page/pasien/pasien.php" class="nav-link text-dark">Data Pasien
          </a>
        </li>
        
        <li>
          <a href="../../page/poliklinik/poliklinik.php" class="nav-link active text-light aria-current="page">Poli Klinik
          </a>
        </li>

        <li>
          <a href="../../page/rekam_medis/rekam_medis.php" class="nav-link text-dark">Rekam Medis
          </a>
        </li>

        <li>
          <a href="../../page/data_obat/data_obat.php" class="nav-link text-dark">Data Obat
          </a>
        </li>  
      </ul>
      <hr>
    </div>

    <div class="container">
    <h1 class="text-center m-5">List Poliklinik</h1>
    <div class="form-group mt-3">
          <form action="" method="post" >
              <div class="row">
                  <div class="input-group mb-2">
                      <input type="text" name="keyword" class="form-control" autofocus placeholder="Masukkan keyword pencaharian" autocomplete="off" id="keyword">
                      <button class="btn btn-info" type="submit" name="cari" id="tombol-cari">Cari!</button>
                  </div>
          </form>
      </div>
      <a class="btn btn-primary" href="tambah_poli.php">Tambah list poliklinik</a>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="../../../index.php">KEMBALI</a>
        </button>
    </div>


    <table class="table table-bordered border-warning text-center mt-2">
        <tr class="table-warning">
            <th>ID</th>
            <th>Nama Poli</th>
            <th>Gedung</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1;
        foreach ($poli as $row) : ?>
        <tr>
        <td><?= $row['id_poli']; ?></td>
        <td><?= $row['nama_poli']; ?></td>
        <td><?= $row['gedung']; ?></td>
        <td>
            <button class="btn btn-outline-danger">
            <a href="hapus_poli.php?id_poli=<?= $row['id_poli'] ?>">HAPUS</a>
            </button>
            <button class="btn btn-outline-info">
            <a href="ubah_poli.php?id_poli=<?= $row['id_poli'] ?>">UBAH</a>
            </button>
        </td>
        <?php endforeach; ?>
        </tr>
    </table>
    </div>
</div>
</body>
</html>
<<<<<<< HEAD
=======
<?php
require '../../function.php';
$rekam_medis = query("SELECT * FROM rekam_medis
    INNER JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien
    INNER JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter
    INNER JOIN poliklinik ON rekam_medis.id_poli = poliklinik.id_poli");

if(isset($_POST["cari"])){
    $rm = carirm($_POST["keyword"]);
}
?>

>>>>>>> c8efd4777cd805ea713d5573679289b984b629ed
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Data Dokter</title>

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
          <a href="../../page/poliklinik/poliklinik.php" class="nav-link text-dark">Poli Klinik
          </a>
        </li>

        <li>
          <a href="../../page/rekam_medis/rekam_medis.php" class="nav-link active text-light aria-current="page">Rekam Medis
          </a>
        </li>

        <li>
          <a href="../../page/data_obat/data_obat.php" class="nav-link text-dark">Data Obat
          </a>
        </li>  
      </ul>
      <hr>
    </div>
=======
    <title>Document</title>


    <h1 class = "text-center">LIST POLI</h1>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <div>
    <form action="" method="post">
        <input type="text" name="keyword" size = 40 placeholder = "Search..." autocomplete = "off" class="outline-dark">
        <button type="submit" name="cari" class="btn btn-primary">Search</button>
    </form>
    </div>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="tambah_rm.php">TAMBAHKAN DATA</a>
        </button>
    </div>

    <div class ="text-end">
        <button class="btn btn-outline-info">
        <a href="../../../index.php">KEMBALI</a>
        </button>
    </div>

</div>

<table border=1 cellpadding=20 cellspacing=0 class="table table-bordered">
    <tr class="table-primary">
        <th>No.</th>
        <th>Tanggal Periksa</th>
        <th>Nama Pasien</th>
        <th>Keluhan</th>
        <th>Nama Dokter</th>
        <th>Diagnosa</th>
        <th>Poliklinik</th>
        <th>Data Obat</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($rekam_medis as $row) : ?>
    <tr>
    <td><?= $i++; ?></td>
    <td><?= $row['tgl_periksa']; ?></td>
    <td><?= $row['nama_pasien']; ?></td>
    <td><?= $row['keluhan']; ?></td>
    <td><?= $row['nama_dokter']; ?></td>
    <td><?= $row['diagnosa']; ?></td>
    <td><?= $row['nama_poli']; ?></td>
    <td>
    <?php
    $obat = mysqli_query($conn, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$row[id_rm]'") or die (mysqli_error($conn));
    while($data_obat = mysqli_fetch_array($obat)){
    echo $data_obat['nama_obat']."<br>";
    }
    ?>
    </td>
    <td>
        <button class="btn btn-outline-danger">
        <a href="hapus_rm.php?id_rm=<?= $row['id_rm'] ?>">HAPUS</a>
        </button>
        <button class="btn btn-outline-info">
        <a href="ubah_rm.php?id_rm=<?= $row['id_rm'] ?>">UBAH</a>
        </button>
    </td>
    <?php endforeach; ?>
    </tr>
</table>


</body>
</html>
>>>>>>> c8efd4777cd805ea713d5573679289b984b629ed

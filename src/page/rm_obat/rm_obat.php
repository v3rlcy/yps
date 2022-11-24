<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a href="../../page/rekam_medis/rekam_medis.php" class="nav-link text-dark">Rekam Medis
          </a>
        </li>

        <li>
          <a href="../../page/data_obat/data_obat.php" class="nav-link text-dark">Data Obat
          </a>
        </li>  

        <li>
            <a href="../../page/rm_obat/rm_obat.php" class="nav-link active text-light aria-current="page">Rekam Medis Obat
          </a>
        </li>
      </ul>
      <hr>
    </div>
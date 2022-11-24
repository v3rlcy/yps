<?php
session_start();
require '../../function.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan!');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <h2 class="navbar-brand" href="#">YPS Hospital</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="../../../index.php">Home</a>
          <a class="nav-link" href="login.php">Login</a>
          <a class="nav-link" href="register.php">Register</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container pt-3 mt-5">
    <h1 style="text-align:center;">YPS Hospital</h1>
    <form action="" method="post">

      <div class="form-outline mb-4">
        <label class="form-label" for="nama">Nama</label>
        <input type="text" name="nama_user" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input type="password" name="password" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="password">Confirm Password</label>
        <input type="password" name="password2" class="form-control" />
      </div>

      <!-- Submit button -->
      <div class="mb-4">
        <button type="submit" class="btn btn-primary btn-block mb-4 w-100 " name="register">Sign in</button>
      </div>

      <p>Already have an account? <a href="login.php">Login </a></p>

    </form>
  </div>
</body>

</html>
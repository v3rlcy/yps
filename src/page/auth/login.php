<?php

session_start();
require '../../function.php';

if (isset($_COOKIE['login'])) {
  if ($_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
  }
}

if (isset($_POST['login'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $res = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

  if (mysqli_num_rows($res) === 1) {
    $row = mysqli_fetch_assoc($res);
    // var_dump($row); die;
    if (password_verify($password, $row["password"])) {

      $_SESSION["login"] = true;

      if (isset($_POST['remember'])) {
        setcookie('login', 'true', time() + 60);
      }

      header("Location: ../../../index.php");
      exit;
    }
  }

  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <h2 class="navbar-brand" href="#">YPS Hospital</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    <?php if (isset($error)) : ?>
      <p class="alert alert-danger">Username / Password Salah</p>
    <?php endif; ?>

    <form action="" method="post">
      <div class="form-outline mb-4">
        <label class="form-label" for="nama">Username</label>
        <input type="text" name="username" class="form-control" />
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="nama">Password</label>
        <input type="password" name="password" class="form-control" />
      </div>

      <!-- login button -->
      <div class="mb-4">
        <button type="submit" class="btn btn-success btn-block mb-4 w-100 " name="login">Log in</button>
      </div>

      <p>Don't have an account? <a href="register.php">Sign Up now! </a></p>
    </form>

</body>

</html>
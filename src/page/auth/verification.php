<?php
require '../../function.php';
session_start();

if (isset($_COOKIE['login'])) {
  if ($_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
  }
}

if (isset($_POST['verify'])) {
  $email = $_POST['email'];
  $verification = $_POST['verification'];

  $_SESSION["login"] = true;
  setcookie('login', 'true', time()  + 60);

  mysqli_query($conn, "UPDATE tb_user SET verified_at = NOW() WHERE email = '$email' AND verification_code = '$verification'");
  header("Location: ../../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <form action="" method="POST">
      <div class="form-group">
        <input type="hidden" name="email" value="<?= $_GET['email'] ?>" required>
        <input type="text" name="verification" id="verification" placeholder="Enter verification code" required class=form-control>
        <button type="submit" name="verify" class="btn btn-warning">Verify</button>
      </div>
    </form>
  </div>
</body>

</html>
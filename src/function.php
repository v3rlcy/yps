<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$conn = mysqli_connect("localhost", "root", "", "rumah_sakit");
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Data Obat
function tambahObat($data)
{
  global $conn;
  $id_obat = htmlspecialchars($data["id_obat"]);
  $nama_obat = htmlspecialchars($data["nama_obat"]);
  $ket_obat = htmlspecialchars($data["ket_obat"]);

  $query = "INSERT INTO tb_obat VALUES ('$id_obat','$nama_obat','$ket_obat')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function hapusObat($id_obat)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = $id_obat");
  return mysqli_affected_rows($conn);
}

function ubahObat($data)
{
  global $conn;
  $id_obat = $data["id_obat"];
  $id_obat = htmlspecialchars($data["id_obat"]);
  $nama_obat = htmlspecialchars($data["nama_obat"]);
  $ket_obat = htmlspecialchars($data["ket_obat"]);

  $query = "UPDATE tb_obat SET 
    id_obat = '$id_obat',
    nama_obat = '$nama_obat',
    ket_obat = '$ket_obat'
    WHERE id_obat = '$id_obat'
    ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cariObat($keyword)
{
  $query = "SELECT * FROM tb_obat WHERE 
    id_obat LIKE '%$keyword%' OR
    nama_obat LIKE '%$keyword%' OR
    ket_obat LIKE '%$keyword%'
    ";
  return query($query);
}

function registrasi($data)
{
  global $conn;

  $nama = strtolower(stripslashes($data["nama_user"]));
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'myoshu.me@gmail.com';
    $mail->Password = 'afarwubsicceswxk';
    $mail->SMPTSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom('myoshu.me@gmail.com', 'YPS Hospital');
    $mail->addAddress($email, $nama);
    $mail->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $mail->Subject = 'Email Verification';
    $mail->Body = "Hi $nama, <br><br> Your verification code is $verification_code";
    $mail->send();

    // cek Email
    $result = mysqli_query($conn, "SELECT email FROM tb_user WHERE 
    email = '$email'");

    if (mysqli_fetch_assoc($result)) {
      echo "<script>
            alert('Email sudah terdaftar!');
          </script>";
      return false;
    }

    // konfirmasi password
    if ($password !== $password2) {
      echo "<script>
            alert('Konfirmasi password tidak sesuai!');
          </script>";
      return false;
    }

    // enkripsi password
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO tb_user VALUES ('', '$nama', '$email', '$hashPass', 'user', '$verification_code', NULL)");
    header("Location: verification.php?email=" . $email);

    return mysqli_affected_rows($conn);
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

//send mail
/*function sendMail($data){
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'verlacya.001@ski.sch.id';
    $mail->Password = 'axrwlfbppmhgoaqz';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('verlacya.001@ski.sch.id');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject = "Registrasi";
    $mail->Body = "Success!";

    $mail->send();
    
    echo 
    "
    <script>
    alert('Sent! Check your Email')
    </script>;
    ";

};*/
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

// CRUD DOKTER
// tambah dokter
function tambahdokter($data)
{
  global $conn;
  $id_dokter = htmlspecialchars($data["id_dokter"]);
  $nama_dokter = htmlspecialchars($data["nama_dokter"]);
  $spesialis = htmlspecialchars($data["spesialis"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $no_telpon = htmlspecialchars($data["no_telpon"]);

  $query = "INSERT INTO dokter VALUES ('$id_dokter','$nama_dokter','$spesialis', '$alamat', '$no_telpon')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// hapus dokter
function hapusDokter($id_dokter)
{
  global $conn;
  $del = "DELETE FROM dokter WHERE id_dokter = '$id_dokter'";
  mysqli_query($conn, $del);
  return mysqli_affected_rows($conn);
}

// ubah dokter
function ubahDokter($data)
{
  global $conn;
  $id_dokter = $data["id_dokter"];
  $id_dokter = htmlspecialchars($data["id_dokter"]);
  $nama_dokter = htmlspecialchars($data["nama_dokter"]);
  $spesialis = htmlspecialchars($data["spesialis"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $no_telpon = htmlspecialchars($data["no_telpon"]);

  $query = "UPDATE dokter SET 
    id_dokter = '$id_dokter',
    nama_dokter = '$nama_dokter',
    spesialis = '$spesialis',
    alamat = '$alamat',
    no_telpon = '$no_telpon'
    WHERE id_dokter = '$id_dokter'
    ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// cari dokter
function caridokter($keyword)
{
  $query = "SELECT * FROM dokter WHERE 
    id_dokter LIKE '%$keyword%' OR
    nama_dokter LIKE '%$keyword%' OR
    spesialis LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_telpon LIKE '%$keyword%'
    ";
  return query($query);
}

// CRUD PASIEN
// tambah pasien
function tambahpasien($data)
{
  global $conn;
  $id_pasien = htmlspecialchars($data["id_pasien"]);
  $nomor_identitas = htmlspecialchars($data["nomor_identitas"]);
  $nama_pasien = htmlspecialchars($data["nama_pasien"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $no_telpon = htmlspecialchars($data["no_telpon"]);

  $query = "INSERT INTO pasien VALUES ('$id_pasien', '$nomor_identitas', '$nama_pasien','$jenis_kelamin', '$alamat', '$no_telpon')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// hapus pasien
function hapusPasien($id_pasien)
{
  global $conn;
  $del = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";
  mysqli_query($conn, $del);
  return mysqli_affected_rows($conn);
}

// ubah pasien
function ubahPasien($data)
{
  global $conn;
  $id_pasien = $data["id_pasien"];
  $id_pasien = htmlspecialchars($data["id_pasien"]);
  $nomor_identitas = htmlspecialchars($data["nomor_identitas"]);
  $nama_pasien = htmlspecialchars($data["nama_pasien"]);
  $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $no_telpon = htmlspecialchars($data["no_telpon"]);

  $query = "UPDATE pasien SET 
    id_pasien = '$id_pasien',
    nomor_identitas = '$nomor_identitas',
    nama_pasien = '$nama_pasien',
    jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat',
    no_telpon = '$no_telpon'
    WHERE id_pasien = '$id_pasien'
    ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// cari pasien
function caripasien($keyword)
{
  $query = "SELECT * FROM pasien WHERE 
    id_pasien LIKE '%$keyword%' OR
    nomor_identitas LIKE '%$keyword%' OR
    nama_pasien LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    no_telpon LIKE '%$keyword%'
    ";
  return query($query);
}

// CRUD POLIKLINIK
// tambah poliklinik
function tambahpoli($data)
{
  global $conn;
  $id_poli = htmlspecialchars($data["id_poli"]);
  $nama_poli = htmlspecialchars($data["nama_poli"]);
  $gedung = htmlspecialchars($data["gedung"]);

  $query = "INSERT INTO poliklinik VALUES ('$id_poli','$nama_poli','$gedung')";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// hapus poli
function hapuspoli($id_poli)
{
  global $conn;
  $del = "DELETE FROM poliklinik WHERE id_poli = '$id_poli'";
  mysqli_query($conn, $del);
  return mysqli_affected_rows($conn);
}

// ubah poli
function ubahpoli($data)
{
  global $conn;
  $id_poli = $data["id_poli"];
  $id_poli = htmlspecialchars($data["id_poli"]);
  $nama_poli = htmlspecialchars($data["nama_poli"]);
  $gedung = htmlspecialchars($data["gedung"]);

  $query = "UPDATE poliklinik SET 
    id_poli = '$id_poli',
    nama_poli = '$nama_poli',
    gedung = '$gedung'
    WHERE id_poli = '$id_poli'
    ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// cari poli
function caripoli($keyword)
{
  $query = "SELECT * FROM poliklinik WHERE 
    id_poli LIKE '%$keyword%' OR
    nama_poli LIKE '%$keyword%' OR
    gedung LIKE '%$keyword%'
    ";
  return query($query);
}

// CRUD REKAM MEDIS
// tambah_rm


// hapus_rm
function hapusrm($id_rm)
{
  global $conn;
  $del = "DELETE FROM rekam_medis WHERE id_rm = '$id_rm'";
  mysqli_query($conn, $del);
  return mysqli_affected_rows($conn);
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
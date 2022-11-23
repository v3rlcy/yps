<?php
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

  $username = strtolower(stripslashes($data["username"]));
  $nama = strtolower(stripslashes($data["nama_user"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);


  // cek username
  $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE 
    username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Username sudah terdaftar!');
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
  mysqli_query($conn, "INSERT INTO tb_user VALUES ('', '$nama', '$username', '$hashPass', 'user')");

  return mysqli_affected_rows($conn);
}

//send mail
function sendMail($data){
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

};

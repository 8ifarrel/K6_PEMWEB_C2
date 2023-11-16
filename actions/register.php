<?php
require "../connection/koneksi.php";

if (isset($_POST["register"])) {
  $nama_lengkap = $_POST["nama_lengkap"];
  $email = $_POST["email"];
  $pass = $_POST["password"];
  $konfirmasi = $_POST["konfirmasi"];

    if ($pass === $konfirmasi) {
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = mysqli_query($conn, "SELECT email FROM tb_akun_user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
      echo "
          <script>
            alert('Email telah digunakan');
            document.location.href = 'register.php';
          </script>
        ";
    } else {
      $sql = "INSERT INTO tb_akun_user VALUE ('$email', '$nama_lengkap', '$pass')";
      $result = mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) > 0) {
        echo "
          <script>
            alert('Registrasi berhasil');
            document.location.href = '../pages/login.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('Registrasi gagal');
            document.location.href = '../pages/register.php';
          </script>
        ";
      }
    }
  } else {
    echo "
        <script>
          alert('Password tidak sama');
          document.location.href = 'register.php';
        </script>
      ";
  }
}
?>
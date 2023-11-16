<?php
include "../connection/koneksi.php";

session_start();

if (isset($_POST["login"])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $getUserQuery = "SELECT * FROM tb_akun_user WHERE email = '$email'";
  $getUserResult = mysqli_query($conn, $getUserQuery);

  $getAdminQuery = "SELECT * FROM tb_akun_admin WHERE email = '$email'";
  $getAdminResult = mysqli_query($conn, $getAdminQuery);

  if (mysqli_num_rows($getUserResult) === 1) {
      $user = mysqli_fetch_assoc($getUserResult);

      if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $email;
        header("location: ../pages/buat_laporan.php");
        exit();
      } else {
        echo "
          <script>
            alert('Password salah');
            document.location.href = '../pages/login.php';
          </script>
        ";
      }
  } else if (mysqli_num_rows($getAdminResult) == 1) {
    $admin = mysqli_fetch_assoc($getAdminResult);

    if (password_verify($password, $admin['password'])){
      $_SESSION['email'] = $email;
      echo 'berhasil  ke admin';
      exit();
    } else {
      echo "
        <script>
          alert('Password salah');
          document.location.href = '../pages/login.php';
        </script>
      ";
    }
  } else {
    echo "
      <script>
        alert('Email salah');
        // document.location.href = '../pages/login.php';
      </script>
    ";
  }
}
?>

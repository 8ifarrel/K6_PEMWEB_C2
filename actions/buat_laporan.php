<?php
session_start();
require '../connection/koneksi.php';

if (isset($_POST['submit'])) {
  $judul_laporan = $_POST['judul_laporan'];
  $deskripsi_laporan = $_POST['deskripsi_laporan'];
  $tanggal_kejadian = $_POST['tanggal_kejadian'];
  $lokasi_kejadian = $_POST['lokasi_kejadian'];
  $instansi_tujuan = $_POST['instansi_tujuan'];
  $email = $_SESSION['email'];

  // File upload
  if (isset($_FILES['berkas']) && $_FILES['berkas']['error'] === 0) {
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["berkas"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($targetFile)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["berkas"]["size"] > 5000000) { // 5 MB
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if ($uploadOk == 1) {
      if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["berkas"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
      }
    }
  }

  // Insert data into database
  $result = mysqli_query($conn, "INSERT INTO tb_laporan (judul_laporan, deskripsi_laporan, tanggal_kejadian, lokasi_kejadian, instansi_tujuan, email, berkas) VALUES ('$judul_laporan', '$deskripsi_laporan', '$tanggal_kejadian', '$lokasi_kejadian', '$instansi_tujuan', '$email', '" . basename($_FILES["berkas"]["name"]) . "')");

  if ($result) {
    echo "
      <script>
        alert('Data berhasil di tambahkan!');
        // document.location.href = '../pages/lihat_laporan.php'
      </script>";
  } else {
    echo "
      <script>
      alert('Data gagal di tambahkan!');
      document.location.href = '../pages/buat_laporan.php'
      </script>";
  }
}
?>

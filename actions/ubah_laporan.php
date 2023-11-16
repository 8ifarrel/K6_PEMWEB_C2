<?php
require "../connection/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $report_id = $_POST['id_laporan'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $instansi = $_POST['instansi'];
  
  $query = "UPDATE tb_laporan SET judul_laporan = '$judul', deskripsi_laporan = '$deskripsi', tanggal_kejadian = '$tanggal', lokasi_kejadian = '$lokasi', instansi_tujuan = '$instansi' WHERE id_laporan = $report_id";

  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: ../pages/lihat_laporan.php?id_laporan=$report_id");
  } else {
    echo "Gagal memperbarui laporan.";
  }
}
?>

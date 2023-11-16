<?php
require "../connection/koneksi.php";

session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PENORAK - Pengaduan Online Rakyat</title>
  <link rel="stylesheet" href="../styles/base.css" />
  <link rel="stylesheet" href="../styles/buat_dan_ubah_laporan.css" />
</head>

<body class="background-image">
  <a id="dark-mode-toggle" class="dark-mode-btn"></a>

  <?php
  require "../components/navbar/navbar.php";
  ?>

  <div class="main-container">
    <div class="summary-container">
      <h1 class="title">Ubah Laporan</h1>
      <p class="description">
        Anda dapat mengubah laporan Anda selagi admin belum mengkonfirmasi laporan Anda
      </p>
    </div>

    <div class="form-container">
      <div class="form-title">
        <h2>Sampaikan Laporan Anda</h2>
      </div>

      <div class='form-content'>
        <div class='isi-laporan'>
        <?php
        $report_id = $_GET['id_laporan'];
        $query = "SELECT * FROM tb_laporan WHERE id_laporan = $report_id";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $row = mysqli_fetch_assoc($result);
        ?>
          <form action="../actions/ubah_laporan.php" method="post">
            <input type="hidden" name="id_laporan" value="<?php echo $row['id_laporan']; ?>" required />

            <label for="judul">Judul Laporan:</label>
            <input type="text" name="judul" value="<?php echo $row['judul_laporan']; ?>" required/>

            <label for="deskripsi">Deskripsi Laporan:</label>
            <textarea name="deskripsi" rows="10" required style="resize: none"><?php echo $row['deskripsi_laporan']; ?></textarea>

            <label for="tanggal">Tanggal Kejadian:</label>
            <input type="date" name="tanggal" value="<?php echo $row['tanggal_kejadian']; ?>" required/>

            <label for="lokasi">Lokasi Kejadian:</label>
            <input type="text" name="lokasi" value="<?php echo $row['lokasi_kejadian']; ?>" required/>

            <label for="instansi">Instansi Tujuan:</label>
            <input type="text" name="instansi" value="<?php echo $row['instansi_tujuan']; ?>" required/>

            <input type="submit" value="Simpan Perubahan" />
          </form>
          <?php
          } else {
            echo "Gagal mengambil data laporan.";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  require "../components/footer/footer.php";
  ?>

  <script src="../scripts/dark_mode.js"></script>
  <script src="../scripts/submit_confirm.js"></script>
</body>

</html>
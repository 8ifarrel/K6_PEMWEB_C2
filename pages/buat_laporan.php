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
      <h1 class="title">Layanan Pengaduan Online Rakyat</h1>
      <p class="description">
        Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang
      </p>
    </div>

    <div class="form-container">
      <div class="form-title">
        <h2>Sampaikan Laporan Anda</h2>
      </div>

      <div class='form-content'>
        <div class='isi-laporan'>
          <form action="../actions/buat_laporan.php" method="post" enctype="multipart/form-data">

            <label for="judul"><b>Ketik judul laporan:</b></label>
            <input type="text" id="inputan-laporan-judul" name="judul_laporan" required />

            <label for="deskripsi"><b>Ketik deskripsi laporan:</b></label>
            <textarea id="inputan-laporan-deskripsi" name="deskripsi_laporan" rows="10" required style="resize: none"></textarea>

            <label for="tanggal"><b>Pilih tanggal kejadian:</b></label>
            <input type="date" id="inputan-laporan-tanggal" name="tanggal_kejadian" required />

            <label for="lokasi"><b>Ketik lokasi kejadian:</b></label>
            <textarea id="inputan-laporan-lokasi" name="lokasi_kejadian" required style="resize: none"></textarea>

            <label for="instansi"><b>Ketik instansi tujuan:</b></label>
            <input type="text" id="inputan-laporan-instansi" name="instansi_tujuan" required />

            <label for="file"><b>Unggah berkas: </b></label>
            <input type="file" id="file" name="berkas" />

            <input type="submit" name="submit" value="Kirim Pengaduan" id="kirim-button" />
          </form>
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
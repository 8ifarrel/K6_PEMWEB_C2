<?php
session_start();

require "../actions/admin_panel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PENORAK - Pengaduan Online Rakyat</title>

  <script src="https://kit.fontawesome.com/9830653175.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/lihat_laporan.css" />
  <link rel="stylesheet" href="../styles/base.css" />

  <style>
    #kirim-button {
      background-color: #d0021b;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 15px;
    }
  </style>
</head>

<body class="background-image">
  <a id="dark-mode-toggle" class="dark-mode-btn"></a>

  <?php
  require "../components/navbar/navbar.php";
  ?>

  <div class="main-container">
    <div class="summary-container">
      <h1 class="title">Panel Admin</h1>
    </div>

    <div class="form-container">
      <div class="form-title">
        <?php require "../components/buttons/for_admin/left_arrow.php"; ?>
        <h2>Laporan</h2>
        <?php require "../components/buttons/for_admin/right_arrow.php"; ?>
      </div>

      <div class='form-content'>
        <?php
        if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);

          echo '<div class="isi-laporan">';
          echo '<p><b>Judul laporan:</b></p>';
          echo '<div id="laporan-judul">';
          echo '<p>' . $row["judul_laporan"] . '</p>';
          echo '</div>';

          echo '<p><b>Deskripsi laporan:</b></p>';
          echo '<div id="laporan-deskripsi">';
          echo '<p>' . $row["deskripsi_laporan"] . '</p>';
          echo '</div>';

          echo '<p><b>Tanggal kejadian:</b></p>';
          echo '<div id="laporan-tanggal">';
          echo '<p>' . $row["tanggal_kejadian"] . '</p>';
          echo '</div>';

          echo '<p><b>Lokasi kejadian:</b></p>';
          echo '<div id="laporan-lokasi">';
          echo '<p>' . $row["lokasi_kejadian"] . '</p>';
          echo '</div>';

          echo '<p><b>Instansi tujuan:</b></p>';
          echo '<div id="laporan-instansi">';
          echo '<p>' . $row["instansi_tujuan"] . '</p>';
          echo '</div>';

          if (!empty($row["berkas"])) {
            echo '<p><b>Berkas:</b></p>';
            echo '<div id="berkas-laporan">';
            echo '<p><a href="../uploads/' . $row["berkas"] . '" target="_blank">Tekan di sini untuk melihat berkas</a></p>';
            echo '</div>';
          } else {
            echo '<p><b>Berkas:</b></p>';
            echo '<div id="berkas-laporan">';
            echo '<p>Anda tidak ada mengunggah berkas</p>';
            echo '</div>';
          }

          $status_laporan = ($row["status_laporan"] == 'belum_dikonfirmasi') ? 'Belum dikonfirmasi oleh admin' : 'Sudah dikonfirmasi oleh admin';
          echo '<p><b>Status laporan: </b>';
          echo '<div class="status-laporan">';
          echo $status_laporan;
          echo '</div>';

          echo '<form action="../actions/ubah_status_laporan.php" method="post">';
          echo '<input type="hidden" name="id_laporan" value="' . $row['id_laporan'] . '" />';

          echo '<p><b>Pilih Status:</b></p>';
          echo '<select name="new_status" id="new_status">';
          echo '<option value="belum_dikonfirmasi">Belum dikonfirmasi</option>';
          echo '<option value="sudah_dikonfirmasi">Sudah dikonfirmasi</option>';
          echo '</select>';
          echo '<div>';
          echo '<button type="submit" name="update_status" id="kirim-button">Perbarui Status</button>';
          echo '</div>';
          echo '</form>';

          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>

  <?php
  require "../components/footer/footer.php";
  ?>

  <script src="../scripts/dark_mode.js"></script>
</body>
</html>

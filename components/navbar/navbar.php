<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/base.css" />
</head>

<header class="navbar-container">
  <nav class="navbar-content-left">
    <a href="index.html" class="navbar-logo">PENORAK</a>

    <div class="navbar-main-content">
      <a href="about_us.html">TENTANG KAMI</a>
      <a href="#footer-container">HUBUNGI KAMI</a>

      <?php
      $currentScript = $_SERVER['SCRIPT_NAME'];
      if (strpos($currentScript, 'buat_laporan.php') == true) {
        echo '<a href="../pages/lihat_laporan.php">LIHAT LAPORAN</a>';
      } else {
        echo '<a href="../pages/buat_laporan.php">BUAT LAPORAN</a>';
      }
      ?>
    </div>
  </nav>

  <div class="navbar-content-right">
    <?php
    $isLoggedIn = isset($_SESSION['email']);

    if ($isLoggedIn) {
      echo '<a href="../actions/logout.php" class="account-container">LOGOUT</a>';
    } else {
      echo '<a href="../pages/register.php" class="account-container">REGISTER</a>';
      echo '<a href="../pages/login.php" class="account-container">LOG IN</a>';
    }
    ?>
  </div>
</header>

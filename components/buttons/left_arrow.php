<?php
echo '<div class="arrow-container left-arrow">';
if ($report_id > 1) {
  $prev_report_id = $report_id - 1;

  if (cekLaporanAda($prev_report_id, $email)) {
    echo '<a href="lihat_laporan.php?id_laporan=' . $prev_report_id . '"><i class="fa-solid fa-caret-left fa-2xl" style="color: #ffffff;"></i></a>';
  } else {
    $sqlPrevID = "SELECT id_laporan FROM tb_laporan WHERE id_laporan < $report_id ORDER BY id_laporan DESC LIMIT 1";
    $resultPrevID = $conn->query($sqlPrevID);

    if ($resultPrevID->num_rows > 0) {
      $prev_row = $resultPrevID->fetch_assoc();
      $prev_report_id = $prev_row['id_laporan'];
      echo '<a href="lihat_laporan.php?id_laporan=' . $prev_report_id . '"><i class="fa-solid fa-caret-left fa-2xl" style="color: #ffffff;"></i></a>';
    } else {
      echo '<a href="lihat_laporan.php?id_laporan=' . $max_report_id . '"><i class="fa-solid fa-caret-left fa-2xl" style="color: #ffffff;"></i></a>';
    }
  }
} else {
  echo '<a href="lihat_laporan.php?id_laporan=' . $max_report_id . '"><i class="fa-solid fa-caret-left fa-2xl" style="color: #ffffff;"></i></a>';
}
echo '</div>';
?>
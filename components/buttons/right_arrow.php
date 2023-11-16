<?php
  echo '<div class="arrow-container right-arrow">';
  if ($report_id < $max_report_id) {
    $next_report_id = $report_id + 1;
  
    $next_id_found = false;
    while (!$next_id_found && $next_report_id <= $max_report_id) {
      if (cekLaporanAda($next_report_id, $email)) {
        $next_id_found = true;
      } else {
        $next_report_id++;
      }
    }
    
    if ($next_id_found) {
      echo '<a href="lihat_laporan.php?id_laporan=' . $next_report_id . '"><i class="fa-solid fa-caret-right fa-2xl" style="color: #ffffff;"></i></a>';
    } else {
      echo '<a href="lihat_laporan.php?id_laporan=1"><i class="fa-solid fa-caret-right fa-2xl" style="color: #ffffff;"></i></a>';
    }
  } else {
    echo '<a href="lihat_laporan.php?id_laporan=1"><i class="fa-solid fa-caret-right fa-2xl" style="color: #ffffff;"></i></a>';
  }
  echo '</div>';
?>
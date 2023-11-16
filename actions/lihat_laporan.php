<?php
require "../connection/koneksi.php";

session_start();

function cekLaporanAda($report_id, $email) {
    global $conn;
    $sql = "SELECT id_laporan FROM tb_laporan WHERE id_laporan = $report_id AND email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

if (!isset($_SESSION['email'])) {
    header("location: ../pages/login.php");
    exit;
}

$email = $_SESSION['email'];
$report_id = isset($_GET['id_laporan']) ? $_GET['id_laporan'] : 1;

if (!cekLaporanAda($report_id, $email)) {
    $sqlNextID = "SELECT id_laporan FROM tb_laporan WHERE email = '$email' ORDER BY id_laporan ASC LIMIT 1";
    $resultNextID = $conn->query($sqlNextID);
    if ($resultNextID->num_rows > 0) {
        $next_row = $resultNextID->fetch_assoc();
        $next_report_id = $next_row['id_laporan'];
        echo "<script>";
        echo "document.location.href = '../pages/lihat_laporan.php?id_laporan=' + $next_report_id;";
        echo "</script>";
    }
}

$sqlMaxID = "SELECT MAX(id_laporan) AS max_id FROM tb_laporan WHERE email = '$email'";
$resultMaxID = $conn->query($sqlMaxID);
$max_report_id = $resultMaxID->fetch_assoc()['max_id'];

$sql = "SELECT id_laporan, judul_laporan, deskripsi_laporan, lokasi_kejadian, tanggal_kejadian, instansi_tujuan, status_laporan, berkas FROM tb_laporan WHERE id_laporan = $report_id AND email = '$email'";
$result = $conn->query($sql);
?>

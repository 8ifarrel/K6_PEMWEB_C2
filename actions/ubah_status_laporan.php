<?php
session_start();
require '../connection/koneksi.php';

if (isset($_POST['update_status'])) {
    $id_laporan = $_POST['id_laporan'];
    $new_status = $_POST['new_status'];

    $update_query = "UPDATE tb_laporan SET status_laporan = '$new_status' WHERE id_laporan = $id_laporan";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
                alert('Status laporan berhasil diperbarui!');
                window.location.href = '../pages/admin_panel.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui status laporan.');
                window.location.href = '../pages/admin_panel.php';
            </script>";
    }
}
?>

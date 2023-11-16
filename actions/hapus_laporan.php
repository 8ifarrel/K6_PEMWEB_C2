<?php
session_start();
require '../connection/koneksi.php';

if (isset($_SESSION['email']) && isset($_GET['id_laporan'])) {
    $email_pengguna = $_SESSION['email'];
    $id_laporan = $_GET['id_laporan'];

    // Periksa apakah laporan dengan id_laporan dan email_pengguna ditemukan
    $result = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE id_laporan = $id_laporan AND email = '$email_pengguna'");
    
    if ($result->num_rows > 0) {
        // Laporan ditemukan, lakukan penghapusan
        $delete_query = "DELETE FROM tb_laporan WHERE id_laporan = $id_laporan";
        $delete_result = mysqli_query($conn, $delete_query);

        if ($delete_result) {
            // Penghapusan berhasil
            echo "
                <script>
                    alert('Laporan berhasil dihapus!');
                    window.location.href = '../pages/lihat_laporan.php';
                </script>";
        } else {
            // Gagal menghapus
            echo "
                <script>
                    alert('Gagal menghapus laporan!');
                    window.location.href = '../pages/lihat_laporan.php';
                </script>";
        }
    } else {
        // Laporan tidak ditemukan
        echo "
            <script>
                alert('Laporan tidak ditemukan atau Anda tidak memiliki izin untuk menghapus laporan ini!');
                window.location.href = '../pages/lihat_laporan.php';
            </script>";
    }
} else {
    // Tidak ada sesi atau id_laporan yang diberikan
    header("location: ../pages/lihat_laporan.php");
}
?>

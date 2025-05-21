    <?php
    include 'koneksi.php';
    $id = $_GET['id_User'];

    $sql = "DELETE FROM tb_user WHERE id_User='$id'";
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='user_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='user_data.php';</script>";
    }
    ?>

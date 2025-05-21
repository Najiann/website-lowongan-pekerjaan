    <?php
    include 'koneksi.php';
    $id = $_GET['Id_Apply'];

    $sql = "DELETE FROM Apply WHERE Id_Apply='$id'";
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='pelamar_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='pelamar_data.php';</script>";
    }
    ?>

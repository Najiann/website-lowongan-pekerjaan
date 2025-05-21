<?php
include 'koneksi.php';
$id = $_GET['Id_Company']; // Parameter GET ini mungkin tidak dikirim dari URL

$sql = "DELETE FROM company WHERE Id_Company='$id'";
if ($conn->query($sql)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='company_data.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.href='company_data.php';</script>";
}
?>

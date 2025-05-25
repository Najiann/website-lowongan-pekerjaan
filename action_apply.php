<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Silakan login terlebih dahulu";
    exit;
}

$applicant_id = intval($_POST['applicant_id']);
$job_id = intval($_POST['job_id']);
$tanggal = date("Y-m-d");

// Validasi data ada
$cek_applicant = mysqli_query($conn, "SELECT * FROM applicants WHERE id = $applicant_id");
if (mysqli_num_rows($cek_applicant) == 0) {
    echo "Applicant tidak ditemukan.";
    exit;
}

$cek_job = mysqli_query($conn, "SELECT * FROM job_vacancies WHERE id = $job_id");
if (mysqli_num_rows($cek_job) == 0) {
    echo "Pekerjaan tidak ditemukan.";
    exit;
}

// Cek apakah sudah pernah melamar
$cek = mysqli_query($conn, "SELECT * FROM applications WHERE applicant_id = $applicant_id AND job_id = $job_id");
if (mysqli_num_rows($cek) > 0) {
    echo "Kamu sudah pernah melamar pekerjaan ini sebelumnya.";
    exit;
}

// Simpan ke database
$query = "INSERT INTO applications (applicant_id, job_id, tanggal_lamar) VALUES ($applicant_id, $job_id, '$tanggal')";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: user_dashboard.php");
    exit;
} else {
    echo "Gagal mengirim lamaran: " . mysqli_error($conn);
}
?>

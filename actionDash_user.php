<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Session tidak ditemukan. Silakan login.";
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama           = $_POST['nama'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $alamat         = $_POST['alamat'];
    $no_hp          = $_POST['no_hp'];
    $pendidikan     = $_POST['pendidikan'];
    $pengalaman     = $_POST['pengalaman'];
    $skill          = $_POST['skill'];

    // Handle upload CV
    $cv_file = null;
    if (isset($_FILES['cv_file']) && $_FILES['cv_file']['error'] == 0) {
        $allowed_ext = ['pdf', 'doc', 'docx'];
        $ext = strtolower(pathinfo($_FILES['cv_file']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, $allowed_ext)) {
            $new_name = $user_id . "_" . time() . "." . $ext;
            $upload_path = "uploads/cv/" . $new_name;

            if (move_uploaded_file($_FILES['cv_file']['tmp_name'], $upload_path)) {
                $cv_file = $upload_path;
            } else {
                echo "Gagal upload CV.";
                exit;
            }
        } else {
            echo "Format CV harus PDF, DOC, atau DOCX.";
            exit;
        }
    }

    // Cek apakah user sudah punya data
    $cek = $conn->prepare("SELECT id FROM applicants WHERE user_id = ?");
    $cek->bind_param("i", $user_id);
    $cek->execute();
    $cek_result = $cek->get_result();

    if ($cek_result->num_rows > 0) {
        // Update
        if ($cv_file) {
            $query = "UPDATE applicants SET nama=?, tempat_lahir=?, alamat=?, no_hp=?, pendidikan=?, pengalaman=?, skill=?, cv_file=? WHERE user_id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssssi", $nama, $tempat_lahir, $alamat, $no_hp, $pendidikan, $pengalaman, $skill, $cv_file, $user_id);
        } else {
            $query = "UPDATE applicants SET nama=?, tempat_lahir=?, alamat=?, no_hp=?, pendidikan=?, pengalaman=?, skill=? WHERE user_id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssssi", $nama, $tempat_lahir, $alamat, $no_hp, $pendidikan, $pengalaman, $skill, $user_id);
        }
    } else {
        // Insert
        $query = "INSERT INTO applicants (user_id, nama, tempat_lahir, alamat, no_hp, pendidikan, pengalaman, skill, cv_file)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issssssss", $user_id, $nama, $tempat_lahir, $alamat, $no_hp, $pendidikan, $pengalaman, $skill, $cv_file);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan.'); window.location='user_dashboard.php';</script>";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

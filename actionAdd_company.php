<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['Name_Company']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $email = mysqli_real_escape_string($conn, $_POST['Email_Company']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone_Company']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['Deskripsi_Company']);

    // Validasi input kosong
    if (empty($name) || empty($address) || empty($email) || empty($phone)) {
        echo "<script>alert('Semua field wajib diisi!'); window.history.back();</script>";
        exit;
    }

    // Query untuk insert data
    $sql = "INSERT INTO company (Name_Company, Address, Email_Company, Phone_Company, Deskripsi_Company) 
            VALUES ('$name', '$address', '$email', '$phone', '$deskripsi')";

    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='company_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: {$conn->error}'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Data User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashadmn.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="company_data.php">Data Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Data Company</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Company</label>
                        <input type="text" class="form-control" id="nama" name="Name_Company" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Company</label>
                        <input type="text" class="form-control" id="alamat" name="Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Company</label>
                        <input type="email" class="form-control" id="email" name="Email_Company" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telephone Company</label>
                        <input type="tel" class="form-control" id="phone" name="Phone_Company" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Company</label>
                        <textarea class="form-control" id="deskripsi" name="Deskripsi_Company" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
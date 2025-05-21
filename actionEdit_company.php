<?php
include 'koneksi.php';
$id = $_GET['Id_Company'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi dan escape input
    $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
    $alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, $_POST['alamat']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
    $deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($conn, $_POST['deskripsi']) : '';

    // Query update
    $sql = "UPDATE company SET 
                Name_Company='$nama', 
                Address='$alamat', 
                Email_Company='$email', 
                Phone_Company='$phone', 
                Deskripsi_Company='$deskripsi'
            WHERE Id_Company='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='company_data.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $conn->error . "');</script>";
    }
}

// Ambil data untuk form
$data = $conn->query("SELECT * FROM company WHERE Id_Company='$id'")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Data Company</a>
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
        <h2 class="text-center mb-4">Edit Data Company</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Company</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['Name_Company']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Company</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['Address']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Company</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $data['Email_Company']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telephone Company</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $data['Phone_Company']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Company</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $data['Deskripsi_Company']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
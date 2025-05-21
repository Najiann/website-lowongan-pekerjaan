<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name_Applicant'];
    $placeOfBirth = $_POST['Place_of_Birth'];
    $address = $_POST['Address'];
    $email = $_POST['Email'];
    $telephone = $_POST['No_Telephone'];
    $workExperience = $_POST['Work_Experience'];
    $lastEducation = $_POST['Last_Education'];
    $capabilities = $_POST['Capabilities'];

    $sql = "INSERT INTO Apply (Name_Applicant, Place_of_Birth, Address, Email, No_Telephone, Work_Experience, Last_Education, Capabilities) 
            VALUES ('$name', '$placeOfBirth', '$address', '$email', '$telephone', '$workExperience', '$lastEducation', '$capabilities')";

    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='pelamar_data.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!'); window.location.href='pelamar_data.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Data Pelamar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashadmn.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pelamar_data.php">Data Pelamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Data Pelamar</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="Name_Applicant" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Name_Applicant" name="Name_Applicant" required>
                    </div>
                    <div class="mb-3">
                        <label for="Place_of_Birth" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="Place_of_Birth" name="Place_of_Birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Address" name="Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="No_Telephone" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="No_Telephone" name="No_Telephone">
                    </div>
                    <div class="mb-3">
                        <label for="Work_Experience" class="form-label">Pengalaman Kerja</label>
                        <textarea class="form-control" id="Work_Experience" name="Work_Experience"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Last_Education" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="Last_Education" name="Last_Education" required>
                    </div>
                    <div class="mb-3">
                        <label for="Capabilities" class="form-label">Kemampuan</label>
                        <textarea class="form-control" id="Capabilities" name="Capabilities"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
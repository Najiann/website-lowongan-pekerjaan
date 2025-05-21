<?php
include 'koneksi.php';
$id = $_GET['Id_Apply'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escape data untuk mencegah error SQL syntax
    $name = mysqli_real_escape_string($conn, $_POST['Name_Applicant']);
    $placeOfBirth = mysqli_real_escape_string($conn, $_POST['Place_of_Birth']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $telephone = mysqli_real_escape_string($conn, $_POST['No_Telephone']);
    $workExperience = mysqli_real_escape_string($conn, $_POST['Work_Experience']);
    $lastEducation = mysqli_real_escape_string($conn, $_POST['Last_Education']);
    $capabilities = mysqli_real_escape_string($conn, $_POST['Capabilities']);

    // Perbaiki query dengan data yang sudah di-escape
    $sql = "UPDATE Apply SET 
                Name_Applicant='$name', 
                Place_of_Birth='$placeOfBirth', 
                Address='$address', 
                Email='$email', 
                No_Telephone='$telephone', 
                Work_Experience='$workExperience', 
                Last_Education='$lastEducation', 
                Capabilities='$capabilities' 
            WHERE Id_Apply='$id'";

    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='pelamar_data.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . $conn->error . "');</script>";
    }
}

// Ambil data untuk form
$data = $conn->query("SELECT * FROM Apply WHERE Id_Apply='$id'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelamar</title>
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
        <h2 class="text-center mb-4">Edit Data Pelamar</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="Name_Applicant" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Name_Applicant" name="Name_Applicant" value="<?= $data['Name_Applicant']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Place_of_Birth" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="Place_of_Birth" name="Place_of_Birth" value="<?= $data['Place_of_Birth']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Address" name="Address" value="<?= $data['Address']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" value="<?= $data['Email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="No_Telephone" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="No_Telephone" name="No_Telephone" value="<?= $data['No_Telephone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Work_Experience" class="form-label">Pengalaman Kerja</label>
                        <textarea class="form-control" id="Work_Experience" name="Work_Experience"><?= $data['Work_Experience']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Last_Education" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="Last_Education" name="Last_Education" value="<?= $data['Last_Education']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Capabilities" class="form-label">Kemampuan</label>
                        <textarea class="form-control" id="Capabilities" name="Capabilities"><?= $data['Capabilities']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
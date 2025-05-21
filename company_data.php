<?php
session_start();
include 'koneksi.php';

$query = $conn->query("SELECT * FROM company");

$no = "0";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashadmn.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Data Company</h2>
        <a href="actionAdd_company.php" class="btn btn-success mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['Name_Company']; ?></td>
                        <td><?= $row['Address']; ?></td>
                        <td><?= $row['Email_Company']; ?></td>
                        <td><?= $row['Phone_Company']; ?></td>
                        <td><?= $row['Deskripsi_Company']; ?></td>
                        <td>
                            <a href="actionEdit_company.php?Id_Company=<?= $row['Id_Company']; ?>" class="btn btn-warning">Edit</a> |
                            <a href="actionDelete_company.php?Id_Company=<?= $row['Id_Company']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
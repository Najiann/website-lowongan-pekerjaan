<?php
session_start();
include 'koneksi.php';

$query = $conn->query("SELECT * FROM Apply");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelamar</title>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Data Pelamar</h2>
        <a href="actionAdd_pelamar.php" class="btn btn-success mb-3">Tambah Data Pelamar</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Pengalaman Kerja</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Kemampuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['Name_Applicant']; ?></td>
                        <td><?= $row['Place_of_Birth']; ?></td>
                        <td><?= $row['Address']; ?></td>
                        <td><?= $row['Email']; ?></td>
                        <td><?= $row['No_Telephone']; ?></td>
                        <td><?= $row['Work_Experience']; ?></td>
                        <td><?= $row['Last_Education']; ?></td>
                        <td><?= $row['Capabilities']; ?></td>
                        <td class="d-flex justify-content-between">
                            <a href="actionEdit_pelamar.php?Id_Apply=<?= $row['Id_Apply']; ?>" class="btn btn-warning">Edit</a> |
                            <a href="actionDelete_pelamar.php?Id_Apply=<?= $row['Id_Apply']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
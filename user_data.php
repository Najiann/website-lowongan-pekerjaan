<?php
session_start();
include 'koneksi.php';

$query = $conn->query("SELECT * FROM tb_user");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data User</title>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Data User</h2>
        <a href="actionAdd_user.php" class="btn btn-success mb-3">Data User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $query->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['password']; ?></td>
                        <td><?= $row['role']; ?></td>
                        <td>
                            <a href="actionEdit_user.php?id_User=<?= $row['id_User']; ?>" class="btn btn-warning">Edit</a> |
                            <a href="actionDelete_user.php?id_User=<?= $row['id_User']; ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
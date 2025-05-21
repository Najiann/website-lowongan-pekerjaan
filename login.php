<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->query("SELECT * FROM tb_user WHERE email='$email' AND password='$password'");
    $user = $query->fetch_assoc();

    if ($user) {
        $_SESSION['user_id'] = $user['id_User'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
        header("Location: dashadmn.php");
        exit;
    } else {
        $error = "Email atau kata sandi salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lowongan Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #ff0066;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e6005c;
        }

        .form-control:focus {
            border-color: #ff0066;
            box-shadow: 0px 0px 5px rgba(255, 0, 102, 0.5);
        }

        .social-login button {
            border: 1px solid #ddd;
        }

        .social-login i {
            margin-right: 10px;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
        }

        .divider span {
            background: #fff;
            padding: 0 10px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3 class="text-center mb-3">Masuk</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan kata sandi" required>
                <div class="text-end mt-1">
                    <a href="#" class="text-decoration-none" style="font-size: 0.9em;">Lupa kata sandi?</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>

        <div class="divider">
            <span>atau</span>
        </div>

        <div class="social-login">
            <button class="btn btn-light w-100 mb-2">
                <i class="bi bi-google"></i> Lanjutkan dengan Google
            </button>
            <button class="btn btn-light w-100 mb-2">
                <i class="bi bi-facebook"></i> Lanjutkan dengan Facebook
            </button>
            <button class="btn btn-light w-100 mb-2">
                <i class="bi bi-apple"></i> Lanjutkan dengan Apple
            </button>
        </div>

        <p class="text-center mt-3" style="font-size: 0.9em;">
            Tidak punya akun? <a href="register.php" class="text-decoration-none">Daftar</a>
        </p>
    </div>
</body>

</html>
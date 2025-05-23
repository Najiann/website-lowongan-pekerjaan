<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Kerjakini</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --golden-ratio: 1.618;
            --primary-color: #6C63FF;
            --primary-dark: #2E25B4;
            --secondary-color: #FF6584;
            --bg-light: #F3F4F6;
            --white: #ffffff;
            --text-dark: #1F2937;
            --text-light: #6B7280;
            --border-radius: 0.5rem;
            --box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: var(--golden-ratio);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }
        
        /* Register Container */
        .register-container {
            width: 100%;
            max-width: 500px;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }
        
        .register-container h3 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 600;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }
        
        /* Password Requirements */
        .password-requirements {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--text-light);
        }
        
        .password-requirements ul {
            padding-left: 1.2rem;
            margin-top: 0.3rem;
        }
        
        /* Button Styles */
        .btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
            margin-top: 1rem;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Link Styles */
        .text-center {
            text-align: center;
        }
        
        .login-link {
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: var(--text-light);
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .login-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        /* Alert Styles */
        .alert {
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background-color: rgba(255, 101, 132, 0.1);
            border-left: 4px solid var(--secondary-color);
            color: var(--secondary-color);
        }
        
        /* Logo Styles */
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            text-decoration: none;
        }
        
        .logo-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-weight: 700;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .register-container {
                padding: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .register-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <a href="#" class="logo">
            <span class="logo-icon">K</span>
            <span>erjakini</span>
        </a>
        
        <h3>Buat Akun Baru</h3>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Buat username unik" required>
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" placeholder="Buat kata sandi" required>
                <div class="password-requirements">
                    <small>Kata sandi harus memenuhi:</small>
                    <ul>
                        <li>Minimal 8 karakter</li>
                        <li>Mengandung huruf dan angka</li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Kata Sandi</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Ulangi kata sandi" required>
            </div>
            <button type="submit" class="btn">Daftar Sekarang</button>
        </form>

        <p class="login-link text-center">
            Sudah punya akun? <a href="login.php">Masuk</a>
        </p>
    </div>
</body>
</html>
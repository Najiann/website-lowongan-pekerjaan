<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Dashboard Pengguna</title>
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
            position: relative;
            overflow-x: hidden;
        }
        
        /* Typography */
        h1, h2, h3, h4 {
            font-weight: 600;
            line-height: 1.2;
        }
        
        /* Layout */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        /* Enhanced Navbar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 2rem;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: calc(1rem * var(--golden-ratio));
            font-weight: 700;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
            padding: 0.5rem 0;
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
        
        .logo:hover .logo-icon {
            transform: rotate(15deg) scale(1.1);
            background-color: var(--primary-dark);
        }
        
        .nav-links {
            display: flex;
            gap: calc(1.5rem * var(--golden-ratio));
            list-style: none;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            padding: 0.75rem 0.5rem;
            font-size: 1.05rem;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0.5rem;
            left: 0.5rem;
            width: calc(100% - 1rem);
            height: 2px;
            background-color: var(--primary-color);
            transform: scaleX(0);
            transition: var(--transition);
            transform-origin: bottom right;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .nav-links a:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        
        /* Dropdown Menu */
        .dropdown {
            display: none;
            position: absolute;
            background-color: var(--white);
            min-width: 160px;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            z-index: 1;
            right: 0;
            top: 100%;
            list-style: none;
            padding: 0.5rem 0;
        }
        
        .dropdown li {
            padding: 0.5rem 1rem;
            list-style: none;
        }
        
        .dropdown a {
            color: var(--text-dark);
            text-decoration: none;
            display: block;
            transition: var(--transition);
        }
        
        .dropdown a:hover {
            color: var(--primary-color);
            background-color: var(--bg-light);
        }
        
        .nav-links li:hover .dropdown {
            display: block;
        }
        
        /* Mobile Menu Button - Hidden by default */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-dark);
            cursor: pointer;
        }
        
        /* Dashboard Sections */
        .dashboard-section {
            padding: 3rem 0;
            position: relative;
        }
        
        .section-title {
            font-size: calc(1.5rem * var(--golden-ratio));
            margin-bottom: 2rem;
            color: var(--text-dark);
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .section-title::before {
            content: "◆";
            color: var(--primary-color);
            margin-right: 0.5rem;
            font-size: 0.8em;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        /* User Info Card */
        .user-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .user-card::after {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background-color: rgba(108, 99, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
            animation: float 6s ease-in-out infinite;
        }
        
        .user-card > * {
            position: relative;
            z-index: 1;
        }
        
        .user-card h1 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        .user-card p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        /* Form Styles */
        .form-group {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .form-group::before {
            content: "";
            position: absolute;
            bottom: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            background-color: rgba(255, 101, 132, 0.05);
            border-radius: 50%;
            z-index: 0;
        }
        
        .form-group > * {
            position: relative;
            z-index: 1;
        }
        
        .field {
            margin-bottom: 1.5rem;
        }
        
        .field label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }
        
        .field input[type="text"],
        .field input[type="email"],
        .field input[type="tel"],
        .field textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .field textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .field input:focus,
        .field textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }

        /* Custom File Input Styling */
        .file-input-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            background-color: var(--white);
            border: 1px dashed #E5E7EB;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .file-input-label:hover {
            border-color: var(--primary-color);
            background-color: rgba(108, 99, 255, 0.05);
        }

        .file-input-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .file-input-button {
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            border-radius: calc(var(--border-radius) - 0.2rem);
            font-size: 0.8rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .file-input-label:hover .file-input-button {
            background-color: var(--primary-dark);
        }

        .file-input {
            position: absolute;
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            z-index: -1;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--primary-dark);
            display: none;
        }
        
        .example {
            font-size: 0.875rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
            font-style: italic;
        }
        
        /* Button Styles */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--white);
        }
        
        .btn-primary::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 50%);
            transform: rotate(30deg);
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .btn-primary:hover::after {
            left: 100%;
        }
        
        /* Application Cards */
        .application-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 1.5rem;
            transition: var(--transition);
            position: relative;
        }
        
        .application-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }
        
        .application-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .application-card h3 {
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }
        
        .application-card p {
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }
        
        .status-accepted {
            color: #10B981;
            font-weight: 600;
            position: relative;
        }
        
        .status-accepted::after {
            content: "";
            position: absolute;
            top: 50%;
            left: -1rem;
            transform: translateY(-50%);
            width: 8px;
            height: 8px;
            background-color: currentColor;
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }
        
        /* Mobile Menu Styles */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 80px;
            left: 0;
            width: 100%;
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            z-index: 99;
            padding: 1rem 0;
            list-style: none;
        }
        
        .mobile-menu.active {
            display: block;
        }
        
        .mobile-menu li {
            position: relative;
        }
        
        .mobile-menu a {
            display: block;
            padding: 1rem 2rem;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
        }
        
        .mobile-menu a:hover {
            background-color: var(--bg-light);
            color: var(--primary-color);
        }
        
        .mobile-dropdown {
            display: none;
            padding-left: 1.5rem;
            background-color: var(--bg-light);
            list-style: none;
            padding: 0;
        }
        
        .mobile-menu li.active .mobile-dropdown {
            display: block;
        }
        
        /* Background Patterns */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(108, 99, 255, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(255, 101, 132, 0.05) 0%, transparent 20%);
            z-index: -1;
            pointer-events: none;
        }
        
        .dashboard-section:nth-child(odd)::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(45deg, transparent 65%, rgba(108, 99, 255, 0.03) 65%, rgba(108, 99, 255, 0.03) 70%, transparent 70%),
                linear-gradient(-45deg, transparent 65%, rgba(255, 101, 132, 0.03) 65%, rgba(255, 101, 132, 0.03) 70%, transparent 70%);
            background-size: 40px 40px;
            z-index: 0;
            pointer-events: none;
        }
        
        .dashboard-section:nth-child(odd) > * {
            position: relative;
            z-index: 1;
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .section-title {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 1.5rem;
            }
            
            nav {
                padding: 1rem 1.5rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .dashboard-section {
                padding: 2rem 0;
            }
            
            .user-card,
            .form-group {
                padding: 1.5rem;
            }
            
            .user-card::after {
                width: 100px;
                height: 100px;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .btn {
                width: 100%;
            }
            
            .logo {
                font-size: 1.2rem;
            }
            
            .logo-icon {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
            }

            .file-input-label {
                flex-direction: column;
                align-items: flex-start;
            }

            .file-input-button {
                margin-top: 0.5rem;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="container">
        <a href="#" class="logo">
            <span class="logo-icon">K</span>
            <span>erjakini</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links">
            <li><a href="#">Cari Lowongan</a></li>
            <li><a href="#">Cari Perusahaan</a></li>
            <li><a href="#">Komunitas</a></li>
            <li>
                <a href="#">Username</a>
                <ul class="dropdown">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="users_home.php">Cari Lowongan</a></li>
        <li><a href="#">Cari Perusahaan</a></li>
        <li><a href="#">Komunitas</a></li>
        <li id="mobileUserMenu">
            <a href="javascript:void(0)">Username</a>
            <ul class="mobile-dropdown">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
    </ul>

    <!-- User Dashboard -->
    <div class="container">
        <!-- User Information Section -->
        <section class="dashboard-section">
            <div class="user-card">
                <h1>Selamat Datang, Username</h1>
                <p>email@gmail.com</p>
                <form action="" method="post">
                    <div class="field">
                        <label for="social-media">Media Sosial</label>
                        <input type="text" name="link" id="social-media" placeholder="https://linkedin.com/in/username">
                    </div>
                </form>
                <p>Bergabung Sejak 12/02/2000</p>
            </div>
        </section>

        <!-- User Profile Section -->
        <section class="dashboard-section">
            <h2 class="section-title">Tentang Saya</h2>
            <form action="" method="post" class="form-group">
                
                <div class="field">
                    <label for="birth-place">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="birth-place" placeholder="Masukkan tempat lahir">
                </div>
                
                <div class="field">
                    <label for="phone">Nomor Handphone</label>
                    <input type="tel" inputmode="numeric" name="no_hp" id="phone" placeholder="Masukkan nomor handphone">
                </div>
                
                <div class="field">
                    <label for="education">Riwayat Pendidikan</label>
                    <div class="example">
                        <p>Contoh:<br>
                        Sekolah Dasar Negeri 1 Jakarta<br>
                        Sekolah Menengah Pertama Negeri 2 Jakarta</p>
                    </div>
                    <textarea name="pendidikan" id="education" placeholder="Masukkan riwayat pendidikan"></textarea>
                </div>
                
                <div class="field">
                    <label for="experience">Pengalaman</label>
                    <textarea name="pengalaman" id="experience" placeholder="Masukkan pengalaman kerja"></textarea>
                </div>
                
                <div class="field">
                    <label for="skills">Keahlian</label>
                    <textarea name="skill" id="skills" placeholder="Masukkan keahlian yang dimiliki"></textarea>
                </div>

                <div class="field">
                    <label>Unggah CV</label>
                    <div class="file-input-container">
                        <label class="file-input-label">
                            <span class="file-input-text">Pilih file atau seret ke sini</span>
                            <span class="file-input-button">Pilih File</span>
                            <input type="file" class="file-input" id="cv" name="cv" accept=".pdf,.doc,.docx">
                        </label>
                        <div class="file-name" id="file-name">Belum ada file dipilih</div>
                    </div>
                    <p class="example">Format file: PDF, DOC, DOCX (Maksimal 5MB)</p>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Simpan Perubahan">
            </form>
        </section>

        <!-- Job Applications Section -->
        <section class="dashboard-section">
            <h2 class="section-title">Lamaran Kerja</h2>
            
            <a href="user_accapt.php" style="text-decoration: none;">
                <div class="application-card">
                    <h3>Jaga Ternak Pak Andi</h3>
                    <p>Bogor</p>
                    <p>Rp. 2.000.000</p>
                    <p>Melamar pada 15/03/2023</p>
                    <p class="status-accepted">Diterima</p>
                </div>
            </a>
            
            <div class="application-card">
                <h3>Developer Web</h3>
                <p>Jakarta</p>
                <p>Rp. 8.000.000</p>
                <p>Melamar pada 20/04/2023</p>
                <p>Dalam Review</p>
            </div>
        </section>
    </div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileUserMenu = document.getElementById('mobileUserMenu');
        
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            
            // Change icon based on menu state
            if (mobileMenu.classList.contains('active')) {
                this.textContent = '✕';
            } else {
                this.textContent = '☰';
            }
        });
        
        // Mobile Dropdown Toggle
        mobileUserMenu.addEventListener('click', function() {
            this.classList.toggle('active');
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && event.target !== mobileMenuBtn) {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.textContent = '☰';
            }
            
            if (!mobileUserMenu.contains(event.target)) {
                mobileUserMenu.classList.remove('active');
            }
        });

        // File input display
        const fileInput = document.querySelector('.file-input');
        const fileNameDisplay = document.getElementById('file-name');

        fileInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                fileNameDisplay.textContent = this.files[0].name;
                fileNameDisplay.style.display = 'block';
            } else {
                fileNameDisplay.textContent = 'Belum ada file dipilih';
                fileNameDisplay.style.display = 'none';
            }
        });

        // Drag and drop functionality
        const fileInputLabel = document.querySelector('.file-input-label');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileInputLabel.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileInputLabel.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileInputLabel.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            fileInputLabel.classList.add('highlight');
        }

        function unhighlight() {
            fileInputLabel.classList.remove('highlight');
        }

        fileInputLabel.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            
            // Trigger change event manually
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerjakini - Apply Pekerjaan</title>
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
        
        /* Application Container */
        .container-information {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
            padding: 3rem 0;
        }
        
        .information-users, .information-job {
            flex: 1;
            min-width: 300px;
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
        }
        
        .information-users h1, .information-job h1 {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .information-users h1::after, .information-job h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        .information-job h2 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }
        
        .information-job p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        /* Warning All Section */
        .warmingall {
            width: 100%;
            background-color: rgba(255, 101, 132, 0.05);
            border-left: 4px solid var(--secondary-color);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
        }
        
        .warmingall h2 {
            color: var(--secondary-color);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .warmingall p {
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        /* Form Styles */
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
        
        /* File Input Styling */
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
        
        /* Button Styles */
        .btn {
            padding: 0.75rem 1.5rem;
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
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .container-information {
                flex-direction: column;
            }
            
            .information-users, .information-job {
                width: 100%;
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
            
            .information-users, .information-job {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
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
            <li><a href="users_home.php">Cari Lowongan</a></li>
            <li><a href="user_company_list.php">Cari Perusahaan</a></li>
            <li><a href="#">Komunitas</a></li>
            <li>
                <a href="#">Username</a>
                <ul class="dropdown">
                    <li><a href="user_dashboard.php">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="users_home.php">Cari Lowongan</a></li>
        <li><a href="user_company_list.php">Cari Perusahaan</a></li>
        <li><a href="#">Komunitas</a></li>
        <li id="mobileUserMenu">
            <a href="javascript:void(0)">Username</a>
            <ul class="mobile-dropdown">
                <li><a href="user_dashboard.php">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
    </ul>

    <!-- Information Users -->
    <section class="container-information">
        <div class="information-users">
            <h1>Data Diri Anda</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="job_id" id="job_id" value="">
                <input type="hidden" name="applicant_id" id="applicant_id" value="">
                <div class="field">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" value="">
                </div>
                <div class="field">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="">
                </div>
                <div class="field">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" value="">
                </div>
                <div class="field">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat"></textarea>
                </div>
                <div class="field">
                    <label for="pendidikan">Riwayat Pendidikan</label>
                    <textarea name="pendidikan" id="pendidikan"></textarea>
                </div>
                <div class="field">
                    <label for="pengalaman">Riwayat Pengalaman</label>
                    <textarea name="pengalaman" id="pengalaman"></textarea>
                </div>
                <div class="field">
                    <label for="skill">Skills yang Dikuasai</label>
                    <textarea name="skill" id="skill"></textarea>
                </div>
                <div class="field">
                    <label>File CV kamu</label>
                    <div class="file-input-container">
                        <label class="file-input-label">
                            <span class="file-input-text">Pilih file atau seret ke sini</span>
                            <span class="file-input-button">Pilih File</span>
                            <input type="file" class="file-input" id="cv_file" name="cv_file" accept=".pdf,.doc,.docx">
                        </label>
                        <div class="file-name" id="file-name">Belum ada file dipilih</div>
                    </div>
                </div>
                <button type="submit" class="btn">Kirim Lamaran</button>
            </form>
        </div>
        <div class="information-job">
            <h1>Informasi Pekerjaan</h1>
            <h2>Jual Ayam pak Eko</h2>
            <p>Lokasi, lokasi, lokasi</p>
            <p>Gaji: Rp. 3.000.000</p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi optio ex obcaecati dolor recusandae atque! Saepe assumenda alias, 
                odit officiis doloremque numquam iure perferendis dolores ipsa explicabo repellendus laborum sunt!
            </p>
            <p>
                syarat Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                 Nihil nemo minus quae cupiditate assumenda? Accusantium perferendis est ea aliquam odit.
            </p>
        </div>
        <div class="warmingall">
            <h2>Himbauan</h2>
            <p>
                Pastikan anda tidak memberikan data pribadi kepada siapapun, 
                dan tidak melakukan pembayaran apapun kepada pihak manapun.
                Jika ada yang mencurigakan, silahkan laporkan kepada kami.
                Kerjakini tidak bertanggung jawab atas segala bentuk penipuan yang mengatasnamakan kami.
                Pastikan anda hanya berkomunikasi melalui platform resmi kami.
            </p>
        </div>
    </section>

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
        const fileInput = document.getElementById('cv_file');
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
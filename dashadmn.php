<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e2e8f0);
            color: #343a40;
        }

        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #6c63ff, #7f8cfc);
            color: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .btn {
            border-radius: 20px;
        }

        .list-group-item {
            border: none;
            padding: 15px;
        }

        .list-group-item:hover {
            background-color: #f3f4f6;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="welcome-banner text-center">
            <h1>Welcome, Admin!</h1>
            <p>Manage the platform efficiently using the tools provided below.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-people-fill"></i> Data Pelamar</h5>
                        <p class="card-text">View and manage applicant data.</p>
                        <a href="pelamar_data.php" class="btn btn-primary">View Data</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-circle"></i> Data User</h5>
                        <p class="card-text">Manage platform users.</p>
                        <a href="user_data.php" class="btn btn-success">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-building"></i> Data Perusahaan</h5>
                        <p class="card-text">Handle company information.</p>
                        <a href="company_data.php" class="btn btn-info">View Companies</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistics</h5>
                        <p class="card-text">Quick overview of platform metrics.</p>
                        <ul class="list-group">
                            <li class="list-group-item">Total Applicants: <span class="badge bg-primary">120</span></li>
                            <li class="list-group-item">Active Users: <span class="badge bg-success">58</span></li>
                            <li class="list-group-item">Registered Companies: <span class="badge bg-info">34</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Activity Log</h5>
                        <p class="card-text">Latest actions on the platform.</p>
                        <ul class="list-group">
                            <li class="list-group-item">John Doe updated profile.</li>
                            <li class="list-group-item">New company registered: TechCorp.</li>
                            <li class="list-group-item">Jane Smith submitted a job application.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

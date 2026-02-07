<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texna Premium Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .menu a i {
            color: #0d6efd;
            font-size: 16px;
        }

        .menu a:hover {
            background: #f1f5ff;
            border-radius: 6px;
        }

        .x-logo {
            display: block;
            margin: 20px auto;
            width: 120px;
            height: auto;
        }

        :root {
            --primary: #4361ee;
            --secondary: #d63384;
            --accent: #4cc9f0;
            --bg: #f8f9fd;
            --sidebar-grad: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            --glass: rgba(255, 255, 255, 0.8);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg);
            color: #334155;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: var(--sidebar-grad);
            color: white;
            position: fixed;
            height: 100vh;
        }

        .sidebar-header {
            padding: 40px 20px;
            text-align: center;
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(to right, #fff, var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .menu {
            padding: 10px;
        }

        .menu a {
            display: flex;
            padding: 16px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 8px;
        }

        .menu a.active,
        .menu a:hover {
            background: var(--primary);
            color: white;
        }

        .main {
            margin-left: 280px;
            width: calc(100% - 280px);
        }

        header {
            padding: 20px 40px;
            background: var(--glass);
            display: flex;
            justify-content: space-between;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 30px 40px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 16px;
            box-shadow: var(--shadow);
        }

        .content {
            padding: 0 40px 40px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .search-box {
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            outline: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #f1f5f9;
            padding: 15px;
            font-size: 12px;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="sidebar">
            <img src="https://texna.in/SVG/Texna%20Logo%20TM.svg" class="x-logo" alt="X">
            <div class="menu">
                <a href="/dashboard">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="/employees">
                    <i class="fa-solid fa-users"></i> Employee
                </a>

                <a href="/location">
                    <i class="fa-solid fa-location-dot"></i> Locations
                </a>

                <a href="/form_list">
                    <i class="fa-solid fa-file-lines"></i> Form
                </a>

                <a href="/party_name">
                    <i class="fa-solid fa-user-tie"></i> Party Name
                </a>
                 <a href="/patterns">
                    <i class="fa-solid fa-bullhorn"></i> Patterns
                </a>

                <a href="/marketing">
                    <i class="fa-solid fa-bullhorn"></i> Marketing
                </a>
                <a href="/profile">
                    <i class="fa-solid fa-right-from-bracket"></i> Profile
                </a>

                <a href="/logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>

        </nav>
        <div class="main">
            <header>
                <h3>Dashboard</h3>
                <div style="color: var(--primary); font-weight: 600;">
                    {{ Auth::user()->name }}
                </div>

            </header>
            @yield('content')
        </div>
    </div>
</body>

</html>

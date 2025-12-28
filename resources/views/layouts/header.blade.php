<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texna Premium Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <style>
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
            <div class="sidebar-header">TEXNA</div>
            <div class="menu">
                <a href="/admin">📍 Locations</a>
                <a href="/form">👤 Form</a>
            </div>
        </nav>
        <div class="main">
            <header>
                <h3>Dashboard</h3>
                <div style="color: var(--primary); font-weight: 600;">Admin Account</div>
            </header>




            @yield('content');

        </div>

    </div>
</body>


</html>
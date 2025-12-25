<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Texna Premium Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg);
            background-image: radial-gradient(at 0% 0%, rgba(67, 97, 238, 0.05) 0px, transparent 50%),
                              radial-gradient(at 100% 100%, rgba(214, 51, 132, 0.05) 0px, transparent 50%);
            color: #334155;
            overflow-x: hidden;
        }

        .wrapper { display: flex; min-height: 100vh; }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 280px;
            background: var(--sidebar-grad);
            color: white;
            position: fixed;
            height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 10px 0 30px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 40px 20px;
            text-align: center;
            letter-spacing: 2px;
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(to right, #fff, var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .menu { padding: 10px; }
        .menu a {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .menu a:hover, .menu a.active {
            background: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(10px);
        }

        .menu a.active {
            background: var(--primary);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
        }

        /* ---------- MAIN CONTENT ---------- */
        .main {
            margin-left: 280px;
            width: calc(100% - 280px);
            transition: 0.4s;
        }

        header {
            padding: 20px 40px;
            background: var(--glass);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 99;
            border-bottom: 1px solid rgba(255,255,255,0.3);
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
            border: 1px solid rgba(255,255,255,0.8);
            transition: 0.3s;
        }

        .stat-card:hover { transform: translateY(-5px); }

        .content { padding: 0 40px 40px; }

        .card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            animation: slideUp 0.6s ease-out;
        }

        /* ---------- TABLE STYLE ---------- */
        .table-container { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { 
            text-align: left; padding: 15px; 
            background: #f8fafc; color: #64748b;
            font-weight: 600; text-transform: uppercase; font-size: 12px;
        }
        td { padding: 15px; border-bottom: 1px solid #f1f5f9; }
        tr:hover { background: #f8faff; }

        /* ---------- ANIMATIONS ---------- */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 992px) {
            .sidebar { left: -280px; }
            .sidebar.show { left: 0; }
            .main { margin-left: 0; width: 100%; }
            .menu-btn { display: block !important; cursor: pointer; font-size: 24px; }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">TEXNA</div>
        <div class="menu">
            <a href="#" class="active" onclick="showSection('employee', this)"><span>👤</span> &nbsp; Employees</a>
            <a href="#" onclick="showSection('location', this)"><span>📍</span> &nbsp; Locations</a>
            <a href="#" onclick="alert('Feature coming soon!')"><span>📊</span> &nbsp; Analytics</a>
        </div>
    </nav>

    <div class="main">
        <header>
            <div style="display: flex; align-items: center; gap: 15px;">
                <span class="menu-btn" style="display:none;" onclick="toggleSidebar()">☰</span>
                <h3 style="font-weight: 700;">Dashboard</h3>
            </div>
            <div style="font-weight: 600; color: var(--primary);">Admin Account</div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <small style="color: #64748b;">Total Staff</small>
                <h2 style="color: var(--primary);">24</h2>
            </div>
            <div class="stat-card">
                <small style="color: #64748b;">Active Tasks</small>
                <h2 style="color: var(--secondary);">12</h2>
            </div>
        </div>

        <div class="content">
            <div class="card" id="employee">
                <div style="display:flex; justify-content: space-between; align-items: center;">
                    <h4 style="font-size: 1.2rem;">Team Members</h4>
                    <button style="background: var(--primary); color: white; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer;">+ Add New</button>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Rahul Patel</strong></td>
                                <td>Technician</td>
                                <td><span style="background: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 6px; font-size: 12px;">Active</span></td>
                                <td>9876543210</td>
                            </tr>
                            <tr>
                                <td><strong>Imran Sheikh</strong></td>
                                <td>Supervisor</td>
                                <td><span style="background: #dcfce7; color: #166534; padding: 4px 8px; border-radius: 6px; font-size: 12px;">Active</span></td>
                                <td>9123456789</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card" id="location" style="display:none;">
                <h4 style="color: var(--secondary);">Headquarters</h4>
                <div style="margin-top: 20px; line-height: 1.8;">
                    <p><strong>Texna Industrial Solutions</strong></p>
                    <p>Plot No. 45, Sachin GIDC, Surat</p>
                    <p>Gujarat, India - 394230</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showSection(sectionId, element) {
        document.getElementById("employee").style.display = "none";
        document.getElementById("location").style.display = "none";
        document.getElementById(sectionId).style.display = "block";
        document.querySelectorAll(".menu a").forEach(a => a.classList.remove("active"));
        element.classList.add("active");
        if(window.innerWidth <= 992) {
            toggleSidebar();
        }
    }

    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("show");
    }
</script>

</body>
</html>
@extends('layouts.header')
@section('content')
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

        /* SIDEBAR */
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

        /* SEARCH */
        .search-box {
            padding: 8px 14px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            outline: none;
        }

        /* TABLE */
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

        #employeeTable {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        #employeeTable th,
        #employeeTable td {
            padding: 14px 16px;
            text-align: left;
            vertical-align: middle;
            white-space: nowrap;
        }

        #employeeTable th:nth-child(1),
        #employeeTable td:nth-child(1) {
            width: 25%;
        }

        #employeeTable th:nth-child(2),
        #employeeTable td:nth-child(2) {
            width: 20%;
        }

        #employeeTable th:nth-child(3),
        #employeeTable td:nth-child(3) {
            width: 25%;
        }

        #employeeTable th:nth-child(4),
        #employeeTable td:nth-child(4) {
            width: 10%;
            text-align: center;
        }

        #employeeTable th:nth-child(5),
        #employeeTable td:nth-child(5) {
            width: 15%;
            text-align: center;
        }
    </style>
    <body>
        <div class="content">
            <div class="card" id="employee">
                <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                    <h4>Team Members</h4>
                    <input type="text" class="search-box" placeholder="Search employee..." id="searchInput">
                </div>
                <table id="employeeTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Contact</th>
                            <th>Created Time</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
                <div id="pagination" style="margin-top:20px; display:flex; gap:8px; flex-wrap:wrap;"></div>
            </div>
        </div>
        </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const employees = @json($employees);
                console.log(employees);
                let currentPage = 1;
                const rowsPerPage = 10;
                let filteredData = employees;
                const tbody = document.getElementById("tableBody");
                const searchInput = document.getElementById("searchInput");

                function renderTable() {
                    tbody.innerHTML = "";
                    const start = (currentPage - 1) * rowsPerPage;
                    const end = start + rowsPerPage;
                    filteredData.slice(start, end).forEach(emp => {
                        tbody.innerHTML += `
                <tr>
                    <td>${emp.employee.username}</td>
                    <td>${emp.employee.status == 1 ? 'Active' : 'Inactive'}</td>
                    <td>${emp.employee.mobile_no}</td>
                    <td>${formatTime(emp.created_at)}</td>
                    <td>
                        <span style="cursor:pointer"
                              onclick="openMap(${emp.lang}, ${emp.long})">
                              📍
                        </span>
                    </td>
                </tr>
               `;
                    });
                }
                searchInput.addEventListener("keyup", function() {
                    const value = this.value.toLowerCase();
                    filteredData = employees.filter(emp =>
                        emp.employee.username.toLowerCase().includes(value) ||
                        emp.employee.mobile_no.includes(value)
                    );
                    renderTable();
                });
                renderTable();
            });

            function formatTime(dateStr) {
                const date = new Date(dateStr);
                return date.toLocaleTimeString("en-IN", {
                    hour: "2-digit",
                    minute: "2-digit",
                    hour12: true
                });
            }

            function openMap(lat, long) {
                window.open(`https://www.google.com/maps?q=${lat},${long}`, "_blank");
            }

            const menuLinks = document.querySelectorAll('.menu a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    menuLinks.forEach(link => link.classList.remove('active'));
                    link.classList.add('active');
                });
            });
            const currentUrl = window.location.pathname;
            menuLinks.forEach(link => {
                if (link.href.includes(currentUrl)) {
                    link.classList.add('active');
                }
            });
        </script>
    @endsection

@extends('layouts.header')
@section('content')
    <div class="content">
        <div class="card" id="employee">
            <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                <h4>FOrm Order</h4>
                <input type="text" class="search-box" id="searchInput" placeholder="Search name, phone, status...">
            </div>
            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Form N</th>
                        <th>Jala type</th>
                        <th>Party Name</th>
                        <th>Number</th>
                        <th>Address-1</th>
                        <th>Address-2</th>
                        <th>Address-3</th>
                        <th>Reed</th>
                        <th>tar</th>
                        <th>No Jala</th>
                        <th>Del date</th>

                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="pagination"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            // Dummy data
            const employees = [{
                    id: 1,
                    form_no: "F-101",
                    jala_type: "Type A",
                    party_name: "Ramesh",
                    number: "9876543210",
                    address1: "Chennai",
                    address2: "TN",
                    address3: "India",
                    reed: "Yes",
                    tar: "High",
                    no_jala: 10,
                    del_date: "2025-01-05"
                },
                {
                    id: 2,
                    form_no: "F-102",
                    jala_type: "Type B",
                    party_name: "Suresh",
                    number: "9123456789",
                    address1: "Madurai",
                    address2: "TN",
                    address3: "India",
                    reed: "No",
                    tar: "Medium",
                    no_jala: 5,
                    del_date: "2025-01-10"
                },
                {
                    id: 3,
                    form_no: "F-103",
                    jala_type: "Type C",
                    party_name: "Anitha",
                    number: "9000011111",
                    address1: "Coimbatore",
                    address2: "TN",
                    address3: "India",
                    reed: "Yes",
                    tar: "Low",
                    no_jala: 8,
                    del_date: "2025-01-15"
                }
            ];

            // Render table rows
            function renderTable(data) {
                let rows = "";

                if (data.length === 0) {
                    rows = `<tr>
                        <td colspan="12" style="text-align:center;">No records found</td>
                    </tr>`;
                } else {
                    $.each(data, function(i, emp) {
                        rows += `
                    <tr>
                        <td>${emp.id}</td>
                        <td>${emp.form_no}</td>
                        <td>${emp.jala_type}</td>
                        <td>${emp.party_name}</td>
                        <td>${emp.number}</td>
                        <td>${emp.address1}</td>
                        <td>${emp.address2}</td>
                        <td>${emp.address3}</td>
                        <td>${emp.reed}</td>
                        <td>${emp.tar}</td>
                        <td>${emp.no_jala}</td>
                        <td>${emp.del_date}</td>
                    </tr>
                `;
                    });
                }

                $("#tableBody").html(rows);
            }

            // Initial load
            renderTable(employees);

            // Search functionality
            $("#searchInput").on("keyup", function() {
                const value = $(this).val().toLowerCase();

                const filtered = employees.filter(emp =>
                    Object.values(emp).some(val =>
                        val.toString().toLowerCase().includes(value)
                    )
                );

                renderTable(filtered);
            });

        });
    </script>
@endsection

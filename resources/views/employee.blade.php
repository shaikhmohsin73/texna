@extends('layouts.header')
@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <small>Total Staff</small>
            <h2>{{ $totalEmployees }}</h2>
        </div>
        <div class="stat-card">
            <small>Active Tasks</small>
            <h2>{{ $activeEmployees }}</h2>
        </div>
    </div>
    <div class="content">
        <div class="card" id="employee">
            <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                <h4>Employee</h4>
                <input type="text" class="search-box" id="searchInput" placeholder="Search name, phone, status...">
            </div>
            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Approval Status</th>
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
        $(document).ready(function() {
            fetchEmployees();
            $('#searchInput').on('keyup', function() {
                fetchEmployees($(this).val());
            });
            $(document).on('click', '#pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetchEmployees($('#searchInput').val(), page);
            });

            function fetchEmployees(search = '', page = 1) {
                $.ajax({
                    url: "{{ route('employee.ajax') }}",
                    type: "GET",
                    data: {
                        search: search,
                        page: page
                    },
                    success: function(res) {
                        let rows = '';
                        $.each(res.employees.data, function(i, emp) {
                            let statusText = emp.status == 1 ?
                                '<span style="color:green">Active</span>' :
                                '<span style="color:red">Inactive</span>';

                            rows += `
                        <tr>
                            <td>${emp.id}</td>
                            <td>${emp.username}</td>
                            <td>${emp.mobile_no}</td>
                            <td>${emp.email}</td>
                            <td>${emp.photo ? `<a href="/storage/${emp.photo}" target="_blank">
                                                <img src="/storage/${emp.photo}" width="40" style="cursor:pointer; border-radius:4px;">
                                            </a>` 
                                    : 'N/A'}
                            </td>

                            <td>${emp.role}</td>
                            <td>${statusText}</td>
                            <td>
                            <select class="approval-status form-select" data-id="${emp.id}" style="width:120px; padding:4px;">
                                <option value="pending" ${emp.approval_status == 'pending' ? 'selected' : ''}>🕒 Pending</option>
                                <option value="approved" ${emp.approval_status == 'approved' ? 'selected' : ''}>✅ Approved</option>
                                <option value="cancelled" ${emp.approval_status == 'cancelled' ? 'selected' : ''}>❌ Cancelled</option>
                            </select>
                        </td>

                        </tr>
                    `;
                        });

                        $('#tableBody').html(rows);
                        let pagination = '';
                        $.each(res.employees.links, function(i, link) {
                            if (link.url) {
                                pagination +=
                                    `<a href="${link.url}" style="margin:5px;">${link.label}</a>`;
                            }
                        });
                        $('#pagination').html(pagination);
                    }
                });
            }
            $(document).on('change', '.approval-status', function() {
                let employeeId = $(this).data('id');
                let approvalStatus = $(this).val();
                let selectElement = $(this);
                Swal.fire({
                    title: `Do you want to change status to "${approvalStatus}"?`,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it',
                    denyButtonText: "No, keep previous",
                    cancelButtonText: "Cancel"
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('employee.updateApproval') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: employeeId,
                                approval_status: approvalStatus
                            },
                            success: function(res) {
                                Swal.fire("Saved!", res.message, "success");
                                fetchEmployees($('#searchInput').val());
                            },
                            error: function() {
                                Swal.fire("Error!", "Something went wrong.", "error");
                                fetchEmployees($('#searchInput').val());
                            }
                        });

                    } else if (result.isDenied || result.isDismissed) {
                        fetchEmployees($('#searchInput').val());
                    }
                });
            });

        });
    </script>
@endsection

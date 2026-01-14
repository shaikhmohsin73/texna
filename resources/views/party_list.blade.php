@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .add-btn {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .add-btn i {
            font-size: 13px;
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #0a58ca, #084298);
            transform: translateY(-1px);
            color: #fff;
        }

        .view-icon {
            color: #28a745;
        }

        .edit-icon {
            color: #007bff;
        }

        .delete-icon {
            color: #dc3545;
        }

        .pagination {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 15px;
            list-style: none;
            padding: 0;
        }

        .pagination li a {
            padding: 6px 12px;
            border: 1px solid #ddd;
            cursor: pointer;
            border-radius: 4px;
            color: #007bff;
            text-decoration: none;
        }

        .pagination li.active a {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination li.disabled a {
            pointer-events: none;
            color: #aaa;
        }

        .status-active {
            color: green;
            font-weight: 600;
        }

        .action-icon {
            cursor: pointer;
            margin: 0 6px;
            font-size: 16px;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .action-icon:hover {
            transform: scale(1.2);
            opacity: 0.85;
        }
    </style>

    <div class="content">

        <div class="card" id="employee">
            <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                <h4>Part Name</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div style="display:flex; gap:10px; align-items:center;">
                    <input type="text" class="search-box" id="searchInput" placeholder="Search name, phone, status...">

                    <a href="{{ route('party.create') }}" class="add-btn">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                </div>
            </div>

            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Serial Number</th>
                        <th>Party Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Status</th>
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
            fetchData();

            function fetchData(search = '', page = 1) {
                $.get("{{ route('party.list') }}", {
                    search,
                    page
                }, function(res) {

                    let rows = '';
                    if (res.data.length === 0) {
                        rows = `<tr><td colspan="6" class="text-center">No data found</td></tr>`;
                    } else {
                        $.each(res.data, function(_, item) {
                            rows += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.sr_no ?? '-'}</td>
                            <td>${item.party_name}</td>
                            <td>${item.mobile_no}</td>
                            <td>${item.address ?? '-'}</td>
                            <td class="text-center">
                                <i class="fa-solid fa-eye action-icon viewBtn view-icon" data-id="${item.id}"></i>
                                <i class="fa-solid fa-pen-to-square action-icon editBtn edit-icon" data-id="${item.id}"></i>
                                <i class="fa-solid fa-trash action-icon deleteBtn delete-icon" data-id="${item.id}"></i>
                            </td>
                        </tr>
                    `;
                        });
                    }
                    $('#tableBody').html(rows);
                    renderPagination(res);
                });
            }

            function renderPagination(res) {
                let html = `<ul class="pagination">`;
                html += `
                <li class="${res.current_page === 1 ? 'disabled' : ''}">
                    <a data-page="${res.current_page - 1}">‹</a>
                </li>`;
                let start = Math.max(1, res.current_page - 2);
                let end = Math.min(res.last_page, res.current_page + 2);
                for (let i = start; i <= end; i++) {
                    html += `
                <li class="${res.current_page === i ? 'active' : ''}">
                    <a data-page="${i}">${i}</a>
                </li>`;
                }
                html += `
                <li class="${res.current_page === res.last_page ? 'disabled' : ''}">
                    <a data-page="${res.current_page + 1}">›</a>
                </li>`;
                html += `</ul>`;
                $('#pagination').html(html);
            }
            $(document).on('click', '.pagination a', function() {
                let page = $(this).data('page');
                if (!page) return;

                fetchData($('#searchInput').val(), page);
            });

            $('#searchInput').on('keyup', function() {
                fetchData($(this).val(), 1);
            });

        });
        $(document).on('click', '.viewBtn', function() {
            let id = $(this).data('id');
            window.location.href = `/party/view/${id}`;
        });
        $(document).on('click', '.editBtn', function() {
            let id = $(this).data('id');
            window.location.href = `/party/edit/${id}`;
        });
        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This record will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/party/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(res) {
                            Swal.fire('Deleted!', res.message, 'success').then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection

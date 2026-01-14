@extends('layouts.header')
@section('content')
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

        .pagination {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 15px;
            list-style: none;
            padding: 0;
        }

        #pagination {
            margin-top: 15px;
            display: flex;
            gap: 5px;
            justify-content: center;
            flex-wrap: wrap;
        }

        #pagination .page-btn {
            background-color: #868686;
            border: none;
            color: white;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        #pagination .page-btn:hover {
            background-color: #0056b3;
        }

        #pagination .page-btn.active {
            background-color: #0056b3;
            cursor: default;
        }

        #pagination span {
            padding: 6px 8px;
            font-weight: 600;
            color: #444;
            user-select: none;
        }
    </style>
    <style>
        .alert-danger {
            background-color: #f8d7da !important;
            color: #842029 !important;
            border: 1px solid #f5c2c7 !important;
        }

        .alert-success {
            background-color: #d1e7dd !important;
            color: #0f5132 !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="content">
        <div class="card" id="employee">
            <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                <h4>Marketing</h4>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="text" class="search-box" id="searchInput" placeholder="Search name, phone, status..."
                        style="margin-bottom: 0;">
                    <a href="{{ route('marketing.create') }}" class="add-btn">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Part Name</th>
                        <th>Firm Name</th>
                        <th>Phone </th>
                        <th>Address</th>
                        <th>Current Machine</th>
                        <th>Upcoming Machine</th>
                        <th>Enquiry</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="pagination" class="pagination"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchData(page = 1, search = '') {
            $.ajax({
                url: "{{ route('marketing.data') }}",
                method: "GET",
                data: {
                    page: page,
                    search: search,
                    per_page: 10
                },
                success: function(response) {
                    let rows = '';
                    response.data.forEach(item => {
                        let editUrl = '/marketing/' + item.id + '/edit';
                        let deleteUrl = '/marketing/' + item.id;
                        rows += `<tr>
                    <td>${item.date ? new Date(item.date).toLocaleDateString() : ''}</td>
                    <td>${item.naam}</td>
                    <td>${item.company_name}</td>
                    <td>${item.number}</td>
                    <td>${item.address}</td>
                    <td>${item.current_machine}</td>
                    <td>${item.new_machine}</td>
                    <td>${item.jala_type}</td>
                   <td>
                        ${item.image_name 
                            ? `<a href="/${item.image_name}" target="_blank">
                                <img src="/${item.image_name}" width="80" style="cursor:pointer;">
                            </a>`
                            : 'No Image'}
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="${editUrl}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Are you sure want to delete this?');">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>                    
                </tr>`;
                    });
                    $('#tableBody').html(rows);
                    renderPagination(response.current_page, response.last_page);
                }
            });
        }

        $(document).ready(function() {
            fetchData();
            $('#searchInput').on('keyup', function() {
                let query = $(this).val();
                fetchData(1, query);
            });
            $(document).on('click', '.page-btn', function() {
                if ($(this).hasClass('active')) return;
                let page = $(this).data('page');
                let query = $('#searchInput').val();
                fetchData(page, query);
            });
        });

        function renderPagination(current_page, last_page) {
            let paginationHtml = '';
            if (current_page > 1) {
                paginationHtml += `<button class="page-btn" data-page="${current_page - 1}">Prev</button>`;
            }
            let start = Math.max(1, current_page - 3);
            let end = Math.min(last_page, current_page + 3);
            if (start > 1) {
                paginationHtml += `<button class="page-btn" data-page="1">1</button>`;
                if (start > 2) {
                    paginationHtml += `<span>...</span>`;
                }
            }
            for (let i = start; i <= end; i++) {
                paginationHtml +=
                    `<button class="page-btn ${i === current_page ? 'active' : ''}" data-page="${i}">${i}</button>`;
            }
            if (end < last_page) {
                if (end < last_page - 1) {
                    paginationHtml += `<span>...</span>`;
                }
                paginationHtml += `<button class="page-btn" data-page="${last_page}">${last_page}</button>`;
            }
            if (current_page < last_page) {
                paginationHtml += `<button class="page-btn" data-page="${current_page + 1}">Next</button>`;
            }
            $('#pagination').html(paginationHtml);
        }
        $(document).ready(function() {
            fetchData();

            $('#searchInput').on('keyup', function() {
                let query = $(this).val();
                fetchData(1, query);
            });

            $(document).on('click', '.page-btn', function() {
                let page = $(this).data('page');
                let query = $('#searchInput').val();
                fetchData(page, query);
            });
        });
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

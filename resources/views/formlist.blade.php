@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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

        .excel {
            background: linear-gradient(135deg, #075800, #075800);
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

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            font-weight: 600;
            border-radius: 20px;
            font-size: 0.85rem;
            color: #fff;
        }

        .status-side {
            background-color: #dc3545;
        }

        .status-running {
            background-color: #0d6efd;
        }

        .status-complete {
            background-color: #198754;
        }

        .action-icons a {
            margin-right: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .action-edit {
            color: #0d6efd;
            background-color: #e7f1ff;
        }

        .action-print {
            color: #000;
            background-color: #f0f0f0;
        }

        .action-pdf {
            color: #dc3545;
            background-color: #fcebea;
        }

        .action-icons a:hover {
            filter: brightness(85%);
            text-decoration: none;
            cursor: pointer;
        }

        .action-icons {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .action-icons a {
            margin: 0;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 6px 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
    </style>
    <div class="content">
        <div class="card" id="employee">
            <div style="display:flex; justify-content: space-between; align-items: center; gap:10px;">
                <h4>Form Order</h4>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div style="display:flex; gap:10px; align-items:center;">
                    <input type="text" class="search-box" id="searchInput" placeholder="Search name, phone, status...">
                    <a href="{{ route('form_create') }}" class="add-btn">
                        <i class="fa-solid fa-plus"></i> Add New
                    </a>
                    <button id="exportExcel" class="excel">
                        <i class="fa-solid fa-file-excel"></i> Export Excel
                    </button>
                </div>
            </div>

            <table id="employeeTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Form No</th>
                        <th>Jala type</th>
                        <th>Party Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Reed</th>
                        <th>tar</th>
                        <th>No Jala</th>
                        <th>Del date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="pagination"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            fetchForms();

            function fetchForms(search = '') {
                $.ajax({
                    url: "{{ route('form_list.data') }}",
                    type: "GET",
                    data: {
                        search: search
                    },
                    dataType: "json",
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, item) {

                            let statusBadge = '';
                            if (item.status === 'side file') {
                                statusBadge = `
                            <span class="badge status-side">
                                <i class="fas fa-folder-open"></i> Side File
                            </span>`;
                            } else if (item.status === 'running') {
                                statusBadge = `
                            <span class="badge status-running">
                                <i class="fas fa-spinner fa-spin"></i> Running
                            </span>`;
                            } else if (item.status === 'complate') {
                                statusBadge = `
                            <span class="badge status-complete">
                                <i class="fas fa-check-circle"></i> Complete
                            </span>`;
                            }

                            html += `
                        <tr>
                            <td>
                                <input type="checkbox" class="rowCheckbox" value="${item.id}">
                            </td>
                            <td>${item.bill_no ?? ''}</td>
                            <td>${item.jala_no ?? ''}</td>
                            <td>${item.firm_name ?? ''}</td>
                            <td>${item.mo_no ?? ''}</td>
                            <td>${item.address ?? ''}</td>
                            <td>${item.f_reed ?? ''}</td>
                            <td>${item.t_tar ?? ''}</td>
                            <td>${item.jala_no ?? ''}</td>
                            <td>${formatDate(item.del_date ?? '')}</td>
                            <td>${statusBadge}</td>
                            <td class="action-icons">
                                <a href="/form_edit/${item.id}" class="action-edit" title="Edit">
                                    <i class="fas fa-user-pen"></i>
                                </a>

                                <a href="/production-cards/${item.id}/print" target="_blank" class="action-print" title="Print">
                                    <i class="fas fa-print"></i>
                                </a>

                                <a href="/production-cards/${item.id}/pdf" target="_blank" class="action-pdf" title="PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </a>

                                <a href="/pattern-file/${item.id}" target="_blank" class="action-pattern" title="Pattern File">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                        });

                        $('#tableBody').html(html);
                    },
                    error: function() {
                        alert('AJAX Error: Data not loaded');
                    }
                });
            }

            $('#searchInput').on('keyup', function() {
                let value = $(this).val().toLowerCase();
                $('#tableBody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            function formatDate(dateStr) {
                if (!dateStr) return '';
                const date = new Date(dateStr);
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });

        $('#selectAll').on('change', function() {
            $('.rowCheckbox').prop('checked', this.checked);
        });
        $('#exportExcel').on('click', function() {
            let selectedIds = [];

            $('.rowCheckbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                alert('Please select at least one record');
                return;
            }
            window.location.href = "{{ route('form.export') }}?ids=" + selectedIds.join(',');
        });
    </script>
@endsection

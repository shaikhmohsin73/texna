@extends('layouts.header')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container my-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Pattern List</h3>
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Search pattern no..." style="max-width: 250px;">
                <a href="{{ route('patterns.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Add Pattern
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-uppercase">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Pattern No</th>
                        <th style="width: 230px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patterns as $pattern)
                        <tr>
                            <td>{{ $pattern->id }}</td>
                            <td>{{ $pattern->pattern_no }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/' . $pattern->pattern_file) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fa-solid fa-file-pdf"></i> View
                                    </a>
                                    <a href="{{ route('patterns.edit', $pattern->id) }}"
                                        class="btn btn-sm btn-warning text-white">
                                        <i class="fa-solid fa-pen"></i> Edit
                                    </a>
                                    <form action="{{ route('patterns.delete', $pattern->id) }}" method="GET"
                                        onsubmit="return confirm('Are you sure to delete?');">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No patterns found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

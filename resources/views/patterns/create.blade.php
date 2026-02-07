@extends('layouts.header')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body {
            background: #f8f9fa;
        }

        .form-container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 30px 40px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            border: none;
            color: #fff;
            transition: background 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #0a58ca, #084298);
            color: #fff;
        }
    </style>

    <div class="form-container">

        <h2 class="mb-4 text-center fw-bold">Add New Pattern</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fa-solid fa-exclamation-circle me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/patterns" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-floating mb-4">
                <input type="text" name="pattern_no" id="pattern_no" class="form-control" placeholder="Pattern No"
                    required value="{{ old('pattern_no') }}">
                <label for="pattern_no">Pattern No</label>
            </div>

            <div class="mb-4">
                <label for="pattern_file" class="form-label fw-semibold">Pattern PDF <span
                        class="text-danger">*</span></label>
                <input type="file" name="pattern_file" id="pattern_file" class="form-control" accept="application/pdf"
                    required>
                <div class="form-text">Only PDF files allowed (max 2MB).</div>
            </div>

            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-gradient px-5 py-2 fs-5">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save
                </button>
                <a href="{{ url('/patterns') }}" class="btn btn-outline-secondary px-5 py-2 fs-5">
                    Cancel
                </a>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection

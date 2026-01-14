@extends('layouts.header')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container my-5" style="max-width: 700px;">
        <h2 class="mb-4 text-primary">Add New Marketing Entry</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('marketing.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="mb-3">
                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                    value="{{ old('date') }}" required>
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="naam" class="form-label">Part Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('naam') is-invalid @enderror" id="naam" name="naam"
                    placeholder="Enter part name" value="{{ old('naam') }}" required>
                @error('naam')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="company_name" class="form-label">Firm Name (COMPANY NAME)<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                    name="company_name" placeholder="Enter firm name" value="{{ old('company_name') }}" required>
                @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="number" class="form-label">Phone</label>
                <input type="number" class="form-control @error('number') is-invalid @enderror" id="number"
                    name="number" placeholder="Enter phone number" value="{{ old('number') }}">
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                    placeholder="Enter address">{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="current_machine" class="form-label">Current Machine</label>
                <input type="text" class="form-control @error('current_machine') is-invalid @enderror"
                    id="current_machine" name="current_machine" placeholder="Enter current machine"
                    value="{{ old('current_machine') }}">
                @error('current_machine')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_machine" class="form-label">Upcoming Machine</label>
                <input type="text" class="form-control @error('new_machine') is-invalid @enderror" id="new_machine"
                    name="new_machine" placeholder="Enter upcoming machine" value="{{ old('new_machine') }}">
                @error('new_machine')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image_name" class="form-label">Image</label>
                <input type="file" class="form-control @error('image_name') is-invalid @enderror" id="image_name"
                    name="image_name" accept="image/*">

                @error('image_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jala_type" class="form-label">Enquiry</label>
                <textarea class="form-control @error('jala_type') is-invalid @enderror" id="jala_type" name="jala_type"
                    placeholder="Enter enquiry details">{{ old('jala_type') }}</textarea>

                @error('jala_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('marketing') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>

        </form>
    </div>
@endsection

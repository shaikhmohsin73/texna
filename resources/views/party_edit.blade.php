@extends('layouts.header')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="content">
    <div class="card p-4" style="max-width:600px; margin:auto;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Edit Party</h4>
            <a href="{{ route('party_name') }}" class="btn btn-sm btn-secondary">
                ← Back
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('party.update', $party->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- SR No (Read-only) --}}
            <div class="mb-3">
                <label class="form-label">Serial Number</label>
                <input type="text" class="form-control" value="{{ $party->sr_no }}" readonly>
            </div>

            {{-- Party Name --}}
            <div class="mb-3">
                <label class="form-label">Party Name <span class="text-danger">*</span></label>
                <input type="text" name="party_name"
                       class="form-control @error('party_name') is-invalid @enderror"
                       value="{{ old('party_name', $party->party_name) }}"
                       placeholder="Enter party name">
                @error('party_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Mobile Number --}}
            <div class="mb-3">
                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                <input type="text" name="mobile_no"
                       class="form-control @error('mobile_no') is-invalid @enderror"
                       value="{{ old('mobile_no', $party->mobile_no) }}"
                       placeholder="Enter mobile number">
                @error('mobile_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address"
                          class="form-control @error('address') is-invalid @enderror"
                          rows="3"
                          placeholder="Enter address">{{ old('address', $party->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-light">Reset</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

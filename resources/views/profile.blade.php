@extends('layouts.header')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header fw-bold">
                        My Profile
                    </div>

                    <div class="card-body">

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <hr>

                        <h5 class="mb-3">Change Password</h5>

                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" name="old_password" class="form-control" required>
                                @error('old_password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror

                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button class="btn btn-primary w-100">
                                Update Password
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

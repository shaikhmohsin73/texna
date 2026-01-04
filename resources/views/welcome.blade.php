<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEXNA | Secure Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ===== Core Styling ===== */
        body {
            min-height: 100vh;
            /* Requested Gradient */
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 20px;
            /* Prevents card touching edges on small screens */
        }

        /* ===== Responsive Card ===== */
        .auth-card {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.05);
            /* Slight glass effect */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);

            /* Animation Trigger */
            animation: slideInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* ===== TEXNA Branding ===== */
        .brand-title {
            font-weight: 800;
            font-size: 2rem;
            letter-spacing: 4px;
            color: #3b82f6;
            /* Modern Blue */
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        /* ===== Inputs & Form ===== */
        .form-label {
            color: #cbd5e1;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid #334155;
            color: #f8fafc;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
            color: #fff;
        }

        .btn-primary {
            background-color: #3b82f6;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            margin-top: 1rem;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* ===== Mobile & Animation ===== */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .footer-link:hover {
            color: #3b82f6;
        }

        /* Mobile adjustments */
        @media (max-width: 480px) {
            .auth-card {
                padding: 1.5rem;
            }

            .brand-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="text-center">
            <img src="https://texna.in/SVG/Texna%20Logo%20TM.svg" class="x-logo" alt="X">
            <p class="subtitle">Enter your credentials to continue</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger py-2">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="name@company.com" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 shadow">Sign In</button>
        </form>
    </div>
</body>

</html>

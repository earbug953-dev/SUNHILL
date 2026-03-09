<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Profile') }} - SUNHILL</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Optional: keep Unicons if you prefer their style -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css"> -->

    <style>
        body {
            background: #000;
            color: #e0e0e0;
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 260px;
            background: linear-gradient(180deg, #0a0a0a 0%, #0f0f0f 100%);
            border-right: 1px solid #222;
            padding: 1.5rem 1rem;
            overflow-y: auto;
            z-index: 1030;
            transition: transform 0.3s ease;
        }

        .sidebar-brand img {
            max-width: 140px;
        }

        .nav-link {
            color: #a0a0a0;
            padding: 0.85rem 1.25rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0.35rem 0;
            transition: all 0.25s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(59, 130, 246, 0.12);
            color: #60a5fa;
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem;
            transition: margin-left 0.3s ease;
        }

        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1040;
            background: #3b82f6;
            border: none;
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            font-size: 1.4rem;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            z-index: 1020;
        }

        .sidebar-overlay.active,
        .sidebar.active {
            display: block;
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
            }
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .sidebar-toggle {
                display: block;
            }
        }

        .card-dark {
            background: #111;
            border: 1px solid #333;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.4);
        }

        .form-label {
            color: #d1d5db;
            font-weight: 600;
        }

        .form-control {
            background: #1f2937;
            border: 1px solid #4b5563;
            color: white;
        }

        .form-control:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 0.25rem rgba(59,130,246,.25);
        }

        .btn-primary {
            background: #3b82f6;
            border: none;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-danger {
            background: #ef4444;
            border: none;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .text-gradient-primary {
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body>

<button class="sidebar-toggle" id="sidebarToggle">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
    <a href="{{ route('user.dashboard') }}" class="sidebar-brand d-block text-center mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="SUNHILL Logo">
    </a>

    <nav>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.packages') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Packages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.deposit') }}">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Deposit</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.withdraw') }}">
                    <i class="bi bi-cash-stack"></i>
                    <span>Withdraw</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.transactions') }}">
                    <i class="bi bi-receipt-cutoff"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('profile.edit') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
        </ul>

        <hr class="border-secondary my-4">

        <form method="POST" action="{{ route('logout') }}" class="px-2">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2" onclick="return confirm('Are you sure you want to logout?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

<main class="main-content">
    <div class="container-xl">

        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
            <h1 class="display-5 fw-bold text-gradient-primary">
                <i class="bi bi-person-circle me-2"></i> Profile Settings
            </h1>
            <span class="text-secondary fs-5">{{ now()->format('l, d M Y') }}</span>
        </div>

        <!-- Profile Information -->
        <div class="card card-dark mb-4">
            <div class="card-body p-4 p-lg-5">
                <h2 class="h4 mb-1"><i class="bi bi-person me-2 text-info"></i> Profile Information</h2>
                <p class="text-secondary mb-4">{{ __("Update your account's profile information and email address.") }}</p>

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-4">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" name="name" type="text" class="form-control form-control-lg" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" name="email" type="email" class="form-control form-control-lg" value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3">
                                <p class="text-warning small mb-2">{{ __('Your email address is unverified.') }}</p>
                                <form method="post" action="{{ route('verification.send') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link btn-sm p-0 align-baseline">
                                        {{ __('Click here to re-send verification email.') }}
                                    </button>
                                </form>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="text-success small mt-2">{{ __('Verification link sent!') }}</p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="d-flex gap-3 align-items-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="bi bi-check-circle me-2"></i> {{ __('Save Changes') }}
                        </button>

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success d-inline-block py-2 px-3 mb-0">
                                {{ __('Profile updated successfully.') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="card card-dark mb-4">
            <div class="card-body p-4 p-lg-5">
                <h2 class="h4 mb-1"><i class="bi bi-lock me-2 text-warning"></i> Update Password</h2>
                <p class="text-secondary mb-4">{{ __('Ensure your account uses a strong, unique password.') }}</p>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                        <input id="current_password" name="current_password" type="password" class="form-control form-control-lg" autocomplete="current-password" required>
                        @error('current_password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('New Password') }}</label>
                        <input id="password" name="password" type="password" class="form-control form-control-lg" autocomplete="new-password" required>
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg" autocomplete="new-password" required>
                    </div>

                    <div class="d-flex gap-3 align-items-center">
                        <button type="submit" class="btn btn-primary btn-lg px-5">
                            <i class="bi bi-check-circle me-2"></i> {{ __('Update Password') }}
                        </button>

                        @if (session('status') === 'password-updated')
                            <div class="alert alert-success d-inline-block py-2 px-3 mb-0">
                                {{ __('Password updated successfully.') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Account -->
        <div class="card card-dark border-danger">
            <div class="card-body p-4 p-lg-5">
                <h2 class="h4 mb-1 text-danger"><i class="bi bi-trash me-2"></i> Delete Account</h2>
                <p class="text-secondary mb-4">
                    {{ __('Permanently delete your account and all associated data. This action cannot be undone.') }}
                </p>

                <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    <i class="bi bi-trash me-2"></i> {{ __('Delete My Account') }}
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="deleteAccountModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Account Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p class="mb-4">{{ __('This action is permanent and cannot be undone.') }}</p>
                    <div class="mb-3">
                        <label for="delete_password" class="form-label">{{ __('Enter your password to confirm') }}</label>
                        <input type="password" name="password" id="delete_password" class="form-control form-control-lg" required autocomplete="current-password">
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    toggle?.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay?.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });

    // Close sidebar when clicking nav link on mobile
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 993) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });
    });
</script>

</body>
</html>

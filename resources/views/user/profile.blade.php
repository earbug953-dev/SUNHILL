<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Account Settings - TESLA</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Unicons (optional - can remove if not needed) -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    body {
      background: #000;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px;
      background: black;
      border-right: 1px solid #222;
      padding: 1.5rem 1rem;
      overflow-y: auto;
      z-index: 1000;
    }

    .sidebar-brand {
      font-size: 1.75rem;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 1rem 0 2rem;
      text-align: center;
      border-bottom: 1px solid #222;
    }

    .nav-link {
      color: #ccc;
      padding: 0.75rem 1.25rem;
      border-radius: 8px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 0.25rem 0;
    }

    .nav-link:hover,
    .nav-link.active {
      background: #1a1a1a;
      color: #fff;
    }

    /* Main content offset */
    .main-content {
      margin-left: 260px;
      padding: 2rem;
    }

    @media (max-width: 992px) {
      .sidebar { width: 220px; }
      .main-content { margin-left: 220px; }
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        border-right: none;
        border-bottom: 1px solid #222;
      }
      .main-content {
        margin-left: 0;
        padding-top: 1rem;
      }
    }

    /* Card & Form Styling */
    .card-dark {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.5);
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
      border-radius: 8px;
    }

    .form-control-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .btn-save {
      background: #22c55e;
      border: none;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
    }

    .btn-save:hover {
      background: #16a34a;
    }

    .btn-danger-custom {
      background: #ef4444;
      border: none;
    }

    .btn-danger-custom:hover {
      background: #dc2626;
    }

    .topbar {
      background: #111;
      border-radius: 12px;
      padding: 1.25rem 1.75rem;
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>

<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand"><img src="{{ asset('images/logo.png') }}" width="100" height="50" alt="TESLA Logo"></a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
          <i class="uil uil-home"></i> Home
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.packages') }}">
          <i class="uil uil-package"></i> Packages
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.deposit') }}">
          <i class="uil uil-dollar-sign"></i> Deposit
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.withdraw') }}">
          <i class="uil uil-money-withdraw"></i> Withdraw
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.transactions') }}">
          <i class="uil uil-receipt"></i> Transactions
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.profile') }}">
          <i class="uil uil-user"></i> Profile
        </a>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ url('/logout') }}"
          onsubmit="return confirm('Are you sure you want to logout?')">
          @csrf
        <button class="nav-link text-danger border-0 bg-transparent">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
        </form>
      </li>
    </ul>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Top Bar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <h4 class="mb-0 fw-bold">Account Settings</h4>
      <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
    </div>

    <!-- Alerts -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-10">

        <div class="card card-dark shadow-lg">
          <div class="card-body p-4 p-lg-5">

            <!-- Tabs -->
            <ul class="nav nav-tabs mb-5 border-bottom border-secondary">
              <li class="nav-item">
                <button class="nav-link active fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#profile">
                  Edit Profile
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#security">
                  Password & Security
                </button>
              </li>
            </ul>

            <div class="tab-content">

              <!-- PROFILE TAB -->
              <div class="tab-pane fade show active" id="profile">
                <form method="POST" action="{{ route('edit.profile', $user->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="row g-4">
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Full Name</label>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-lg form-control-dark" required>
                      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Username</label>
                      <input type="text" name="username" value="{{ $user->username }}" class="form-control form-control-lg form-control-dark" required>
                      @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Email Address</label>
                      <input type="email" name="email" value="{{ $user->email }}" class="form-control form-control-lg form-control-dark" required>
                      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Phone Number</label>
                      <input type="tel" name="phone" value="{{ $user->phone }}" class="form-control form-control-lg form-control-dark">
                      @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                  </div>

                  <div class="text-end mt-5">
                    <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save Profile</button>
                  </div>
                </form>
              </div>

              <!-- SECURITY TAB -->
              <div class="tab-pane fade" id="security">
                <form method="POST" action="{{ route('change.password', $user->id) }}">
                  @csrf
                  @method('PUT')

                  <div class="row g-4">
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Current Password</label>
                      <input type="password" name="current_password" class="form-control form-control-lg form-control-dark" required>
                      @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-semibold">New Password</label>
                      <input type="password" name="new_password" class="form-control form-control-lg form-control-dark" required>
                      @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Confirm New Password</label>
                      <input type="password" name="new_password_confirmation" class="form-control form-control-lg form-control-dark" required>
                    </div>
                  </div>

                  <div class="text-end mt-5">
                    <button type="submit" class="btn btn-danger-custom btn-lg px-5 fw-bold">Update Password</button>
                  </div>
                </form>

                <hr class="my-5 border-secondary">

                <h5 class="mb-4 fw-bold">Security Options</h5>

                <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="twoFactor" checked>
                  <label class="form-check-label fs-5" for="twoFactor">
                    Enable Two-Factor Authentication
                  </label>
                </div>

                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="emailLoginAlert" checked>
                  <label class="form-check-label fs-5" for="emailLoginAlert">
                    Email me on new login from unknown device
                  </label>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

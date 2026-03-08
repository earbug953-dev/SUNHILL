<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Investment Plans - TESLA</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    body {
      background: #000;
      color: #fff;
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

    /* Plan Card */
    .plan-card {
      background: #000;
      border: 1px solid #333;
      border-radius: 12px;
      padding: 2rem;
      transition: transform 0.25s, box-shadow 0.25s;
    }

    .plan-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 32px rgba(0,0,0,0.6);
    }

    .plan-title {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #fff;
    }

    .plan-detail {
      font-size: 1.1rem;
      color: #ccc;
      margin-bottom: 0.75rem;
    }

    .form-control-dark {
      background: #111;
      border: 1px solid #444;
      color: white;
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 1.1rem;
    }

    .form-control-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .btn-invest {
      background: #fff;
      color: #000;
      font-weight: 600;
      padding: 0.9rem 1.5rem;
      border-radius: 8px;
      transition: all 0.3s;
    }

    .btn-invest:hover {
      background: #f59e0b;
      color: #000;
      transform: translateY(-2px);
    }

    .balance-box {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
      padding: 1.5rem;
      text-align: center;
    }
    /* Base page items */
    .pagination-compact .page-item .page-link {
        min-width: 32px;
        height: 32px;
        padding: 0.25rem 0.5rem;
        background: #1a1a1a;
        border: 1px solid #444;
        color: #bbb;
        border-radius: 6px !important;
        margin: 0 3px;
    }

    /* Active page */
    .pagination-compact .page-item.active .page-link {
        background: #f59e0b;
        border-color: #f59e0b;
        color: #000;
        font-weight: 600;
    }

    /* Hover effect */
    .pagination-compact .page-link:hover {
        background: #222;
        color: white;
    }

    /* Disabled state */
    .pagination-compact .page-item.disabled .page-link {
        opacity: 0.45;
        cursor: not-allowed;
    }

    /* Force black arrows only (previous/next icons) */
    .pagination-compact .page-link span,
    .pagination-compact .page-link i,
    .pagination-compact .page-link svg {
        color: #000 !important; /* black arrows */
    }

    /* Ensure disabled arrows stay grayish but still black-ish */
    .pagination-compact .page-item.disabled .page-link span,
    .pagination-compact .page-item.disabled .page-link i {
        color: #555 !important;
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
        <a class="nav-link active" href="{{ route('user.packages') }}">
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
        <a class="nav-link" href="{{ route('user.profile') }}">
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
    <h1 class="display-4 fw-bold mb-5 text-center">Investment Plans</h1>

    <div class="row justify-content-center">
      <div class="col-xl-10">

        <!-- Account Balance -->
        <div class="balance-box mb-5">
          <p class="text-secondary fs-5 mb-2">ACCOUNT BALANCE</p>
          <h3 class="fw-bold display-6 mb-0">$0.00</h3>
        </div>

        <div class="text-center mb-5">
          <h2 class="fw-bold mb-3">Choose a plan to invest</h2>
          <p class="lead text-secondary">
            Make your money work for you and earn profits by investing in our world-class auto-trading packages.
          </p>
        </div>

        <!-- Plans Grid -->
        <div class="row g-4">

          <!-- Basic Plan -->
          @forelse ($packages as $package)
            <div class="col-lg-6 col-xl-3">
              <div class="plan-card text-center h-100 d-flex flex-column">
                <h2 class="plan-title">{{ $package->name }}</h2>
                <div class="mb-4 flex-grow-1">
                  <p class="plan-detail">Investment: ${{ number_format($package->min_investment) }} - ${{ number_format($package->max_investment) }}</p>
                  <p class="plan-detail">Return: {{ $package->daily_return }}% daily for {{ $package->duration_days }} days</p>
                  <p class="plan-detail fw-semibold">Total Return: {{ $package->total_return }}%</p>
                </div>
                <form class="mt-auto">
                  <div class="mb-3">
                    <input type="number" class="form-control form-control-lg form-control-dark" placeholder="${{ number_format($package->min_investment) }}" min="{{ $package->min_investment }}" max="{{ $package->max_investment }}" required>
                  </div>
                  <button type="submit" class="btn btn-invest w-100 fw-bold">Invest Now</button>
                </form>
              </div>
            </div>
          @empty
            <div class="col-12 text-center">
              <p>No packages available.</p>
            </div>
          @endforelse

            <div class="d-flex justify-content-end mt-4">
    <div class="pagination-compact">
        {{ $packages->links('pagination::bootstrap-5') }}
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-black text-center py-4 border-top border-secondary mt-5">
  <p class="text-white-50 mb-0">
    © <span id="year"></span> TESLA. All rights reserved.
  </p>
</footer>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

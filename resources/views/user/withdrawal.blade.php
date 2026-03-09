<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Withdraw Funds - SUNHILL</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    * {
      transition: all 0.3s ease;
    }

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
      background: linear-gradient(180deg, #0a0a0a 0%, #0f0f0f 100%);
      border-right: 1px solid #222;
      padding: 1.5rem 1rem;
      overflow-y: auto;
      z-index: 1001;
      box-shadow: 2px 0 15px rgba(0, 0, 0, 0.5);
    }

    /* Sidebar Toggle - Mobile */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      background: #ef4444;
      border: none;
      color: white;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      font-size: 1.25rem;
      cursor: pointer;
      z-index: 1002;
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .sidebar-toggle:hover {
      background: #dc2626;
      transform: scale(1.05);
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1000;
    }

    .sidebar-overlay.active {
      display: block;
    }

    .sidebar-brand {
      font-size: 1.75rem;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 1.5rem 0 2rem;
      text-align: center;
      border-bottom: 1px solid #333;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, transparent, rgba(239, 68, 68, 0.1));
      border-radius: 8px;
    }

    .nav-link {
      color: #a0a0a0;
      padding: 0.85rem 1.25rem;
      border-radius: 8px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 0.35rem 0;
      position: relative;
      overflow: hidden;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background: #ef4444;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.3s ease;
    }

    .nav-link:hover {
      background: rgba(239, 68, 68, 0.1);
      color: #fff;
      padding-left: 1.5rem;
    }

    .nav-link:hover::before {
      transform: scaleY(1);
    }

    .nav-link.active {
      background: rgba(239, 68, 68, 0.15);
      color: #ef4444;
      font-weight: 600;
    }

    .nav-link.active::before {
      transform: scaleY(1);
    }

    .nav-link i {
      font-size: 1.15rem;
      min-width: 24px;
    }

    .logout-btn {
      background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.05));
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: #ef4444;
      width: 100%;
      margin-top: 1rem;
      padding: 0.85rem 1.25rem;
      border-radius: 8px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.3s;
    }

    .logout-btn:hover {
      background: linear-gradient(135deg, rgba(239, 68, 68, 0.3), rgba(239, 68, 68, 0.1));
      border-color: rgba(239, 68, 68, 0.5);
      transform: translateX(5px);
    }

    .main-content {
      margin-left: 260px;
      padding: 2rem;
    }

    /* Scrollbar styling */
    .sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar::-webkit-scrollbar-thumb {
      background: #333;
      border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
      background: #444;
    }

    @media (max-width: 992px) {
      .sidebar {
        width: 240px;
      }
      .main-content {
        margin-left: 240px;
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        max-width: 260px;
        height: 100vh;
        left: -100%;
        position: fixed;
        border-right: 1px solid #222;
        border-bottom: none;
      }

      .sidebar.active {
        left: 0;
      }

      .main-content {
        margin-left: 0;
        padding-top: 4rem;
      }

      .sidebar-toggle {
        display: block;
      }

      .nav-link {
        padding: 0.75rem 1rem;
      }
    }

    .card-dark {
      background: linear-gradient(135deg, #111 0%, #1a1a1a 100%);
      border: 1px solid #333;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    }

    .card-dark .card-header {
      background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
      border-bottom: 1px solid #333;
      border-radius: 15px 15px 0 0;
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
      border-radius: 8px;
      font-weight: 500;
    }

    .form-control-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      background: #1a1a1a;
      color: #fff;
    }

    .form-control-dark::placeholder {
      color: #666;
    }

    .form-label {
      color: #e0e0e0;
      font-weight: 600;
    }

    .form-select-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .form-select-dark:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239, 68, 68, 0.25);
      color: #fff;
    }

    .input-group-text {
      background: #1a1a1a;
      border-color: #444;
      color: #888;
    }

    .btn-withdraw {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      border: none;
      padding: 1rem 1.5rem;
      font-weight: 700;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .btn-withdraw:hover {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
      color: white;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
      padding: 1rem 0.75rem;
    }

    .table-dark tbody tr:hover {
      background: rgba(239, 68, 68, 0.05);
    }

    .badge {
      font-size: 0.85rem;
      padding: 0.5em 0.85em;
      font-weight: 600;
      border-radius: 6px;
    }

    .badge-pending     { background: #f59e0b; color: #000; }
    .badge-processing  { background: #3b82f6; color: white; }
    .badge-completed   { background: #22c55e; color: white; }
    .badge-cancelled   { background: #ef4444; color: white; }

    .alert {
      border: 1px solid;
      border-radius: 8px;
    }

    .alert-success {
      background: rgba(34, 197, 94, 0.15);
      border-color: rgba(34, 197, 94, 0.3);
      color: #86efac;
    }

    .alert-danger {
      background: rgba(239, 68, 68, 0.15);
      border-color: rgba(239, 68, 68, 0.3);
      color: #fca5a5;
    }

    .alert-warning {
      background: rgba(245, 158, 11, 0.15);
      border-color: rgba(245, 158, 11, 0.3);
      color: #fde047;
    }

    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .page-header h1 {
      margin: 0;
    }

    .text-secondary {
      color: #888 !important;
    }

    .text-success {
      color: #22c55e !important;
    }

    .text-danger {
      color: #ef4444 !important;
    }
  </style>
</head>
<body>

<!-- Sidebar Toggle Button -->
<button class="sidebar-toggle" id="sidebarToggle">
  <i class="bi bi-list"></i>
</button>

<!-- Sidebar Overlay (for mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar Navigation -->
<aside class="sidebar" id="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">
    <img src="{{ asset('images/logo.png') }}" width="50%" height="50" alt="SUNHILL Logo">
  </a>

  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dashboard') }}">
          <i class="uil uil-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.packages') }}">
          <i class="uil uil-package"></i>
          <span>Packages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.deposit') }}">
          <i class="uil uil-dollar-sign"></i>
          <span>Deposit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.withdraw') }}">
          <i class="uil uil-money-withdraw"></i>
          <span>Withdraw</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.transactions') }}">
          <i class="uil uil-receipt"></i>
          <span>Transactions</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/profile') }}">
          <i class="uil uil-user"></i>
          <span>Profile</span>
        </a>
      </li>

      <!-- Logout Button -->
      <form method="POST" action="{{ url('/logout') }}" style="display: contents;">
        @csrf
        <button type="submit" class="logout-btn" onclick="return confirm('Are you sure you want to logout?')">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </button>
      </form>
    </ul>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Alerts -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <!-- Page Header -->
    <div class="page-header">
      <h1 class="display-5 fw-bold">
        <i class="bi bi-cash-stack me-2 text-danger"></i> Withdraw Funds
      </h1>
      <span class="text-secondary fs-5">{{ now()->format('l, d M Y') }}</span>
    </div>

    <div class="row g-5">

      <!-- Withdrawal Request Form -->
      <div class="col-lg-5">
        <div class="card card-dark shadow-lg">
          <div class="card-body p-4 p-lg-5">
            <h3 class="fw-bold mb-4">
              <i class="bi bi-send me-2 text-danger"></i> Request Withdrawal
            </h3>
            <p class="text-secondary mb-4">
              Available Balance: <strong class="text-success fs-5">${{ number_format($user->balance ?? 0, 2) }}</strong>
            </p>

            <form action="{{ route('user.withdraw.request') }}" method="POST">
              @csrf

              <div class="mb-4">
                <label class="form-label">
                  <i class="bi bi-currency-dollar me-1"></i> Withdrawal Amount
                </label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text">$</span>
                  <input type="number"
                         class="form-control form-control-lg form-control-dark"
                         placeholder="0.00"
                         min="50"
                         step="0.01"
                         name="amount"
                         required>
                </div>
                <div class="form-text text-secondary mt-2">
                  <i class="bi bi-info-circle me-1"></i> Minimum withdrawal: <strong>$50.00</strong>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label">
                  <i class="bi bi-credit-card me-1"></i> Select Withdrawal Method
                </label>
                <select class="form-select form-select-lg form-select-dark" name="payment_method" required>
                  <option selected disabled>Choose withdrawal method...</option>
                  <option value="bitcoin">
                    <i class="bi bi-currency-bitcoin"></i> Bitcoin (BTC)
                  </option>
                  <option value="usdt">
                    <i class="bi bi-coin"></i> USDT (TRC20)
                  </option>
                  <option value="ethereum">
                    <i class="bi bi-hexagon-fill"></i> Ethereum (ETH)
                  </option>
                  <option value="bank_transfer">
                    <i class="bi bi-bank"></i> Bank Transfer
                  </option>
                </select>
              </div>

              <div class="mb-5">
                <label class="form-label">
                  <i class="bi bi-wallet2 me-1"></i> Wallet / Account Details
                </label>
                <input type="text"
                       class="form-control form-control-lg form-control-dark"
                       placeholder="Enter your BTC / USDT address or bank details"
                       name="wallet_details"
                       required>
                <small class="text-secondary d-block mt-2">
                  Double-check your wallet address before submitting
                </small>
              </div>

              <button type="submit" class="btn btn-withdraw btn-lg w-100 fw-bold">
                <i class="bi bi-arrow-up-circle me-2"></i> Request Withdrawal
              </button>
            </form>

            <div class="alert alert-warning mt-4 small mb-0">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              <strong>Processing Time:</strong> Withdrawals are processed within 24–48 hours. Fees may apply depending on method.
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Withdrawal History -->
      <div class="col-lg-7">
        <div class="card card-dark shadow-lg">
          <div class="card-header bg-transparent border-bottom border-secondary py-3">
            <h5 class="mb-0 fw-bold">
              <i class="bi bi-clock-history me-2"></i> Recent Withdrawals
            </h5>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-dark table-hover table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">
                      <i class="bi bi-hash me-1"></i> TXN ID
                    </th>
                    <th scope="col">
                      <i class="bi bi-currency-dollar me-1"></i> Amount
                    </th>
                    <th scope="col">
                      <i class="bi bi-credit-card me-1"></i> Method
                    </th>
                    <th scope="col">
                      <i class="bi bi-calendar me-1"></i> Date
                    </th>
                    <th scope="col">
                      <i class="bi bi-check-circle me-1"></i> Status
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($withdrawals as $withdrawal)
                    <tr>
                      <td>
                        <code class="text-danger">{{ $withdrawal->txn_id }}</code>
                      </td>
                      <td class="text-danger fw-bold">
                        -${{ number_format($withdrawal->amount, 2) }}
                      </td>
                      <td>
                        <span class="badge bg-secondary">
                          {{ ucfirst(str_replace('_', ' ', $withdrawal->payment_method)) }}
                        </span>
                      </td>
                      <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
                      <td>
                        <span class="badge badge-{{ $withdrawal->status }}">
                          <i class="bi bi-{{ $withdrawal->status === 'completed' ? 'check-circle' : ($withdrawal->status === 'processing' ? 'hourglass-split' : 'x-circle') }} me-1"></i>
                          {{ ucfirst($withdrawal->status) }}
                        </span>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center text-secondary py-5">
                        <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 0.5rem;"></i>
                        No withdrawal records found.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Sidebar Toggle Functionality
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const sidebarOverlay = document.getElementById('sidebarOverlay');

  sidebarToggle.addEventListener('click', function() {
    sidebar.classList.toggle('active');
    sidebarOverlay.classList.toggle('active');
  });

  sidebarOverlay.addEventListener('click', function() {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
  });

  const navLinks = document.querySelectorAll('.nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      if (window.innerWidth <= 768) {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
      }
    });
  });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Withdraw Funds - TELSA</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <!-- Google Fonts - Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      background: #000;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
    }

    /* Sidebar - same as other pages */
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
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239,68,68,0.25);
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .btn-withdraw {
      background: #ef4444;
      border: none;
      padding: 0.9rem 1.5rem;
      font-weight: 600;
    }

    .btn-withdraw:hover {
      background: #dc2626;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
    }

    .badge {
      font-size: 0.9rem;
      padding: 0.5em 1em;
    }

    .badge-pending     { background: #f59e0b; color: #000; }
    .badge-processing  { background: #3b82f6; color: white; }
    .badge-completed   { background: #22c55e; color: white; }
    .badge-cancelled   { background: #ef4444; color: white; }
  </style>
</head>
<body>


<!-- Sidebar Navigation -->
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
        <a class="nav-link active" href="{{ route('user.withdraw') }}">
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
        <button type="submit" class="nav-link text-danger border-0 bg-transparent">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
        </form>
      </li>
    </ul>
  </nav>
</aside>

 @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Withdraw Funds</h1>
      <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
    </div>

    <div class="row g-5">

      <!-- Withdrawal Request Form -->
      <div class="col-lg-5">
        <div class="card card-dark shadow-lg">
          <div class="card-body p-4 p-lg-5">
            <h3 class="fw-bold mb-4">Request Withdrawal</h3>
            <p class="text-secondary mb-4">Available Balance: <strong class="text-success">${{ number_format($users->balance, 2) }}</strong></p>

            <form action="{{ route('user.withdraw.request') }}" method="POST">
                @csrf
              <div class="mb-4">
                <label class="form-label fw-semibold">Withdrawal Amount</label>
                <div class="input-group input-group-lg">
                  <span class="input-group-text bg-dark border-secondary text-white">$</span>
                  <input type="number" class="form-control form-control-lg form-control-dark" placeholder="0.00" min="50" name="amount">
                </div>
                <div class="form-text text-muted mt-2">Minimum withdrawal: $50.00</div>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold">Select Withdrawal Method</label>
                <select class="form-select form-select-lg form-control-dark" name="payment_method">
                  <option selected>Bitcoin (BTC)</option>
                  <option>USDT (TRC20)</option>
                  <option>Ethereum (ETH)</option>
                  <option>Bank Transfer</option>
                </select>
              </div>

              <div class="mb-5">
                <label class="form-label fw-semibold">Wallet / Account Details</label>
                <input type="text" class="form-control form-control-lg form-control-dark" placeholder="Enter your BTC / USDT address or bank details" name="wallet_details" required>
              </div>

              <button type="submit" class="btn btn-withdraw btn-lg w-100 fw-bold">
                <i class="bi bi-cash-stack me-2"></i> Request Withdrawal
              </button>
            </form>

            <div class="alert alert-warning mt-4 small">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              Withdrawals are processed within 24–48 hours. Fees may apply depending on method.
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Withdrawal History -->
      <div class="col-lg-7">
        <div class="card card-dark shadow-lg">
          <div class="card-header bg-transparent border-bottom border-secondary">
            <h5 class="mb-0 fw-bold">Recent Withdrawals</h5>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-dark table-hover table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">TXN ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Method</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($withdrawals as $withdrawal)
                    <tr>
                        <td>{{ $withdrawal->txn_id }}</td>
                        <td class="text-danger">-${{ number_format($withdrawal->amount, 2) }}</td>
                        <td>{{ $withdrawal->payment_method }}</td>
                        <td>{{ $withdrawal->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="badge badge-{{ $withdrawal->status }}">
                                {{ ucfirst($withdrawal->status) }}
                            </span>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
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
</body>
</html>

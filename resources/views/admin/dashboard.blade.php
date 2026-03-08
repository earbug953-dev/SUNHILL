<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard - TESLA</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
      font-size: 1.9rem;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 1rem 0 2rem;
      text-align: center;
      border-bottom: 1px solid #333;
    }

    .sidebar-brand span {
      color: #ef4444;
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
      transition: transform 0.25s;
    }

    .card-dark:hover {
      transform: translateY(-6px);
    }

    .stat-icon {
      font-size: 2.8rem;
      opacity: 0.85;
    }

    .badge-admin {
      background: #ef4444;
      color: white;
      font-size: 0.9rem;
      padding: 0.5em 1em;
    }

    .table-dark thead th {
      background: #1a1a1a;
      color: #ccc;
      border-bottom: 1px solid #444;
    }

    .table-dark td {
      border-color: #333;
    }
  </style>
</head>
<body>

<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand"><img src="{{ asset('images/logo.png') }}" width="100" height="50" alt="TESLA Logo"> <span>Admin</span></a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.users') }}" class="nav-link">
          <i class="bi bi-people-fill"></i> Users
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.deposits') }}" class="nav-link">
          <i class="bi bi-currency-dollar"></i> Deposits
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.withdrawals') }}" class="nav-link">
          <i class="bi bi-cash-stack"></i> Withdrawals
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.packages') }}" class="nav-link">
          <i class="bi bi-bag-check"></i> Plans / Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.transactions') }}" class="nav-link">
          <i class="bi bi-receipt"></i> Transactions
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.reports') }}" class="nav-link">
          <i class="bi bi-graph-up"></i> Reports
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.settings') }}" class="nav-link">
          <i class="bi bi-gear-fill"></i> Settings
        </a>
      </li>
    </ul>

    <hr class="text-secondary my-4">

    <div class="nav-link text-danger cursor-pointer">
       <form method="POST" action="{{ url('/logout') }}"
          onsubmit="return confirm('Are you sure you want to logout?')">
          @csrf
        <button class="nav-link text-danger border-0 bg-transparent">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
        </form>
    </div>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Admin Dashboard</h1>
      <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
    </div>

    <!-- Stats Overview Cards -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Users</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ $user->totalUsers() }}</h2>
          <p class="text-success small mb-0">+{{ $user->newUsersThisWeek() }} this week</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Deposits</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(App\Models\Deposit::totalDeposits(), 2) }}</h2>
          <p class="text-success small mb-0">+${{ number_format(App\Models\Deposit::totalDepositsToday(), 2) }} today</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Plans</h5>
            <i class="bi bi-rocket-takeoff-fill stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">3,291</h2>
          <p class="text-warning small mb-0">89 new today</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Withdrawals</h5>
            <i class="bi bi-hourglass-split stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">47</h2>
          <p class="text-danger small mb-0">$218,450 pending</p>
        </div>
      </div>
    </div>

    <!-- Charts & Recent Activity -->
    <div class="row g-4">

      <!-- Revenue Chart -->
      <div class="col-lg-8">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">Revenue Overview (Last 30 Days)</h5>
          <canvas id="revenueChart" style="max-height: 380px;"></canvas>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="col-lg-4">
        <div class="card card-dark p-4 h-100">
          <h5 class="fw-bold mb-4">Recent Activity</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>New User Registration</strong><br>
                  <small class="text-secondary">{{ $user->newestUsers()->first()?->email ?? 'Unknown User' }}</small>
                </div>
                <small class="text-muted">{{ $user->newestUsers()->first()?->createdAtHuman() ?? 'Unknown Time' }}</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Withdrawal Request</strong><br>
                  <small class="text-secondary">$4,500 (BTC)</small>
                </div>
                <small class="text-muted">14 min ago</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent border-bottom border-secondary py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Deposit Completed</strong><br>
                  <small class="text-secondary">${{ number_format(App\Models\Deposit::recentDeposits()->first()?->amount ?? 0, 2) }}</small>
                </div>
                <small class="text-muted">{{ App\Models\Deposit::recentDeposits()->first()?->createdAtHuman() ?? 'Unknown Time' }}</small>
              </div>
            </li>
            <li class="list-group-item bg-transparent py-3">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>Plan Purchased</strong><br>
                  <small class="text-secondary">VIP AI Plan ($15,000)</small>
                </div>
                <small class="text-muted">3 hrs ago</small>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mt-5">
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-danger w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-cash-stack me-2 fs-3"></i> Review Withdrawals
        </a>
      </div>
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-success w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-currency-dollar me-2 fs-3"></i> Approve Deposits
        </a>
      </div>
      <div class="col-md-4">
        <a href="#" class="btn btn-outline-primary w-100 py-4 fs-5 fw-bold">
          <i class="bi bi-people-fill me-2 fs-3"></i> Manage Users
        </a>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Revenue Chart (mock data)
const ctx = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Deposits',
      data: [65000, 72000, 89000, 105000, 98000, 112000, 134000, 145000, 128000, 156000, 172000, 189000],
      backgroundColor: 'rgba(34, 197, 94, 0.6)',
      borderColor: '#22c55e',
      borderWidth: 1
    }, {
      label: 'Withdrawals',
      data: [-42000, -51000, -68000, -75000, -62000, -88000, -95000, -102000, -89000, -110000, -125000, -132000],
      backgroundColor: 'rgba(239, 68, 68, 0.6)',
      borderColor: '#ef4444',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true, grid: { color: '#222' } },
      x: { grid: { display: false } }
    },
    plugins: { legend: { labels: { color: '#ccc' } } }
  }
});
</script>
</body>
</html>

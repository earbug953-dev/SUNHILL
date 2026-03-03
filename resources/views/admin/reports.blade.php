<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reports & Analytics - SUNHILL Admin</title>

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

    /* Sidebar - same as other pages */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px;
      background: #0f0f0f;
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

    .chart-container {
      position: relative;
      height: 380px;
      width: 100%;
    }
  </style>
</head>
<body>

<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">SUNHILL <span>Admin</span></a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
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
        <a href="{{ route('admin.transactions') }}" class="nav-link">
          <i class="bi bi-bag-check"></i> Plans / Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.transactions') }}" class="nav-link">
          <i class="bi bi-receipt"></i> Transactions
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.reports') }}" class="nav-link active">
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
      <i class="bi bi-box-arrow-right"></i> Logout
    </div>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Reports & Analytics</h1>
      <div class="d-flex gap-3 align-items-center">
        <div class="input-group input-group-sm" style="max-width: 280px;">
          <span class="input-group-text bg-dark border-secondary text-white"><i class="bi bi-calendar"></i></span>
          <input type="date" class="form-control form-control-dark" value="2026-02-01">
          <span class="input-group-text bg-dark border-secondary text-white">to</span>
          <input type="date" class="form-control form-control-dark" value="2026-02-24">
        </div>
        <button class="btn btn-outline-light btn-sm px-4">
          <i class="bi bi-download me-2"></i> Export Report
        </button>
      </div>
    </div>

    <!-- Stats Overview -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Revenue</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$6,742,890</h2>
          <p class="text-success small mb-0">+14.8% this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Net Profit</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-info">$4,128,670</h2>
          <p class="text-info small mb-0">61.2% margin</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">User Growth</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">+1,842</h2>
          <p class="text-primary small mb-0">New users this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Retention Rate</h5>
            <i class="bi bi-arrow-repeat stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">78.4%</h2>
          <p class="text-warning small mb-0">30-day retention</p>
        </div>
      </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-4 mb-5">
      <!-- Revenue vs Withdrawals -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">Revenue vs Withdrawals (Last 30 Days)</h5>
          <div class="chart-container">
            <canvas id="revenueVsWithdrawalChart"></canvas>
          </div>
        </div>
      </div>

      <!-- User Registration Trend -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">User Registration Trend</h5>
          <div class="chart-container">
            <canvas id="userGrowthChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Summary Tables -->
    <div class="row g-4">
      <!-- Top Depositors -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">Top Depositors (All Time)</h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th scope="col">Rank</th>
                  <th scope="col">User</th>
                  <th scope="col">Total Deposited</th>
                  <th scope="col">Last Deposit</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>John Doe (USER-001247)</td>
                  <td class="text-success">$187,420</td>
                  <td>Feb 20, 2026</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jane Smith (USER-001246)</td>
                  <td class="text-success">$142,800</td>
                  <td>Feb 18, 2026</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Michael Brown (USER-001245)</td>
                  <td class="text-success">$98,500</td>
                  <td>Feb 15, 2026</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">
                    View full list →
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Recent High-Value Transactions -->
      <div class="col-lg-6">
        <div class="card card-dark p-4">
          <h5 class="fw-bold mb-4">Recent High-Value Transactions</h5>
          <div class="table-responsive">
            <table class="table table-dark table-hover table-borderless mb-0">
              <thead>
                <tr>
                  <th scope="col">TXN ID</th>
                  <th scope="col">User</th>
                  <th scope="col">Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>TXN-987654321</td>
                  <td>John Doe</td>
                  <td>Deposit</td>
                  <td class="text-success">+$25,000</td>
                  <td>Feb 20, 2026</td>
                </tr>
                <tr>
                  <td>TXN-987654320</td>
                  <td>Jane Smith</td>
                  <td>Withdrawal</td>
                  <td class="text-danger">-$18,500</td>
                  <td>Feb 18, 2026</td>
                </tr>
                <tr>
                  <td>TXN-987654319</td>
                  <td>Michael Brown</td>
                  <td>Deposit</td>
                  <td class="text-success">+$15,000</td>
                  <td>Feb 15, 2026</td>
                </tr>
                <tr>
                  <td colspan="5" class="text-center text-muted py-4">
                    View full report →
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Revenue vs Withdrawals Chart
const ctx1 = document.getElementById('revenueVsWithdrawalChart').getContext('2d');
new Chart(ctx1, {
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

// User Registration Trend (Line Chart)
const ctx2 = document.getElementById('userGrowthChart').getContext('2d');
new Chart(ctx2, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'New Users',
      data: [420, 580, 720, 890, 950, 1120, 1340, 1450, 1280, 1560, 1720, 1890],
      borderColor: '#3b82f6',
      backgroundColor: 'rgba(59, 130, 246, 0.2)',
      tension: 0.4,
      fill: true
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true, grid: { color: '#222' } },
      x: { grid: { display: false } }
    },
    plugins: { legend: { display: false } }
  }
});
</script>
</body>
</html>

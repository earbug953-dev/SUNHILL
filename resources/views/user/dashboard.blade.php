<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - SUNHILL</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <!-- Google Fonts - Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #000;
      color: #fff;
      min-height: 100vh;
    }

    /* Sidebar */
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
      .sidebar {
        width: 220px;
      }
      .main-content {
        margin-left: 220px;
      }
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
      }
    }

    .card-dark {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
    }

    .stat-card {
      background: linear-gradient(135deg, #1f1f1f 0%, #2a2a2a 100%);
      border-radius: 12px;
      padding: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: transform 0.2s;
    }

    .stat-card:hover {
      transform: translateY(-4px);
    }

    .stat-icon {
      font-size: 2.5rem;
      opacity: 0.8;
    }

    .balance-box {
      background: #0f0f0f;
      border-radius: 16px;
      padding: 2.5rem 2rem;
      text-align: center;
      border: 1px solid #222;
    }

    .positive { color: #22c55e; }
    .negative { color: #ef4444; }

    .no-investment {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
      padding: 3rem;
      text-align: center;
    }

    .market-col {
      background: #111;
      border-radius: 12px;
      padding: 1.5rem;
      height: 100%;
    }
  </style>
</head>
<body>

<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">SUNHILL</a>
  <nav class="mt-4">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.dashboard') }}">
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
    <h1 class="mb-5">Welcome, <span id="username">{{ $user->name }}</span></h1>

    <!-- Indices Grid -->
    <div class="row g-4 mb-5" id="indicesGrid">
      <!-- Cards populated by JS -->
    </div>

    <!-- Balance + Chart + Stats -->
    <div class="row g-4 mb-5">
      <div class="col-lg-8">
        <div class="balance-box">
          <p class="text-secondary mb-2 fs-5">ACCOUNT BALANCE</p>
          <h1 class="display-4 fw-bold mb-3">${{ number_format($user->balance, 2) }}</h1>
          <p class="fs-5">
            <span class="positive"><i class="uil uil-arrow-up me-1"></i> Up by $0.00</span>
            since you began investing
          </p>

          <canvas id="indicesChart" class="mt-4" style="max-height: 380px;"></canvas>

          <div class="tradingview-widget-container mt-4" style="height: 380px;">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
            {
              "width": "100%",
              "height": "100%",
              "symbol": "FX:GBPUSD",
              "interval": "D",
              "timezone": "Etc/UTC",
              "theme": "dark",
              "style": "1",
              "locale": "en",
              "toolbar_bg": "#000000",
              "enable_publishing": false,
              "hide_top_toolbar": false,
              "hide_legend": false,
              "save_image": false
            }
            </script>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="d-flex flex-column gap-4 h-100">
          <div class="stat-card">
            <div>
              <h3 class="mb-1">${{ number_format($totalDeposits, 2) }}</h3>
              <p class="text-secondary mb-0">TOTAL DEPOSITS</p>
            </div>
            <i class="uil uil-suitcase stat-icon"></i>
          </div>
          <div class="stat-card">
            <div>
              <h3 class="mb-1">$0.00</h3>
              <p class="text-secondary mb-0">TOTAL BONUS</p>
            </div>
            <i class="uil uil-gift stat-icon"></i>
          </div>
          <div class="stat-card">
            <div>
              <h3 class="mb-1">$0.00</h3>
              <p class="text-secondary mb-0">TOTAL PROFIT</p>
            </div>
            <i class="uil uil-chart-line stat-icon"></i>
          </div>
          <div class="stat-card">
            <div>
              <h3 class="mb-1">$0.00</h3>
              <p class="text-secondary mb-0">WITHDRAWALS</p>
            </div>
            <i class="uil uil-coins stat-icon"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Active Investments -->
    <div class="no-investment mb-5">
      <h2 class="mb-4">Active Investments</h2>
      <p class="text-secondary mb-4">You do not have an active investment at the moment.</p>
      <a href="{{ route('user.packages') }}" class="btn btn-warning btn-lg px-5 py-3 fw-semibold">Invest Now</a>
    </div>

    <!-- Market Overview + News -->
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="market-col">
          <h2 class="mb-4">Market Overview</h2>
          <div class="tradingview-widget-container" style="height: 480px;">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
            {
              "colorTheme": "dark",
              "dateRange": "1D",
              "showChart": false,
              "locale": "en",
              "isTransparent": false,
              "showSymbolLogo": true,
              "width": "100%",
              "height": "100%",
              "backgroundColor": "#1D1D1D",
              "gridLineColor": "rgba(255, 255, 255, 0.06)",
              "tabs": [
                {
                  "title": "Crypto",
                  "symbols": [
                    {"s": "BITSTAMP:BTCUSD", "d": "Bitcoin / TetherUS"},
                    {"s": "BITSTAMP:ETHUSD", "d": "Ethereum / TetherUS"},
                    {"s": "BINANCE:USDTUSD", "d": "USDT.D"},
                    {"s": "BINANCE:BNBUSD", "d": "BNBUSD"},
                    {"s": "BINANCE:USDCUSD", "d": "USDC"},
                    {"s": "BINANCE:XRPUSD", "d": "XRPUSD"},
                    {"s": "BINANCE:SOLUSD", "d": "Solana"},
                    {"s": "BINANCE:ADAUSD", "d": "Cardano"},
                    {"s": "BINANCE:DOGEUSD", "d": "Dogecoin"}
                  ]
                }
              ]
            }
            </script>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="market-col">
          <h2 class="mb-4">Market News</h2>
          <div class="tradingview-widget-container" style="height: 480px;">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
            {
              "feedMode": "market",
              "market": "crypto",
              "colorTheme": "dark",
              "isTransparent": false,
              "displayMode": "regular",
              "width": "100%",
              "height": "100%",
              "locale": "en",
              "backgroundColor": "#1D1D1D"
            }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-black text-center py-4 border-top border-secondary mt-5">
  <p class="text-white-50 mb-0">
    © <span id="year"></span> SUNHILL. All rights reserved.
  </p>
</footer>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();

  // Indices mock data (you can replace with real API later)
  const indices = [
    { name: 'EUR/USD', value: '1.0852', change: '+0.42%', color: '#26A17B' },
    { name: 'NASDAQ', value: '18,647.45', change: '-0.31%', color: '#059669' },
    { name: 'Dow Jones', value: '42,330.15', change: '+0.18%', color: '#3b82f6' },
    { name: 'Nikkei 225', value: '39,098.68', change: '+1.24%', color: '#ea580c' },
    { name: 'DAX', value: '19,472.13', change: '+0.67%', color: '#8b5cf6' },
    { name: 'FTSE 100', value: '8,420.26', change: '-0.09%', color: '#84cc16' }
  ];

  const grid = document.getElementById('indicesGrid');
  indices.forEach(item => {
    const isPositive = item.change.startsWith('+');
    const col = document.createElement('div');
    col.className = 'col-md-6 col-lg-4';
    col.innerHTML = `
      <div class="card card-dark p-4 h-100">
        <div class="d-flex align-items-center mb-3">
          <div class="rounded-circle me-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:${item.color};color:white;font-weight:bold;">
            ${item.name.charAt(0)}
          </div>
          <h5 class="mb-0">${item.name}</h5>
        </div>
        <h3 class="mb-2">${item.value}</h3>
        <p class="${isPositive ? 'positive' : 'negative'} fw-semibold mb-0">${item.change}</p>
      </div>
    `;
    grid.appendChild(col);
  });

  // Chart.js example
  const ctx = document.getElementById('indicesChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Portfolio Value',
        data: [12000, 13500, 12800, 14200, 15800, 16500],
        borderColor: '#22c55e',
        backgroundColor: 'rgba(34,197,94,0.15)',
        tension: 0.4,
        fill: true
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: { beginAtZero: false, grid: { color: '#222' } },
        x: { grid: { display: false } }
      }
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Investment Plans - SUNHILL</title>

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
      background: #f59e0b;
      border: none;
      color: white;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      font-size: 1.25rem;
      cursor: pointer;
      z-index: 1002;
      box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .sidebar-toggle:hover {
      background: #d97706;
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
      background: linear-gradient(135deg, transparent, rgba(245, 158, 11, 0.1));
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
      background: #f59e0b;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.3s ease;
    }

    .nav-link:hover {
      background: rgba(245, 158, 11, 0.1);
      color: #fff;
      padding-left: 1.5rem;
    }

    .nav-link:hover::before {
      transform: scaleY(1);
    }

    .nav-link.active {
      background: rgba(245, 158, 11, 0.15);
      color: #f59e0b;
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

    /* Main content offset */
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

    /* Plan Card */
    .plan-card {
      background: linear-gradient(135deg, #111 0%, #1a1a1a 100%);
      border: 2px solid #333;
      border-radius: 16px;
      padding: 2.5rem 2rem;
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
    }

    .plan-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.1), transparent);
      transition: left 0.5s;
    }

    .plan-card:hover::before {
      left: 100%;
    }

    .plan-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 40px rgba(245, 158, 11, 0.2);
      border-color: #f59e0b;
    }

    .plan-card.featured {
      border-color: #f59e0b;
      background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
    }

    .plan-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .plan-title {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #fff;
      position: relative;
      z-index: 1;
    }

    .plan-title i {
      color: #f59e0b;
      margin-right: 0.5rem;
    }

    .plan-detail {
      font-size: 1rem;
      color: #a0a0a0;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      position: relative;
      z-index: 1;
      line-height: 1.5;
    }

    .plan-detail i {
      color: #f59e0b;
      margin-right: 0.75rem;
      min-width: 24px;
    }

    .plan-detail.highlight {
      color: #f59e0b;
      font-weight: 600;
      font-size: 1.1rem;
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: white;
      border-radius: 8px;
      padding: 0.9rem 1.25rem;
      font-size: 1rem;
      font-weight: 500;
    }

    .form-control-dark:focus {
      border-color: #f59e0b;
      box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.25);
      background: #1a1a1a;
      color: white;
    }

    .form-control-dark::placeholder {
      color: #666;
    }

    .btn-invest {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      color: #000;
      font-weight: 700;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      border: none;
      transition: all 0.3s;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 1rem;
    }

    .btn-invest:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
      color: #000;
    }

    .btn-invest:active {
      transform: translateY(-2px);
    }

    .balance-box {
      background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
      border: 1px solid #333;
      border-radius: 16px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .balance-box h3 {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .page-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .page-header h1 {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 1rem;
    }

    .page-header .lead {
      font-size: 1.25rem;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
      color: #888;
    }

    .pagination-compact .page-item .page-link {
      min-width: 36px;
      height: 36px;
      padding: 0.35rem 0.65rem;
      background: #1a1a1a;
      border: 1px solid #444;
      color: #888;
      border-radius: 6px !important;
      margin: 0 4px;
      font-weight: 500;
    }

    .pagination-compact .page-item.active .page-link {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
      border-color: #f59e0b;
      color: #000;
      font-weight: 700;
    }

    .pagination-compact .page-link:hover {
      background: #222;
      color: #f59e0b;
      border-color: #f59e0b;
    }

    .pagination-compact .page-item.disabled .page-link {
      opacity: 0.45;
      cursor: not-allowed;
    }

    .text-secondary {
      color: #888 !important;
    }

    .text-secondary-subtle {
      color: #666 !important;
    }

    .text-white-50 {
      color: #555;
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
        <a class="nav-link active" href="{{ route('user.packages') }}">
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
        <a class="nav-link" href="{{ route('user.withdraw') }}">
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
        <a class="nav-link" href="{{ route('profile.edit') }}">
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
  <div class="container-xl px-0">
    <!-- Page Header -->
    <div class="page-header mb-5">
      <h1 class="mb-3">
        <i class="bi bi-briefcase"></i> Investment Plans
      </h1>
      <p class="lead">
        Make your money work for you and earn profits by investing in our world-class auto-trading packages.
      </p>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-10">

        <!-- Account Balance -->
        <div class="balance-box mb-5">
          <p class="text-secondary fs-5 mb-2">
            <i class="bi bi-wallet2 me-2"></i> YOUR ACCOUNT BALANCE
          </p>
          <h3 class="fw-bold display-5 mb-0">${{ number_format($user->balance ?? 0, 2) }}</h3>
          <small class="text-secondary-subtle d-block mt-2">Ready to invest</small>
        </div>

        <!-- Choose Plan Text -->
        <div class="text-center mb-5">
          <h2 class="fw-bold mb-3 text-white">
            Choose Your Investment Plan
          </h2>
          <p class="text-secondary fs-5">
            Start your investment journey today and watch your wealth grow with our proven trading strategies.
          </p>
        </div>

        <!-- Plans Grid -->
        <div class="row g-4 mb-5">

          @forelse ($packages as $package)
            <div class="col-lg-6 col-xl-3">
              <div class="plan-card h-100 d-flex flex-column">
                @if($loop->first)
                  <span class="plan-badge">
                    <i class="bi bi-star-fill me-1"></i> Most Popular
                  </span>
                @endif

                <h2 class="plan-title">
                  <i class="bi bi-coin"></i> {{ $package->name }}
                </h2>

                <div class="mb-4 flex-grow-1">
                  <div class="plan-detail">
                    <i class="bi bi-graph-up"></i>
                    <span>
                      Investment: <strong>${{ number_format($package->min_investment) }}</strong> -
                      <strong>${{ number_format($package->max_investment) }}</strong>
                    </span>
                  </div>

                  <div class="plan-detail">
                    <i class="bi bi-percent"></i>
                    <span>
                      Daily Return: <strong>{{ $package->daily_return }}%</strong> for
                      <strong>{{ $package->duration_days }}</strong> days
                    </span>
                  </div>

                  <div class="plan-detail highlight">
                    <i class="bi bi-trophy-fill"></i>
                    <span>
                      Total Return: <strong>{{ $package->total_return }}%</strong>
                    </span>
                  </div>
                </div>

                <form method="POST" action="" class="mt-auto">
                  @csrf
                  <input type="hidden" name="package_id" value="{{ $package->id }}">
                  <div class="mb-3">
                    <input type="number"
                           name="amount"
                           class="form-control form-control-dark"
                           placeholder="Enter amount (Min: ${{ number_format($package->min_investment) }})"
                           min="{{ $package->min_investment }}"
                           max="{{ $package->max_investment }}"
                           step="1"
                           required>
                    <small class="text-secondary d-block mt-2">
                      Min: ${{ number_format($package->min_investment) }} |
                      Max: ${{ number_format($package->max_investment) }}
                    </small>
                  </div>
                  <button type="submit" class="btn btn-invest w-100">
                    <i class="bi bi-play-circle me-2"></i> Invest Now
                  </button>
                </form>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5">
              <i class="bi bi-inbox" style="font-size: 3rem; color: #666;"></i>
              <p class="text-secondary mt-3">No investment packages available at the moment.</p>
            </div>
          @endforelse

        </div>

        <!-- Pagination -->
        @if($packages->hasPages())
          <div class="d-flex justify-content-center mt-5">
            <div class="pagination-compact">
              {{ $packages->links('pagination::bootstrap-5') }}
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-black text-center py-4 border-top border-secondary mt-5">
  <p class="text-white-50 mb-0">
    <i class="bi bi-c-circle me-1"></i> <span id="year"></span> SUNHILL. All rights reserved.
  </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();

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

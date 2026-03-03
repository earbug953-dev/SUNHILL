<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>System Settings - SUNHILL Admin</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
      border-radius: 8px;
    }

    .form-control-dark:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 0.25rem rgba(59,130,246,0.25);
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .form-check-input:checked {
      background-color: #3b82f6;
      border-color: #3b82f6;
    }

    .btn-save {
      background: #3b82f6;
      border: none;
      padding: 0.75rem 1.5rem;
      font-weight: 600;
    }

    .btn-save:hover {
      background: #2563eb;
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
        <a href="{{ route('admin.reports') }}" class="nav-link">
          <i class="bi bi-graph-up"></i> Reports
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.settings') }}" class="nav-link active">
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
      <h1 class="display-5 fw-bold mb-0">System Settings</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Settings Tabs -->
    <div class="card card-dark shadow-lg">
      <div class="card-body p-4 p-lg-5">

        <ul class="nav nav-tabs mb-5 border-bottom border-secondary">
          <li class="nav-item">
            <button class="nav-link active fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#general">
              General
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#security">
              Security
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#payments">
              Payment Gateways
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#email">
              Email / SMTP
            </button>
          </li>
          <li class="nav-item">
            <button class="nav-link fw-semibold fs-5" data-bs-toggle="tab" data-bs-target="#maintenance">
              Maintenance
            </button>
          </li>
        </ul>

        <div class="tab-content">

          <!-- GENERAL TAB -->
          <div class="tab-pane fade show active" id="general">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                dd($request->all());
                @method('PUT')
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Site Name</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="{{ $user->name ?? '' }}" name="name">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text"
                        class="form-control form-control-lg form-control-dark"
                        value="{{ $user->username ?? '' }}"
                        name="username">
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Site URL</label>
                  <input type="url" class="form-control form-control-lg form-control-dark" value="{{ $user->site_url ?? '' }}" name="site_url" >
                  @error('site_url')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Support Email</label>
                  <input type="email" class="form-control form-control-lg form-control-dark" value="{{ $user->email ?? '' }}" name="email" >
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Default Currency</label>
                  <select class="form-select form-select-lg form-control-dark">
                    <option>USD - US Dollar</option>
                    <option>EUR - Euro</option>
                    <option>BTC - Bitcoin</option>
                  </select>
                </div>

                <div class="col-md-12 form-check form-switch mt-3">
                  <input class="form-check-input" type="checkbox" id="maintenanceMode" checked>
                  <label class="form-check-label fs-5" for="maintenanceMode">
                    Enable Maintenance Mode
                  </label>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save General Settings</button>
                </div>
              </div>
            </form>
          </div>

          <!-- SECURITY TAB -->
          <div class="tab-pane fade" id="security">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">Two-Factor Authentication</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="force2FA" checked>
                    <label class="form-check-label fs-5" for="force2FA">
                      Force 2FA for all users
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">Login Security</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="loginAlert" checked>
                    <label class="form-check-label fs-5" for="loginAlert">
                      Email alert on new login from unknown device
                    </label>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="ipWhitelist">
                    <label class="form-check-label fs-5" for="ipWhitelist">
                      Enable IP Whitelist (admin only)
                    </label>
                  </div>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save Security Settings</button>
                </div>
              </div>
            </form>
          </div>

          <!-- PAYMENT GATEWAYS TAB -->
          <div class="tab-pane fade" id="payments">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">Bitcoin (BTC)</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="btcEnabled" checked>
                    <label class="form-check-label fs-5" for="btcEnabled">
                      Enable Bitcoin Deposits & Withdrawals
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">Wallet Address</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh">
                </div>

                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">USDT (TRC20)</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="usdtEnabled" checked>
                    <label class="form-check-label fs-5" for="usdtEnabled">
                      Enable USDT (TRC20)
                    </label>
                  </div>
                  <label class="form-label fw-semibold mt-3">Wallet Address</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="TQwerty1234567890abcdef">
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save Payment Settings</button>
                </div>
              </div>
            </form>
          </div>

          <!-- EMAIL / SMTP TAB -->
          <div class="tab-pane fade" id="email">
            <form>
              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">SMTP Host</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="smtp.mailtrap.io">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">SMTP Port</label>
                  <input type="number" class="form-control form-control-lg form-control-dark" value="2525">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">SMTP Username</label>
                  <input type="text" class="form-control form-control-lg form-control-dark" value="your_username">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">SMTP Password</label>
                  <input type="password" class="form-control form-control-lg form-control-dark" value="********">
                </div>

                <div class="col-md-12">
                  <label class="form-label fw-semibold">From Email</label>
                  <input type="email" class="form-control form-control-lg form-control-dark" value="no-reply@sunhill.com">
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save Email Settings</button>
                </div>
              </div>
            </form>
          </div>

          <!-- MAINTENANCE & BACKUP TAB -->
          <div class="tab-pane fade" id="maintenance">
            <form>
              <div class="row g-4">
                <div class="col-md-12">
                  <h5 class="fw-bold mb-4">Maintenance Mode</h5>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="siteMaintenance">
                    <label class="form-check-label fs-5" for="siteMaintenance">
                      Put site in maintenance mode
                    </label>
                  </div>
                  <textarea class="form-control form-control-lg form-control-dark mt-3" rows="4" placeholder="Maintenance message shown to users..."></textarea>
                </div>

                <div class="col-md-12 mt-5">
                  <h5 class="fw-bold mb-4">Database Backup</h5>
                  <button type="button" class="btn btn-outline-success btn-lg px-5">
                    <i class="bi bi-download me-2"></i> Download Backup Now
                  </button>
                  <p class="text-secondary mt-3 small">Last backup: February 23, 2026 23:45</p>
                </div>

                <div class="col-12 text-end mt-5">
                  <button type="submit" class="btn btn-save btn-lg px-5 fw-bold">Save Maintenance Settings</button>
                </div>
              </div>
            </form>
          </div>

        </div>

        <!-- Global Save (bottom of all tabs) -->
        <div class="text-end mt-5 pt-4 border-top border-secondary">
          <button type="button" class="btn btn-save btn-lg px-5 fw-bold">
            <i class="bi bi-save me-2"></i> Save All Changes
          </button>
        </div>

      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

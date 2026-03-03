<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Users - SUNHILL Admin</title>

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
      transition: transform 0.25s;
    }

    .card-dark:hover {
      transform: translateY(-6px);
    }

    .stat-icon {
      font-size: 2.8rem;
      opacity: 0.85;
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

    .badge-active   { background: #22c55e; color: white; }
    .badge-pending  { background: #f59e0b; color: #000; }
    .badge-blocked  { background: #ef4444; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 0.25rem rgba(59,130,246,0.25);
    }
    .user-card {
    transition: all 0.25s ease;
    border: 1px solid #333;
    }

    .user-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.6);
    }

    .avatar-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #3b82f6, #22c55e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: bold;
        color: white;
        position: relative;
    }

    .avatar-circle.online::after {
        content: '';
        position: absolute;
        bottom: 4px;
        right: 4px;
        width: 16px;
        height: 16px;
        background: #22c55e;
        border: 3px solid #111;
        border-radius: 50%;
        box-shadow: 0 0 8px rgba(34,197,94,0.6);
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
        <a href="{{ route('admin.users') }}" class="nav-link active">
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
      <h1 class="display-5 fw-bold mb-0">Manage Users</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Users</h5>
            <i class="bi bi-people-fill stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ \App\Models\User::totalUsers() }}</h2>
          <p class="text-success small mb-0">{{ \App\Models\User::newUsersThisWeek() }} new users this week</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Active Users</h5>
            <i class="bi bi-check-circle-fill stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">{{ \App\Models\User::onlineUsers() }}</h2>
          <p class="text-success small mb-0">
           {{ number_format(\App\Models\User::onlinePercentage(), 1) }}% active</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending KYC</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">142</h2>
          <p class="text-warning small mb-0">Awaiting verification</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Inactive Users</h5>
            <i class="bi bi-slash-circle-fill stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">{{ \App\Models\User::inactiveUsers() }}</h2>
          <p class="text-danger small mb-0">{{ number_format(\App\Models\User::inactivePercentage(), 1) }}% inactive</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-6">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by name, email, username...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-control-dark">
              <option>All Status</option>
              <option>Active</option>
              <option>Pending KYC</option>
              <option>Blocked</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-outline-primary w-100 btn-lg">
              <i class="bi bi-funnel me-2"></i> Filter
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Users Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Balance</th>
                <th scope="col">Joined</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example rows – replace with real loop -->

            @forelse ($users as $user)
                <tr>
                    <td>USER-{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>${{ number_format($user->balance, 2) }}</td>
                    <td>{{ $user->created_at->format('M j, Y') }}</td>
                    <td>
                        @if($user->isOnline())
                            <span class="badge badge-active">Online</span>
                        @else
                            <span class="badge badge-blocked">Offline</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-light btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewUserModal{{ $user->id }}">
                                <i class="bi bi-eye"></i> View
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        No more users found.
                    </td>
                </tr>
            @endforelse

            </tbody>
          </table>

          <!-- Users Grid (Cards) -->


        </div>
      </div>
    </div>

    @forelse ($users as $user)

        <!-- View Modal (one per user) -->
        <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content card-dark border-0 shadow-lg">
                    <div class="modal-header border-bottom border-secondary">
                        <h5 class="modal-title fw-bold fs-4">{{ $user->name }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <p><strong>ID:</strong> USER-{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Username:</strong> {{ $user->username ?? 'N/A' }}</p>
                                <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Balance:</strong> ${{ number_format($user->balance ?? 0, 2) }}</p>
                                <p><strong>Joined:</strong> {{ $user->created_at->format('M j, Y') }}</p>
                                <p><strong>Status:</strong>
                                    @if($user->isOnline())
                                        <span class="badge badge-active">Online</span>
                                    @else
                                        <span class="badge badge-blocked">Offline</span>
                                        {{-- in last_seen time in a time format --}}
                                        <span class="text-muted small">Last seen {{ $user->lastSeenHuman() }}</span>
                                    @endif
                                </p>
                                <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'user') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-secondary">
                        <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted py-5">
            <h4>No users found.</h4>
        </div>
    @endforelse

    <div class="pagination-compact">
        {{ \App\Models\User::paginate(10)->links('pagination::bootstrap-5') }}
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

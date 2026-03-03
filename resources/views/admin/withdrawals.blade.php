<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Withdrawals - SUNHILL Admin</title>

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

    .badge-pending     { background: #f59e0b; color: #000; }
    .badge-processing  { background: #3b82f6; color: white; }
    .badge-completed   { background: #22c55e; color: white; }
    .badge-cancelled   { background: #ef4444; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #ef4444;
      box-shadow: 0 0 0 0.25rem rgba(239,68,68,0.25);
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
        <a href="{{ route('admin.withdrawals') }}" class="nav-link active">
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
      <i class="bi bi-box-arrow-right"></i> Logout
    </div>
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
      <h1 class="display-5 fw-bold mb-0">Manage Withdrawals</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Withdrawals</h5>
            <i class="bi bi-cash-stack stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::totalWithdrawals(), 2) }}</h2>
          <p class="text-danger small mb-0">Processed this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Withdrawals</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">{{ \App\Models\Withdrawal::pendingWithdrawalsCount() }}</h2>
          <p class="text-warning small mb-0">${{ number_format(\App\Models\Withdrawal::pendingWithdrawals(), 2) }} awaiting</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Today's Withdrawals</h5>
            <i class="bi bi-sun-fill stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::todayWithdrawals(), 2) }}</h2>
          <p class="text-info small mb-0">+{{ \App\Models\Withdrawal::todayVsYesterday() }}% vs yesterday</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Avg. Withdrawal</h5>
            <i class="bi bi-graph-down-arrow stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">${{ number_format(\App\Models\Withdrawal::averageWithdrawal(), 2) }}</h2>
          <p class="text-primary small mb-0">Up from ${{ number_format(\App\Models\Withdrawal::averageWithdrawalVsLastMonth(), 2) }} last month</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters + Bulk Actions -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-5">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by user, TXN ID, amount...">
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-control-dark">
              <option>All Status</option>
              <option>Completed</option>
              <option>Pending</option>
              <option>Cancelled</option>
            </select>
          </div>
          <div class="col-md-4">
            <div class="d-flex gap-2">
              <button class="btn btn-outline-success w-50 btn-lg">
                <i class="bi bi-check-circle me-2"></i> Approve Selected
              </button>
              <button class="btn btn-outline-danger w-50 btn-lg">
                <i class="bi bi-x-circle me-2"></i> Reject Selected
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Withdrawals Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col"><input type="checkbox" class="form-check-input"></th>
                <th scope="col">TXN ID</th>
                <th scope="col">User</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example rows – replace with real loop -->
              @forelse ($withdrawals as $withdrawal )
                <tr>
                  <td><input type="checkbox" class="form-check-input"></td>
                  <td>{{ $withdrawal->txn_id }}</td>
                  <td>{{ $withdrawal->user->name }} ({{ $withdrawal->user->user_id }})</td>
                  <td class="text-danger">-${{ number_format($withdrawal->amount, 2) }}</td>
                  <td>{{ $withdrawal->payment_method }}</td>
                  <td>{{ $withdrawal->created_at->format('M d, Y g:i A') }}</td>
                  <td><span class="badge badge-{{ $withdrawal->status }}">{{ ucfirst($withdrawal->status) }}</span></td>
                  <td>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-light btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#viewWithdrawalModal{{ $withdrawal->id }}">
                        <i class="bi bi-eye"></i> View
                        </button>
                      @if ($withdrawal->status == 'processing')
                      <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-success" onclick="return confirm('Approve this withdrawal? This will mark it as completed.')"><i class="bi bi-check-circle"></i>completed</button>
                      </form>
                      <form action="{{ route('admin.withdrawals.cancel', $withdrawal->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Cancel this withdrawal? Balance will be refunded.')"><i class="bi bi-x-circle"></i> Cancel</button>
                      </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center text-muted py-5">
                    No withdrawal requests found.
                  </td>
                </tr>
              @endforelse
              </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>
<!-- View Withdrawal Modal (one per withdrawal) -->
@forelse ($withdrawals as $withdrawal)
  <div class="modal fade" id="viewWithdrawalModal{{ $withdrawal->id }}" tabindex="-1" aria-labelledby="viewWithdrawalModalLabel{{ $withdrawal->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content card-dark border-0 shadow-lg">
        <!-- Modal Header -->
        <div class="modal-header border-bottom border-secondary">
          <h5 class="modal-title fw-bold fs-4" id="viewWithdrawalModalLabel{{ $withdrawal->id }}">
            Withdrawal Details - {{ $withdrawal->txn_id }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body p-4 p-md-5">
          <div class="row g-4">
            <!-- Left Column -->
            <div class="col-md-6">
              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">User</label>
                <p class="fs-5 mb-0">{{ $withdrawal->user->name }} (ID: {{ $withdrawal->user->id }})</p>
                <small class="text-muted">{{ $withdrawal->user->email }}</small>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Amount</label>
                <p class="fs-4 fw-bold text-danger mb-0">-${{ number_format($withdrawal->amount, 2) }}</p>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Payment Method</label>
                <p class="fs-5 mb-0">{{ ucfirst($withdrawal->payment_method) }}</p>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Wallet / Address</label>
                <p class="fs-5 mb-0 text-break">{{ $withdrawal->wallet_details ?? 'N/A' }}</p>
              </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Transaction ID</label>
                <p class="fs-5 mb-0">{{ $withdrawal->txn_id }}</p>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Requested On</label>
                <p class="fs-5 mb-0">{{ $withdrawal->created_at->format('M d, Y • h:i A') }}</p>
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-secondary">Current Status</label>
                <span class="badge badge-{{ $withdrawal->status }} fs-5 px-4 py-2">
                  {{ ucfirst($withdrawal->status) }}
                </span>
              </div>

              @if($withdrawal->proof_image)
                <div class="mb-4">
                  <label class="form-label fw-semibold text-secondary">Proof of Payment</label>
                  <a href="{{ Storage::url($withdrawal->proof_image) }}" target="_blank" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-eye me-1"></i> View Proof
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- Modal Footer with Actions -->
        <div class="modal-footer border-top border-secondary">
          <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>

          @if($withdrawal->status === 'processing')
            <!-- Approve -->
            <form action="{{ route('admin.withdrawal.approve', $withdrawal->id) }}" method="POST" class="d-inline">
              @csrf
              @method('post')
              <button type="submit" class="btn btn-outline-success px-4"
                      onclick="return confirm('Approve this withdrawal? This will mark it as completed.')">
                <i class="bi bi-check-circle me-1"></i> Approve
              </button>
            </form>

            <!-- Cancel -->
            <form action="{{ route('admin.withdrawals.cancel', $withdrawal->id) }}" method="POST" class="d-inline">
              @csrf
              @method('post')
              <button type="submit" class="btn btn-outline-danger px-4"
                      onclick="return confirm('Cancel this withdrawal? Balance will be refunded.')">
                <i class="bi bi-x-circle me-1"></i> Cancel
              </button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
@empty
  <!-- No modal needed if no withdrawals -->
@endforelse
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

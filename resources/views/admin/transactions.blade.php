<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Transactions - TESLA Admin</title>

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

    .badge-deposit    { background: #22c55e; color: white; }
    .badge-withdrawal { background: #ef4444; color: white; }
    .badge-bonus      { background: #f59e0b; color: #000; }
    .badge-pending    { background: #3b82f6; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 0.25rem rgba(59,130,246,0.25);
    }

    .filter-btn {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #ccc;
    }

    .filter-btn.active,
    .filter-btn:hover {
      background: #3b82f6;
      color: white;
      border-color: #3b82f6;
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
        <a href="{{ route('admin.packages') }}" class="nav-link">
          <i class="bi bi-bag-check"></i> Plans / Packages
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.transactions') }}" class="nav-link active">
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
      <h1 class="display-5 fw-bold mb-0">Manage Transactions</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Transactions</h5>
            <i class="bi bi-receipt stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">48,921</h2>
          <p class="text-info small mb-0">All time</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Deposits Today</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-success">$142,870</h2>
          <p class="text-success small mb-0">+14% vs yesterday</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Withdrawals Today</h5>
            <i class="bi bi-cash-stack stat-icon text-danger"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-danger">$87,420</h2>
          <p class="text-danger small mb-0">8 pending</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Transactions</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">193</h2>
          <p class="text-warning small mb-0">Awaiting review</p>
        </div>
      </div>
    </div>

    <!-- Search & Filters -->
    <div class="card card-dark mb-5">
      <div class="card-body">
        <div class="row g-3 align-items-center">
          <div class="col-md-5">
            <div class="input-group input-group-lg">
              <span class="input-group-text bg-dark border-secondary"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control search-input" placeholder="Search by TXN ID, user, amount...">
            </div>
          </div>
          <div class="col-md-4">
            <div class="btn-group flex-wrap gap-2 w-100" role="group">
              <button type="button" class="btn filter-btn active px-4 py-2">All</button>
              <button type="button" class="btn filter-btn px-4 py-2">Deposits</button>
              <button type="button" class="btn filter-btn px-4 py-2">Withdrawals</button>
              <button type="button" class="btn filter-btn px-4 py-2">Bonuses</button>
            </div>
          </div>
          <div class="col-md-3">
            <select class="form-select form-select-lg form-control-dark">
              <option>All Status</option>
              <option>Completed</option>
              <option>Pending</option>
              <option>Failed</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- Transactions Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col">TXN ID</th>
                <th scope="col">User</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example rows – replace with real loop -->

              @forelse ($deposits as $deposit)
                <tr>
                  <td>{{ $deposit->txn_id ?? 'DEP-' . str_pad($deposit->id, 8, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $deposit->user->name ?? 'N/A' }} ({{ $deposit->user->id ?? 'N/A' }})</td>
                  <td><span class="badge badge-deposit">Deposit</span></td>
                  <td class="text-success">+${{ number_format($deposit->amount, 2) }}</td>
                  <td>{{ ucfirst($deposit->payment_method) }}</td>
                  <td>{{ $deposit->created_at->format('M d, Y H:i') }}</td>
                  <td><span class="badge bg-{{ $deposit->status == 'approved' ? 'success' : ($deposit->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($deposit->status) }}</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#viewTransactionModal{{ $deposit->id }}">
                      <i class="bi bi-eye"></i> View
                    </button>
                  </td>
                </tr>
              @empty
                <!-- If no deposits, we'll show withdrawals or empty message below -->
              @endforelse

              @forelse ($withdrawals as $withdrawal)
                <tr>
                  <td>{{ $withdrawal->txn_id ?? 'WD-' . str_pad($withdrawal->id, 8, '0', STR_PAD_LEFT) }}</td>
                  <td>{{ $withdrawal->user->name ?? 'N/A' }} ({{ $withdrawal->user->id ?? 'N/A' }})</td>
                  <td><span class="badge badge-withdrawal">Withdrawal</span></td>
                  <td class="text-danger">-${{ number_format($withdrawal->amount, 2) }}</td>
                  <td>{{ ucfirst($withdrawal->payment_method) }}</td>
                  <td>{{ $withdrawal->created_at->format('M d, Y H:i') }}</td>
                  <td><span class="badge bg-{{ $withdrawal->status == 'completed' ? 'success' : ($withdrawal->status == 'cancelled' ? 'danger' : 'warning') }}">{{ ucfirst($withdrawal->status) }}</span></td>
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#viewTransactionModal{{ $withdrawal->id }}">
                      <i class="bi bi-eye"></i> View
                    </button>
                  </td>
                </tr>
              @empty
                @if ($deposits->isEmpty() && $withdrawals->isEmpty())
                  <tr>
                    <td colspan="8" class="text-center text-muted py-5">
                      No transactions found.
                    </td>
                  </tr>
                @endif
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination (combined or separate) -->
      <div class="card-footer bg-transparent border-top border-secondary">
        <div class="d-flex justify-content-between align-items-center">
          <div class="text-secondary">
            Showing {{ $deposits->firstItem() + $withdrawals->firstItem() }} -
            {{ $deposits->lastItem() + $withdrawals->lastItem() }} of
            {{ $deposits->total() + $withdrawals->total() }} transactions
          </div>
          <div>
            {{ $deposits->links('pagination::bootstrap-5') }}
            {{ $withdrawals->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- View Transaction Modal (shared for deposits & withdrawals) -->
@foreach ([$deposits, $withdrawals] as $collection)
  @forelse ($collection as $tx)
    <div class="modal fade" id="viewTransactionModal{{ $tx->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content card-dark border-0 shadow-lg">
          <div class="modal-header border-bottom border-secondary">
            <h5 class="modal-title fw-bold fs-4">
              {{ $tx instanceof \App\Models\Deposit ? 'Deposit' : 'Withdrawal' }} Details
              <small class="text-muted ms-2">TXN-{{ $tx->txn_id ?? $tx->id }}</small>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <div class="row g-4">
              <div class="col-md-6">
                <p><strong>User:</strong> {{ $tx->user->name ?? 'N/A' }} (ID: {{ $tx->user->id ?? 'N/A' }})</p>
                <p><strong>Email:</strong> {{ $tx->user->email ?? 'N/A' }}</p>
                <p><strong>Amount:</strong>
                  <span class="{{ $tx instanceof \App\Models\Deposit ? 'text-success' : 'text-danger' }}">
                    {{ $tx instanceof \App\Models\Deposit ? '+' : '-' }}${{ number_format($tx->amount, 2) }}
                  </span>
                </p>
              </div>
              <div class="col-md-6">
                <p><strong>Method:</strong> {{ ucfirst($tx->payment_method) }}</p>
                <p><strong>Status:</strong>
                  <span class="badge bg-{{ $tx->status == 'approved' ? 'success' : ($tx->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($tx->status) }}</span>
                </p>
                <p><strong>Date:</strong> {{ $tx->created_at->format('M d, Y • h:i A') }}</p>
              </div>
            </div>

            @if($tx->proof_image)
              <div class="mt-4">
                <label class="fw-semibold text-secondary">Proof of Payment</label>
                <a href="{{ Storage::url($tx->proof_image) }}" target="_blank" class="btn btn-outline-light btn-sm mt-2">
                  <i class="bi bi-eye me-1"></i> View Proof
                </a>
              </div>
            @endif
          </div>
          <div class="modal-footer border-top border-secondary">
            <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  @empty
    <!-- No modal if empty -->
  @endforelse
@endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

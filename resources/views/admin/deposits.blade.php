<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Deposits - SUNHILL Admin</title>

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
    .badge-failed      { background: #ef4444; color: white; }

    .search-input {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #fff;
    }

    .search-input:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
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
        <a href="{{ route('admin.deposits') }}" class="nav-link active">
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
      <i class="bi bi-box-arrow-right"></i> Logout
    </div>
  </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Manage Deposits</h1>
      <span class="text-secondary">February 24, 2026</span>
    </div>

    <!-- Quick Stats -->
    <div class="row g-4 mb-5">
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Total Deposits</h5>
            <i class="bi bi-currency-dollar stat-icon text-success"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$4,872,190</h2>
          <p class="text-success small mb-0">+187,420 this month</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Pending Deposits</h5>
            <i class="bi bi-hourglass-split stat-icon text-warning"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1 text-warning">124</h2>
          <p class="text-warning small mb-0">$218,450 awaiting</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Today's Deposits</h5>
            <i class="bi bi-sun-fill stat-icon text-info"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$92,840</h2>
          <p class="text-info small mb-0">+18% vs yesterday</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-dark text-center p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Avg. Deposit</h5>
            <i class="bi bi-graph-up-arrow stat-icon text-primary"></i>
          </div>
          <h2 class="display-6 fw-bold mb-1">$1,240</h2>
          <p class="text-primary small mb-0">Up from $980 last month</p>
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
              <input type="text" class="form-control search-input" placeholder="Search by user, TXN ID, amount...">
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
          <div class="col-md-4">
            <div class="d-flex gap-2">
              <button class="btn btn-outline-success w-50 btn-lg">
                <i class="bi bi-check-circle me-2"></i> Approve All Pending
              </button>
              <button class="btn btn-outline-light w-50 btn-lg">
                <i class="bi bi-funnel me-2"></i> Filter
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Deposits Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
              <tr>
                <th>Transaction Ref</th>
                <th>User</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            <tbody>
              <!-- Example rows – replace with real loop -->
              @forelse ($deposits as $deposit)
                <tr>
                  <td>{{ $deposit->tx_ref }}</td>
                  <td>{{ $deposit->user->name }} ({{ $deposit->user->username }})</td>
                  <td class="text-success">+${{ number_format($deposit->amount, 2) }}</td>
                  <td>{{ $deposit->payment_method }}</td>
                  <td>{{ $deposit->created_at->format('M d, Y g:i A') }}</td>
                  <td><span class="badge bg-{{ $deposit->status == 'approved' ? 'success' : ($deposit->status == 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($deposit->status) }}</span></td>
                  <td>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-light view-deposit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#viewDepositModal"
                                data-id="{{ $deposit->id }}"
                                data-tx_ref="{{ $deposit->tx_ref }}"
                                data-user="{{ $deposit->user ? $deposit->user->name . ' (@' . $deposit->user->username . ')' : '—' }}"
                                data-amount="{{ number_format($deposit->amount, 2) }}"
                                data-method="{{ $deposit->payment_method }}"
                                data-date="{{ $deposit->created_at->format('M d, Y g:i A') }}"
                                data-status="{{ ucfirst($deposit->status) }}"
                                data-proof="{{ $deposit->proof_image ? asset('storage/proofs/' . $deposit->proof_image) : '' }}"
                                data-proof-fallback="No proof image uploaded">   <!-- Optional custom message -->
                            <i class="bi bi-eye"></i> View
                        </button>
                      @if ($deposit->status == 'pending')
                      <form action="{{ route('admin.deposits.approve', $deposit->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-success"><i class="bi bi-check-circle"></i> Approve</button>
                      </form>
                      <form action="{{ route('admin.deposits.reject', $deposit->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Reject</button>
                      </form>
                      @endif
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-muted py-5">
                    No deposits found.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
    </div>

  </div>
</main>

<!-- Scripts -->
<!-- View Deposit Modal -->
<div class="modal fade" id="viewDepositModal" tabindex="-1" aria-labelledby="viewDepositModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="viewDepositModalLabel">Deposit Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark text-light">
                <div class="row g-4 bg-dark">
                    <div class="col-md-6">
                        <strong>Transaction Ref:</strong>
                        <p id="modal-tx_ref" class="mb-1"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>User:</strong>
                        <p id="modal-user" class="mb-1"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Amount:</strong>
                        <p id="modal-amount" class="mb-1 text-success fw-bold"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Payment Method:</strong>
                        <p id="modal-method" class="mb-1"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Date:</strong>
                        <p id="modal-date" class="mb-1"></p>
                    </div>
                    <div class="col-md-6">
                        <strong>Status:</strong>
                        <p id="modal-status" class="mb-1">
                            <span id="modal-status-badge" class="badge"></span>
                        </p>
                    </div>
                    <!-- Existing row grid ... -->

                    <!-- Proof Image Section -->
                    <div class="mt-4">
                        <strong>Proof of Payment:</strong>
                        <div class="text-center mt-2" id="modal-proof-container">
                            <img id="modal-proof-img"
                                src=""
                                alt="Proof of Payment"
                                class="img-fluid rounded shadow"
                                style="max-height: 400px; display: none;">
                            <p id="modal-proof-fallback" class="text-muted mt-3" style="display: none;"></p>
                            <!-- Click to enlarge hint -->
                            <small class="text-muted d-block mt-2" id="modal-proof-hint" style="display: none;">
                                Click image to view full size
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Optional: Add more fields like proof image, notes, etc. later -->
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- You can add Approve/Reject buttons here too if you want them in modal -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const viewModal = document.getElementById('viewDepositModal');

    if (viewModal) {
        viewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            // Existing data extraction...
            const txRef   = button.getAttribute('data-tx_ref');
            const user    = button.getAttribute('data-user');
            const amount  = button.getAttribute('data-amount');
            const method  = button.getAttribute('data-method');
            const date    = button.getAttribute('data-date');
            const status  = button.getAttribute('data-status');

            // New: proof
            const proofUrl     = button.getAttribute('data-proof');
            const fallbackText = button.getAttribute('data-proof-fallback') || 'No proof image uploaded';

            // ── Update existing fields ──
            document.getElementById('modal-tx_ref').textContent = txRef;
            document.getElementById('modal-user').textContent   = user;
            document.getElementById('modal-amount').textContent = '$' + amount;
            document.getElementById('modal-method').textContent = method;
            document.getElementById('modal-date').textContent   = date;

            const badge = document.getElementById('modal-status-badge');
            badge.textContent = status;
            if (status.toLowerCase() === 'approved') {
                badge.className = 'badge bg-success';
            } else if (status.toLowerCase() === 'rejected') {
                badge.className = 'badge bg-danger';
            } else {
                badge.className = 'badge bg-warning text-dark';
            }

            // ── Handle proof image ──
            const imgElement   = document.getElementById('modal-proof-img');
            const fallbackElem = document.getElementById('modal-proof-fallback');

            if (proofUrl && proofUrl.trim() !== '') {
                imgElement.src = proofUrl;
                imgElement.style.display = 'block';
                fallbackElem.style.display = 'none';
            } else {
                imgElement.style.display = 'none';
                fallbackElem.textContent = fallbackText;
                fallbackElem.style.display = 'block';
            }
            if (proofUrl && proofUrl.trim() !== '') {
                // ... existing
                document.getElementById('modal-proof-hint').style.display = 'block';

                // Optional: open in new tab on click
                imgElement.onclick = function() {
                    window.open(proofUrl, '_blank');
                };
            } else {
                // ... existing
                document.getElementById('modal-proof-hint').style.display = 'none';
            }
        });
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transactions - SUNHILL</title>

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
      font-weight: 500;
    }

    .badge-deposit    { background: #22c55e; color: white; }
    .badge-withdrawal { background: #ef4444; color: white; }
    .badge-bonus      { background: #f59e0b; color: #000; }
    .badge-refund     { background: #3b82f6; color: white; }

    .filter-btn {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #ccc;
    }

    .filter-btn.active,
    .filter-btn:hover {
      background: #22c55e;
      color: #000;
      border-color: #22c55e;
    }
  </style>
</head>
<body>

<!-- Sidebar Navigation -->
<!-- Sidebar Navigation -->
<aside class="sidebar">
  <a href="{{ route('user.dashboard') }}" class="sidebar-brand">SUNHILL</a>
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
        <a class="nav-link" href="{{ route('user.withdraw') }}">
          <i class="uil uil-money-withdraw"></i> Withdraw
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('user.transactions') }}">
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

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
      <h1 class="display-5 fw-bold mb-0">Transactions</h1>
      <span class="text-secondary">{{ now()->format('l, d M Y') }}</span>
    </div>

    <!-- Quick Filters -->
    <div class="mb-4">
      <div class="btn-group flex-wrap gap-2" role="group">
        <button type="button" class="btn filter-btn active px-4 py-2">All</button>
        <button type="button" class="btn filter-btn px-4 py-2">Deposits</button>
        <button type="button" class="btn filter-btn px-4 py-2">Withdrawals</button>
        <button type="button" class="btn filter-btn px-4 py-2">Bonuses</button>
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
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example rows – replace with real  loop -->
              <!-- Example row inside your table -->
              <tr>
                <td>TXN-987654321</td>
                <td>Deposit</td>
                <td class="text-success">+$2,500.00</td>
                <td>USDT (TRC20) deposit via wallet</td>
                <td>Feb 20, 2026 14:35</td>
                <td><span class="badge badge-deposit">Completed</span></td>
                <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#transactionModal"
                            data-txn-id="TXN-987654321"
                            data-type="Deposit"
                            data-amount="2500.00"
                            data-currency="USDT (TRC20)"
                            data-description="Deposit via wallet (TRC20 network)"
                            data-date="February 20, 2026 14:35"
                            data-status="Completed"
                            data-wallet="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp"
                            data-tx-hash="0xabcdef1234567890...">
                    <i class="bi bi-eye"></i> View
                    </button>
                </td>
              </tr>
              <tr>
                <td>TXN-987654320</td>
                <td>Withdrawal</td>
                <td class="text-danger">-$1,200.00</td>
                <td>Bitcoin withdrawal request</td>
                <td>Feb 18, 2026 09:12</td>
                <td><span class="badge badge-processing">Processing</span></td>
              </tr>
              <tr>
                <td>TXN-987654319</td>
                <td>Bonus</td>
                <td class="text-warning">+$150.00</td>
                <td>Referral bonus (Level 2)</td>
                <td>Feb 15, 2026 11:20</td>
                <td><span class="badge badge-bonus">Credited</span></td>
              </tr>
              <tr>
                <td>TXN-987654318</td>
                <td>Deposit</td>
                <td class="text-success">+$500.00</td>
                <td>Bank transfer deposit</td>
                <td>Feb 10, 2026 16:45</td>
                <td><span class="badge badge-deposit">Completed</span></td>
              </tr>
              <tr>
                <td colspan="6" class="text-center text-muted py-5">
                  No more transactions found.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</main>

<!-- Scripts -->

<!-- Transaction Details Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content card-dark border-0 shadow-lg">

      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold fs-4" id="transactionModalLabel">Transaction Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-4">
        <div class="row g-4">

          <!-- Left Column -->
          <div class="col-md-6">
            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Transaction ID</label>
              <p class="fs-5 fw-bold mb-0" id="modalTxnId">TXN-987654321</p>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Type</label>
              <p class="fs-5 fw-bold mb-0" id="modalType">Deposit</p>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Amount</label>
              <p class="fs-4 fw-bold mb-0 text-success" id="modalAmount">+$2,500.00</p>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Status</label>
              <span class="badge badge-deposit fs-6 px-3 py-2" id="modalStatus">Completed</span>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-md-6">
            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Date & Time</label>
              <p class="fs-5 fw-bold mb-0" id="modalDate">February 20, 2026 14:35</p>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Description</label>
              <p class="fs-5 mb-0" id="modalDescription">USDT (TRC20) deposit via wallet</p>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Wallet / Address</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-dark" id="modalWallet" value="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp" readonly>
                <button class="btn btn-outline-success" type="button" onclick="copyWallet()">Copy</button>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label text-secondary fw-semibold small">Transaction Hash</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-dark" id="modalTxHash" value="0xabcdef1234567890..." readonly>
                <button class="btn btn-outline-success" type="button" onclick="copyTxHash()">Copy</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer border-top border-secondary">
        <button type="button" class="btn btn-outline-light px-4" data-bs-dismiss="modal">Close</button>
        <a href="#" class="btn btn-outline-success px-4" id="modalDownloadBtn">
          <i class="bi bi-download me-2"></i> Download Receipt
        </a>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to populate modal dynamically -->
<script>
// Copy functions
function copyWallet() {
  const el = document.getElementById('modalWallet');
  el.select();
  document.execCommand('copy');
  alert('Wallet address copied!');
}

function copyTxHash() {
  const el = document.getElementById('modalTxHash');
  el.select();
  document.execCommand('copy');
  alert('Transaction hash copied!');
}

// Populate modal when opened
const transactionModal = document.getElementById('transactionModal');
transactionModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget; // Button that triggered the modal

  // Extract data from button attributes
  const txnId      = button.getAttribute('data-txn-id');
  const type       = button.getAttribute('data-type');
  const amount     = button.getAttribute('data-amount');
  const currency   = button.getAttribute('data-currency') || '';
  const description = button.getAttribute('data-description');
  const date       = button.getAttribute('data-date');
  const status     = button.getAttribute('data-status');
  const wallet     = button.getAttribute('data-wallet');
  const txHash     = button.getAttribute('data-tx-hash');

  // Fill modal fields
  document.getElementById('modalTxnId').textContent = txnId;
  document.getElementById('modalType').textContent = type;
  document.getElementById('modalAmount').textContent = (amount > 0 ? '+' : '') + '$' + Number(amount).toLocaleString('en-US', {minimumFractionDigits: 2});
  document.getElementById('modalAmount').className = `fs-4 fw-bold mb-0 ${amount > 0 ? 'text-success' : 'text-danger'}`;
  document.getElementById('modalDescription').textContent = description;
  document.getElementById('modalDate').textContent = date;
  document.getElementById('modalWallet').value = wallet || 'N/A';
  document.getElementById('modalTxHash').value = txHash || 'N/A';

  // Status badge
  const statusEl = document.getElementById('modalStatus');
  statusEl.textContent = status;
  statusEl.className = `badge fs-6 px-3 py-2 badge-${status.toLowerCase() === 'completed' ? 'deposit' : status.toLowerCase() === 'processing' ? 'processing' : 'cancelled'}`;

  // Optional: Download button link (you can generate PDF via backend)
  // document.getElementById('modalDownloadBtn').href = `/transactions/${txnId}/receipt`;
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

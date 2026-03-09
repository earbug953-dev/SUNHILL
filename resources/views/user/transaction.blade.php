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

  <style>
    * {
      transition: all 0.3s ease;
    }

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
      background: #22c55e;
      border: none;
      color: white;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      font-size: 1.25rem;
      cursor: pointer;
      z-index: 1002;
      box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
    }

    .sidebar-toggle:hover {
      background: #16a34a;
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
      background: linear-gradient(135deg, transparent, rgba(34, 197, 94, 0.1));
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
      background: #22c55e;
      transform: scaleY(0);
      transform-origin: top;
      transition: transform 0.3s ease;
    }

    .nav-link:hover {
      background: rgba(34, 197, 94, 0.1);
      color: #fff;
      padding-left: 1.5rem;
    }

    .nav-link:hover::before {
      transform: scaleY(1);
    }

    .nav-link.active {
      background: rgba(34, 197, 94, 0.15);
      color: #22c55e;
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
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
    }

    .table-dark td {
      border-color: #333;
      vertical-align: middle;
      padding: 1rem 0.75rem;
    }

    .table-dark tbody tr:hover {
      background: rgba(34, 197, 94, 0.05);
    }

    .badge {
      font-size: 0.85rem;
      padding: 0.5em 0.85em;
      font-weight: 600;
      border-radius: 6px;
    }

    .badge-deposit    { background: #22c55e; color: white; }
    .badge-withdrawal { background: #ef4444; color: white; }
    .badge-bonus      { background: #f59e0b; color: #000; }
    .badge-refund     { background: #3b82f6; color: white; }
    .badge-processing { background: #8b5cf6; color: white; }

    .filter-btn {
      background: #1a1a1a;
      border: 1px solid #444;
      color: #888;
      font-weight: 500;
      transition: all 0.3s;
    }

    .filter-btn:hover {
      background: rgba(34, 197, 94, 0.1);
      border-color: #22c55e;
      color: #22c55e;
    }

    .filter-btn.active {
      background: #22c55e;
      color: #000;
      border-color: #22c55e;
      font-weight: 700;
    }

    .btn-outline-light {
      color: #888;
      border-color: #444;
    }

    .btn-outline-light:hover {
      background: rgba(34, 197, 94, 0.1);
      border-color: #22c55e;
      color: #22c55e;
    }

    .btn-outline-success {
      color: #22c55e;
      border-color: #22c55e;
    }

    .btn-outline-success:hover {
      background: #22c55e;
      border-color: #22c55e;
      color: #000;
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: white;
      border-radius: 6px;
      font-size: 0.95rem;
    }

    .form-control-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
      background: #1a1a1a;
      color: white;
    }

    .form-control-dark::placeholder {
      color: #666;
    }

    .form-label {
      color: #888;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 600;
    }

    .modal-content {
      background: #111;
      border: 1px solid #333;
      border-radius: 12px;
    }

    .modal-header {
      background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
      border-bottom: 1px solid #333;
    }

    .input-group-text {
      background: #1a1a1a;
      border-color: #444;
      color: #888;
    }

    .btn-close-white {
      filter: invert(1);
    }

    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .page-header h1 {
      margin: 0;
    }

    .text-secondary {
      color: #888 !important;
    }

    .text-success {
      color: #22c55e !important;
    }

    .text-danger {
      color: #ef4444 !important;
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
        <a class="nav-link" href="{{ route('user.packages') }}">
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
        <a class="nav-link active" href="{{ route('user.transactions') }}">
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
  <div class="container-fluid px-0">

    <!-- Page Header -->
    <div class="page-header">
      <h1 class="display-5 fw-bold">
        <i class="bi bi-receipt me-2 text-success"></i> Transactions
      </h1>
      <span class="text-secondary fs-5">{{ now()->format('l, d M Y') }}</span>
    </div>

    <!-- Quick Filters -->
    <div class="mb-4">
      <p class="text-secondary small fw-semibold mb-2">
        <i class="bi bi-funnel me-2"></i> FILTER BY TYPE
      </p>
      <div class="btn-group flex-wrap gap-2" role="group">
        <button type="button" class="btn filter-btn active px-4 py-2">
          <i class="bi bi-list me-1"></i> All
        </button>
        <button type="button" class="btn filter-btn px-4 py-2">
          <i class="bi bi-plus-circle me-1"></i> Deposits
        </button>
        <button type="button" class="btn filter-btn px-4 py-2">
          <i class="bi bi-dash-circle me-1"></i> Withdrawals
        </button>
        <button type="button" class="btn filter-btn px-4 py-2">
          <i class="bi bi-gift me-1"></i> Bonuses
        </button>
      </div>
    </div>

    <!-- Transactions Table -->
    <div class="card card-dark shadow-lg overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-borderless mb-0">
            <thead>
              <tr>
                <th scope="col">
                  <i class="bi bi-hash me-1"></i> TXN ID
                </th>
                <th scope="col">
                  <i class="bi bi-tag me-1"></i> Type
                </th>
                <th scope="col">
                  <i class="bi bi-currency-dollar me-1"></i> Amount
                </th>
                <th scope="col">
                  <i class="bi bi-info-circle me-1"></i> Description
                </th>
                <th scope="col">
                  <i class="bi bi-calendar me-1"></i> Date
                </th>
                <th scope="col">
                  <i class="bi bi-check-circle me-1"></i> Status
                </th>
                <th scope="col">
                  <i class="bi bi-eye me-1"></i> Action
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($transactions as $txn)
                <tr>
                  <td>{{ $txn['TXN_ID'] }}</td>
            <td>{{ $txn['Type'] }}</td>
            <td>${{ number_format($txn['Amount'],2) }}</td>
            <td>{{ $txn['Description'] }}</td>
            <td>{{ $txn['Date'] }}</td>
            <td>{{ $txn['Status'] }}</td>
                  <td>
                    <button class="btn btn-sm btn-outline-light"
                            data-bs-toggle="modal"
                            data-bs-target="#transactionModal"
                            data-txn-id="{{ $transaction->tx_ref }}"
                            data-type="Withdrawal"
                            data-amount="-{{ $transaction->amount }}"
                            data-currency="USD"
                            data-description="{{ ucfirst($transaction->payment_method) }} withdrawal via wallet"
                            data-date="{{ $transaction->created_at->format('F j, Y g:i A') }}"
                            data-status="Completed"
                            data-wallet="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp"
                            data-tx-hash="0x{{ substr(hash('sha256', $transaction->id), 0, 32) }}">
                      <i class="bi bi-eye"></i> View
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center text-secondary py-5">
                    <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 0.5rem;"></i>
                    No transactions found.
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

<!-- Transaction Details Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title fw-bold fs-4" id="transactionModalLabel">
          <i class="bi bi-receipt me-2"></i> Transaction Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-4">
        <div class="row g-4">

          <!-- Left Column -->
          <div class="col-md-6">
            <div class="mb-4">
              <label class="form-label">Transaction ID</label>
              <p class="fs-5 fw-bold mb-0" id="modalTxnId">
                <code class="text-success">TXN-987654321</code>
              </p>
            </div>

            <div class="mb-4">
              <label class="form-label">Type</label>
              <p class="fs-5 fw-bold mb-0" id="modalType">Deposit</p>
            </div>

            <div class="mb-4">
              <label class="form-label">Amount</label>
              <p class="fs-4 fw-bold mb-0 text-success" id="modalAmount">+$2,500.00</p>
            </div>

            <div class="mb-4">
              <label class="form-label">Status</label>
              <p class="mb-0">
                <span class="badge badge-deposit fs-6 px-3 py-2" id="modalStatus">Completed</span>
              </p>
            </div>
          </div>

          <!-- Right Column -->
          <div class="col-md-6">
            <div class="mb-4">
              <label class="form-label">Date & Time</label>
              <p class="fs-5 fw-bold mb-0" id="modalDate">February 20, 2026 14:35</p>
            </div>

            <div class="mb-4">
              <label class="form-label">Description</label>
              <p class="fs-5 mb-0 text-secondary" id="modalDescription">USDT (TRC20) deposit via wallet</p>
            </div>

            <div class="mb-4">
              <label class="form-label">Wallet Address</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-dark" id="modalWallet" value="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp" readonly>
                <button class="btn btn-outline-success" type="button" onclick="copyWallet()">
                  <i class="bi bi-clipboard me-1"></i> Copy
                </button>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label">Transaction Hash</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-dark" id="modalTxHash" value="0xabcdef1234567890..." readonly>
                <button class="btn btn-outline-success" type="button" onclick="copyTxHash()">
                  <i class="bi bi-clipboard me-1"></i> Copy
                </button>
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
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

  // Filter button functionality
  const filterButtons = document.querySelectorAll('.filter-btn');
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
    });
  });

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
    const button = event.relatedTarget;

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
    document.getElementById('modalTxnId').innerHTML = `<code class="text-success">${txnId}</code>`;
    document.getElementById('modalType').textContent = type;
    document.getElementById('modalAmount').textContent = (amount > 0 ? '+' : '') + '$' + Math.abs(Number(amount)).toLocaleString('en-US', {minimumFractionDigits: 2});
    document.getElementById('modalAmount').className = `fs-4 fw-bold mb-0 ${amount > 0 ? 'text-success' : 'text-danger'}`;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalDate').textContent = date;
    document.getElementById('modalWallet').value = wallet || 'N/A';
    document.getElementById('modalTxHash').value = txHash || 'N/A';

    // Status badge
    const statusEl = document.getElementById('modalStatus');
    statusEl.textContent = status;
    const statusLower = status.toLowerCase();
    statusEl.className = `badge fs-6 px-3 py-2 badge-${statusLower === 'completed' ? 'deposit' : statusLower === 'processing' ? 'processing' : 'withdrawal'}`;

    // Download button link
    document.getElementById('modalDownloadBtn').href = `/transactions/${txnId}/receipt`;
  });
</script>

</body>
</html>

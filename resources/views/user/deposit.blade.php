<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Deposit Funds - SUNHILL</title>

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

    .payment-method-card {
      background: #111;
      border: 2px solid #333;
      border-radius: 12px;
      padding: 16px 20px;
      cursor: pointer;
      transition: all 0.3s;
      user-select: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 500;
    }

    .payment-method-card:hover {
      border-color: #555;
      background: #1a1a1a;
      transform: translateY(-4px);
      box-shadow: 0 6px 20px rgba(34, 197, 94, 0.15);
    }

    .payment-method-card input[type="radio"] {
      accent-color: #22c55e;
      cursor: pointer;
    }

    .payment-method-card.selected {
      border-color: #22c55e;
      background: #0f2a1a;
      box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
    }

    .form-control-dark {
      background: #1a1a1a;
      border: 1px solid #444;
      color: white;
      border-radius: 8px;
    }

    .form-control-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34, 197, 94, 0.25);
      background: #1a1a1a;
      color: white;
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .form-label {
      color: #e0e0e0;
      font-weight: 600;
    }

    .card-dark {
      background: #111;
      border: 1px solid #333;
      border-radius: 16px;
    }

    .card-dark .card-header {
      background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
      border-bottom: 1px solid #333;
      border-radius: 15px 15px 0 0;
    }

    .btn-success {
      background: #22c55e;
      border-color: #22c55e;
      font-weight: 600;
    }

    .btn-success:hover {
      background: #16a34a;
      border-color: #16a34a;
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

    .btn-outline-light {
      color: #ccc;
      border-color: #444;
    }

    .btn-outline-light:hover {
      background: #222;
      border-color: #666;
      color: #fff;
    }

    .alert-box {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1050;
      min-width: 320px;
      max-width: 90%;
      background: rgba(239, 68, 68, 0.15);
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: #fca5a5;
    }

    .badge-success-subtle {
      background: rgba(34, 197, 94, 0.15);
      color: #86efac;
    }

    .alert-warning {
      background: rgba(245, 158, 11, 0.15);
      border: 1px solid rgba(245, 158, 11, 0.3);
      color: #fde047;
    }

    .alert-warning strong {
      color: #fbbf24;
    }

    .text-secondary-subtle {
      color: #888;
    }

    .border-secondary-subtle {
      border-color: #333 !important;
    }

    .bg-secondary {
      background: #1a1a1a !important;
      border: 1px solid #333;
    }

    .shadow-xl {
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
    }

    .text-muted {
      color: #888;
    }

    .text-white-50 {
      color: #666;
    }

    /* Modal Styling */
    .modal-content {
      background: #111;
      border: 1px solid #333;
      border-radius: 16px;
    }

    .modal-header {
      background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
      border-bottom: 1px solid #333;
      border-radius: 15px 15px 0 0;
    }

    .modal-body {
      padding: 2rem;
    }

    .input-group-lg .input-group-text {
      background: #1a1a1a;
      border-color: #444;
      color: #888;
    }

    .badge {
      font-weight: 600;
    }

    .display-heading {
      background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
  </style>
</head>
<body>

@if (session("success"))
  <script>
    alert("{{ session('success') }}")
  </script>
@endif

@if (session("error"))
  <script>
    alert("{{ session('error') }}")
  </script>
@endif

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
        <a class="nav-link active" href="{{ route('user.deposit') }}">
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
  <!-- Alert / Toast -->
  <div class="alert alert-danger alert-dismissible fade show alert-box d-none" role="alert" id="alertBox">
    <i class="bi bi-exclamation-circle me-2"></i>
    <strong>Please choose a payment method</strong> by clicking on it
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <!-- Deposit Form -->
  <section class="py-4">
    <div class="container-xl">
      <!-- Page Header -->
      <div class="text-center mb-5">
        <h1 class="display-4 fw-bold mb-3">
          <i class="bi bi-cash-coin me-2 text-success"></i> Deposit Funds
        </h1>
        <p class="lead text-secondary mb-2">Quickly and securely add funds to your account</p>
        <p class="text-muted">Choose your preferred crypto payment method and enter the amount you wish to deposit.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="card card-dark shadow-lg">
            <div class="card-body p-4 p-md-5">
              <form action="{{ route('user.deposit.confirm') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Amount Input -->
                <div class="mb-5">
                  <label for="amount" class="form-label fs-5">
                    <i class="bi bi-currency-dollar me-2"></i> Deposit Amount
                  </label>
                  <input type="number" class="form-control form-control-lg form-control-dark"
                         id="amount" name="amount" placeholder="Enter amount (minimum $50)"
                         min="50" step="0.01" required>
                  <div class="form-text text-muted mt-2">
                    <i class="bi bi-info-circle me-1"></i> Minimum deposit: <strong>$50</strong>
                  </div>
                </div>

                <!-- Payment Methods -->
                <div class="mb-5">
                  <p class="fs-5 fw-semibold mb-4">
                    <i class="bi bi-wallet2 me-2"></i> Choose Payment Method
                  </p>
                  <div class="row g-3" id="paymentMethods">
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="xrp">
                        <span><i class="bi bi-currency-btc me-2" style="color: #23f7dd;"></i> XRP</span>
                        <input type="radio" name="payment_method" value="xrp" id="xrp">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="dogecoin">
                        <span><i class="bi bi-coin me-2" style="color: #c1a633;"></i> Dogecoin</span>
                        <input type="radio" name="payment_method" value="dogecoin">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="bnb">
                        <span><i class="bi bi-lightning-fill me-2" style="color: #f3ba2f;"></i> BNB</span>
                        <input type="radio" name="payment_method" value="bnb">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="usdt">
                        <span><i class="bi bi-circle-fill me-2" style="color: #26a17b;"></i> USDT</span>
                        <input type="radio" name="payment_method" value="usdt">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="solana">
                        <span><i class="bi bi-brightness-high-fill me-2" style="color: #9945ff;"></i> Solana</span>
                        <input type="radio" name="payment_method" value="solana">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="ethereum">
                        <span><i class="bi bi-hexagon-fill me-2" style="color: #627eea;"></i> Ethereum</span>
                        <input type="radio" name="payment_method" value="ethereum">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="tron">
                        <span><i class="bi bi-star-fill me-2" style="color: #eb0029;"></i> Tron</span>
                        <input type="radio" name="payment_method" value="tron">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card" data-value="bitcoin">
                        <span><i class="bi bi-currency-bitcoin me-2" style="color: #f7931a;"></i> Bitcoin</span>
                        <input type="radio" name="payment_method" value="bitcoin">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Proceed Button -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal"
                        class="btn btn-success btn-lg w-100 py-3 fw-bold fs-5" id="proceedBtn">
                  <i class="bi bi-arrow-right-circle me-2"></i> Proceed To Payment
                </button>
              </form>

              <!-- Summary Card -->
              <div class="card bg-secondary border-0 mt-5">
                <div class="card-body text-center py-4">
                  <p class="text-muted mb-1 fs-5">
                    <i class="bi bi-info-circle me-2"></i> Total Deposit
                  </p>
                  <h2 class="fw-bold mb-0 fs-2 text-success" id="totalDeposit">$0.00</h2>
                  <a href="{{ route('user.transactions') }}" class="text-success text-decoration-none d-block mt-3 fs-5 fw-500">
                    View deposit history <i class="bi bi-arrow-right ms-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Payment Modal -->
  <div class="modal fade" id="depositModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content card-dark">
        <div class="modal-header border-bottom border-secondary-subtle">
          <div>
            <h4 class="modal-title fw-bold fs-3">
              <i class="bi bi-wallet2 me-2 text-success"></i> Complete Your Deposit
            </h4>
            <small class="text-secondary-subtle">Securely send funds to the provided wallet address</small>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Deposit Summary -->
          <div class="row mb-5">
            <div class="col-md-6">
              <div class="card bg-dark border-secondary-subtle">
                <div class="card-body text-center p-4">
                  <p class="text-secondary-subtle fs-5 fw-medium mb-2">Deposit Amount</p>
                  <h2 class="display-5 fw-bold text-success mb-1" id="confirmAmount">$0.00</h2>
                  <small class="text-muted">No hidden fees</small>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-dark border-secondary-subtle">
                <div class="card-body text-center p-4">
                  <p class="text-secondary-subtle fs-5 fw-medium mb-2">Payment Method</p>
                  <h5 class="fw-bold text-uppercase" id="confirmMethod">Select Method</h5>
                  <div class="badge badge-success-subtle mt-2">Active</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Wallet Address Section -->
          <div class="card bg-dark border-secondary-subtle mb-5">
            <div class="card-header bg-transparent border-bottom border-secondary-subtle py-3">
              <h5 class="mb-0 fw-bold">
                <i class="bi bi-wallet2 me-2"></i> Wallet Address
              </h5>
            </div>
            <div class="card-body p-4">
              <p class="text-secondary-subtle mb-3 fs-5">Send funds to this address:</p>

              <div class="input-group input-group-lg mb-4">
                <input type="text" class="form-control form-control-dark border-end-0"
                       id="walletAddress" value="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp" readonly>
                <button class="btn btn-outline-success px-4 fw-medium" type="button" onclick="copyToClipboard()">
                  <i class="bi bi-clipboard me-2"></i> Copy
                </button>
              </div>

              <!-- QR Code -->
              <div class="text-center mb-4">
                <p class="text-secondary-subtle mb-3 fs-6">Scan QR Code:</p>
                <div class="bg-white p-4 rounded-3 d-inline-block" style="max-width: 220px;">
                  <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{ urlencode('rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp') }}&choe=UTF-8"
                       alt="Wallet QR Code" class="img-fluid">
                </div>
                <p class="text-muted small mt-2">Or scan to send payment</p>
              </div>
            </div>
          </div>

          <!-- Proof Upload Section -->
          <form action="{{ route('user.deposit.confirm') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="amount" id="hiddenAmount">
            <input type="hidden" name="payment_method" id="hiddenMethod">

            <div class="card bg-dark border-secondary-subtle mb-4">
              <div class="card-header bg-transparent border-bottom border-secondary-subtle py-3">
                <h5 class="mb-0 fw-bold">
                  <i class="bi bi-image me-2"></i> Proof of Payment
                </h5>
              </div>
              <div class="card-body p-4">
                <p class="text-secondary-subtle mb-4">
                  Upload a screenshot or receipt of your payment:
                </p>

                <div class="position-relative">
                  <input type="file" name="proof_image" id="proofImageInput" accept="image/*" class="form-control form-control-dark d-none">

                  <div class="d-flex flex-column gap-3">
                    <label for="proofImageInput" class="btn btn-outline-light btn-lg fw-medium w-100">
                      <i class="bi bi-cloud-upload me-2"></i> Choose Proof Image
                    </label>

                    <div class="input-group input-group-lg">
                      <span class="input-group-text bg-dark border-secondary text-muted">
                        <i class="bi bi-file-earmark-image"></i>
                      </span>
                      <input type="text" class="form-control form-control-dark"
                             id="proofFileName" placeholder="No file chosen" readonly>
                    </div>
                  </div>

                  <!-- Live Preview -->
                  <div class="mt-4 text-center d-none" id="proofPreviewContainer">
                    <img id="proofPreview" class="img-fluid rounded-3"
                         style="max-height: 260px; object-fit: contain;" alt="Proof Preview">
                    <small class="text-muted d-block mt-2">Your uploaded proof</small>
                  </div>

                  @error('proof_image')
                    <div class="alert alert-danger mt-2 mb-0">
                      <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Important Notice -->
            <div class="alert alert-warning border-warning-subtle mb-4">
              <div class="d-flex align-items-start">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 mt-1"></i>
                <div>
                  <strong class="d-block mb-2 text-warning">Important Instructions:</strong>
                  <ul class="mb-0 ps-3 text-start">
                    <li>Send the <strong>exact amount</strong> shown above</li>
                    <li>Upload clear proof of payment (screenshot/receipt)</li>
                    <li>Confirmation usually takes <strong>5–30 minutes</strong></li>
                    <li>Double-check wallet address before sending</li>
                    <li>Do not refresh page until submission is complete</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-lg px-5 py-3 fw-bold">
                <i class="bi bi-check-circle-fill me-2"></i> I Have Sent the Payment
              </button>
              <p class="text-muted small mt-3">
                <i class="bi bi-shield-check me-1"></i>
                Your transaction is protected with end-to-end encryption
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

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

  // Copy wallet address
  function copyToClipboard() {
    const addr = document.getElementById('walletAddress');
    addr.select();
    document.execCommand('copy');
    alert('Wallet address copied to clipboard!');
  }

  // Proceed button logic
  document.getElementById('proceedBtn').addEventListener('click', function (e) {
    const amount = document.getElementById('amount').value;
    const selected = document.querySelector('input[name="payment_method"]:checked');

    if (!amount || amount < 50) {
      alert('Please enter a valid amount (minimum $50)');
      e.preventDefault();
      return;
    }

    if (!selected) {
      document.getElementById('alertBox').classList.remove('d-none');
      setTimeout(() => {
        document.getElementById('alertBox').classList.add('d-none');
      }, 5000);
      e.preventDefault();
      return;
    }

    // Update modal with selected values
    document.getElementById('confirmAmount').textContent = `$${parseFloat(amount).toFixed(2)}`;
    document.getElementById('totalDeposit').textContent = `$${parseFloat(amount).toFixed(2)}`;
    document.getElementById('confirmMethod').textContent = selected.value.toUpperCase();
    document.getElementById('hiddenAmount').value = amount;
    document.getElementById('hiddenMethod').value = selected.value;
  });

  // Highlight selected payment card
  document.querySelectorAll('.payment-method-card').forEach(card => {
    card.addEventListener('click', () => {
      document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('selected'));
      card.classList.add('selected');
      card.querySelector('input[type="radio"]').checked = true;
    });
  });

  // File upload preview
  document.getElementById('proofImageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('proofFileName').value = file.name;

      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('proofPreview').src = event.target.result;
        document.getElementById('proofPreviewContainer').classList.remove('d-none');
      };
      reader.readAsDataURL(file);
    }
  });

  // Update total deposit amount
  document.getElementById('amount').addEventListener('input', function() {
    document.getElementById('totalDeposit').textContent = `$${parseFloat(this.value || 0).toFixed(2)}`;
  });
</script>

</body>
</html>

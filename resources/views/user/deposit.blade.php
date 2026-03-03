<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Deposit Funds - SUNHILL</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
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

    .payment-method-card {
      background: #111;
      border: 2px solid #333;
      border-radius: 12px;
      padding: 16px 20px;
      cursor: pointer;
      transition: all 0.25s;
      user-select: none;
    }

    .payment-method-card:hover {
      border-color: #555;
      background: #1a1a1a;
    }

    .payment-method-card input[type="radio"] {
      accent-color: #22c55e;
    }

    .payment-method-card.selected {
      border-color: #22c55e;
      background: #0f2a1a;
      box-shadow: 0 0 0 3px rgba(34,197,94,0.3);
    }

    .form-control-dark {
      background: #111;
      border: 1px solid #444;
      color: white;
    }

    .form-control-dark:focus {
      border-color: #22c55e;
      box-shadow: 0 0 0 0.25rem rgba(34,197,94,0.25);
    }

    .form-control-dark::placeholder {
      color: #888;
    }

    .alert-box {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1050;
      min-width: 320px;
      max-width: 90%;
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
        <a class="nav-link active" href="{{ route('user.deposit') }}">
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
  <!-- Alert / Toast -->
  <div class="alert alert-warning alert-dismissible fade show alert-box d-none" role="alert" id="alertBox">
    <strong>Please choose a payment method by clicking on it</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <!-- Deposit Form -->
  <section class="py-4">
    <div class="container" id="depositStep1">
      <h1 class="display-5 fw-bold mb-4 text-center">Deposit Funds</h1>
      <p class="lead text-center text-muted mb-2">Add funds to your account</p>
      <p class="text-center text-secondary mb-5">Choose your preferred payment method and enter the amount you wish to deposit.</p>

      <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
          <div class="card bg-dark border-secondary shadow-lg">
            <div class="card-body p-4 p-md-5">
              <form action="{{ route('user.deposit.confirm') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-5">
                  <label for="amount" class="form-label fs-4 fw-semibold">Deposit Amount</label>
                  <input type="number" class="form-control form-control-lg form-control-dark" id="amount" name="amount" placeholder="Enter amount to deposit" min="50" required>
                  <div class="form-text text-muted mt-2 fs-5">Minimum deposit: $50</div>
                </div>

                <div class="mb-5">
                  <p class="fs-4 fw-semibold mb-4">Choose payment method</p>
                  <div class="row g-3" id="paymentMethods">
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="xrp">
                        <span>XRP</span>
                        <input type="radio" name="payment_method" value="xrp" id="xrp">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="dogecoin">
                        <span>Dogecoin</span>
                        <input type="radio" name="payment_method" value="dogecoin">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="bnb">
                        <span>BNB Smart Chain</span>
                        <input type="radio" name="payment_method" value="bnb">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="usdt">
                        <span>USDT</span>
                        <input type="radio" name="payment_method" value="usdt">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="solana">
                        <span>Solana</span>
                        <input type="radio" name="payment_method" value="solana">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="ethereum">
                        <span>Ethereum</span>
                        <input type="radio" name="payment_method" value="ethereum">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="tron">
                        <span>Tron</span>
                        <input type="radio" name="payment_method" value="tron">
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                      <div class="payment-method-card d-flex justify-content-between align-items-center" data-value="bitcoin">
                        <span>Bitcoin</span>
                        <input type="radio" name="payment_method" value="bitcoin">
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-success btn-lg w-100 py-3 fw-bold fs-5" id="proceedBtn">
                  Proceed To Payment
                </button>


    <!-- Step 2: Payment Instructions -->
<div class="modal fade" id="depositModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
          <!-- Your deposit summary content here -->
          <div class="text-center mb-5">
    <h1 class="display-5 fw-bold mb-2">Make Your Deposit</h1>
    <p class="text-secondary fs-5">Securely send funds to the provided wallet address</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-9 col-md-10">
      <div class="card bg-dark border border-secondary-subtle shadow-xl rounded-4 overflow-hidden">
        <!-- Card Header -->
        <div class="card-header bg-gradient-dark border-bottom border-secondary-subtle py-4">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <h4 class="mb-0 fw-bold text-white">Deposit Summary</h4>
              <small class="text-secondary">Transaction details & instructions</small>
            </div>
            <div class="badge bg-success-subtle text-success px-3 py-2 fs-6">
              <i class="bi bi-shield-check me-1"></i> Secure
            </div>
          </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-4 p-md-5">

            <!-- Amount -->
            <div class="mb-5 pb-4 border-bottom border-secondary-subtle text-center">
              <p class="text-secondary fs-5 fw-medium mb-2">You are depositing</p>
              <h2 class="display-4 fw-extrabold mb-1 text-success" id="confirmAmount">$0.00</h2>
              <small class="text-muted">Exact amount required – no fees deducted</small>
            </div>

            <!-- Wallet Address -->
            <div class="mb-5 pb-4 text-center">
              <p class="fs-4 fw-semibold mb-3 text-white">Send funds to this wallet address</p>

              <div class="input-group input-group-lg mb-4 shadow-sm">
                <input type="text" class="form-control form-control-dark border-end-0 py-3"
                       id="walletAddress" value="rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp" readonly>
                <button class="btn btn-outline-success px-4 fw-medium" type="button" onclick="copyToClipboard()">
                  <i class="bi bi-clipboard me-2"></i>Copy Address
                </button>
              </div>

              <!-- QR Code -->
              <div class="mb-5">
                <div class="bg-white p-3 rounded-3 d-inline-block shadow" style="max-width: 220px;">
                  <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{ urlencode('rnUBfNn28ZU5kbvHCIMZhUc1WZ5d1qWZp') }}&choe=UTF-8"
                       alt="Wallet QR Code" class="img-fluid">
                </div>
                <p class="text-muted small mt-2">Scan to send payment quickly</p>
              </div>

              <!-- Image Upload Input -->
              <div class="mb-5">
                <label class="form-label fw-semibold fs-5 text-white mb-3 d-block">
                  <i class="bi bi-upload me-2 text-primary"></i> Proof of Payment (Screenshot / Receipt)
                </label>

                <div class="position-relative">
                  <!-- Hidden real file input -->
                  <input type="file" name="proof_image" id="proofImageInput" accept="image/*"
                         class="form-control form-control-dark d-none">

                  <!-- Custom UI -->
                  <div class="d-flex flex-column flex-md-row gap-3 align-items-center justify-content-center">
                    <label for="proofImageInput"
                           class="btn btn-outline-light btn-lg px-5 py-3 fw-medium shadow-sm cursor-pointer hover-lift w-100 w-md-auto">
                      <i class="bi bi-image me-2"></i> Choose Proof Image
                    </label>

                    <div class="flex-grow-1">
                      <div class="input-group input-group-lg">
                        <span class="input-group-text bg-dark border-secondary text-muted">
                          <i class="bi bi-file-earmark-image"></i>
                        </span>
                        <input type="text" class="form-control form-control-dark"
                               id="proofFileName" placeholder="No file chosen" readonly>
                      </div>
                    </div>
                  </div>

                  <!-- Live Preview -->
                  <div class="mt-4 text-center d-none" id="proofPreviewContainer">
                    <img id="proofPreview" class="img-fluid rounded-3 shadow"
                         style="max-height: 260px; object-fit: contain;" alt="Proof Preview">
                    <small class="text-muted d-block mt-2">Your uploaded proof</small>
                  </div>

                  @error('proof_image')
                    <div class="text-danger mt-2 fs-6">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- I Have Sent It Button -->
              <div class="mt-5 pt-4 text-center">
                <button type="submit" class="btn btn-lg btn-success px-5 py-3 fw-bold shadow-lg">
                  <i class="bi bi-check-circle-fill me-2"></i> I Have Sent the Payment
                </button>
                <p class="text-muted small mt-3">
                  Only submit after sending the exact amount and uploading proof
                </p>
              </div>
            </div>

            <!-- Important Notice -->
            <div class="alert alert-warning border-warning-subtle text-warning-emphasis fs-5 p-4 mb-0">
              <div class="d-flex align-items-start">
                <i class="bi bi-exclamation-triangle-fill fs-3 me-3 mt-1"></i>
                <div>
                  <strong class="d-block mb-2">Important:</strong>
                  <ul class="mb-0 ps-4 text-start">
                    <li>Send the <strong>exact amount</strong> shown above</li>
                    <li>Upload clear proof of payment (screenshot/receipt)</li>
                    <li>Confirmations usually take 5–30 minutes</li>
                    <li>Double-check wallet address before sending</li>
                  </ul>
                </div>
              </div>
            </div>

        </div>

        <!-- Card Footer -->
        <div class="card-footer bg-transparent border-0 text-center py-4">
          <p class="text-secondary mb-0">
            <i class="bi bi-shield-lock me-2"></i>
            Your transaction is protected with end-to-end encryption
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
              </form>

              <!-- Summary Card -->
              <div class="card bg-secondary border-0 mt-5">
                <div class="card-body text-center py-4">
                  <p class="text-muted mb-1 fs-5">Total Deposit</p>
                  <h4 class="fw-bold mb-0 fs-3" id="totalDeposit">$0.00</h4>
                  <a href="#" class="text-success text-decoration-none d-block mt-3 fs-5">
                    View deposit history <i class="uil uil-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>


    </div>
    </div>
      </div>
    </div>
  </section>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
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

    document.getElementById('confirmAmount').textContent =
        `$${parseFloat(amount).toFixed(2)}`;
});

// Highlight selected payment card
document.querySelectorAll('.payment-method-card').forEach(card => {
  card.addEventListener('click', () => {
    document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
    card.querySelector('input[type="radio"]').checked = true;
  });
});
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About - SUNHILL</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

  <style>
    :root {
      --primary: #0d6efd;
      --dark: #0a0a0a;
    }

    .hero-bg {
      background: var(--dark);
      color: white;
    }

    .about-hero-text {
      font-size: clamp(2.2rem, 6vw, 4.5rem);
      font-weight: 800;
      line-height: 1.15;
    }

    .about-desc {
      font-size: clamp(1.1rem, 3vw, 1.4rem);
      line-height: 1.7;
      max-width: 920px;
    }

    .overlap-img {
      border-radius: 16px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.35);
      transform: translateY(-60px);
    }

    footer a:hover {
      color: white !important;
      text-decoration: underline;
    }

    .footer-link {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
    }

    .footer-link:hover {
      color: white;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark hero-bg fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="index.php">SUNHILL</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end hero-bg" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">ABOUT</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">MARKETS</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Forex</a></li>
              <li><a class="dropdown-item" href="#">Cryptos</a></li>
              <li><a class="dropdown-item" href="#">Shares</a></li>
              <li><a class="dropdown-item" href="#">Indices</a></li>
              <li><a class="dropdown-item" href="#">Marijuana</a></li>
              <li><a class="dropdown-item" href="#">Energies</a></li>
              <li><a class="dropdown-item" href="#">Metals</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">TRADING</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('register') }}">Platform</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Swaps</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Spreads and Commissions</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Trading Specifications</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">PAMM</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">COMPANY</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{ route('register') }}">Why Us</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Contact</a></li>
            </ul>
          </li>

          <li class="nav-item d-lg-none mt-4">
            <a href="{{ route('login') }}" class="btn btn-outline-light d-block mb-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary d-block">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Desktop buttons -->
    <div class="d-none d-lg-flex gap-3">
      <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
      <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
    </div>
  </div>
</nav>

<!-- Main About Content -->
<section class="py-5 mt-5">
  <div class="container py-5">
    <div class="row align-items-center g-5">

      <!-- Left - Text -->
      <div class="col-lg-6">
        <div class="pe-lg-4">
          <h1 class="about-hero-text mb-4 text-dark">About Us</h1>
          <p class="fw-bold fs-3 mb-4 text-secondary">We're one of the largest stock exchange-listed FX & CFD brokers in the world</p>
          <p class="about-desc text-muted lead">
            Discover the power of trading with confidence on our platform, proudly backed by our status as one of the largest stock exchange-listed FX and CFD brokers in the world. With a strong reputation for reliability and excellence, we offer traders a secure and cutting-edge environment to pursue their financial goals. Join our thriving community of traders today and experience the benefits of partnering with a trusted industry leader as you navigate the exciting world of copy trading. Elevate your trading journey with us and unlock a world of possibilities at your fingertips.
          </p>
        </div>
      </div>

      <!-- Right - Image with overlap effect -->
      <div class="col-lg-6">
        <div class="position-relative">
          <img src="images/Screenshot 2025-12-09 124835.png"
               class="img-fluid overlap-img"
               alt="About SUNHILL trading platform"
               style="max-height: 680px; object-fit: cover;">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row g-5">

      <div class="col-6 col-md-3 col-lg-2">
        <h5 class="fw-bold mb-4 text-uppercase">Markets</h5>
        <ul class="list-unstyled d-grid gap-2">
          <li><a href="#" class="footer-link">Forex</a></li>
          <li><a href="#" class="footer-link">Cryptos</a></li>
          <li><a href="#" class="footer-link">Shares</a></li>
          <li><a href="#" class="footer-link">Indices</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-3 col-lg-2">
        <h5 class="fw-bold mb-4 text-uppercase">Trading</h5>
        <ul class="list-unstyled d-grid gap-2">
          <li><a href="#" class="footer-link">Platform</a></li>
          <li><a href="#" class="footer-link">Pricing</a></li>
          <li><a href="#" class="footer-link">PAMM</a></li>
          <li><a href="#" class="footer-link">Help Centre/FAQ</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-3 col-lg-2">
        <h5 class="fw-bold mb-4 text-uppercase">Company</h5>
        <ul class="list-unstyled d-grid gap-2">
          <li><a href="about.php" class="footer-link">About Us</a></li>
          <li><a href="#" class="footer-link">Why Us</a></li>
          <li><a href="#" class="footer-link">Contact Us</a></li>
          <li>
            <a href="#" class="footer-link">
              <i class="uil uil-whatsapp fs-4 me-2"></i>WhatsApp
            </a>
          </li>
        </ul>
      </div>

      <div class="col-6 col-md-3 col-lg-2">
        <h5 class="fw-bold mb-4 text-uppercase">Account</h5>
        <ul class="list-unstyled d-grid gap-2">
          <li><a href="{{ route('login') }}" class="footer-link">Login</a></li>
          <li><a href="{{ route('register') }}" class="footer-link">Sign Up</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <h5 class="fw-bold mb-4 text-uppercase">Legal</h5>
        <ul class="list-unstyled d-grid gap-2">
          <li><a href="#" class="footer-link">Privacy Policy</a></li>
          <li><a href="#" class="footer-link">Terms of Service</a></li>
          <li><a href="#" class="footer-link">Trade Certificate</a></li>
        </ul>
      </div>

    </div>
  </div>
</footer>

<!-- Copyright -->
<div class="bg-black text-center py-4 border-top border-secondary">
  <p class="text-white-50 mb-0">
    © <span id="year"></span> SUNHILL. All rights reserved.
  </p>
</div>

<!-- Scripts -->
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

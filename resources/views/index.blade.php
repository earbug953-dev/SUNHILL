<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESLA</title>

    <!-- Bootstrap 5 CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


    <!-- Unicons (icons) -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">

    <style>
        /* Remove unwanted spacing */
        .why-us-section {
            padding: 80px 0;
            background: #f8f9fa;
            margin: 0;
        }

        /* Card styling */
        .feature-card {
            background: #ffffff;
            border-radius: 20px;
            padding-top: 100px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        /* Floating circular image */
        .feature-image {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 140px;
            height: 140px;
            background: #ffffff;
            border-radius: 50%;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Card body spacing */
        .feature-card .card-body {
            padding: 30px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .feature-card p {
            color: #6c757d;
            margin: 15px 0 25px;
            flex-grow: 1;
        }

        /* Button styling */
        .feature-card .btn {
            border-radius: 50px;
            padding: 10px 25px;
        }

        /* Minimal custom styles only where Bootstrap is not enough */
        .carousel-item {
            height: 500px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            text-shadow: 1px 1px 6px #0008;
        }

        .stat-box {
            background: #646060;
            color: white;
            padding: 2rem 1.5rem;
            border-radius: 12px;
            min-width: 220px;
        }

        .why-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            overflow: hidden;
            transition: transform 0.25s ease;
        }

        .why-card:hover {
            transform: translateY(-8px);
        }

        .why-icon {
            width: 180px;
            height: 180px;
            object-fit: contain;
            margin: -90px auto 40px;
            background: white;
            border-radius: 50%;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .name-com {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.92);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-owl .hero-slide {
            height: 500px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-owl .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background:  rgba(0,0,0,0.12);
        }

        .hero-owl .container {
            position: relative;
            z-index: 2;
        }


        .loading-bar {
            width: 50px;
            height: 140px;
            background: #444;
            border-radius: 6px;
            animation: loading 1.3s infinite ease-in-out;
        }

        @keyframes loading {
            0%, 100% { transform: scaleY(0.4); opacity: 0.5; }
            50%      { transform: scaleY(1.8); }
        }

        footer a:hover {
            color: #fff !important;
        }
        nav {
            background-color : black;
        }
    </style>
</head>
<body>

<!-- Preloader -->
<div class="name-com" id="preloader">
    <div class="d-flex gap-4">
        <div class="loading-bar" style="animation-delay:0s; background:#8b5cf6;"></div>
        <div class="loading-bar" style="animation-delay:0.1s; background:#fed7aa;"></div>
        <div class="loading-bar" style="animation-delay:0.2s; background:#22d3ee;"></div>
        <div class="loading-bar" style="animation-delay:0.3s; background:#92400e;"></div>
        <div class="loading-bar" style="animation-delay:0.4s; background:#1e40af;"></div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" width="100" height="50" alt="TESLA Logo"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


        
        <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


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


<!-- Hero Owl Carousel -->
<div class="owl-carousel hero-owl">

    <div class="hero-slide" style="background-image: url('{{ asset('images/michael.jpeg') }}'); ">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Next Generation Crypto Trading Platform</h1>
            <p class="lead mb-4">TESLA is an award-winning platform that allows you to trade global financial markets using Bitcoin, USD Tether, USDC and more</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">Get Started</a>
        </div>
    </div>

    <div class="hero-slide" style="background-image: url('{{ asset('images/boy.jpeg') }}');">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Let Top Traders Do The Job For You!</h1>
            <p class="lead mb-4">Copy-trading allows you to automatically copy experienced traders.</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">Get Started</a>
        </div>
    </div>

    <div class="hero-slide" style="background-image: url('{{ asset('images/michael.jpeg') }}');">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Get Paid For Inviting Friends</h1>
            <p class="lead mb-4">Invite friends and get up to 5% of what they pay in trading fees.</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">Get Started</a>
        </div>
    </div>

    <div class="hero-slide" style="background-image: url('{{ asset('images/boy.jpeg') }}');">
        <div class="container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Earn Up To 14% On Investment</h1>
            <p class="lead mb-4">Deposit and earn attractive returns trading cryptocurrencies.</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 py-3">Get Started</a>
        </div>
    </div>

</div>


<!-- TradingView Ticker Tape -->
<div class="bg-dark py-2">
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
            "symbols": [
                {"proName": "FOREXCOM:SPXUSD", "title": "S&P 500"},
                {"proName": "FOREXCOM:NSXUSD", "title": "US 100"},
                {"proName": "FX:EURUSD", "title": "EUR/USD"},
                {"proName": "BITSTAMP:BTCUSD", "title": "Bitcoin"},
                {"proName": "OANDA:GBPUSD", "title": "GBP/USD"},
                {"proName": "FX:USDJPY", "title": "USD/JPY"}
            ],
            "showSymbolLogo": true,
            "colorTheme": "dark",
            "isTransparent": true,
            "displayMode": "adaptive",
            "largeChartUrl": ""
        }
        </script>
    </div>
</div>
<!-- ============================================= -->
<!-- Section: Trade Assets + TradingView Market Overview -->
<!-- ============================================= -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- Left - Text Content -->
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold mb-4">
          Trade Bitcoin, S&P 500, Gold, EURUSD and 100+ assets
        </h1>
        <p class="lead text-muted mb-4">
          Get easy access to Cryptocurrencies, Stock Indices, and Forex markets from a single account.
        </p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3 mb-3">
          Create an Account
        </a>
        <p class="text-muted fs-5">
          Quick registration. Start trading in minutes!
        </p>
      </div>

      <!-- Right - TradingView Widget -->
      <div class="col-lg-6">
        <div class="tradingview-widget-container rounded-3 overflow-hidden shadow-lg"
             style="background:#1d1d1d; min-height:420px;">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
          {
            "colorTheme": "dark",
            "dateRange": "1D",
            "showChart": false,
            "locale": "en",
            "isTransparent": false,
            "showSymbolLogo": true,
            "width": "100%",
            "height": "420",
            "backgroundColor": "#1D1D1D",
            "gridLineColor": "rgba(255, 255, 255, 0.06)",
            "tabs": [
              {
                "title": "Crypto",
                "symbols": [
                  {"s": "BITSTAMP:BTCUSD", "d": "Bitcoin / TetherUS"},
                  {"s": "BITSTAMP:ETHUSD", "d": "Ethereum / TetherUS"},
                  {"s": "BINANCE:USDTUSD", "d": "USDT.D"},
                  {"s": "BINANCE:BNBUSD", "d": "BNBUSD"},
                  {"s": "BINANCE:USDCUSD", "d": "USDC"},
                  {"s": "BINANCE:XRPUSD", "d": "XRPUSD"},
                  {"s": "BINANCE:SOLUSD", "d": "Solana"},
                  {"s": "BINANCE:ADAUSD", "d": "Cardano"},
                  {"s": "BINANCE:DOGEUSD", "d": "Dogecoin"}
                ]
              }
            ]
          }
          </script>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ============================================= -->
<!-- Section: Platform Features / Screenshots -->
<!-- ============================================= -->
<section class="py-5">
  <div class="container text-center">
    <h1 class="display-5 fw-bold mb-4">
      Ensured Assets Trading Services trading platform
    </h1>
    <p class="lead text-muted mb-5 mx-auto" style="max-width: 720px;">
      Be one step ahead and improve your trading results with our industry-leading technology.
    </p>

    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="shadow-lg rounded-4 overflow-hidden">
          <img src="images/ChatGPT Image Nov 22, 2025, 11_56_45 AM.png"
               class="img-fluid w-100"
               alt="Platform feature 1">
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="shadow-lg rounded-4 overflow-hidden">
          <img src="images/ChatGPT Image Nov 22, 2025, 12_29_26 PM.png"
               class="img-fluid w-100"
               alt="Platform feature 2">
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="shadow-lg rounded-4 overflow-hidden">
          <img src="images/ChatGPT Image Nov 22, 2025, 11_56_45 AM.png"
               class="img-fluid w-100"
               alt="Platform feature 3">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ============================================= -->
<!-- Section: Performance Stats -->
<!-- ============================================= -->
<section class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row justify-content-center g-4 g-lg-5">

      <div class="col-6 col-md-3 col-lg-3">
        <div class="text-center p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
          <h3 class="display-5 fw-bold mb-2">7.12 ms</h3>
          <p class="fs-5 text-white-75">Average order execution speed</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="text-center p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
          <h3 class="display-5 fw-bold mb-2">12,000</h3>
          <p class="fs-5 text-white-75">Executed orders per second</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="text-center p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
          <h3 class="display-5 fw-bold mb-2">12+</h3>
          <p class="fs-5 text-white-75">Integrated liquidity providers</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="text-center p-4 rounded-4" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(8px);">
          <h3 class="display-5 fw-bold mb-2">152</h3>
          <p class="fs-5 text-white-75">Countries</p>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ============================================= -->
<!-- Section: Let's Get Started – Product Cards -->
<!-- ============================================= -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-5 fw-bold">Let's get started</h1>
      <p class="lead text-muted">Choose one of the following products that suits your needs</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">

      <!-- Card 1 -->
      <div class="col">
        <form action="{{ route('register') }}" class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden text-center">
          <img src="images/ChatGPT Image Nov 22, 2025, 01_37_40 PM.png"
               class="card-img-top"
               alt="Buy Crypto"
               style="height: 260px; object-fit: cover;">
          <div class="card-body d-flex flex-column p-4">
            <h3 class="card-title fw-bold mb-3">Buy crypto at real price</h3>
            <p class="card-text text-muted flex-grow-1">
              Easily purchase Bitcoin, Ether, Tether and other major digital currencies with VISA/Mastercard or by a bank transfer.
            </p>
            <button type="submit" class="btn btn-primary btn-lg mt-3 px-5">Buy Crypto</button>
          </div>
        </form>
      </div>

      <!-- Card 2 -->
      <div class="col">
        <form action="{{ route('register') }}" class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden text-center">
          <img src="images/ChatGPT Image Nov 22, 2025, 01_43_05 PM.png"
               class="card-img-top"
               alt="Margin Trade"
               style="height: 260px; object-fit: cover;">
          <div class="card-body d-flex flex-column p-4">
            <h3 class="card-title fw-bold mb-3">Margin trade with low fees</h3>
            <p class="card-text text-muted flex-grow-1">
              Trade wide range of markets with our award-winning trading platform. Benefit from low fees, fast order execution, and advanced features to increase your profitability.
            </p>
            <button type="submit" class="btn btn-primary btn-lg mt-3 px-5">Start Trading</button>
          </div>
        </form>
      </div>

      <!-- Card 3 -->
      <div class="col">
        <form action="{{ route('register') }}" class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden text-center">
          <img src="images/ChatGPT Image Nov 22, 2025, 02_10_12 PM.png"
               class="card-img-top"
               alt="Copy Trading"
               style="height: 260px; object-fit: cover;">
          <div class="card-body d-flex flex-column p-4">
            <h3 class="card-title fw-bold mb-3">Copy best traders and get same returns</h3>
            <p class="card-text text-muted flex-grow-1">
              New to trading? Choose and automatically copy the best performing traders and get same returns! Experienced?
            </p>
            <button type="submit" class="btn btn-primary btn-lg mt-3 px-5">Get Started</button>
          </div>
        </form>
      </div>

      <!-- Card 4 -->
      <div class="col">
        <form action="{{ route('register') }}" class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden text-center">
          <img src="images/ChatGPT Image Nov 22, 2025, 02_54_16 PM.png"
               class="card-img-top"
               alt="Earn Interest"
               style="height: 260px; object-fit: cover;">
          <div class="card-body d-flex flex-column p-4">
            <h3 class="card-title fw-bold mb-3">Earn interest on your crypto</h3>
            <p class="card-text text-muted flex-grow-1">
              Earn up to 14% APY on the most popular crypto assets. Interest is paid daily and your assets are never locked — add or withdraw funds at any time.
            </p>
            <button type="submit" class="btn btn-primary btn-lg mt-3 px-5">Get Started</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>


<!-- ============================================= -->
<!-- Section: 1 Platform – Plenty Of Opportunities + Video -->
<!-- ============================================= -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <div class="mb-5">
      <h1 class="display-5 fw-bold">1 Platform – Plenty Of Opportunities</h1>
      <p class="lead text-muted mx-auto" style="max-width: 760px;">
        Buy, hold, trade and earn with one of the world’s fastest and most reliable platforms.
      </p>
    </div>

    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-xl mb-5" style="max-height: 640px;">
      <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
        <source src="images/PrimeStats.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>

    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3">
      Create an Account
    </a>
  </div>
</section>


<!-- ============================================= -->
<!-- Section: Big Stats Numbers -->
<!-- ============================================= -->
<section class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row text-center g-4 g-lg-5 justify-content-center">

      <div class="col-6 col-md-3 col-lg-3">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.07); backdrop-filter: blur(10px);">
          <h1 class="display-4 fw-bold mb-2">$170,000+</h1>
          <p class="fs-4 text-white-75">DAILY VOLUME</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.07); backdrop-filter: blur(10px);">
          <h1 class="display-4 fw-bold mb-2">450,000+</h1>
          <p class="fs-4 text-white-75">CLIENTS</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.07); backdrop-filter: blur(10px);">
          <h1 class="display-4 fw-bold mb-2">$545M+</h1>
          <p class="fs-4 text-white-75">Average trading volume per day</p>
        </div>
      </div>

      <div class="col-6 col-md-3 col-lg-3">
        <div class="p-4 rounded-4" style="background: rgba(255,255,255,0.07); backdrop-filter: blur(10px);">
          <h1 class="display-4 fw-bold mb-2">$5B+</h1>
          <p class="fs-4 text-white-75">Assets Under Management</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================= -->
<!-- Section: Why Us? – Feature Cards -->
<!-- ============================================= -->
<!-- ============================================= -->
<!-- Section: Why Us? – Feature Cards -->
<!-- ============================================= -->
<section class="why-us-section">
  <div class="container text-center">
    <h2 class="display-5 fw-bold mb-5">Why Us?</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

      <!-- Card -->
      <div class="col">
        <div class="feature-card">
          <div class="feature-image">
            <img src="images/ChatGPT Image Nov 26, 2025, 12_01_38 PM.png" alt="Award winning">
          </div>
          <div class="card-body">
            <h4 class="fw-bold">Trade with the best</h4>
            <p>
              Ensured Assets Trading Services has received multiple international awards
              for providing superior online trading services globally.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary mt-auto">Get Started</a>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="col">
        <div class="feature-card">
          <div class="feature-image">
            <img src="images/ChatGPT Image Nov 26, 2025, 12_06_36 PM.png" alt="New opportunities">
          </div>
          <div class="card-body">
            <h4 class="fw-bold">Find new opportunities</h4>
            <p>
              We provide our clients with innovative products and access to
              a wide range of global markets.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary mt-auto">Get Started</a>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="col">
        <div class="feature-card">
          <div class="feature-image">
            <img src="images/ChatGPT Image Nov 26, 2025, 12_15_19 PM.png" alt="Profitability">
          </div>
          <div class="card-body">
            <h4 class="fw-bold">Increase profitability</h4>
            <p>
              Benefit from low fees, fast execution, and advanced tools
              designed to maximize your trading performance.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary mt-auto">Get Started</a>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="col">
        <div class="feature-card">
          <div class="feature-image">
            <img src="images/ChatGPT Image Nov 26, 2025, 12_15_16 PM.png" alt="Security">
          </div>
          <div class="card-body">
            <h4 class="fw-bold">Privacy & Security</h4>
            <p>
              Our platform protects your funds and personal data with
              industry-leading security standards.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary mt-auto">Get Started</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- ============================================= -->
<!-- Section: Copy leading traders – Covesting Module -->
<!-- ============================================= -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-5 fw-bold">
        Copy leading traders with Covesting Copy-trading Module
      </h1>
    </div>

    <div class="row align-items-center g-5 flex-lg-row-reverse">

      <!-- Text column -->
      <div class="col-lg-5">
        <div class="d-flex flex-column gap-5">
          <div>
            <h3 class="fw-bold mb-3 fs-2">New to trading?</h3>
            <p class="lead text-muted fs-5">
              Choose among best performing strategies and automatically copy their trading activity to get the same returns!
            </p>
          </div>

          <div>
            <h3 class="fw-bold mb-3 fs-2">Experienced trader?</h3>
            <p class="lead text-muted fs-5">
              Make additional income with Covesting Copy-trading Module. Earn up to 20% of all profits earned for your followers!
            </p>
          </div>
        </div>
      </div>

      <!-- Image / Screenshot column -->
      <div class="col-lg-7">
        <div class="rounded-4 overflow-hidden shadow-xl">
          <img src="images/Screenshot 2025-11-26 141223.png"
               class="img-fluid w-100"
               alt="Covesting Copy-trading Dashboard"
               style="min-height: 420px; object-fit: cover;">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================= -->
<!-- Section: As seen on (Logos / Media Mentions) -->
<!-- ============================================= -->
<section class="py-5 bg-white border-top">
  <div class="container text-center">
    <h2 class="fs-3 fw-bold text-muted mb-5">As seen on</h2>

    <div class="row justify-content-center align-items-center g-5 g-lg-5">
      <!-- You can adjust g-* gap or add more responsive classes as needed -->

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <img src="images/Screenshot 2025-12-01 at 13-13-42 Home - Ensured Assets Trading Services.png"
             class="img-fluid"
             alt="Media logo 1"
             style="max-height: 80px; width: auto; filter: grayscale(80%); opacity: 0.9;">
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <img src="images/Screenshot 2025-12-01 at 13-13-53 Home - Ensured Assets Trading Services.png"
             class="img-fluid"
             alt="Media logo 2"
             style="max-height: 80px; width: auto; filter: grayscale(80%); opacity: 0.9;">
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <img src="images/Screenshot 2025-12-01 at 13-14-11 Home - Ensured Assets Trading Services.png"
             class="img-fluid"
             alt="Media logo 3"
             style="max-height: 80px; width: auto; filter: grayscale(80%); opacity: 0.9;">
      </div>

      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <img src="images/Screenshot 2025-12-01 at 13-16-33 Home - Ensured Assets Trading Services.png"
             class="img-fluid"
             alt="Media logo 4"
             style="max-height: 80px; width: auto; filter: grayscale(80%); opacity: 0.9;">
      </div>

      <!-- Uncomment if you want to add the 5th one later -->
      <!--
      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <img src="images/Screenshot 2025-12-01 at 13-14-19 Home - Ensured Assets Trading Services.png"
             class="img-fluid"
             alt="Media logo 5"
             style="max-height: 80px; width: auto; filter: grayscale(80%); opacity: 0.9;">
      </div>
      -->
    </div>
  </div>
</section>


<!-- ============================================= -->
<!-- Footer -->
<!-- ============================================= -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row g-5">

      

    </div>
  </div>
</footer>


<!-- Copyright Bar -->
<div class="bg-black text-center py-4 border-top border-secondary">
  <p class="text-white-50 mb-0">
    © <span id="year"></span> TESLA. All rights reserved.
  </p>
</div>

<!-- Rest of your sections would continue here in similar fashion -->

<!-- Bootstrap JS -->
<!-- jQuery (Required) -->
<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $('.hero-owl').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: true,
        });
    });
</script>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<!-- Bootstrap JS (already included earlier in head/body) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Hide preloader
    window.addEventListener("load", () => {
        document.getElementById("preloader").style.display = "none";
    });

    // Year in footer
    document.getElementById("year") && (document.getElementById("year").textContent = new Date().getFullYear());
</script>



</body>
</html>

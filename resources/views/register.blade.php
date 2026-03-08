<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TESLA Registration</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #0a0e1a 0%, #1a1f2e 100%);
      color: #e2e8f0;
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      padding: 20px;
    }

    .container {
      background: black;
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 48px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .logo {
      text-align: center;
      margin-bottom: 32px;
    }

    .logo h1 {
      font-size: 32px;
      font-weight: 600;
      background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin: 0;
    }

    .subtitle {
      text-align: center;
      font-size: 16px;
      color: #94a3b8;
      margin-bottom: 40px;
    }

    .form-group {
      margin-bottom: 24px;
      position: relative;
    }

    label {
      display: block;
      font-size: 14px;
      font-weight: 500;
      color: #cbd5e1;
      margin-bottom: 8px;
    }

    input[type="email"],
    input[type="text"],
    input[type="tel"],
    input[type="password"] {
      width: 100%;
      height: 48px;
      padding: 12px 16px;
      font-size: 16px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      color: #e2e8f0;
      outline: none;
      transition: all 0.2s ease;
    }

    input[type="email"]:focus,
    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="password"]:focus {
      border-color: #4f46e5;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
      background: rgba(255, 255, 255, 0.1);
    }

    input::placeholder {
      color: #64748b;
    }

    .checkbox-group {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 32px;
      font-size: 14px;
    }

    .checkbox-group input[type="checkbox"] {
      width: auto;
      height: auto;
      margin: 0;
      accent-color: #4f46e5;
    }

    .checkbox-group label {
      margin: 0;
      cursor: pointer;
      flex: 1;
    }

    .btn {
      width: 100%;
      height: 48px;
      background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
      color: white;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
      margin-bottom: 24px;
    }

    .btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
    }

    .btn:active {
      transform: translateY(0);
    }

    .login-link {
      text-align: center;
      font-size: 14px;
    }

    .login-link a {
      color: #4f46e5;
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .container {
        padding: 32px 24px;
        margin: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <h1><img src="{{ asset('images/logo.png') }}" width="100" height="50" alt="TESLA Logo"></h1>
    </div>
    <p class="subtitle">Create your account to start trading securely.</p>

    <form method="POST" action="{{ url('/register') }}">
        @csrf
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">
        @error('email')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>

        @enderror
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
            @error('name')
                <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
      </div>


      <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" oninput="updatePreview(this.value, 'name')">
        @error('username')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
        @error('phone')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>


      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Create a strong password">
        @error('password')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm your password">
      </div>



      <button type="submit" class="btn">Create Account</button>

      <div class="login-link">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
      </div>
    </form>
  </div>




</body>
</html>

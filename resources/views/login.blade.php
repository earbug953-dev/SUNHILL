<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunhill - Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/cono.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.2.0/css/line.css">
</head>
<body>

    @if (session("error"))
    <script>
        alert("{{ session('error') }}")
    </script>
    @endif

<header>
    <div class="h-main-con container">
        <h1>sunhill</h1>
        <div class="h-p-con">
            <p>Don’t have a Sunhill account?</p>
            <a href="{{ route('register') }}" class="h-btn">Create a new account</a>
        </div>
    </div>
</header>
<button></button>

<div class="containerr">
    <h1>Sign in</h1>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="inputwrapper">
            <input type="email" name="email" placeholder="Email address"  autofocus>
            @error('email')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="inputwrapper">
            <input type="password" name="password" placeholder="Password" >
            @error('password')
            <div style="color: red; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Continue</button>
    </form>

    <div class="separator"><span>OR</span></div>

    <button class="btnn google">
        <i class="uil uil-google"></i> Sign in with Google
    </button>
</div>

</body>
</html>

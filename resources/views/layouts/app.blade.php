<!DOCTYPE html>
<html lang="en" class="text-content">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>le post</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
      body {
          font-family: 'Nunito';
      }
  </style>
</head>
<body class="bg-body flex flex-col min-h-screen">
  <nav class="p-6 bg-main flex justify-between">
    <ul class="flex items-center text-content">
      <li class="p-2">
        <a href="/">
          Home
        </a>
      </li>
      <li class="p-2">
        <a href="{{ route('dashboard') }}">
          Dashboard
        </a>
      </li>
      <li class="p-2">
        <a href="{{ route('posts') }}">
          Posts
        </a>
      </li>
    </ul>
    <ul class="flex items-center">
      @auth
        <li class="p-2">
          <a href="/">
            {{ auth()->user()->name }}
          </a>
        </li>
        <li class="p-2">
          <form action="{{ route('logout') }}" method="post" class="inline p-3">
            @csrf
            <button type="submit">
              Logout
            </button>
          </form>

        </li>
      @endauth
      @guest
        <li class="p-2">
          <a href="/login">
            Login
          </a>
        </li>
        <li class="p-2">
          <a href="{{ route('register') }}">
            Register
          </a>
        </li>
      @endguest
    </ul>
  </nav>
  
  <div class="flex-grow">
    @yield('content')
  </div>

  <footer class="h-8 bg-black text-content">
    <p>Photo by <a href="https://unsplash.com/@inteligencia_eco?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Nacho Fernández</a> on <a href="https://unsplash.com/s/photos/straight-razor?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
  </p>
  </footer>
</body>
</html>

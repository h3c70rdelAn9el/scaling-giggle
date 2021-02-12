<!DOCTYPE html>
<html lang="en">
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
<body class="bg-gray-200">
  <nav class="p-6 mb-3 bg-blue-900 flex justify-between">
    <ul class="flex items-center text-white">
      <li class="p-2">
        <a href="/">
          Home
        </a>
      </li>
      <li class="p-2">
        <a href="/dashboard">
          Dashboard
        </a>
      </li>
      <li class="p-2">
        <a href="/post">
          Posts
        </a>
      </li>
    </ul>
    <ul class="flex items-center text-white">
      <li class="p-2">
        <a href="/">
          Arch Stanton
        </a>
      </li>
      <li class="p-2">
        <a href="/dashboard">
          Login
        </a>
      </li>
      <li class="p-2">
        <a href="{{ route('register') }}">
          Register
        </a>
      </li>
      <li class="p-2">
        <a href="/post">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  @yield('content')
</body>
</html>

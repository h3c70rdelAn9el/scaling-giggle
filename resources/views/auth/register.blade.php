@extends('layouts.app')

@section('content')
  <div class="flex justify-center mx-12 my-12">
    <div class="sm:w-8/12 bg-background p-6 shadow-lg rounded-lg">
      <h1 class="text-4xl mb-2 text-center text-content">Register</h1>
      <form action="{{ route('register') }}" method="post" class="text-black">
        @csrf
        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
          @error('username')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="email@email.com" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
          @error('email')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="********" class="bg-gray-200 border-2 w-full p-3 rounded-lg @error('password') border-red-500 @enderror">
          @error('password')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="sr-only">Repeat Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" class="bg-gray-200 border-2 w-full p-3 rounded-lg">
  
        </div>

        <div class="flex justify-center">
          <button type="submit" class="bg-main shadow-lg text-content px-4 py-3 rounded-lg font-medium hover:bg-body">Register</button>
        </div>
      </form>
    </div>
  </div>
@endsection

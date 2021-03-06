@extends('layouts.app')

@section('content')
  <div class="flex justify-center mx-12 my-12">
    <div class="sm:w-8/12 bg-background p-6 shadow-lg rounded-lg">
      @if (session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-content text-center">
          {{ session('status') }}
        </div>
      @endif

      <h1 class="text-4xl mb-2 text-center">Login</h1>
      <form action="{{ route('login') }}" method="post" class="text-black">
        @csrf
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
          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
          </div>
        </div>

        <div class="flex justify-center">
          <button type="submit" class="bg-main shadow-lg text-content px-4 py-3 rounded-lg font-medium hover:bg-body">Login</button>
        </div>
      </form>
    </div> 
  </div>
@endsection

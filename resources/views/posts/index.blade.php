@extends('layouts.app')

@section('content')
<div class="post">

  <h1 class="text-center text-3xl pb-1">Post Page</h1>
  <div class="flex justify-center">
    <div class="w-10/12 bg-background opacity-80 p-6 rounded-lg">
      @auth
        <form action="{{ route('posts') }}" method="post" class="mb-4">
          @csrf
          <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-200 border-2 w-full p-2 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something..."></textarea>
            
            @error('body')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div>
            <button type="submit" class="bg-main px-4 py-2 rounded font-medium">
              Post
            </button>
          </div>
        </form>
      @endauth

      <div class="post">
        @if ($posts->count())
          @foreach ($posts as $post)
          <div class="post">
            <x-post :post="$post" />
          </div>
          @endforeach
          
          {{ $posts->links() }}
          
        @else
          <p>User has no posts</p>
        @endif
      </div>

    </div>
  </div>
</div>

@endsection

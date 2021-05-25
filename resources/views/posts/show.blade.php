@extends('layouts.app')

@section('content')    
  <h2 class="text-center text-3xl">Post</h2>
  <div class="post border border-content mt-2 mx-10 rounded-md">
    <div class="mb-4 p-2">
      <div class="flex justify-between mb-2">
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">
          {{ $post->user->name }}
        </a>
        <span class="text-sm">{{ $post->created_at->toFormattedDateString() }}</span>

      </div>
      <p class="mb-1">
        {{ $post->body }}
      </p>

      {{-- delete post --}}
      @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500">Delete</button>
        </form>
      @endcan

      {{-- likes --}}
      <div class="flex mt-2 pt-2 items-center">
        @auth
          @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
              @csrf
              <button type="submit" class="text-blue-600">Like</button>
            </form>
          @else
            <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1 ml-2">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-blue-600">Unlike</button>
            </form>
          @endif
        @endauth

        <span class="text-sm ml-4">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
      </div>
    </div>
  </div>
@endsection

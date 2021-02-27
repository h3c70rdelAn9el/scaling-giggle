@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12">
      <h1 class="text-center text-3xl font-medium mb-1">{{ $user->name }}</h1>
      <p class="text-xs mb-1">{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
      <p class="text-xs mb-1">Recieved {{ $user->recievedLikes->count() }} {{ Str::plural('like', $user->recievedLikes->count()) }}</p>
      <div class="post bg-white p-6 rounded-lg">
        @if ($posts->count())
          @foreach ($posts as $post)
            <x-post :post="$post" />
          @endforeach
  
          {{ $posts->links() }}
        @else
          <p>{{ $user->name }} does not have posts.</p>
        @endif

      </div>
    </div>
  </div>
@endsection

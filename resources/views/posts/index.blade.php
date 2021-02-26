@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-gray-300 p-6 rounded-lg">
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
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
            Post
          </button>
        </div>
      </form>

      @if ($posts->count())
        @foreach ($posts as $post)
          <div class="mb-4">
            <a href="" class="font-bold">
              {{ $post->user->name }}
            </a><span class="text-sm text-gray-600">{{ $post->created_at->toFormattedDateString() }}</span>
            <p class="mb-2">
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
            <div class="flex items-center">
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
        @endforeach
        
        {{ $posts->links() }}
        

      @else
        <p>User has no posts</p>
      @endif

    </div>
  </div>
@endsection

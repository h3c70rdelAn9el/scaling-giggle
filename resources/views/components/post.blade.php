@props(['post' => $post])

<div class="post">
<div class="mb-4">
  <a href="{{ route('users.posts', $post->user) }}" class="font-bold">
    {{ $post->user->name }}
  </a><span class="text-sm text-gray-600">{{ $post->created_at->toFormattedDateString() }}</span>
  <p class="mb-1">
    {{ $post->body }}
  </p>
  <a href="{{ route('posts.show', $post) }}" class="text-xs mb-2">Read more...</a>

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
</div>
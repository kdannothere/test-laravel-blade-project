@props(['post', 'full' => false])

<div class="card">

  <div class="card__content mb-12 flex flex-col overflow-hidden rounded-md bg-cyan-100 p-2">

    {{-- Cover image --}}
    @if ($post->image)
      <div class="card__image mb-2 w-1/4 rounded-md">
        <img src="{{ asset('storage/' . $post->image) }}" alt="cover">
      </div>
    @else
      <div class="card__image mb-2 w-1/4 rounded-md">
        <img src="{{ asset('storage/posts_images/default.ico') }}" alt="cover image">
      </div>
    @endif

    {{-- Title --}}
    <h2 class="text-xl font-bold">{{ $post->title }}</h2>

    {{-- Author and Date --}}
    <div class="mb-4 text-xs font-light">
      <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
      <a href="{{ route('posts.user', $post->user) }}"
        class="font-medium text-blue-500 hover:text-blue-700">{{ $post->user->username }}</a>
    </div>

    {{-- Body --}}
    @if ($full)
      <div class="text-sm">
        <span>{{ $post->body }}</span>
      </div>
    @else
      <div class="text-sm">
        <span class="pr-1">{{ Str::words($post->body, 21) }}</span>
        <a href="{{ route('posts.show', $post) }}" class="text-nowrap text-blue-500 hover:text-blue-700">Read more
          &rarr;</a>
      </div>
    @endif

    <div class="mt-6 flex items-center justify-end gap-4">
      {{ $slot }}
    </div>

  </div>
</div>

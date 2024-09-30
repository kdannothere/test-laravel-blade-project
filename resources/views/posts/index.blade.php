<x-layout>

  <h1 class="mb-12 flex flex-nowrap items-end justify-center text-3xl font-bold">Latest Posts <img class="ml-5 inline"
      src="{{ asset('storage/posts_images/default.ico') }}" alt="cover image"></h1>

  <div class="grid grid-cols-2 gap-6">
    @foreach ($posts as $post)
      <x-postCard :post="$post" />
    @endforeach
  </div>

  <div>
    {{ $posts->links() }}
  </div>

</x-layout>

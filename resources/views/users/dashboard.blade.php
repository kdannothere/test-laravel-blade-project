<x-layout>

  <h1 class="text-xl font-bold text-[green]">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts
  </h1>

  {{-- Create Post Form --}}
  <div class="card my-8 max-w-7xl">

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
      class="w-xs mx-auto flex max-w-7xl flex-col items-center bg-white py-12">
      @csrf

      <h2 class="mb-8 text-center text-2xl font-bold">Create a new post</h2>

      {{-- Session Messages --}}
      @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" />
      @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
      @endif

      {{-- Post Title --}}
      <div class="mb-4 flex w-full flex-col px-20">
        <label for="title" class="mb-1">Post Title</label>
        <input type="text" name="title" value="{{ old('title') }}"
          class="input {{ $errors->has('title') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
        @error('title')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      {{-- Post Body --}}
      <div class="flex w-full flex-col px-20">
        <label for="body" class="mb-1">Post Content</label>

        <textarea
          class="input {{ $errors->has('body') ? 'border-red-500' : '' }} resize-none rounded border-2 border-gray-600 px-3"
          name="body" rows="5">{{ old('body') }}</textarea>

        @error('body')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      {{-- Post Image --}}
      <div class="mt-4 flex flex-col text-center">
        <label class="my-4" for="image">Cover photo</label>
        <input type="file" name="image" id="image">

        @error('image')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit Button -->
      <button class="btn mt-10 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300">Create</button>

    </form>
  </div>

  {{-- User Posts --}}
  <h2 class="mb-4 text-3xl font-bold">Your latest posts</h2>

  <div class="grid grid-cols-2 gap-6">

    @foreach ($posts as $post)
      <x-postCard :post="$post">
        {{-- Update post --}}
        <a href="{{ route('posts.edit', $post) }}"
          class="w-fit cursor-pointer rounded-full bg-green-500 px-3 py-1 text-white">Update</a>
        {{-- Delete post --}}
        <form action="{{ route('posts.destroy', $post) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-fit cursor-pointer rounded-full bg-red-500 px-3 py-1 text-white">Delete</button>
        </form>
      </x-postCard>
    @endforeach
  </div>

  <div>
    {{ $posts->links() }}
  </div>

</x-layout>

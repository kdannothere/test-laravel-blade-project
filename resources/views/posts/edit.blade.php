<x-layout>

  <a href="{{ route('dashboard') }}" class="mb-2 block w-fit text-xs text-blue-500">&larr; Go back to your Dashboard</a>

  <div class="card mb-8 max-w-7xl">

    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data"
      class="w-xs mx-auto flex max-w-7xl flex-col items-center bg-white py-12">
      @csrf
      @method('PUT')
      <h2 class="mb-8 text-center text-2xl font-bold">Edit post</h2>

      {{-- Session Messages --}}
      @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}" />
      @endif

      {{-- Post Title --}}
      <div class="mb-4 flex w-full flex-col px-20">
        <label for="title" class="mb-1">Post Title</label>
        <input type="text" name="title" value="{{ $post->title }}"
          class="input {{ $errors->has('title') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
        @error('title')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      {{-- Post Body --}}
      <div class="mb-4 flex w-full flex-col px-20">
        <label for="body" class="mb-1">Post Content</label>

        <textarea
          class="input {{ $errors->has('body') ? 'border-red-500' : '' }} resize-none rounded border-2 border-gray-600 px-3"
          name="body" rows="5">{{ $post->body }}</textarea>

        @error('body')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      {{-- Current cover image if exists --}}
      @if ($post->image)
      <div class="card__image mb-2 flex flex-col w-1/4 justify-center rounded-md">
        <p class="mb-2">Current cover image</p>
          <img src="{{ asset('storage/' . $post->image) }}" alt="cover image">
        </div>
      @endif

      {{-- Post Image --}}
      <div class="mt-4 flex flex-col text-center">
        <label class="my-4" for="image">Cover photo</label>
        <input type="file" name="image" id="image">

        @error('image')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit Button -->
      <button class="btn mt-10 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300">Update</button>

    </form>
  </div>

</x-layout>

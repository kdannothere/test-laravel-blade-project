<x-layout>
  <h1 class="title mx-auto mb-10 w-fit text-[2rem] font-[500]">
    Request a password reset email
  </h1>

  {{-- Session Messages --}}
  @if (session('status'))
    <x-flashMsg msg="{{ session('status') }}" />
  @endif

  <div class="card">
    <form action="{{route('password.request')}}" method="post" class="mx-auto flex max-w-screen-sm flex-col items-center bg-white py-12"
      x-data="formSubmit" @submit.prevent="submit">
      @csrf

      <!-- Email -->
      <div class="mb-4 flex w-80 flex-col">
        <label for="email" class="mb-1">Email</label>
        <input type="text" name="email" value="{{ old('email') }}"
          class="input {{ $errors->has('email') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
        @error('email')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit Button -->
      <button class="btn relative mt-4 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300"
        x-ref="btn">Submit</button>
    </form>
  </div>
</x-layout>

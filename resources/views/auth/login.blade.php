<x-layout>
  <h1 class="title mx-auto mb-10 w-fit text-[2rem] font-[500]">
    Welcome back
  </h1>

  {{-- Session Messages --}}
  @if (session('status'))
    <x-flashMsg msg="{{ session('status') }}" />
  @endif

  <div class="card">
    <form action="{{ route('login') }}" method="post"
      class="mx-auto flex max-w-screen-sm flex-col items-center bg-white py-12" x-data="formSubmit"
      @submit.prevent="submit">
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

      <!-- Password -->
      <div class="mb-4 flex w-80 flex-col">
        <label for="password" class="mb-1">Password</label>
        <input type="password" name="password"
          class="input {{ $errors->has('password') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
        @error('password')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

      {{-- Remember checkbox --}}
      <div class="mb-4 w-80 flex justify-between items-center">
        <div class="cursor-default">
          <input class="cursor-pointer" type="checkbox" name="remember" id="remember">
          <label for="remember" class="font-[500] cursor-pointer text-slate-500 hover:text-[#000]">Remember me</label>
        </div>

        <a class="font-[500] text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">Forgot your password?</a>
      </div>

      @error('failed')
        <p class="error text-[red]">{{ $message }}</p>
      @enderror

      <!-- Submit Button -->
      <button class="btn relative mt-4 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300"
        x-ref="btn">Login</button>
    </form>
  </div>
</x-layout>

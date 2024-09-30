<x-layout>
  <h1 class="title mx-auto mb-10 w-fit text-[2rem] font-[500]">
    Register a new account
  </h1>

  <div class="card">
    <form action="{{ route('register') }}" method="post"
      class="mx-auto flex max-w-screen-sm flex-col items-center bg-white py-12" x-data="formSubmit"
      @submit.prevent="submit">
      @csrf

      <!-- Username -->
      <div class="mb-4 flex w-80 flex-col">
        <label for="username" class="mb-1">Username</label>
        <input type="text" name="username" value="{{ old('username') }}"
          class="input {{ $errors->has('username') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
        @error('username')
          <p class="error text-[red]">{{ $message }}</p>
        @enderror
      </div>

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

      <!-- Confirm password -->
      <div class="mb-4 flex w-80 flex-col">
        <label for="password_confirmation" class="mb-1">Confirm password</label>
        <input type="password" name="password_confirmation"
          class="input {{ $errors->has('password') ? 'border-red-500' : '' }} h-9 rounded border-2 border-gray-600 px-3" />
      </div>

      {{-- Subscribe checkbox --}}
      <div class="mb-4 cursor-default">
        <input class="cursor-pointer" type="checkbox" name="subscribe" id="subscribe">
        <label class="cursor-pointer" for="subscribe" class="font-[500] text-slate-500 hover:text-[#000]">Subscribe to our newsletter</label>
      </div>

      <!-- Submit Button -->
      <button class="btn relative mt-6 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300"
        x-ref="btn">Register</button>
    </form>
  </div>
</x-layout>

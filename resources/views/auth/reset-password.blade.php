<x-layout>
  <h1 class="title mx-auto mb-10 w-fit text-[2rem] font-[500]">
    Reset your password
  </h1>

  <div class="card">
    <form action="{{route('password.update')}}" method="post" class="mx-auto flex max-w-screen-sm flex-col items-center bg-white py-12">
      @csrf

      <input type="hidden" name="token" value="{{$token}}">

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

      <!-- Submit Button -->
      <button class="btn relative mt-6 rounded bg-slate-200 px-6 py-2 font-[500] hover:bg-slate-300">Reset Password</button>
    </form>
  </div>
</x-layout>

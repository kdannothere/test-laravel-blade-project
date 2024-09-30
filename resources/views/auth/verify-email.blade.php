<x-layout>

  <h1 class="mb-4">Please verify your email through the email we've sent you.</h1>

  <p class="mb-2">Didn't get the email?</p>
  <form action="{{ route('verification.send') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
    @csrf

    <button type="submit" x-ref="btn" class="relative rounded bg-blue-500 px-3 py-1 text-white">Send again</button>
  </form>
</x-layout>

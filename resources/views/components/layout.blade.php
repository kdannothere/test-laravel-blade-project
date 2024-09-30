<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>{{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
  <header class="min-w-screen-sm bg-slate-800 py-5 text-slate-100 shadow-lg">
    <nav class="min-h-12 flex items-center justify-between px-8">
      <a href="{{ route('posts.index') }}" class="nav-link hover:font-[500]">Home</a>

      @auth
        <div class="relative grid place-items-center" x-data="{ open: false }">
          {{-- Dropdown menu button --}}
          <button @click="open = !open" class="nav-link">
            <img class="h-8 w-8 rounded-full" src="https://picsum.photos/id/537/354" alt="Profile image">
          </button>
          {{-- <button onclick="{{ AuthController::logout() }}" class="nav-link">Log out</button> --}}

          {{-- Dropdown menu --}}
          <div x-show="open" @click.outside="open = false"
            class="absolute right-0 top-10 overflow-hidden rounded-lg bg-white font-light text-black shadow-lg">
            <p class="username cursor-default px-4 py-2">{{ auth()->user()->username }}</p>

            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-slate-200">Dashboard</a>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="block w-full py-2 pl-2 pr-8 hover:bg-slate-200">Logout</button>
            </form>
          </div>
        </div>
      @endauth

      @guest <div>
          <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
          </div>
        @endguest

    </nav>
  </header>
  <main class="mx-auto max-w-screen-lg px-4 py-8">
    {{ $slot }}
  </main>

  <script>
    // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
    document.addEventListener('alpine:init', () => {
      Alpine.data('formSubmit', () => ({
        submit() {
          this.$refs.btn.disabled = true;
          this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
          this.$refs.btn.classList.add('bg-indigo-400');
          this.$refs.btn.innerHTML =
            `<p class="flex relative flex-nowrap justify-center items-center"><span class="-translate-y-0 transform">
                    <i class="fa-solid mr-1 fa-spinner animate-spin"></i>
                    </span><span>Please wait...</span></p>`;

          this.$el.submit()
        }
      }))
    })
  </script>

</body>

</html>

<!-- filepath: resources/views/Auth/login.blade.php -->
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Login</title>
  </head>
  <body class="min-h-screen min-w-screen flex items-center justify-center bg-[#232b32]">
    <div class="flex w-screen h-screen">
      <!-- Left side with image -->
      <div class="w-1/2 h-full">
        <img src="login.png" alt="Login Image" class="w-full h-full object-cover" />
      </div>
      <!-- Right side with content -->
      <div class="w-1/2 flex items-center justify-center bg-[#232b32]">
        <div class="bg-[#232b32] rounded-xl shadow-2xl w-11/12 max-w-md min-h-[480px] mx-auto">
          <div class="bg-[#161e22] w-full rounded-t-xl">
           <h1 class="text-5xl text-center font-bold p-8 tracking-wide">
  <span class="text-blue-400">My</span> <span class="text-white">Doctor</span>
</h1>
          </div>
          <div>
            <h2 class="text-[#c6d2d9] text-center text-2xl font-semibold mt-8 mb-6">Doctor Login</h2>
          </div>
          @if ($errors->any())
            <div class="w-11/12 mx-auto mb-4 bg-red-500/20 border border-red-500 text-red-300 px-3 py-2 rounded-xl text-sm">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
          @endif

          @if (session('success'))
            <div class="w-11/12 mx-auto mb-4 bg-green-500/20 border border-green-500 text-green-300 px-3 py-2 rounded-xl text-sm">
                {{ session('success') }}
            </div>
          @endif

          <form method="POST" action="/login" class="w-full px-8 mt-2">
            @csrf
            <div class="mb-5">
              <input
                type="text"
                name="name"
                id="user_name"
                placeholder="Enter your User Name"
                class="w-full bg-[#161e22] text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-gray-400"
                required
                autofocus
              />
            </div>
            <div class="mb-6">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Enter your password"
                class="w-full bg-[#161e22] text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder-gray-400"
                required
              />
            </div>
            <button
              type="submit"
              class="w-full bg-[#1da1f2] hover:bg-[#1a8cd8] text-white font-bold py-3 rounded-lg transition"
            >
              Login
            </button>
          </form>
          <div class="bg-[#161e22] w-full text-center text-gray-400 mt-8 p-4 rounded-b-xl">
            <span class="font-bold text-lg text-white">created by @pamod</span>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
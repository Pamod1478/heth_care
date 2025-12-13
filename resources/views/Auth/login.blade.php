<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Login</title>
  </head>
  <body class="min-h-screen min-w-screen flex items-center justify-center bg-gray-100">
    <div class="flex w-screen h-screen bg-white">
      <!-- Left side with image -->
      <div class="w-1/2 h-full flex items-center justify-center bg-blue-100 p-0 m-0">
  <img src="medical1.png" alt="Login Image" class="w-full h-full object-cover rounded-none" />
</div>
      <!-- Right side with content -->
      <div class="w-1/2 bg-[#232b32] h-full flex items-center justify-center p-8">
       <div class="bg-[#232b32] rounded-xl shadow-lg w-11/12 max-w-sm min-h-[445px] mx-auto mt-0 sm:mt-[-100px] lg-mt-0">
        <div class="bg-[#161e22] w-full">
            <h1 class="text-5xl text-center text-blue-400 font-semibold p-7">My Doctor</h1>
        </div>
        <div>
            <h2 class="text-[#c6d2d9] text-center text-2xl font-semibold m-8">Doctor Login</h2>
            {{-- <p class="text-gray-400 text-center text-sm px-6 mb-4">Enter your password to continue</p> --}}
            
               
           
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

         <div class="pb-6">
            <input
                type="string"
                name="name"
                id="user_name"
                placeholder="Enter your User Name"
                class="w-11/12 mx-auto block bg-[#161e22] text-white px-3 py-2.5 rounded-xl focus:outline-none"
                required
                autofocus
            />
            
            
        </div>

        <div>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Enter your password"
                class="w-11/12 mx-auto block bg-[#161e22] text-white px-3 py-2.5 rounded-xl focus:outline-none"
                required
                autofocus
            />
            
            <button
                type="submit"
                class="bg-[#1da1f2] text-white font-medium py-2.5 my-4 w-11/12 mx-auto block rounded-xl hover:bg-[#1a8cd8]"
            >
                Login
            </button>
        </div>
        
        
        <div class="bg-[#161e22] w-full text-center text-gray-500 mt-6 p-3">
            <span class="font-bold text-3xl text-white">databoxtech.io</span><br>
           
        </div>
    </div>
      </div>
    </div>
  </body>
</html>
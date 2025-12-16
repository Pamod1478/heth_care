<!-- filepath: resources/views/components/nav_bar.blade.php -->
<nav class="w-full flex items-center justify-between bg-white px-8  shadow">
    <!-- Left: Logo and App Name -->
    <div class="flex items-center space-x-4">
        <img src="Logo1.png" alt="Logo" class="h-20 w-30 object-contain" />
        {{-- <span class="text-blue-400 text-3xl font-bold pr-10 pl-2">My Doctor</span> --}}
    </div>
    <!-- Right: Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Logout
        </button>
    </form>
</nav>
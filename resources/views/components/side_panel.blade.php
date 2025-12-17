<!-- filepath: resources/views/components/side_panel.blade.php -->
<div class="h-screen w-64 bg-white flex flex-col py-8 px-4 shadow-lg">
    <!-- Logo at top -->
    <div class="flex justify-center mb-8">
        <img src="{{ asset('Logo1.png') }}" alt="Logo" class="h-45 w-auto brightness-110 contrast-125" />
    </div>

    <!-- Navigation buttons -->
    <nav class="flex-1 flex flex-col gap-2">
        <a href="{{ route('give.medicine') }}" class="flex items-center gap-3 px-5 py-3 text-[#161717] font-semibold text-lg hover:bg-green-50 w-full rounded transition">
            <i class="fa-solid fa-pills text-green-500 text-xl"></i>
            Give Medicine
        </a>
        <a href="{{ route('view.patients') }}" class="flex items-center gap-3 px-5 py-3 text-[#161717] font-semibold text-lg hover:bg-blue-50 w-full rounded transition">
            <i class="fa-solid fa-users text-blue-500 text-xl"></i>
            View Patients
        </a>
        <a href="{{ route('total.income') }}" class="flex items-center gap-3 px-5 py-3 text-[#161717] font-semibold text-lg hover:bg-yellow-50 w-full rounded transition">
            <i class="fa-solid fa-coins text-yellow-500 text-xl"></i>
            Total Income
        </a>
    </nav>

    <!-- Logout button at bottom -->
    <form method="POST" action="{{ route('logout') }}" class="mt-8">
        @csrf
        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded font-semibold transition">
            Logout
        </button>
    </form>
</div>
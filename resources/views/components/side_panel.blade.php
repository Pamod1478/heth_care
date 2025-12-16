<!-- filepath: resources/views/components/side_panel.blade.php -->
<div class="h-screen w-64 bg-white flex flex-col py-8 px-4 shadow-lg">
    <!-- Logo at top -->
    <div class="flex justify-center mb-8">
        <img src="{{ asset('Logo1.png') }}" alt="Logo" class="h-35 w-auto brightness-110 contrast-125" />
    </div>

    <!-- Navigation buttons -->
    <div class="flex-1">
        <a href="{{ route('give.medicine') }}" class="flex items-center gap-3 px-6 py-4 text-[#161717] font-semibold text-xl hover:bg-gray-50 w-full rounded">
            <i class="fa-solid fa-pills"></i>
            Give Medicine
        </a>
        <a href="{{ route('view.patients') }}" class="flex items-center gap-3 px-6 py-6 text-[#161717] font-semibold text-xl hover:bg-gray-50 w-full rounded">
            <i class="fa-solid fa-users"></i>
            View Patients
        </a>
        <a href="{{ route('total.income') }}" class="flex items-center gap-3 px-6 py-6 text-[#161717] font-semibold text-xl hover:bg-gray-50 w-full rounded">
            <i class="fa-solid fa-coins"></i>
            Total Income
        </a>
    </div>

    <!-- Logout button at bottom -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded font-semibold">
            Logout
        </button>
    </form>
</div>
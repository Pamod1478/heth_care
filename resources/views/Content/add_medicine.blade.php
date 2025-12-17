<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Add Medicine</title>
</head>
<body class="bg-[#f2f6f8]">
    <div class="flex h-screen">
        <!-- Side Panel -->
        <div class="fixed left-0 top-0 h-screen z-20">
            @include('components.side_panel')
        </div>
        <!-- Main Content -->
        <div class="flex-1 ml-64 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-2xl w-[1300px] min-h-[750px] flex flex-col p-0 overflow-hidden"
                 x-data="{
                    medicines: [{ name: '', dose: '' }],
                    addRow() { this.medicines.push({ name: '', dose: '' }); }
                 }">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-100 to-blue-300 px-10 py-6 border-b border-blue-200">
                    <div class="flex gap-16 text-lg font-semibold text-blue-900">
                        <div><span class="text-gray-700">Name:</span> {{ $patient->name }}</div>
                        <div><span class="text-gray-700">Age:</span> {{ $patient->age }}</div>
                        <div><span class="text-gray-700">Gender:</span> {{ ucfirst($patient->gender) }}</div>
                    </div>
                </div>
                <!-- Form -->
                <form method="POST" action="{{ route('add.medicine.save', $patient->id) }}" class="flex-1 flex flex-col justify-between px-10 py-8">
                    @csrf
                    <div>
                        <div class="mb-6">
                            <div class="flex items-center mb-2">
                                <span class="text-xl font-bold text-gray-800">Medicines</span>
                            </div>
                            <template x-for="(med, idx) in medicines" :key="idx">
                                <div class="flex gap-4 mb-3">
                                    <input type="text" :name="`medicines[${idx}][name]`" x-model="med.name"
                                        class="flex-1 px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition"
                                        placeholder="Medicine Name" required>
                                    <input type="text" :name="`medicines[${idx}][dose]`" x-model="med.dose"
                                        class="flex-1 px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition"
                                        placeholder="Dose" required>
                                </div>
                            </template>
                            <button type="button" @click="addRow"
                                class="mt-2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow transition">
                                + Add Medicine
                            </button>
                        </div>
                        <div class="mb-6 flex gap-6">
                            <div class="flex items-center w-1/2">
                                <label class="block text-gray-700 font-semibold w-24">Price</label>
                                <input type="number" name="price"
                                    class="flex-1 px-4 py-2 rounded border border-gray-300 focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-4 pt-6 border-t border-gray-200 bg-white">
                        <a href="{{ route('give.medicine') }}"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded shadow transition">Cancel</a>
                        <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded shadow transition">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
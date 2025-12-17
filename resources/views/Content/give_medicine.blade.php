<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Give Medicine</title>
</head>

<body class="bg-[#f2f6f8]">
    <div class="flex h-screen">
        <!-- Fixed Side Panel -->
        <div class="fixed left-0 top-0 h-screen z-20">
            @include('components.side_panel')
        </div>
        <!-- Main Content (scrollable) -->
        <div class="flex-1 ml-64 overflow-y-auto p-8" style="max-height: 100vh;" x-data="{
            showDialog: false,
            mobile_number: '',
            name: '',
            age: '',
            gender: '',
            foundPatient: [],
            async fetchPatient() {
                if (this.mobile_number.length === 10) {
                    const res = await fetch(`/api/patient-by-mobile?mobile_number=${this.mobile_number}`);
                    this.foundPatient = await res.json();
                } else {
                    this.foundPatient = [];
                }
            }
        }">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Give Medicine</h1>
            <div class="bg-white p-6 rounded-lg shadow">
                <!-- Step 1: Enter mobile number only -->
                <form @submit.prevent="showDialog = true" class="flex gap-4 items-end">
                    <div class="flex-1">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700 mb-2">Mobile
                            Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" placeholder="Enter mobile number"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                            x-model="mobile_number" @input.debounce.500ms="fetchPatient" required pattern="\d{10}"
                            maxlength="10" minlength="10" title="Mobile number must be exactly 10 digits" />
                    </div>
                    <div class="flex gap-2 flex-shrink-0 pb-0">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition">
                            Submit
                        </button>
                        <button type="button" @click="mobile_number = ''; foundPatient = []"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded-lg transition">
                            Clear
                        </button>

                    </div>
                </form>

                <!-- Show patient info if found -->
                <template x-if="foundPatient && foundPatient.length > 0">
                    <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg shadow">
                        <div class="font-semibold text-blue-700 mb-4 text-lg flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            Patients Found
                        </div>
                        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">
                                            Age</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">
                                            Gender</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <template x-for="patient in foundPatient" :key="patient.id">
                                        <tr class="hover:bg-blue-50 transition">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold"
                                                x-text="patient.name"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"
                                                x-text="patient.age"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="inline-block px-3 py-1 rounded-full"
                                                    :class="{
                                                        'bg-blue-100 text-blue-700': patient.gender === 'male',
                                                        'bg-pink-100 text-pink-700': patient.gender === 'female',
                                                        'bg-gray-200 text-gray-700': patient.gender === 'other'
                                                    }"
                                                    x-text="patient.gender.charAt(0).toUpperCase() + patient.gender.slice(1)">
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a :href="`/add-medicine/${patient.id}`"
                                                    class="bg-green-200 hover:bg-green-300 text-green-900 font-semibold px-4 py-2 rounded transition">
                                                    Medicine
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Dialog for patient details -->
            <div x-show="showDialog" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900/50"
                style="display: none;">
                <div class="bg-gray-800 rounded-lg shadow-xl w-full max-w-lg p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Add Patient Details</h2>
                    <form method="POST" action="{{ route('patients.store') }}"
                        @submit.prevent="
                            fetch('{{ route('patients.store') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({
                                    mobile_number: mobile_number,
                                    name: name,
                                    age: age,
                                    gender: gender
                                })
                            })
                            .then(res => res.json())
                            .then(() => {
                                showDialog = false;
                                name = '';
                                age = '';
                                gender = '';
                                fetchPatient();
                            });
                        ">
                        <div class="mb-4">
                            <label class="block text-white mb-1">Name</label>
                            <input type="text" name="name" x-model="name"
                                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-white mb-1">Age</label>
                            <input type="number" name="age" x-model="age"
                                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-white mb-1">Gender</label>
                            <select name="gender" x-model="gender"
                                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" @click="showDialog = false"
                                class="bg-gray-600 text-white px-4 py-2 rounded">Cancel</button>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add Patient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>

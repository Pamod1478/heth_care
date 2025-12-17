<!-- filepath: resources/views/Content/view_patients.blade.php -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>View Patients</title>
</head>
<body class="bg-[#f2f6f8]">
    <div class="flex h-screen">
        @include('components.side_panel')
        <div class="flex-1  h-screen overflow-y-auto p-8"
            x-data="{
                filter: '',
                gender: '',
                patients: @js($patients),
                get filteredPatients() {
                    return this.patients.filter(p => {
                        const matchesText = !this.filter
                            || p.name.toLowerCase().includes(this.filter.toLowerCase())
                            || String(p.age).includes(this.filter)
                            || p.gender.toLowerCase().includes(this.filter.toLowerCase());
                        const matchesGender = !this.gender || p.gender === this.gender;
                        return matchesText && matchesGender;
                    });
                },
                clearFilter() { this.filter = ''; this.gender = ''; }
            }">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">View Patients</h1>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex flex-wrap gap-4 mb-4 items-center">
                    <input
                        type="text"
                        placeholder="Filter by name, age, or gender"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 flex-1 min-w-[200px]"
                        x-model="filter"
                    />
                    <select
                        x-model="gender"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                        <option value="">All Genders</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <button
                        type="button"
                        @click="clearFilter"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded-lg transition"
                    >Clear</button>
                    <span class="ml-2 text-sm text-gray-600 font-semibold whitespace-nowrap">
                        <span x-text="filteredPatients.length"></span> patient<span x-show="filteredPatients.length !== 1">s</span>
                    </span>
                </div>
                <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Age</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-700 uppercase tracking-wider">Gender</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="patient in filteredPatients" :key="patient.id">
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold" x-text="patient.name"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700" x-text="patient.age"></td>
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
                                </tr>
                            </template>
                            <template x-if="filteredPatients.length === 0">
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">No patients found.</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
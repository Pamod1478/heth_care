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
    <div class="flex">
        @include('components.side_panel')
        
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">View Patients</h1>
            <div class="bg-white p-6 rounded-lg shadow">
                <p>Content for View Patients page goes here...</p>
            </div>
        </div>
    </div>
</body>
</html>
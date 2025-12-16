<!-- filepath: resources/views/Content/view_patients.blade.php -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>View Patients</title>
    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #232b32;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        .loader {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(29, 161, 242, 0.3);
            border-top: 5px solid #1da1f2;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .fade-out {
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-[#f2f6f8]">
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div id="main-content" style="display: none;">
        <div class="flex">
            @include('components.side_panel')
            
            <div class="flex-1 p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">View Patients</h1>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p>Content for View Patients page goes here...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const mainContent = document.getElementById('main-content');
            
            setTimeout(() => {
                preloader.classList.add('fade-out');
                mainContent.style.display = 'block';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }, 800);
        });
    </script>
</body>
</html>
<!-- filepath: resources/views/dashboard.blade.php -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Dashboard</title>
    <style>
        /* Preloader styles */
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
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Main Content -->
    <div id="main-content" style="display: none;">
     
        
        <div class="flex">
            @include('components.side_panel')
            
            <div class="flex-1 p-8">
                {{-- <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, {{ Auth::user()->name }}!</h1> --}}
                <!-- Add your dashboard content here -->
            </div>
        </div>
    </div>

    <script>
        // Hide preloader after page loads
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin')</title>
    <link rel="stylesheet" href="{{ asset('/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/akar-icons-fonts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    .chart-container {
        max-width: 50%; /* Set the maximum width to 50% */
        margin: auto; /* Center the chart */
    }
    @media print {
            .no-print {
                display: none !important;
            }
        }
</style>
</head>
<body class="bg-gray-100">
  
    <aside class="sidebar w-64 h-screen bg-gray-800 text-white p-4">
    <header class="flex flex-col items-center mb-4">
    <img src="{{ asset('img/MacatocBMS.png') }}" alt="Logo" class="rounded-full h-50 w-50"> <!-- Adjusted size -->
    <p class="mt-2 text-2xl font-bold text-center">ProjectBMS</p>
    </header>
        <ul class="mt-16">
            <li class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
                    <i class="ai-dashboard"></i>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li class="mb-4">
            <a href="{{ route('barangays.officials') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
           <i class="ai-person"></i>
          <span class="ml-2">Barangay Officials</span>
          </a>
          </li>
            <li class="mb-4">
                <a href="{{ route('resident.profiling') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
                    <i class="ai-folder-add"></i>
                    <span class="ml-2">Resident Profiling</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('health.sanitation') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
                    <i class="ai-heart"></i>
                    <span class="ml-2">Health and Sanitation</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('clearances.forms') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
                    <i class="ai-folder-add"></i>
                    <span class="ml-2">Clearances and Forms</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('reports') }}" class="flex items-center text-white hover:bg-gray-700 p-2 rounded">
                    <i class="ai-gear"></i>
                    <span class="ml-2">Reports</span>
                </a>
            </li>
            @if(auth()->check())
                <li class="mb-4">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="flex items-center text-white hover:bg-gray-700 p-2 rounded" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ai-home"></i>
                        <span class="ml-2">Logout</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>

    <div id="content" class="ml-64 p-4">
        @yield('content')
    </div>

    <script>
        $(document).ready(function() {
            $('.sidebar-link'). on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var url = $(this).attr('href'); // Get the URL from the link

                // Load the content via AJAX
                $('#content').load(url);
            });
        });
    </script>
    
</body>
</html>
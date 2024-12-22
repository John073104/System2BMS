<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('/styles.css') }}">
  
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,0"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://unpkg.com/akar-icons-fonts"></script>
</head>
<body>
    <aside class="sidebar">
        <header style="display: flex; flex-direction: column; align-items: center; margin-bottom: 1rem;">
            <img src="{{ asset('img/MacatocBMS.png') }}" alt="Logo" style="border-radius: 50%; height: 5rem; width: 5rem;">
            <p style="margin-top: 1rem; font-size: 2rem; font-weight: bold; text-align: center; color: white;">ProjectBMS</p>
        </header>
        <ul style="margin-top: 4rem;"> <!-- Added margin-top to create space -->
            <li>
                <button id="dashboard" class="sidebar-button">
                    <i class="ai-dashboard"></i>
                    <p>Dashboard</p>
                </button>
            </li>
            <li>
                <button id="barangay-officials" class="sidebar-button">
                    <i class="ai-person"></i>
                    <p>Barangay Officials</p>
                </button>
            </li>
            <li>
                <button id="resident-profiling" class="sidebar-button">
                    <i class="ai-folder-add"></i>
                    <p>Resident Profiling</p>
                </button>
            </li>
            <li>
                <button id="health-sanitation" class="sidebar-button">
                    <i class="ai-heart"></i>
                    <p>Health and Sanitation</p>
                </button>
            </li>
            <li>
                <button id="clearances-forms" class="sidebar-button">
                    <i class="ai-folder-add"></i>
                    <p>Clearances and Forms</p>
                </button>
            </li>
            <li>
                <button id="reports" class="sidebar-button">
                    <i class="ai-gear"></i>
                    <p>Reports</p>
                </button>
            </li>
            @if(auth()->check())
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button class="sidebar-button" onclick="event.preventDefault(); document .getElementById('logout-form').submit();">
                        <i class="ai-home"></i>
                        <p>Logout</p>
                    </button>
                </li>
            @endif
        </ul>
    </aside>
</body>
</html>
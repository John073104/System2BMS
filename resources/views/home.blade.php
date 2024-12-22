<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Web Development BMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    
    <style>
        html {
            scroll-behavior: smooth; /* Enable smooth scrolling */
        }
    </style>
</head>
<body class="font-roboto bg-white text-gray-800">

    <!-- Header -->
    <header class="flex justify-between items-center p-6">
        <div class="flex items-center">
            <img alt="Logo of BMS" class="h-20 w-20" height="100" src="{{ asset('/img/MacatocBMS.png') }}" width="100"/>
            <span class="ml-8 text-2xl font-bold">THE PROJECT BMS</span>
        </div>
        <nav class="flex space-x-6 text-gray-600">
            <a class="hover:text-gray-800" href="#home">Home</a>
            <a class="hover:text-gray-800" href="#about">About</a>
            <a class="hover:text-gray-800" href="#services">Services</a>
            <a class="hover:text-gray-800" href="#team">Team</a>
            <a class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="/signup">Signup</a> 
            <a class="bg-green-600 text-white px-4 py-2 rounded hover:bg-blue-700" href="/login">Login</a> 
        </nav>
    </header>

    <main class="text-center mt-20">
        <h1 class="text-5xl font-bold text-gray-900" id="home">
            Transforming Local Governance with Smart Management Solutions.
            <br/>
            <span class="text-yellow-600"> Welcome to Project BMS</span>
        </h1>
        <p class="mt-4 text-lg text-gray-600">
            Enhancing Collaboration and Communication Among Community Stakeholders.
        </p>
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Building a Stronger, More Connected Community for All.</h2>
           
        </div>
        <div class="mt-20">
            <img alt="Illustration of buildings with various tech logos" class="mx-auto" height="400" src="https://storage.googleapis.com/a1aa/image/AHhK7P9ZWfyGCyzwbXkeyLTOeaELtP1sV1pPdULZpe9y7SQPB.jpg" width="800"/>
        </div>
        
      <!-- About Section -->
<div class="mt-10 flex justify-center" id="about">
    <div class="max-w-4xl w-full text-center">
        <h2 class="text-3xl font-bold">About Barangay Management System of Macatoc Victoria</h2>
        <p class="mt-2 text-gray-600">
            The Barangay Management System of Macatoc Victoria is designed to streamline the governance and administrative processes within the barangay. Our goal is to enhance transparency, improve service delivery, and foster community engagement. This system provides tools for efficient record-keeping, communication, and resource management, ensuring that the needs of the community are met effectively.
        </p>
    </div>
</div>

<!-- Services Section -->
<div class="mt-10 flex justify-center" id="services">
    <div class="max-w-4xl w-full text-center">
        <h2 class="text-3xl font-bold">Our Services</h2>
        <p class="mt-2 text-gray-600">
            The Barangay Management System offers a variety of services to support the local government and its constituents, including:
        </p>
        <div class="mt-6 text-left">
            <h3 class="text-2xl font-bold">Admin Features</h3>
            <ul class="mt-4 list-disc list-inside text-gray-600">
                <li>Dashboard: A centralized platform for monitoring and managing barangay activities</li>
                <li>Barangay Officials: A module for managing and updating information about barangay officials</li>
                <li>Resident Profiling: A feature for creating and managing profiles of residents within the barangay</li>
                <li>Health and Sanitation: A module for tracking and managing health and sanitation initiatives within the barangay</li>
                <li>Clearances and Forms: A feature for generating and managing clearances and forms required by the barangay</li>
                <li>Reports: A module for generating and viewing reports on various barangay activities and initiatives</li>
            </ul>
            <h3 class="text-2xl font-bold mt-6">User  Features</h3>
            <ul class="mt-4 list-disc list-inside text-gray-600">
                <li>My Profile: A feature for users to view and update their personal information</li>
                <li>Barangay Officials: A module for viewing information about barangay officials</li>
                <li>Health & Sanitation: A feature for viewing information on health and sanitation initiatives within the barangay</li>
                <li>Clearances & Forms: A feature for viewing and downloading clearances and forms required by the barangay</li>
            </ul>
        </div>
    </div>
</div>
<!-- Team Section -->
<div class="mt-10" id="team">
    <h2 class="text-3xl font-bold">Meet Our Team</h2>
    <p class="mt-2 text-gray-600">This section introduces our team members and their roles in the Barangay Management System.</p>
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Team Member 1 -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('/img/John.png') }}" alt="Team Member 1" class="h-32 w-32 rounded-full border-2 border-gray-300">
            <h3 class="mt-2 text-lg font-semibold">John Lloyd B. Jardines</h3>
            <p class="text-gray-500">Project Leader</p>
        </div>
        <!-- Team Member 2 -->
        <div class="flex flex-col items-center">
            <img src="https://via.placeholder.com/150" alt="Team Member 2" class="h-32 w-32 rounded-full border-2 border-gray-300">
            <h3 class="mt-2 text-lg font-semibold">Maria Clara</h3>
            <p class="text-gray-500">Administrative Officer</p>
        </div>
        <!-- Team Member 3 -->
        <div class="flex flex-col items-center">
            <img src="https://via.placeholder.com/150" alt="Team Member 3" class="h-32 w-32 rounded-full border-2 border-gray-300">
            <h3 class="mt-2 text-lg font-semibold">Jose Rizal</h3>
            <P class="text-gray-500">Community Organizer</P>
        </div>
    </div>
</div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center">
            <p class="text-gray-700">© 2024 JARDINES Project BMS. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
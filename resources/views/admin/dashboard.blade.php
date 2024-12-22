@extends('layouts.app')

@section('content')
<div class="container mx-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h5 class="font-semibold">Total Population</h5>
                <p class="text-xl">{{ $totalPopulation }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h5 class="font-semibold">Total Male</h5>
                <p class="text-xl">{{ $totalMale }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h5 class="font-semibold">Total Female</h5>
                <p class="text-xl">{{ $totalFemale }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h5 class="font-semibold">Total 4Ps Beneficiaries</h5>
                <p class="text-xl">{{ $total4Ps }}</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4">
                <h5 class="font-semibold">Purok Numbers</h5>
                <p class="text-xl">{{ $purokNumbers }}</p>
            </div>
        </div>

        <!-- Canvas for Pie Chart -->
        <div class="bg-white shadow-md rounded-lg p-4 mt-4 chart-container">
            <h5 class="font-semibold">Population Distribution</h5>
            <canvas id="pieChart" width="400" height="400"></canvas>
        </div>

        <!-- Canvas for Bar Chart -->
        <div class="bg-white shadow-md rounded-lg p-4 mt-4 chart-container">
            <h5 class="font-semibold">Population by Gender</h5>
            <canvas id="barChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data for the charts
        const totalMale = {{ $totalMale }};
        const totalFemale = {{ $totalFemale }};
        const totalPopulation = {{ $totalPopulation }};
        const total4Ps = {{ $total4Ps }};
        const purokNumbers = {{ $purokNumbers }};

        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Population Distribution',
                    data: [totalMale, totalFemale],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Population Distribution by Gender'
                    }
                }
            }
        });

        // Bar Chart
        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Total Population', 'Total Male', 'Total Female', 'Total 4Ps Beneficiaries', 'Purok Numbers'],
                datasets: [{
                    label: 'Population Statistics',
                    data: [totalPopulation, totalMale, totalFemale, total4Ps, purokNumbers],
                    backgroundColor: '#4BC0C0',
                    borderColor: '#4BC0C0',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Population Statistics Overview'
                    }
                }
            }
        });
    });
</script>

<h2 class="mt-5 text-xl font-bold ml-60">Submitted Residents</h2>

<!-- Print Button -->
<button onclick="printPage()" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Print</button>

<!-- Printable Content -->
<div id="printableArea">
    <header>
        <!-- Display current date and time -->
        <h1 class="text-center text-2xl font-bold">Submitted Residents</h1>
        <p class="text-center text-sm">Generated on: {{ \Carbon\Carbon::now()->format('l, F j, Y h:i A') }}</p>
    </header>
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border-b-2 border-gray-300 px-4 py-2">First Name</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Last Name</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Gender</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Age</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Purok</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">4Ps Beneficiary</th>
                <th class="border-b-2 border-gray-300 px-4 py-2">Email</th>
                <th class="border-b-2 border-gray-300 px-4 py-2 no-print">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residents as $resident)
                <tr>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->first_name }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->last_name }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ ucfirst($resident->gender) }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->age }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->purok }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->four_ps_beneficiary ? 'Yes' : 'No' }}</td>
                    <td class="border-b border-gray-300 px-4 py-2">{{ $resident->email }}</td>
                    <td class="border-b border-gray-300 px-4 py-2 no-print">
                        <a href="{{ route('residents.show', $resident->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">View</a>
                        <a href="{{ route('residents.edit', $resident->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure you want to delete this resident?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Function to print the content of the printable area
    function printPage() {
        var originalContents = document.body.innerHTML;  // Save the original content
        var printContents = document.getElementById('printableArea').innerHTML;  // Get the printable content
        document.body.innerHTML = printContents;  // Replace the body content with printable content

        window.print();  // Trigger the print dialog

        document.body.innerHTML = originalContents;  // Restore the original content after printing
        window.location.reload();  // Reload the page to reset everything
    }
</script>
@endsection
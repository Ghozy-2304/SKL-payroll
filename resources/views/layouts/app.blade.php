<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
    </script>
    @livewireStyles
</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white transform -translate-x-full md:translate-x-0 transition duration-300 z-50">

        <div class="p-6 text-2xl font-bold border-b border-gray-700">
            🚀 Admin Panel
        </div>

        <nav class="mt-6 space-y-2 px-4">
            <a href="/" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Dashboard</a>
            <a href="/user" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Users</a>
            <a href="/position" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Position</a>
            <a href="/employee" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Employee</a>
            <a href="/payroll" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Payroll</a>
            <a href="/attendance" class="block py-2 px-4 rounded-lg hover:bg-gray-700"> Attendance</a>
            <a href="{{ route('logout') }}" class="block py-2 px-4 rounded-lg bg-red-900 text-red-500"> Log Out</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:ml-64">

        <!-- Navbar -->
        <header class="bg-white shadow p-4 flex items-center justify-between">
            <button onclick="toggleSidebar()" class="md:hidden text-gray-700">
                ☰
            </button>

            <h1 class="text-xl font-semibold">Dashboard</h1>

            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Hi, {{ Auth::user()->name }}</span>
                <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
            </div>
        </header>

        <!-- Content -->
        <main class="p-6 overflow-y-auto">

            

          
            @yield('content')

        </main>
    </div>

</div>
@livewireScripts
</body>
</html>
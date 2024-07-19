<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Styles -->

         @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="sidebar">
    <div class="top">
        <div class="logo">
            <img src="{{ Storage::url('logo.png') }}" alt="logo" width="30">
        </div>
        <button id="toggleSidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>
        <div class="avatar">
            <img src="{{ Storage::url('user.png') }}" alt="user" width="30">
            <div>
                <h5>{{ auth()->user()->name }}</h5>
                <p>{{ auth()->user()->role }}</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="bi bi-people"></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href="{{ route('allocations.index') }}">
                    <i class="bi bi-journals"></i>
                    <span class="nav-item">Allocations</span>
                </a>
                <span class="tooltip">Allocations</span>
            </li>
            <li>
                <a href="{{ route('equipments.index') }}">
                    <i class="bi bi-boxes"></i>
                    <span class="nav-item">Equipment</span>
                </a>
                <span class="tooltip">Equipment</span>
            </li>


        </ul>
        </div>
        <!-- Main content -->
        <div class="main-content">
            <div class="container">
                {{ $slot }}
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const btn = document.querySelector('#toggleSidebar')
        const sidebar = document.querySelector('.sidebar')

        btn.onclick = function () {
            sidebar.classList.toggle('active')
        }
    </script>
</html>

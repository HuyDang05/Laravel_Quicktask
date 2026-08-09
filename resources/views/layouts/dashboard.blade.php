<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Quicktask') }}</title>

    @vite([
        'resources/scss/dashboard.scss',
        'resources/js/app.js'
    ])
</head>
<body>
    <div class="d-flex">
        <aside class="sidebar p-3 text-white" style="width: 240px;">
            <h5 class="mb-4">Quicktask</h5>

            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-home mr-2"></i> Dashboard
                </a>

                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-users mr-2"></i> Users
                </a>

                <a class="nav-link" href="{{ route('tasks.index') }}">
                    <i class="fas fa-tasks mr-2"></i> Tasks
                </a>
            </nav>
        </aside>

        <main class="flex-fill p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
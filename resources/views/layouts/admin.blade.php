<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div style="display: flex; min-height: 100vh;">
        <aside style="width: 220px; background: #222; color: white; padding: 20px;">
            <h2>QuickTask</h2>

            <ul>
                <li><a style="color: white;" href="{{ route('users.index') }}">Users</a></li>
                <li><a style="color: white;" href="{{ route('tasks.index') }}">Tasks</a></li>
            </ul>
        </aside>

        <main style="flex: 1; padding: 24px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
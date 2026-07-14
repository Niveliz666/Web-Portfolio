<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Portfolio Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css?v=' . time()) }}">
</head>
<body class="admin-body">
<div class="admin-wrapper">

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('home') }}" class="sidebar-logo">
                <span class="logo-bracket">&lt;</span>Dev<span class="logo-bracket">/&gt;</span>
            </a>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                Projects
            </a>
            <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                Skills
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Messages
            </a>
            <div class="sidebar-divider"></div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link" style="width: 100%; border: none; background: none; cursor: pointer; text-align: left;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                    Logout
                </button>
            </form>
            <a href="{{ route('home') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                View Portfolio
            </a>
        </nav>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <button class="sidebar-toggle" id="sidebarToggle">
                <span></span><span></span><span></span>
            </button>
            <h1 class="admin-page-title">@yield('page-title', 'Dashboard')</h1>
        </header>
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-error">
                    <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>
</div>
<script>
    const toggle  = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    toggle?.addEventListener('click', () => sidebar.classList.toggle('open'));
</script>
</body>
</html>
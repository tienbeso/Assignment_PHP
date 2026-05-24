<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bank Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

<div class="flex min-h-screen">
    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gradient-to-b from-indigo-800 to-slate-900 text-white">
        <div class="p-5 border-b border-indigo-700/50">
            <h1 class="text-xl font-bold">🏦 Bank Admin</h1>
            <p class="text-xs text-indigo-300 mt-1">Hệ thống quản lý</p>
        </div>
        <nav class="p-4 space-y-1 text-sm">
            <a href="{{ route('bank-accounts.index') }}"
               class="block px-4 py-2.5 rounded-lg
                      {{ request()->routeIs('bank-accounts.index') ? 'bg-indigo-600' : 'hover:bg-indigo-700/40' }}">
                📋 Danh sách
            </a>
            <a href="{{ route('bank-accounts.create') }}"
               class="block px-4 py-2.5 rounded-lg
                      {{ request()->routeIs('bank-accounts.create') ? 'bg-indigo-600' : 'hover:bg-indigo-700/40' }}">
                ➕ Thêm mới
            </a>
        </nav>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</div>

{{-- TOAST (sẽ dùng ở Phase 3) --}}
@if (session('success'))
    <div id="toast" class="fixed top-5 right-5 z-50 bg-emerald-500 text-white px-5 py-4 rounded-lg shadow-2xl flex items-center gap-3">
        <span class="text-xl">✓</span>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    <script>setTimeout(() => document.getElementById('toast')?.remove(), 3500);</script>
@endif

</body>
</html>

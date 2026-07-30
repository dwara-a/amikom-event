<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-72 bg-slate-900 text-white flex flex-col">

        {{-- Logo --}}
        <div class="px-8 py-8 border-b border-slate-800">

            <h2 class="text-2xl font-black text-indigo-400">
                EventHub
            </h2>

            <p class="text-sm text-slate-400">

                Organization Panel

            </p>

        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-5 py-8 space-y-3">

            {{-- Dashboard --}}
            <a href="{{ route('organization.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('organization.dashboard')
                    ? 'bg-indigo-600 text-white'
                    : 'hover:bg-slate-800' }}">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"

                        d="M3 12l2-2m0 0l7-7
                        7 7m-9 2v8m4-8v8
                        m5-10l2 2m-2-2v10
                        a1 1 0 01-1 1h-3
                        m-6 0H5a1 1 0 01-1-1V10">
                    </path>

                </svg>

                Dashboard

            </a>

            {{-- Event --}}
            <a href="{{ route('organization.events.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('organization.events.*')
                    ? 'bg-indigo-600 text-white'
                    : 'hover:bg-slate-800' }}">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"

                        d="M8 7V3m8 4V3M4
                        11h16M5 21h14a1
                        1 0 001-1V7a2
                        2 0 00-2-2H6a2
                        2 0 00-2 2v13a1
                        1 0 001 1z">

                    </path>

                </svg>

                Event Saya

            </a>

            {{-- Transaksi --}}
            <a href="{{ route('organization.transactions.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('organization.transactions.*')
                    ? 'bg-indigo-600 text-white'
                    : 'hover:bg-slate-800' }}">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"

                        d="M17 9V7a5
                        5 0 00-10 0v2
                        m-2 0h14l-1
                        10H6L5 9z">

                    </path>

                </svg>

                Transaksi

            </a>

            {{-- Profil --}}
            <a href="{{ route('organization.profile') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
               {{ request()->routeIs('organization.profile')
                    ? 'bg-indigo-600 text-white'
                    : 'hover:bg-slate-800' }}">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"

                        d="M5.121
                        17.804A9 9 0
                        1118.879 17.804
                        M15 11a3 3 0
                        11-6 0 3 3 0
                        016 0z">

                    </path>

                </svg>

                Profil

            </a>

        </nav>

        {{-- Logout --}}
        <div class="p-6 border-t border-slate-800">

            <form action="{{ route('organization.logout') }}"
                  method="POST">

                @csrf

                <button
                    class="w-full py-3 rounded-xl bg-red-600 hover:bg-red-700 font-bold">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    {{-- Content --}}
    <div class="flex-1">

        {{-- Header --}}
        <header class="bg-white shadow-sm px-10 py-6 flex justify-between">

            <div>

                <h1 class="text-3xl font-black">

                    @yield('page_title')

                </h1>

                <p class="text-slate-500">

                    @yield('page_subtitle')

                </p>

            </div>

            <div class="text-right">

                <p class="font-bold">

                    {{ auth('organization')->user()->name }}

                </p>

                <p class="text-sm text-slate-500">

                    Organization

                </p>

            </div>

        </header>

        <main class="p-10">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
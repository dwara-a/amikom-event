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
    <aside class="w-72 bg-indigo-900 text-indigo-100 flex flex-col">

        {{-- Logo --}}
        <div class="px-8 py-8 border-b border-indigo-800">

            <h2 class="text-2xl font-black text-white">
                EventHub
            </h2>

            <p class="text-sm text-indigo-400">

                Organization Panel

            </p>

        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-5 py-8 space-y-2">

            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">Main Menu</p>

            {{-- Dashboard --}}
            <a href="{{ route('organization.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
               {{ request()->routeIs('organization.dashboard')
                    ? 'bg-indigo-800 text-white'
                    : 'hover:bg-indigo-800' }}">

                <svg class="w-5 h-5 {{ request()->routeIs('organization.dashboard') ? 'text-indigo-300' : 'text-indigo-400' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>

                </svg>

                Dashboard

            </a>

            {{-- Event --}}
            <a href="{{ route('organization.events.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
               {{ request()->routeIs('organization.events.*')
                    ? 'bg-indigo-800 text-white'
                    : 'hover:bg-indigo-800' }}">

                <svg class="w-5 h-5 {{ request()->routeIs('organization.events.*') ? 'text-indigo-300' : 'text-indigo-400' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>

                </svg>

                Event Saya

            </a>

            {{-- Transaksi --}}
            <a href="{{ route('organization.transactions.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
               {{ request()->routeIs('organization.transactions.*')
                    ? 'bg-indigo-800 text-white'
                    : 'hover:bg-indigo-800' }}">

                <svg class="w-5 h-5 {{ request()->routeIs('organization.transactions.*') ? 'text-indigo-300' : 'text-indigo-400' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 20h5V4H2v16h5m2 0v-2a2 2 0 012-2h6a2 2 0 012 2v2m-8-8h8m-8-4h8">
                    </path>

                </svg>

                Transaksi

            </a>

        </nav>

        {{-- Logout --}}
        <div class="p-6 border-t border-indigo-800">

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
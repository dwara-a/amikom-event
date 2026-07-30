@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Ringkasan')
@section('page_subtitle', 'Selamat datang kembali, Admin!')

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4 mb-8">
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm col-span-1">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Pendapatan</p>
                <h3 class="text-lg font-black">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-50 text-green-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tiket Terjual</p>
                <h3 class="text-lg font-black">{{ number_format($ticketsSold, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Event Aktif</p>
                <h3 class="text-lg font-black">{{ $activeEvents }} Event</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Pending</p>
                <h3 class="text-lg font-black">{{ $pendingOrders }} Pesanan</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-50 text-cyan-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Pengguna</p>
                <h3 class="text-lg font-black">{{ number_format($totalCustomers, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <div>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Organisasi</p>
                <h3 class="text-lg font-black">{{ number_format($totalOrganizations, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Charts Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Revenue Chart -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-black text-lg">Pertumbuhan Pendapatan</h3>
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">6 Bulan Terakhir</span>
        </div>
        <canvas id="revenueChart" height="200"></canvas>
    </div>

    <!-- Customer Growth Chart -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-black text-lg">Pertumbuhan Pengguna</h3>
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">6 Bulan Terakhir</span>
        </div>
        <canvas id="customerChart" height="200"></canvas>
    </div>

    <!-- Events per Month Chart -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-black text-lg">Event per Bulan</h3>
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">6 Bulan Terakhir</span>
        </div>
        <canvas id="eventsChart" height="200"></canvas>
    </div>

    <!-- Events by Category Chart -->
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-black text-lg">Event per Kategori</h3>
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Distribusi</span>
        </div>
        <canvas id="categoryChart" height="200"></canvas>
    </div>
</div>

<!-- Latest Transactions Table -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="font-black text-xl">Transaksi Terakhir</h3>
        <a href="{{ route('admin.transactions.index') }}" class="text-indigo-600 font-bold hover:underline text-sm">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-6 py-4">Tgl Transaksi</th>
                    <th class="px-6 py-4">Pembeli</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($recentTransactions as $trx)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-5 text-sm text-slate-600">{{ $trx->created_at->format('d M y - H:i') }}<br><span class="text-xs text-slate-400">{{ $trx->order_id }}</span></td>
                    <td class="px-6 py-5">
                        <p class="font-bold text-sm truncate max-w-[130px]">{{ $trx->customer_name }}</p>
                        <p class="text-xs text-slate-400 truncate max-w-[130px]">{{ $trx->customer_email }}</p>
                    </td>
                    <td class="px-6 py-5 font-medium text-slate-600 max-w-[200px] truncate">{{ $trx->event->title ?? '-' }}</td>
                    <td class="px-6 py-5">
                        @if($trx->status === 'settlement' || $trx->status === 'success')
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span>
                        @elseif($trx->status === 'pending')
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase">Pending</span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase">{{ $trx->status }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-5 font-black text-indigo-600 whitespace-nowrap text-right">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-slate-500">Belum ada transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ===== Revenue Chart (Line) =====
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueLabels = @json($revenueMonthly->keys());
    const revenueData = @json($revenueMonthly->values());

    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: revenueLabels,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: revenueData,
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#6366f1',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) { return 'Rp ' + value.toLocaleString('id-ID'); }
                    },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // ===== Customer Growth Chart (Line) =====
    const customerCtx = document.getElementById('customerChart').getContext('2d');
    const customerLabels = @json($customersMonthly->keys());
    const customerData = @json($customersMonthly->values());

    new Chart(customerCtx, {
        type: 'line',
        data: {
            labels: customerLabels,
            datasets: [{
                label: 'Pengguna Baru',
                data: customerData,
                borderColor: '#06b6d4',
                backgroundColor: 'rgba(6, 182, 212, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#06b6d4',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // ===== Events per Month Chart (Bar) =====
    const eventsCtx = document.getElementById('eventsChart').getContext('2d');
    const eventsLabels = @json($eventsMonthly->keys());
    const eventsData = @json($eventsMonthly->values());

    new Chart(eventsCtx, {
        type: 'bar',
        data: {
            labels: eventsLabels,
            datasets: [{
                label: 'Event Baru',
                data: eventsData,
                backgroundColor: 'rgba(249, 115, 22, 0.7)',
                borderColor: '#f97316',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // ===== Events by Category Chart (Doughnut) =====
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryLabels = @json($eventsByCategory->keys());
    const categoryData = @json($eventsByCategory->values());

    const COLORS = ['#6366f1', '#f97316', '#22c55e', '#ef4444', '#06b6d4', '#a855f7', '#eab308', '#ec4899'];
    const bgColors = categoryLabels.map((_, i) => COLORS[i % COLORS.length]);

    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryData,
                backgroundColor: bgColors,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { size: 10, weight: 'bold' },
                        padding: 12,
                        usePointStyle: true
                    }
                }
            }
        }
    });
});
</script>
@endpush

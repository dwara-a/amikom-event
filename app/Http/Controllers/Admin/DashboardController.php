<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menjumlahkan semua nominal total_price dari kolom Transaksi Lunas
        $totalRevenue = Transaction::whereIn('status', ['settlement', 'success'])->sum('total_price');
        
        // 2. Menghitung Berapa orang tamu yang tiketnya sudah Lunas
        $ticketsSold = Transaction::whereIn('status', ['settlement', 'success'])->count();
        
        // 3. Menghitung Jumlah Acara Mendatang yang aktif diselenggarakan
        $activeEvents = Event::where('date', '>=', now())->count();
        
        // 4. Menghitung Transaksi Ngadat (Status belum dibayar pelanggan / Expired)
        $pendingOrders = Transaction::where('status', 'pending')->count();
        
        // 5. Menyertakan 5 daftar riwayat pesanan (History) paling mutakhir di panel
        $recentTransactions = Transaction::with('event')->latest()->take(5)->get();

        // --- DATA UNTUK GRAFIK ---

        // 6. Revenue per bulan (6 bulan terakhir)
        $revenueMonthly = Transaction::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw("SUM(total_price) as total")
        )
            ->whereIn('status', ['settlement', 'success'])
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // 7. Event baru per bulan (6 bulan terakhir)
        $eventsMonthly = Event::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw("COUNT(*) as total")
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // 8. Event per kategori
        $eventsByCategory = Category::withCount('events')
            ->orderBy('events_count', 'desc')
            ->get()
            ->pluck('events_count', 'name');

        // 9. Customer registrations per bulan (6 bulan terakhir)
        $customersMonthly = Customer::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw("COUNT(*) as total")
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // 10. Total organisasi & total customer (untuk info ringkas)
        $totalOrganizations = Organization::count();
        $totalCustomers = Customer::count();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'recentTransactions',
            'revenueMonthly',
            'eventsMonthly',
            'eventsByCategory',
            'customersMonthly',
            'totalOrganizations',
            'totalCustomers'
        ));
    }
}

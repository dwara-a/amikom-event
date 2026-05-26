<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori
        $categories = Category::all();
        // 2. Query event
        $query = Event::with('category')
                    ->where('date', '>=', now())
                    ->orderBy('date', 'asc');
        // 3. Filter kategori
        if ($request->has('category') && $request->category != '') {

            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        // 4. Ambil data event
        $events = $query->get();
        // 5. Ambil data partner
        $partners = Partner::latest()->get();
        // 6. Kirim semua data ke blade
        return view('welcome', compact(
            'events',
            'categories',
            'partners'
        ));
    }
}

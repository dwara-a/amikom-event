<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo_url' => 'nullable|url'
        ]);

        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect()->route('admin.partners.index');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo_url' => 'nullable|url'
        ]);

        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url
        ]);

        return redirect()->route('admin.partners.index');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index');
    }
}

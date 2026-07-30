<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Organization;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        // Memakai relasi dan pengaturan limit paginasi (10 entri per halaman)
        $events = \App\Models\Event::with('category')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function transactions()
    {
        return view('admin.transactions');
    }

    public function create()
    {
        $categories = Category::all();
        $organizations = Organization::where('status','approved')->get();

        return view(
            'admin.events.create',
            compact('categories','organizations')
        );
    }

public function store(\Illuminate\Http\Request $request)
{
// Menerapkan validasi data request dari pengguna
     $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'organization_id' => 'required|exists:organizations,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:1',
        'poster' => 'nullable|image|max:2048' // Maksimal 2MB
        ]);

    if ($request->hasFile('poster')) {
        // Simpan ke direktori storage/app/public/posters
        $data['poster_path'] = $request->file('poster')->store('posters', 'public');
    }

     // Menyimpan data yang telah divalidasi ke dalam tabel menggunakan Model
     \App\Models\Event::create($data);

     return redirect()->route('admin.events.index')->with('success', 'Data Event berhasil ditambahkan.');
}

public function destroy(Event $event)
{
    if ($event->poster_path) {
        
        // 2. Cek apakah file fisiknya benar-benar ada di dalam folder storage public
        if (Storage::disk('public')->exists($event->poster_path)) {
            
            // 3. Hapus file fisik gambar dari folder lokal
            Storage::disk('public')->delete($event->poster_path);
        }
    }
    $event->delete();
    return redirect()->route('admin.events.index')->with('success', 'Data event
    berhasil dihapus secara permanen.');
}

public function edit(Event $event)
{
    $categories = Category::all();
    $organizations = Organization::where('status','approved')->get();

    return view(
        'admin.events.edit',
        compact('event','categories','organizations')
    );
}

public function update(\Illuminate\Http\Request $request, Event $event)
{
$data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'organization_id'=>'required|exists:organizations,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:1',
        'poster' => 'nullable|image|max:2048'
    ]); 
    if ($request->hasFile('poster')) {
        // Hapus gambar lama jika sebelumnya sudah memiliki poster
        if ($event->poster_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($event->poster_path);
        }
        // Upload gambar baru
        $data['poster_path'] = $request->file('poster')->store('posters', 'public');
    }

$event->update($data);

return redirect()->route('admin.events.index')->with('success', 'Rincian
data event berhasil diperbarui.');
}
}

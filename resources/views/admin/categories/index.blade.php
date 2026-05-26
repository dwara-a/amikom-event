@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin')
@section('page_title', 'Manajemen Kategori')
@section('page_subtitle', 'Kelola kategori event seperti Seminar, Konser, dll.')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
    <!-- FORM SEARCH -->
    <form method="GET"
        action="{{ route('admin.categories.index') }}"
        class="flex gap-2 w-full md:w-auto">
        <input type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari kategori..."
            class="border rounded-2xl px-4 py-3 w-full md:w-72">
        <button type="submit"
            class="px-6 py-3 bg-slate-800 text-white rounded-2xl font-bold">
            Search
        </button>
    </form>
    <!-- FORM TAMBAH -->
    <form action="{{ route('admin.categories.store') }}"
        method="POST"
        class="flex gap-2 w-full md:w-auto">
        @csrf
        <input type="text"
            name="name"
            placeholder="Nama kategori"
            class="border rounded-2xl px-4 py-3 w-full md:w-72">
        <button type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
            + Tambah Kategori
        </button>
    </form>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($categories as $index => $category)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">
                            {{ $categories->firstItem() + $index }}
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-black text-slate-800">
                                {{ $category->name }}
                            </p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2 items-center">
                                <!-- EDIT -->
                                <form action="{{ route('admin.categories.update', $category->id) }}"
                                    method="POST"
                                    class="flex gap-2 items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text"
                                        name="name"
                                        value="{{ $category->name }}"
                                        class="border rounded-xl px-3 py-2 text-sm">
                                    <button type="submit"
                                        class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                        Edit
                                    </button>
                                </form>
                                <!-- DELETE -->
                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"
                            class="px-8 py-10 text-center text-slate-500">
                            Belum ada kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $categories->links() }}
    </div>
</div>
@endsection
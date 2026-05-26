@extends('layouts.admin')

@section('title', 'Kelola Partner - Admin')
@section('page_title', 'Manajemen Partner')
@section('page_subtitle', 'Kelola daftar partner dan sponsor event.')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
    <!-- FORM SEARCH -->
    <form method="GET"
        action="{{ route('admin.partners.index') }}"
        class="flex gap-2 w-full md:w-auto">
        <input type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari partner..."
            class="border rounded-2xl px-4 py-3 w-full md:w-72">
        <button type="submit"
            class="px-6 py-3 bg-slate-800 text-white rounded-2xl font-bold">
            Search
        </button>
    </form>
    <!-- FORM TAMBAH -->
    <form action="{{ route('admin.partners.store') }}"
        method="POST"
        class="flex gap-2 w-full md:w-auto">
        @csrf
        <input type="text"
            name="name"
            placeholder="Nama Partner"
            class="border rounded-2xl px-4 py-3 w-full md:w-56">
        <input type="text"
            name="logo_url"
            placeholder="Logo URL"
            class="border rounded-2xl px-4 py-3 w-full md:w-72">
        <button type="submit"
            class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
            + Tambah Partner
        </button>
    </form>
</div>
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($partners as $index => $partner)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">
                            {{ $partners->firstItem() + $index }}
                        </td>
                        <td class="px-8 py-6">
                            @if($partner->logo_url)
                                <img src="{{ $partner->logo_url }}"
                                     onerror="this.src='https://placehold.co/100x100?text=Logo'"
                                     class="w-16 h-16 rounded-2xl object-cover border">
                            @else
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-400 text-xs">
                                    No Logo
                                </div>
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-black text-slate-800">
                                {{ $partner->name }}
                            </p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2 items-center">
                                <!-- UPDATE -->
                                <form action="{{ route('admin.partners.update', $partner->id) }}"
                                      method="POST"
                                      class="flex gap-2 items-center">
                                    @csrf
                                    @method('PUT')
                                    <input type="text"
                                           name="name"
                                           value="{{ $partner->name }}"
                                           class="border rounded-xl px-3 py-2 text-sm">
                                    <input type="text"
                                           name="logo_url"
                                           value="{{ $partner->logo_url }}"
                                           class="border rounded-xl px-3 py-2 text-sm">
                                    <button type="submit"
                                            class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                        Edit
                                    </button>
                                </form>
                                <!-- DELETE -->
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus partner ini?')">
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
                        <td colspan="4"
                            class="px-8 py-10 text-center text-slate-500">
                            Belum ada partner.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $partners->links() }}
    </div>
</div>
@endsection
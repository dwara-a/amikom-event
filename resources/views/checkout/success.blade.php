@extends('layouts.app')
@section('title', 'Pembayaran Berhasil')

@push('styles')
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #ticket-section, #ticket-section * {
            visibility: visible;
        }
        #ticket-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 16px;
        }
        nav, footer, .no-print {
            display: none !important;
        }
    }
</style>
@endpush

@section('content')
<div class="block w-full bg-slate-50 py-12 px-4">
    
    <div class="w-full max-w-xl mx-auto space-y-6">

        <div class="text-center mb-6 no-print">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3 border-4 border-white shadow-md">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-black text-slate-800">Pembayaran Berhasil!</h1>
            <p class="text-slate-500 text-sm mt-1">Tiket Anda telah terbit dan siap digunakan.</p>
        </div>

        <div id="ticket-section" class="bg-white text-slate-900 rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-100 relative">
            
            <div class="p-8 bg-indigo-50 border-b-4 border-dashed border-indigo-100 text-center relative">
                <p class="text-indigo-600 font-bold uppercase tracking-widest text-xs mb-2">E-Ticket Resmi</p>
                <h2 class="text-2xl font-black leading-tight text-slate-800">{{ $transaction->event->title }}</h2>

                <div class="absolute -left-4 -bottom-4 w-8 h-8 bg-slate-50 rounded-full border border-slate-100 shadow-inner"></div>
                <div class="absolute -right-4 -bottom-4 w-8 h-8 bg-slate-50 rounded-full border border-slate-100 shadow-inner"></div>
            </div>

            <div class="p-8 space-y-8">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Nama Pembeli</p>
                        <p class="font-bold text-lg text-slate-800">{{ $transaction->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Tanggal & Waktu Transaksi</p>
                        <p class="font-bold text-lg text-slate-800">
                            {{ $transaction->created_at->format('d M Y, h:i') }} WIB
                        </p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Order ID</p>
                        <p class="font-bold text-slate-800">#{{ $transaction->order_id }}</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase mb-1">Lokasi</p>
                        <p class="font-bold text-slate-800">{{ $transaction->event->location }}</p>
                    </div>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100 flex flex-col items-center">
                    <p class="text-slate-400 text-xs font-bold uppercase mb-4 tracking-wider">Scan QR untuk Check-in</p>
                    
                    <div class="w-48 h-48 bg-white p-4 rounded-xl shadow-inner border flex items-center justify-center">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data={{ urlencode($transaction->order_id) }}"
                             alt="QR Code"
                             class="w-full h-full object-contain">
                    </div>
                    <p class="mt-4 font-mono font-bold text-slate-700 tracking-widest">{{ $transaction->order_id }}</p>
                </div>
            </div>

            <div class="px-8 pb-8 no-print">
                <button onclick="window.print()"
                    class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
                    Cetak / Simpan PDF
                </button>
                <a href="{{ route('home') }}"
                    class="block text-center mt-4 text-slate-500 font-bold hover:text-indigo-600 transition">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

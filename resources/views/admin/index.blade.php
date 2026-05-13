<div>
    {{-- dashboard --}}
    @extends('layouts.app')

    @section('content')
        <div class="min-h-screen bg-slate-950 p-8 font-sans">
    {{-- dashboard --}}

    {{-- Header --}}
    <div class="mb-10">
        <p class="text-indigo-400 text-sm font-semibold tracking-widest uppercase mb-1">Panel Admin</p>
        <h1 class="text-4xl font-black text-white tracking-tight">Dashboard</h1>
        <p class="text-slate-400 mt-1 text-sm">Selamat datang kembali! Berikut ringkasan data hari ini.</p>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-10">

        <div class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 hover:border-indigo-500 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-11 h-11 bg-indigo-500/15 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full font-medium">+12%</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $totalUsers ?? '—' }}</p>
            <p class="text-slate-400 text-sm font-medium">Total Pengguna</p>
        </div>

        <div class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 hover:border-violet-500 transition-all duration-300 hover:shadow-lg hover:shadow-violet-500/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-11 h-11 bg-violet-500/15 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2"/>
                    </svg>
                </div>
                <span class="text-xs text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full font-medium">+5%</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $totalEmployees ?? '—' }}</p>
            <p class="text-slate-400 text-sm font-medium">Total Pegawai</p>
        </div>

        <div class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 hover:border-sky-500 transition-all duration-300 hover:shadow-lg hover:shadow-sky-500/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-11 h-11 bg-sky-500/15 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <span class="text-xs text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full font-medium">Hari ini</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $totalAttendance ?? '—' }}</p>
            <p class="text-slate-400 text-sm font-medium">Kehadiran</p>
        </div>

        <div class="group bg-slate-900 border border-slate-800 rounded-2xl p-6 hover:border-emerald-500 transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-11 h-11 bg-emerald-500/15 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded-full font-medium">Bulan ini</span>
            </div>
            <p class="text-3xl font-black text-white mb-1">{{ $totalPayroll ?? '—' }}</p>
            <p class="text-slate-400 text-sm font-medium">Payroll Diproses</p>
        </div>

    </div>

    {{-- Quick Access --}}
    <div class="mb-10">
        <h2 class="text-white font-bold text-lg mb-4">Akses Cepat</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="bg-indigo-600 hover:bg-indigo-500 rounded-xl p-4 flex items-center gap-3 transition-all duration-200 group">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-white text-sm font-semibold">Pengguna</span>
            </a>
            <a href="#" class="bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl p-4 flex items-center gap-3 transition-all duration-200">
                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2"/>
                </svg>
                <span class="text-white text-sm font-semibold">Pegawai</span>
            </a>
            <a href="#" class="bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl p-4 flex items-center gap-3 transition-all duration-200">
                <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <span class="text-white text-sm font-semibold">Absensi</span>
            </a>
            <a href="#" class="bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-xl p-4 flex items-center gap-3 transition-all duration-200">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-white text-sm font-semibold">Payroll</span>
            </a>
        </div>
    </div>

</div>
    @endsection
</div>

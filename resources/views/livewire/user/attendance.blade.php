<div class="min-h-screen bg-slate-950 font-sans">

    @livewireStyles()
    @livewireScripts()
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Navbar --}}
    <nav class="bg-slate-900 border-b border-slate-800 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm leading-none">User Dashboard</p>
                        <p class="text-slate-400 text-xs mt-0.5">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <a href="/logout"
                    class="flex items-center gap-2 bg-red-500/15 hover:bg-red-500/25 text-red-400 border border-red-500/30 px-4 py-2 rounded-xl font-semibold text-sm transition duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </a>

            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Page Header --}}
        <div class="mb-8">
            <p class="text-sky-400 text-sm font-semibold tracking-widest uppercase mb-1">Karyawan</p>
            <h1 class="text-4xl font-black text-white tracking-tight">Absensi Saya</h1>
            <p class="text-slate-400 mt-1 text-sm">Catat dan lihat riwayat kehadiran Anda</p>
        </div>

        {{-- Action Card --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 mb-6">
            <h2 class="text-white font-bold text-sm mb-4 flex items-center gap-2">
                <div class="w-1 h-4 bg-sky-500 rounded-full"></div>
                Catat Kehadiran Hari Ini
            </h2>

            <div class="flex flex-col md:flex-row md:items-end gap-4">

                {{-- Status Select --}}
                <div class="w-full md:w-72">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                        Status Kehadiran
                    </label>
                    <select wire:model="status"
                        class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent text-sm transition appearance-none cursor-pointer">
                        <option value="">--- Pilih Status ---</option>
                        <option value="present">✅ Hadir</option>
                        <option value="permit">📋 Izin</option>
                        <option value="sick">🤒 Sakit</option>
                        <option value="absent">❌ Tidak Hadir</option>
                    </select>
                </div>

                {{-- Save Button --}}
                <button type="button" wire:click="save"
                    class="flex items-center gap-2 bg-sky-600 hover:bg-sky-500 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-sky-500/20 transition duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Kehadiran
                </button>

            </div>

            {{-- Alert --}}
            @if (session('massage'))
                <div class="mt-5 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl">
                    <p class="text-emerald-400 text-sm font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('massage') }}
                    </p>
                </div>
            @endif
        </div>

        {{-- Table Card --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">

            <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-sky-400"></div>
                    <span class="text-slate-300 text-sm font-semibold">Riwayat Kehadiran</span>
                </div>
                <span class="text-xs text-slate-500 bg-slate-800 px-3 py-1 rounded-full border border-slate-700">
                    {{ $attendance->count() }} record
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-800">
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider w-12">#</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-800/70">

                        @forelse ($attendance as $item)
                            <tr class="hover:bg-slate-800/40 transition duration-150">
                                <td class="px-6 py-4 text-slate-500 font-mono text-xs">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-sky-500/20 border border-sky-500/30 flex items-center justify-center text-sky-400 text-xs font-bold uppercase flex-shrink-0">
                                            {{ substr($item->user->name, 0, 1) }}
                                        </div>
                                        <span class="text-white font-medium">{{ $item->user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-300">{{ $item->date }}</td>
                                <td class="px-6 py-4">
                                    @if ($item->status == 'present')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Hadir
                                        </span>
                                    @elseif($item->status == 'permit')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-sky-500/15 text-sky-400 border border-sky-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span> Izin
                                        </span>
                                    @elseif($item->status == 'sick')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/15 text-amber-400 border border-amber-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Sakit
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-500/15 text-red-400 border border-red-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Tidak Hadir
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-16">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
                                            </svg>
                                        </div>
                                        <p class="text-slate-500 text-sm">Belum ada data kehadiran.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>
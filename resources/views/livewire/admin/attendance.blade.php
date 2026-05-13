<div class="min-h-screen bg-slate-950 p-8 font-sans">
    {{-- page attendance --}}

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-sky-400 text-sm font-semibold tracking-widest uppercase mb-1">Manajemen</p>
        <h1 class="text-4xl font-black text-white tracking-tight">Absensi</h1>
        <p class="text-slate-400 mt-1 text-sm">Rekap data kehadiran karyawan</p>
    </div>

    {{-- Table Card --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-sky-400"></div>
                <span class="text-slate-300 text-sm font-semibold">Data Kehadiran</span>
            </div>
            <span class="text-xs text-slate-500 bg-slate-800 px-3 py-1 rounded-full">
                {{ count($attendance ?? []) }} record
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-800">
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/70">
                    @foreach ($attendance as $item)
                        <tr class="hover:bg-slate-800/40 transition duration-150">
                            <td class="px-6 py-4 text-slate-500 font-mono text-xs">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center text-indigo-400 text-xs font-bold uppercase">
                                        {{ substr($item->user->name, 0, 1) }}
                                    </div>
                                    <span class="text-white font-medium">{{ $item->user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-300">{{ $item->date }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $status = strtolower($item->status);
                                    $statusClass = match($status) {
                                        'hadir'   => 'bg-emerald-500/15 text-emerald-400 border-emerald-500/30',
                                        'izin'    => 'bg-sky-500/15 text-sky-400 border-sky-500/30',
                                        'sakit'   => 'bg-amber-500/15 text-amber-400 border-amber-500/30',
                                        'alpha'   => 'bg-red-500/15 text-red-400 border-red-500/30',
                                        default   => 'bg-slate-500/15 text-slate-400 border-slate-500/30',
                                    };
                                @endphp
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border {{ $statusClass }}">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        @if($status === 'hadir') bg-emerald-400
                                        @elseif($status === 'izin') bg-sky-400
                                        @elseif($status === 'sakit') bg-amber-400
                                        @elseif($status === 'alpha') bg-red-400
                                        @else bg-slate-400 @endif"></span>
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
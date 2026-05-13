<div class="min-h-screen bg-slate-950 p-8 font-sans">
    {{-- page payroll --}}

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-amber-400 text-sm font-semibold tracking-widest uppercase mb-1">Manajemen</p>
        <h1 class="text-4xl font-black text-white tracking-tight">Payroll</h1>
        <p class="text-slate-400 mt-1 text-sm">Kelola data gaji, tunjangan, dan potongan karyawan</p>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-xl">
            @foreach ($errors->all() as $error)
                <p class="text-red-400 text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl">
            <p class="text-emerald-400 text-sm font-semibold flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                {{ session('message') }}
            </p>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

        {{-- Form --}}
        <div class="lg:col-span-1">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <h2 class="text-white font-bold text-base mb-5 flex items-center gap-2">
                    <div class="w-1 h-5 bg-amber-500 rounded-full"></div>
                    {{ $editCheck ? 'Edit Payroll' : 'Tambah Payroll' }}
                </h2>

                <form wire:submit.prevent='store' class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Pegawai</label>
                        <select wire:model='employee_id'
                            class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm transition">
                            <option value="">--- Pilih Pegawai ---</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Periode</label>
                        <input type="date" wire:model='period'
                            class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Tunjangan</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-bold">Rp</span>
                            <input type="number" wire:model='allowance'
                                class="w-full pl-9 pr-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent placeholder-slate-500 text-sm transition"
                                placeholder="0">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Potongan</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-bold">Rp</span>
                            <input type="number" wire:model='deduction'
                                class="w-full pl-9 pr-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-slate-500 text-sm transition"
                                placeholder="0">
                        </div>
                    </div>

                    @if ($editCheck == false)
                        <button type="submit"
                            class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold px-6 py-2.5 rounded-xl transition duration-200 text-sm">
                            Simpan Payroll
                        </button>
                    @endif
                </form>

                @if ($editCheck == true)
                    <div class="flex gap-2 mt-4">
                        <button wire:click='update({{ $idEdit }})'
                            class="flex-1 bg-amber-600 hover:bg-amber-500 text-white font-bold px-4 py-2.5 rounded-xl transition duration-200 text-sm">
                            Update
                        </button>
                        <button wire:click='clear()'
                            class="flex-1 bg-slate-700 hover:bg-slate-600 text-slate-300 font-bold px-4 py-2.5 rounded-xl transition duration-200 text-sm">
                            Batal
                        </button>
                    </div>
                @endif
            </div>
        </div>

        {{-- Table --}}
        <div class="lg:col-span-2">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-800">
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-500 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" wire:model.live='keyword'
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 placeholder-slate-500 text-sm transition"
                            placeholder="Cari data payroll...">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-800">
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">#</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Pegawai</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Periode</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Gaji</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Tunjangan</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Potongan</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Net</th>
                                <th class="px-4 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/70">
                            @foreach ($payrolls as $item)
                                <tr class="hover:bg-slate-800/40 transition duration-150">
                                    <td class="px-4 py-4 text-slate-500 font-mono text-xs">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 rounded-full bg-amber-500/20 border border-amber-500/30 flex items-center justify-center text-amber-400 text-xs font-bold uppercase flex-shrink-0">
                                                {{ substr($item->employee->user->name, 0, 1) }}
                                            </div>
                                            <span class="text-white font-medium text-xs">{{ $item->employee->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-slate-400 text-xs">{{ $item->period }}</td>
                                    <td class="px-4 py-4 text-slate-300 text-xs font-mono">{{ number_format($item->employee->salary) }}</td>
                                    <td class="px-4 py-4 text-emerald-400 text-xs font-mono">+{{ number_format($item->allowance) }}</td>
                                    <td class="px-4 py-4 text-red-400 text-xs font-mono">-{{ number_format($item->deduction) }}</td>
                                    <td class="px-4 py-4">
                                        <span class="text-amber-400 font-bold text-xs">{{ number_format($item->net_salary) }}</span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center gap-1.5">
                                            <button wire:click='destroy({{ $item->id }})'
                                                class="px-2.5 py-1.5 bg-red-500/15 hover:bg-red-500/25 text-red-400 text-xs font-semibold rounded-lg transition border border-red-500/20">
                                                Hapus
                                            </button>
                                            @if ($editCheck == false)
                                                <button wire:click='edit({{ $item->id }})'
                                                    class="px-2.5 py-1.5 bg-amber-500/15 hover:bg-amber-500/25 text-amber-400 text-xs font-semibold rounded-lg transition border border-amber-500/20">
                                                    Edit
                                                </button>
                                            @else
                                                <button wire:click='clear()'
                                                    class="px-2.5 py-1.5 bg-slate-700 hover:bg-slate-600 text-slate-300 text-xs font-semibold rounded-lg transition">
                                                    Clear
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
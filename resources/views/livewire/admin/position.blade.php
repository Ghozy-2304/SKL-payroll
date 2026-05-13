<div class="min-h-screen bg-slate-950 p-8 font-sans">
    {{-- page position --}}

    {{-- Header --}}
    <div class="mb-8">
        <p class="text-violet-400 text-sm font-semibold tracking-widest uppercase mb-1">Manajemen</p>
        <h1 class="text-4xl font-black text-white tracking-tight">Posisi & Jabatan</h1>
        <p class="text-slate-400 mt-1 text-sm">Kelola data posisi dan jabatan karyawan</p>
    </div>

    {{-- Alerts --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-xl">
            @foreach ($errors->all() as $item)
                <p class="text-red-400 text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $item }}
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Form --}}
        <div class="lg:col-span-1">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <h2 class="text-white font-bold text-base mb-5 flex items-center gap-2">
                    <div class="w-1 h-5 bg-violet-500 rounded-full"></div>
                    {{ $editCheck ? 'Edit Posisi' : 'Tambah Posisi' }}
                </h2>

                <form wire:submit.prevent='store' class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Nama Posisi</label>
                        <input type="text" wire:model='name'
                            class="w-full px-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent placeholder-slate-500 text-sm transition"
                            placeholder="Contoh: Manager, Staff...">
                    </div>

                    @if ($editCheck == false)
                        <button type="submit"
                            class="w-full bg-violet-600 hover:bg-violet-500 text-white font-bold px-6 py-2.5 rounded-xl transition duration-200 text-sm">
                            Simpan Posisi
                        </button>
                    @endif
                </form>

                @if ($editCheck == true)
                    <div class="flex gap-2 mt-4">
                        <button wire:click='update({{ $idEdit }})'
                            class="flex-1 bg-violet-600 hover:bg-violet-500 text-white font-bold px-4 py-2.5 rounded-xl transition duration-200 text-sm">
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
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-800 border border-slate-700 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-violet-500 placeholder-slate-500 text-sm transition"
                            placeholder="Cari posisi...">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-800">
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider w-12">#</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Posisi</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/70">
                            @foreach ($positions as $item)
                                <tr class="hover:bg-slate-800/40 transition duration-150 group">
                                    <td class="px-6 py-4 text-slate-500 font-mono text-xs">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="text-white font-medium">{{ $item->name }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <button wire:click='destroy({{ $item->id }})'
                                                class="px-3 py-1.5 bg-red-500/15 hover:bg-red-500/25 text-red-400 text-xs font-semibold rounded-lg transition border border-red-500/20">
                                                Hapus
                                            </button>
                                            @if ($editCheck == false)
                                                <button wire:click='edit({{ $item->id }})'
                                                    class="px-3 py-1.5 bg-violet-500/15 hover:bg-violet-500/25 text-violet-400 text-xs font-semibold rounded-lg transition border border-violet-500/20">
                                                    Edit
                                                </button>
                                            @else
                                                <button wire:click='clear()'
                                                    class="px-3 py-1.5 bg-slate-700 hover:bg-slate-600 text-slate-300 text-xs font-semibold rounded-lg transition">
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
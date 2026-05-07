<div class="p-6 bg-gray-50 min-h-screen">
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="mb-6">
        <select name="" wire:model.live='status'
            class="px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 font-medium shadow-sm">
            <option value="">---Pilih Status---</option>
            <option value="present">Hadir</option>
            <option value="permit">Izin</option>
            <option value="sick">Sakit</option>
            <option value="absent">Tidak Hadir</option>
        </select>
        <button wire:click='save()'>Save</button>
        @if (session('massage'))
            <p>{{ session('massage') }}</p>
        @endif
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-blue-700 text-white">
                    <th class="px-6 py-4 text-left font-semibold">#</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-blue-50 transition duration-150 cursor-pointer">
                    <td class="px-6 py-4 font-medium text-gray-900">1</td>
                    <td class="px-6 py-4 text-gray-700">John Doe</td>
                    <td class="px-6 py-4 text-gray-700">2026-05-07</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Hadir</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

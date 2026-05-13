<div>
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
                @foreach ($attendance as $item)
                    <tr class="hover:bg-blue-50 transition duration-150 cursor-pointer">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration}}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $item->user->name}}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $item->date }}</td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">{{ $item->status}}</span>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
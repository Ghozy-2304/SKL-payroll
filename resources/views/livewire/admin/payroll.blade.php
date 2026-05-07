<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-3xl font-bold mb-2 text-gray-800">Halaman Payroll</h1>
    <p class="text-gray-600 mb-6">Kelola data gaji dan tunjangan karyawan</p>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded">
            @foreach ($errors->all() as $error)
                <p class="text-red-700 text-sm font-medium">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded">
            <p class="text-green-700 text-sm font-semibold">{{ session('message') }}</p>
        </div>
    @endif

    <form class="max-w-lg space-y-4 bg-white p-6 rounded-lg shadow-md mb-8" wire:submit.prevent='store'>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Employee</label>
            <select wire:model='employee_id'
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                <option value="">--- Pilih Employee ---</option>
                @foreach ($employees as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- User -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Period</label>
            <input type="date" wire:model='period'
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
        </div>

        <!-- Position -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Allowance</label>
            <input type="number" wire:model='allowance'
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
        </div>

        <!-- Gaji -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Deduction</label>
            <input wire:model='deduction' type="number" placeholder="Masukkan deduction"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
        </div>

        <!-- Button -->
        <div class="pt-2">
            @if ($editCheck == false)
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-sm">
                    Simpan
                </button>
            @endif
        </div>
    </form>

    @if ($editCheck == true)
        <button wire:click='update({{ $idEdit }})'
            class="bg-purple-500 hover:bg-purple-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-sm mb-6">
            Update
        </button>
    @endif

    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <input type="text"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Input your keyword...." wire:model.live='keyword'>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-blue-700 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold">#</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Employee name</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Period</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Salary</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Allowance</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Deduction</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Net Salary</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($payrolls as $item)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->employee->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->period }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                {{ number_format($item->employee->salary) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ number_format($item->allowance) }}</td>
                            <td class="px-6 py-4 text-sm text-red-600 font-medium">
                                {{ number_format($item->deduction) }}</td>
                            <td class="px-6 py-4 text-sm text-green-600 font-semibold">
                                {{ number_format($item->net_salary) }}</td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <button
                                    class="bg-red-500 hover:bg-red-600 px-4 py-2 text-white text-xs font-semibold rounded transition"
                                    wire:click='destroy({{ $item->id }})'>Hapus</button>
                                @if ($editCheck == false)
                                    <button wire:click='edit({{ $item->id }})'
                                        class="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white text-xs font-semibold rounded transition">Edit</button>
                                @endif
                                @if ($editCheck == true)
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white text-xs font-semibold rounded transition"
                                        wire:click='clear()'>
                                        Clear
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

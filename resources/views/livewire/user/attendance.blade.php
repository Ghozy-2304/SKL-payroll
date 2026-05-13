<div class="min-h-screen bg-gray-100">

    @livewireStyles()
    @livewireScripts()

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        User Dashboard
                    </h1>
                    <p class="text-l text-gray-800">
                        {{ Auth::user()->email }}
                    </p>
                </div>


                <!-- Logout -->
                <a href="/logout"
                    class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg font-medium transition duration-200">
                    Logout
                </a>

            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Top Action -->
        <div class="bg-white border border-gray-200 rounded-t-2xl px-6 py-5">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                <!-- Filter -->
                <div class="w-full md:w-72">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Status Kehadiran
                    </label>

                    <select wire:model="status"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="">--- Pilih Status ---</option>
                        <option value="present">Hadir</option>
                        <option value="permit">Izin</option>
                        <option value="sick">Sakit</option>
                        <option value="absent">Tidak Hadir</option>

                    </select>
                </div>

                <!-- Button -->
                <div>
                    <button type="button"
                        wire:click="save"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition duration-200">
                        Save Attendance
                    </button>
                </div>

            </div>

            <!-- Alert -->
            @if (session('massage'))
                <div
                    class="mt-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
                    {{ session('massage') }}
                </div>
            @endif

        </div>

        <!-- Table -->
        <div class="bg-white border-x border-b border-gray-200 rounded-b-2xl overflow-hidden shadow-sm">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-blue-600 text-white">

                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                #
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Nama
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Tanggal
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold">
                                Status
                            </th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse ($attendance as $item)

                            <tr class="hover:bg-gray-50 transition duration-150">

                                <td class="px-6 py-4 text-gray-700 font-medium">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 text-gray-800 font-semibold">
                                    {{ $item->user->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $item->date }}
                                </td>

                                <td class="px-6 py-4">

                                    @if ($item->status == 'present')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Hadir
                                        </span>

                                    @elseif($item->status == 'permit')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                            Izin
                                        </span>

                                    @elseif($item->status == 'sick')
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            Sakit
                                        </span>

                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            Tidak Hadir
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center py-10 text-gray-500">
                                    Belum ada data attendance.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
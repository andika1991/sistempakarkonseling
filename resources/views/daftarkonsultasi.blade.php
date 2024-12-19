<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Konsultasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Daftar Konsultasi') }}</h3>

                    <!-- Form Pencarian dan Filter -->
                    <form method="GET" action="{{ route('daftarkonsultasi') }}" class="mb-4 flex flex-col sm:flex-row gap-4">
                        <!-- Pencarian -->
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari nama siswa..." 
                            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full sm:w-auto"
                        />

                        <!-- Filter Kelas -->
                        <select 
                            name="kelas" 
                            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full sm:w-auto"
                        >
                            <option value="">{{ __('Semua Kelas') }}</option>
                            @foreach ($kelasList as $kelas)
                                <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Tombol -->
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-sm">
                            {{ __('Terapkan') }}
                        </button>
                    </form>

                    <!-- Tabel Data -->
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 text-left">{{ __('Nama') }}</th>
                                <th class="border px-4 py-2 text-left">{{ __('Kelas') }}</th>
                                <th class="border px-4 py-2 text-left">{{ __('Kode Solusi') }}</th>
                                <th class="border px-4 py-2 text-left">{{ __('Akurasi') }}</th>
                                <th class="border px-4 py-2 text-left">{{ __('Deskripsi Solusi') }}</th>
                                <th class="border px-4 py-2 text-center">{{ __('Aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftarKonsultasi as $konsultasi)
                                <tr>
                                    <td class="border px-4 py-2">{{ $konsultasi->name }}</td>
                                    <td class="border px-4 py-2">{{ $konsultasi->class }}</td>
                                    <td class="border px-4 py-2">{{ $konsultasi->solution_code }}</td>
                                    <td class="border px-4 py-2">{{ $konsultasi->accuracy }}%</td>
                                    <td class="border px-4 py-2">
                                        {{ $konsultasi->solution->description ?? __('Tidak ada deskripsi') }}
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('konsultasi.destroy', $konsultasi->id) }}" method="POST" onsubmit="return confirm('{{ __('Apakah Anda yakin ingin menghapus data ini?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-sm">
                                                {{ __('Hapus') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center">{{ __('Tidak ada data konsultasi.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

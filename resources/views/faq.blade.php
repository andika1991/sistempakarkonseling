<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions (FAQ)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('FAQ Groups') }}</h3>
                    <!-- Form Penambahan FAQ Group -->
                    <form method="POST" action="{{ route('faq.groups.store') }}" class="mb-6">
                        @csrf
                        <div class="space-y-4">
                            <!-- Nama Group -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Nama Grup') }}</label>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Nama grup yang akan digunakan untuk mengelompokkan pertanyaan FAQ.') }}</p>
                                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Slug -->
                            <div>
                                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Slug') }}</label>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Slug adalah versi URL yang ramah mesin pencari untuk grup ini.') }}</p>
                                <input type="text" id="slug" name="slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <!-- Parent Group -->
                            <div>
                                <label for="parent_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Grup FAQ Induk') }}</label>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Pilih grup induk untuk membuat hierarki, jika ada. Jika tidak, pilih None.') }}</p>
                                <select id="parent_id" name="parent_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">{{ __('None') }}</option>
                                    @foreach ($faqGroups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Deskripsi -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">{{ __('Deskripsi') }}</label>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Berikan deskripsi singkat tentang grup FAQ ini.') }}</p>
                                <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
                            </div>
                            <!-- Tombol Submit -->
                            <div>
                                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-600">
                                    {{ __('Tambahkan Grup FAQ Baru') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel List FAQ Groups -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-left">{{ __('Nama Grup') }}</th>
                                    <th class="border px-4 py-2 text-left">{{ __('Deskripsi') }}</th>
                                    <th class="border px-4 py-2 text-left">{{ __('Slug') }}</th>
                                    <th class="border px-4 py-2 text-center">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqGroups as $group)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $group->name }}</td>
                                        <td class="border px-4 py-2">{{ $group->description }}</td>
                                        <td class="border px-4 py-2">{{ $group->slug }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('faq.groups.edit', $group->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md shadow-sm hover:bg-yellow-600">
                                                {{ __('Edit') }}
                                            </a>
                                            <!-- Tombol Delete -->
                                            <form method="POST" action="{{ route('faq.groups.destroy', $group->id) }}" onsubmit="return confirm('{{ __('Apakah Anda yakin?') }}');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md shadow-sm hover:bg-red-600">
                                                    {{ __('Hapus') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="border px-4 py-2 text-center">{{ __('Tidak ada grup FAQ yang ditemukan.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

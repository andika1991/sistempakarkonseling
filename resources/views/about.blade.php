<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentang Sistem Pakar Ini') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-500 to-blue-700 text-white">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-2xl font-bold text-center mb-4">{{ __('SISTEM PAKAR BIMBINGAN DAN KONSELING TERHADAP PERILAKU SISWA') }}</h3>
                <p class="text-center mb-6">
                    Sistem Pakar adalah sebuah sistem di mana pengetahuan seorang pakar yang dimasukkan ke dalam komputer memungkinkan seseorang yang bukan pakar untuk menggunakan teknologi ini. 
                    Sistem ini menggunakan metode <strong>Forward Chaining</strong> dalam proses inferensi, dan data serta aturan basis pengetahuan dibangun menggunakan <strong>Backward Chaining</strong>.
                </p>
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('img/about-image-school.png') }}" alt="Tentang Sistem Pakar" class="rounded-lg shadow-lg w-3/4">
                </div>

                <h4 class="text-lg font-semibold mb-4">{{ __('Fitur Utama') }}</h4>
                <ul class="list-disc pl-5 mb-6">
                    <li>Sistem berbasis web dengan antarmuka yang responsif.</li>
                    <li>Mengidentifikasi gejala perilaku siswa berdasarkan data yang diinputkan.</li>
                    <li>Mengelola basis pengetahuan dengan metode yang dapat diandalkan.</li>
                </ul>

                <h4 class="text-lg font-semibold mb-4">{{ __('Teknologi yang Digunakan') }}</h4>
                <ul class="list-disc pl-5 mb-6">
                    <li>Laravel Breeze untuk desain UI modern dan responsif.</li>
                    <li>PHP dan MySQL untuk backend dan manajemen database.</li>
                    <li>Metode inferensi berbasis Forward Chaining dan Backward Chaining.</li>
                </ul>

                <h4 class="text-lg font-semibold mb-4">{{ __('Referensi Penelitian') }}</h4>
                <p class="mb-6">
                    Penelitian ini berdasarkan referensi dari:
                    <br>
                    <span class="italic">"Sistem Pakar Bimbingan dan Konseling Terhadap Perilaku Siswa Menggunakan Metode Backward Chaining Berbasis Web" - Buletin Poltanesa Vol. 20 No.1, Juni 2019.</span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

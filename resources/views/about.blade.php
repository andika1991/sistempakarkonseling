<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentang Sistem Pakar Ini') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Sistem Pakar Bimbingan dan Konseling') }}</h3>
                    <p class="mb-4">
                        Sistem Pakar Bimbingan dan Konseling ini dirancang untuk membantu guru BK (Bimbingan Konseling) dalam mengidentifikasi perilaku siswa berdasarkan gejala yang dihadapi. Sistem ini menggunakan metode **Forward Chaining** untuk proses inferensi, sementara data dan aturan dalam basis pengetahuan dibangun menggunakan metode **Backward Chaining**. Tujuan dari sistem ini adalah memberikan solusi efektif yang membantu guru BK dalam memberikan arahan kepada siswa.
                    </p>

                    <h4 class="text-md font-semibold mb-2">{{ __('Fitur Utama') }}</h4>
                    <ul class="list-disc list-inside mb-4">
                        <li>Konsultasi perilaku siswa berbasis data dan aturan.</li>
                        <li>Antarmuka responsif untuk pengguna dan admin.</li>
                        <li>Manajemen basis pengetahuan terkait perilaku dan gejala siswa.</li>
                    </ul>

                    <h4 class="text-md font-semibold mb-2">{{ __('Teknologi yang Digunakan') }}</h4>
                    <ul class="list-disc list-inside mb-4">
                        <li>Laravel Breeze untuk antarmuka modern dan responsif.</li>
                        <li>PHP dan MySQL sebagai backend dan database utama.</li>
                        <li>Metode **Backward Chaining** untuk pembentukan basis pengetahuan dan inferensi.</li>
                    </ul>

                    <h4 class="text-md font-semibold mb-2">{{ __('Referensi Penelitian') }}</h4>
                    <p class="mb-4">
                        Penelitian ini didasarkan pada berbagai referensi, termasuk jurnal yang relevan seperti:
                        <br>
                        <span class="italic">"Sistem Pakar Bimbingan dan Konseling Terhadap Perilaku Siswa Menggunakan Metode Forward Chaining" - Buletin Poltanesa Vol. 20 No.1, Juni 2019.</span>
                    </p>

                    <h4 class="text-md font-semibold mb-2">{{ __('Inovasi di Masa Depan') }}</h4>
                    <p class="mb-4">
                        Sistem ini dirancang agar dapat berkembang, seperti penambahan fitur untuk laporan otomatis, integrasi dengan aplikasi mobile, dan peningkatan cakupan data perilaku serta gejala siswa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

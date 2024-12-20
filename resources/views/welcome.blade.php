<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar - Log Out</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-bl from-gray-800 via-gray-900 to-black text-white">

    <!-- Container Utama -->
    <div class="min-h-screen flex flex-col justify-center items-center">
        <!-- Header -->
        <header class="text-center mb-10">
            <h1 class="text-5xl font-extrabold text-gray-100">Sistem Pakar</h1>
            <p class="text-gray-300 mt-4">Bimbingan dan Konseling Perilaku Siswa</p>
        </header>

        <!-- Konten Utama -->
        <div class="flex flex-col items-center justify-center gap-6 bg-gray-800/50 p-10 rounded-lg shadow-lg border border-gray-700">
            <!-- Pesan Log Out -->
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-100">Anda Telah Keluar</h2>
                <p class="text-gray-400 mt-2">Terima kasih telah menggunakan sistem kami.</p>
            </div>

            <!-- Tombol Navigasi -->
            <div class="flex flex-col gap-4">
                <a href="{{ route('login') }}"
                   class="w-64 bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 text-center transition duration-200">
                   Login Kembali
                </a>
                <a href="{{ route('register') }}"
                   class="w-64 bg-green-500 text-white font-semibold py-3 px-4 rounded-lg hover:bg-green-600 text-center transition duration-200">
                   Daftar Akun Baru
                </a>
                <a href="{{ route('pakar') }}"
                   class="w-64 bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg hover:bg-gray-800 text-center transition duration-200">
                   Kembali ke Halaman Utama
                </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-16 text-center">
            <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Sistem Pakar Bimbingan dan Konseling.</p>
        </footer>
    </div>

</body>
</html>

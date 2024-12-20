<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-lg font-bold">Sistem Pakar Bimbingan Konseling</a>
            <!-- Navbar Links for Large Screens -->
            <ul class="hidden lg:flex space-x-4">
                <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
                <li><a href="/petunjuk" class="hover:text-gray-300">Petunjuk</a></li>
                <li><a href="/aboutuser" class="hover:text-gray-300">Tentang</a></li>
            </ul>

            <!-- Mobile Navbar Toggle Button -->
            <div class="lg:hidden">
                <button id="navbar-toggle" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Navbar Menu -->
    <div id="mobile-menu" class="lg:hidden bg-blue-800 text-white hidden">
        <ul class="flex flex-col space-y-4 py-4 px-6">
            <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
            <li><a href="/petunjuk" class="hover:text-gray-300">Petunjuk</a></li>
            <li><a href="/aboutuser" class="hover:text-gray-300">Tentang</a></li>
        </ul>
    </div>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-blue-500 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Pakar Bimbingan Konseling</h1>
            <p class="text-lg mb-8">Platform ini dirancang untuk membantu memberikan bimbingan dan solusi terkait masalah pribadi, akademik, dan sosial melalui diagnosis berbasis teknologi.</p>
            <a href="/konsultasikonseling" class="bg-yellow-500 text-black px-6 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-400 transition">Mulai Diagnosis</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Fitur Utama</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Diagnosis Berbasis Aturan</h3>
                    <p class="text-gray-700">Sistem ini menganalisis gejala dan memberikan solusi berdasarkan masukan dari pengguna untuk membantu dalam proses bimbingan konseling.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Pendekatan Personal</h3>
                    <p class="text-gray-700">Setiap pengguna akan mendapatkan solusi yang disesuaikan dengan kondisi dan kebutuhan individu mereka.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Interaktif dan Mudah Digunakan</h3>
                    <p class="text-gray-700">Antarmuka yang ramah pengguna memudahkan Anda untuk mengikuti setiap langkah diagnosis dan mendapatkan hasil yang akurat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Cara Kerja Sistem Pakar</h2>
            <p class="text-lg mb-8">Ikuti langkah-langkah berikut untuk memulai proses bimbingan konseling Anda:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Langkah 1: Masukkan Data Diri</h3>
                    <p class="text-gray-700">Isi informasi dasar seperti nama, usia, dan masalah yang ingin dibahas.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Langkah 2: Pilih Gejala</h3>
                    <p class="text-gray-700">Pilih gejala atau masalah yang Anda alami untuk mendapatkan diagnosis yang tepat.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Langkah 3: Lihat Hasil</h3>
                    <p class="text-gray-700">Lihat hasil diagnosis dan solusi yang disarankan oleh sistem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript to Toggle Mobile Menu -->
    <script>
        const toggleButton = document.getElementById('navbar-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>

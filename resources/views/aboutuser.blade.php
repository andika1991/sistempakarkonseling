<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Sistem Pakar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-200">
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
    <!-- Main Content -->
    <div class="py-12 bg-gradient-to-b from-blue-500 to-blue-700 text-white">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-2xl font-bold text-center mb-4">SISTEM PAKAR BIMBINGAN DAN KONSELING TERHADAP PERILAKU SISWA</h3>
                <p class="text-center mb-6">
                    Sistem Pakar adalah sebuah sistem di mana pengetahuan seorang pakar yang dimasukkan ke dalam komputer memungkinkan seseorang yang bukan pakar untuk menggunakan teknologi ini. 
                    Sistem ini menggunakan metode <strong>Forward Chaining</strong> dalam proses inferensi, dan data serta aturan basis pengetahuan dibangun dengan MySQL.
                </p>
                <div class="flex justify-center mb-8">
                    <img src="img/about-image-school.png" alt="Tentang Sistem Pakar" class="rounded-lg shadow-lg w-3/4">
                </div>

                <h4 class="text-lg font-semibold mb-4">Fitur Utama</h4>
                <ul class="list-disc pl-5 mb-6">
                    <li>Sistem berbasis web dengan antarmuka yang responsif.</li>
                    <li>Mengidentifikasi gejala perilaku siswa berdasarkan data yang diinputkan.</li>
                    <li>Mengelola basis pengetahuan dengan metode yang dapat diandalkan.</li>
                </ul>

                <h4 class="text-lg font-semibold mb-4">Teknologi yang Digunakan</h4>
                <ul class="list-disc pl-5 mb-6">
                    <li>Laravel Breeze untuk desain UI modern dan responsif.</li>
                    <li>PHP,JS & MySQL untuk backend dan manajemen database.</li>
                    <li>Metode inferensi berbasis Forward Chaining.</li>
                </ul>

                <h4 class="text-lg font-semibold mb-4">Referensi Penelitian</h4>
                <p class="mb-6">
                    Penelitian ini berdasarkan referensi dari:
                    <br>
                    <a href="https://drive.google.com/file/d/1MOngNnhY2NnBHukTiVTtOcu_ZY8Iv_rI/view?usp=sharing"> <span class="italic">"Sistem Pakar Bimbingan dan Konseling Terhadap Perilaku Siswa Menggunakan Metode Backward Chaining Berbasis Web" - Buletin Poltanesa Vol. 20 No.1, Juni 2019.</span></a>
                   
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Sistem Pakar. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script>
        const toggleButton = document.getElementById('navbar-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
    
        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

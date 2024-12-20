<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Guide - Petunjuk Pengisian</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Tooltip Styling */
        .tooltip {
            position: absolute;
            display: none;
            background-color: black;
            color: white;
            font-size: 0.875rem;
            padding: 5px 10px;
            border-radius: 4px;
            bottom: 12px;
            left: 50%;
            transform: translateX(-50%);
        }

        .tooltip-show {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-lg font-bold">Sistem Pakar Bimbingan Konseling</a>
            <ul class="hidden lg:flex space-x-4">
                <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
                <li><a href="/petunjuk" class="hover:text-gray-300">Petunjuk</a></li>
                <li><a href="/aboutuser" class="hover:text-gray-300">Tentang</a></li>
            </ul>
            <div class="lg:hidden">
                <button id="navbar-toggle" class="text-white">
                    <i class="fas fa-bars w-6 h-6"></i>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="lg:hidden bg-blue-800 text-white hidden">
        <ul class="flex flex-col space-y-4 py-4 px-6">
            <li><a href="/" class="hover:text-gray-300">Beranda</a></li>
            <li><a href="/petunjuk" class="hover:text-gray-300">Petunjuk</a></li>
            <li><a href="/aboutuser" class="hover:text-gray-300">Tentang</a></li>
        </ul>
    </div>

    <section id="instructions" class="bg-white py-8 px-4 sm:px-8">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Petunjuk Pengisian Sistem Pakar</h2>
            <p class="text-xl text-gray-700 text-center mb-6">Ikuti langkah-langkah berikut untuk memulai diagnosis Anda.</p>
            <div class="space-y-8">
                <!-- Step 1 -->
                <div class="step-item flex items-center space-x-4">
                    <div class="relative group">
                        <i class="fas fa-user-circle text-blue-500 text-4xl"></i>
                        <div class="tooltip group-hover:tooltip-show">Langkah pertama, masukkan nama dan kelas Anda.</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Langkah 1: Masukkan Data Diri Anda</h3>
                        <p class="text-gray-700">Isi nama dan kelas Anda untuk memulai diagnosis. Pastikan data yang dimasukkan benar agar hasil diagnosis akurat.</p>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="step-item flex items-center space-x-4">
                    <div class="relative group">
                        <i class="fas fa-notes-medical text-green-500 text-4xl"></i>
                        <div class="tooltip group-hover:tooltip-show">Pilih gejala yang Anda rasakan untuk diagnosis lebih lanjut.</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Langkah 2: Pilih Gejala yang Dirasakan</h3>
                        <p class="text-gray-700">Anda akan diberikan pertanyaan mengenai gejala yang Anda alami. Pilih tingkat keyakinan Anda dari pilihan yang disediakan.</p>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="step-item flex items-center space-x-4">
                    <div class="relative group">
                        <i class="fas fa-cogs text-orange-500 text-4xl"></i>
                        <div class="tooltip group-hover:tooltip-show">Proses diagnosis berdasarkan pilihan gejala Anda.</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Langkah 3: Proses Diagnosis</h3>
                        <p class="text-gray-700">Setelah semua pertanyaan dijawab, sistem akan menghitung solusi yang paling sesuai dengan gejala yang Anda pilih.</p>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="step-item flex items-center space-x-4">
                    <div class="relative group">
                        <i class="fas fa-chart-pie text-purple-500 text-4xl"></i>
                        <div class="tooltip group-hover:tooltip-show">Lihat hasil diagnosis dan solusi yang diberikan.</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Langkah 4: Lihat Hasil Diagnosis</h3>
                        <p class="text-gray-700">Hasil diagnosis akan menunjukkan solusi yang relevan beserta akurasinya. Anda dapat melihat detail solusi yang diberikan.</p>
                    </div>
                </div>
                <!-- Step 5 -->
                <div class="step-item flex items-center space-x-4">
                    <div class="relative group">
                        <i class="fas fa-save text-teal-500 text-4xl"></i>
                        <div class="tooltip group-hover:tooltip-show">Simpan hasil diagnosis untuk referensi lebih lanjut.</div>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Langkah 5: Simpan Hasil Diagnosis</h3>
                        <p class="text-gray-700">Anda dapat menyimpan hasil diagnosis untuk referensi lebih lanjut atau membagikan hasilnya dengan pihak terkait.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const toggleButton = document.getElementById('navbar-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Container Card -->
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Sistem Pakar</h1>

        <!-- Input Data Diri -->
        <div id="startContainer">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Masukkan Data Diri</h2>

            <label for="nameInput" class="block text-gray-600 mb-2">Nama:</label>
            <input type="text" id="nameInput" placeholder="Masukkan nama" 
                class="w-full p-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

            <label for="classInput" class="block text-gray-600 mb-2">Kelas:</label>
            <input type="text" id="classInput" placeholder="Masukkan kelas" 
                class="w-full p-2 border rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

            <button onclick="startDiagnosis()" 
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Mulai Diagnosis
            </button>
        </div>

        <!-- Pertanyaan Gejala -->
        <div id="questionContainer" style="display: none;" class="mt-6">
            <!-- Konten Pertanyaan akan diisi oleh JavaScript -->
        </div>

        <!-- Form Hasil Diagnosis -->
        <form id="resultForm" method="POST" action="{{ route('save.consultation') }}" style="display: none;" class="mt-6">
            @csrf
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Hasil Diagnosis</h2>

            <label class="block text-gray-600 mb-2">Nama:</label>
            <input type="text" name="name" id="result_name" readonly 
                class="w-full p-2 border rounded-lg mb-4 bg-gray-100">

            <label class="block text-gray-600 mb-2">Kelas:</label>
            <input type="text" name="class" id="result_class" readonly 
                class="w-full p-2 border rounded-lg mb-4 bg-gray-100">

            <label class="block text-gray-600 mb-2">Solusi:</label>
            <textarea id="result_solution" readonly 
                class="w-full p-2 border rounded-lg mb-4 bg-gray-100"></textarea>

            <label class="block text-gray-600 mb-2">Akurasi (%):</label>
            <input type="text" name="accuracy" id="result_accuracy" readonly 
                class="w-full p-2 border rounded-lg mb-6 bg-gray-100">

            <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Simpan Hasil
            </button>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        // Data dari Controller Laravel
        const symptoms = {!! json_encode($symptoms) !!};
        const rules = {!! json_encode($rules) !!};
        const solutions = {!! json_encode($solutions) !!};

        let selectedSymptoms = [];
        let currentQuestionIndex = 0;
        let studentName = "";
        let studentClass = "";

        // Mulai Diagnosis
        function startDiagnosis() {
            studentName = document.getElementById("nameInput").value.trim();
            studentClass = document.getElementById("classInput").value.trim();

            if (!studentName || !studentClass) {
                alert("Harap masukkan nama dan kelas sebelum memulai.");
                return;
            }

            document.getElementById("startContainer").style.display = "none";
            document.getElementById("questionContainer").style.display = "block";

            currentQuestionIndex = 0;
            selectedSymptoms = [];
            showNextQuestion();
        }

        // Rekam Jawaban Gejala
        function recordAnswer(answer) {
            if (answer) {
                selectedSymptoms.push(symptoms[currentQuestionIndex].code);
            }
            currentQuestionIndex++;
            showNextQuestion();
        }

        // Cari Rule yang Paling Sesuai
        function getBestMatch() {
            let bestMatch = null;
            let highestAccuracy = 0;

            rules.forEach(rule => {
                const ruleSymptoms = rule.symptoms.split(',');
                const matchCount = selectedSymptoms.filter(symptom => ruleSymptoms.includes(symptom)).length;
                const totalConsideredSymptoms = new Set([...ruleSymptoms, ...selectedSymptoms]).size;
                const accuracy = (matchCount / totalConsideredSymptoms) * 100;

                if (accuracy > highestAccuracy) {
                    highestAccuracy = accuracy;
                    bestMatch = { rule, accuracy };
                }
            });

            return bestMatch;
        }

        // Tampilkan Pertanyaan Selanjutnya
        function showNextQuestion() {
            const questionContainer = document.getElementById('questionContainer');

            if (currentQuestionIndex >= symptoms.length) {
                questionContainer.style.display = 'none';

                const bestMatch = getBestMatch();
                if (bestMatch) {
                    const solution = solutions.find(sol => sol.code === bestMatch.rule.solution_code);

                    document.getElementById('resultForm').style.display = 'block';
                    document.getElementById('result_name').value = studentName;
                    document.getElementById('result_class').value = studentClass;
                    document.getElementById('result_solution').value = solution ? solution.description : 'Solusi tidak ditemukan';
                    document.getElementById('hidden_solution_code').value = solution ? solution.code : 'N/A';
                    document.getElementById('result_accuracy').value = bestMatch.accuracy.toFixed(2);
                } else {
                    questionContainer.innerHTML = `<h2 class="text-lg font-semibold text-red-500">Hasil Diagnosis</h2>
                        <p class="text-gray-600">Tidak ada solusi yang cocok dengan gejala yang dipilih.</p>`;
                }
                return;
            }

            const symptom = symptoms[currentQuestionIndex];
            questionContainer.innerHTML = `
                <h2 class="text-lg font-semibold text-gray-700 mb-4">${symptom.name}?</h2>
                <div class="flex justify-between">
                    <button onclick="recordAnswer(true)" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Ya</button>
                    <button onclick="recordAnswer(false)" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Tidak</button>
                </div>
            `;
        }
    </script>
</body>
</html>

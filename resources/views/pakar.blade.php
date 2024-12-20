<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Container Utama -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Sistem Pakar Bimbingan dan Konseling Perilaku Siswa</h1>

            <!-- Input Data Diri -->
            <div id="startContainer" class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-700">Masukkan Data Diri Anda</h2>
                <div>
                    <label for="nameInput" class="block text-gray-600 font-medium">Nama:</label>
                    <input type="text" id="nameInput" placeholder="Masukkan nama"
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="classInput" class="block text-gray-600 font-medium">Kelas:</label>
                    <input type="text" id="classInput" placeholder="Masukkan kelas"
                           class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button onclick="startDiagnosis()"
                        class="w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
                    Mulai Diagnosis
                </button>
            </div>

            <!-- Pertanyaan Gejala -->
            <div id="questionContainer" class="hidden space-y-4 mt-6"></div>

            <!-- Form Hasil Diagnosis -->
            <form id="resultForm" method="POST" action="{{ route('save.consultation') }}"
                  class="hidden space-y-4 mt-6">
                @csrf
                <h2 class="text-xl font-semibold text-gray-700">Hasil Diagnosis</h2>
                <div>
                    <label class="block text-gray-600 font-medium">Nama:</label>
                    <input type="text" name="name" id="result_name" readonly
                           class="w-full px-4 py-2 border bg-gray-100 rounded">
                </div>
                <div>
                    <label class="block text-gray-600 font-medium">Kelas:</label>
                    <input type="text" name="class" id="result_class" readonly
                           class="w-full px-4 py-2 border bg-gray-100 rounded">
                </div>
                <div>
                    <label class="block text-gray-600 font-medium">Solusi:</label>
                    <textarea id="result_solution" readonly
                              class="w-full px-4 py-2 border bg-gray-100 rounded"></textarea>
                </div>
                <div>
                    <label class="block text-gray-600 font-medium">Akurasi (%):</label>
                    <input type="text" name="accuracy" id="result_accuracy" readonly
                           class="w-full px-4 py-2 border bg-gray-100 rounded">
                </div>
                <input type="hidden" name="solution_code" id="hidden_solution_code">
                <input type="hidden" name="selected_symptoms" id="hidden_selected_symptoms">

                <button type="submit"
                        class="w-full bg-green-500 text-white font-semibold py-2 rounded hover:bg-green-600">
                    Simpan Hasil
                </button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        const symptoms = {!! json_encode($symptoms) !!};
        const rules = {!! json_encode($rules) !!};
        const solutions = {!! json_encode($solutions) !!};

        let selectedSymptoms = [];
        let currentQuestionIndex = 0;
        let studentName = "";
        let studentClass = "";

        function startDiagnosis() {
            studentName = document.getElementById("nameInput").value.trim();
            studentClass = document.getElementById("classInput").value.trim();

            if (!studentName || !studentClass) {
                alert("Harap masukkan nama dan kelas sebelum memulai.");
                return;
            }

            document.getElementById("startContainer").classList.add("hidden");
            document.getElementById("questionContainer").classList.remove("hidden");

            currentQuestionIndex = 0;
            selectedSymptoms = [];
            showNextQuestion();
        }

        function recordAnswer(weight) {
            const symptomCode = symptoms[currentQuestionIndex].code;
            selectedSymptoms.push({ symptom: symptomCode, weight });
            currentQuestionIndex++;
            showNextQuestion();
        }

        function calculateCertaintyFactor() {
            let solutionScores = {};

            rules.forEach(rule => {
                const ruleSymptoms = rule.symptoms.split(',');
                let cfCombine = 0;

                ruleSymptoms.forEach(symptomCode => {
                    const userSymptom = selectedSymptoms.find(s => s.symptom === symptomCode);

                    if (userSymptom) {
                        const cfRule = rule.mb - rule.md;
                        const cfUser = userSymptom.weight;
                        const cfCurrent = cfRule * cfUser;
                        cfCombine = cfCombine + cfCurrent * (1 - cfCombine);
                    }
                });

                if (cfCombine > 0) {
                    solutionScores[rule.solution_code] = cfCombine;
                }
            });

            const bestSolution = Object.keys(solutionScores).reduce((best, solutionCode) => {
                if (solutionScores[solutionCode] > (solutionScores[best] || 0)) {
                    return solutionCode;
                }
                return best;
            }, null);

            displayResult(bestSolution, solutionScores[bestSolution]);
        }

        function showNextQuestion() {
            const questionContainer = document.getElementById('questionContainer');

            if (currentQuestionIndex >= symptoms.length) {
                questionContainer.classList.add("hidden");
                calculateCertaintyFactor();
                return;
            }

            const symptom = symptoms[currentQuestionIndex];
            questionContainer.innerHTML = `
                <h2 class="text-lg font-semibold text-gray-700">${symptom.name}?</h2>
  <div class="space-y-2">
    <button onclick="recordAnswer(0.0)" class="w-full bg-gray-500 text-white font-semibold py-2 rounded hover:bg-gray-600">Tidak Yakin</button>
    <button onclick="recordAnswer(0.2)" class="w-full bg-red-500 text-white font-semibold py-2 rounded hover:bg-red-600">Kurang Yakin</button>
    <button onclick="recordAnswer(0.4)" class="w-full bg-yellow-500 text-white font-semibold py-2 rounded hover:bg-yellow-600">Ragu-Ragu</button>
    <button onclick="recordAnswer(0.6)" class="w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">Cukup Yakin</button>
    <button onclick="recordAnswer(0.8)" class="w-full bg-green-500 text-white font-semibold py-2 rounded hover:bg-green-600">Yakin</button>
    <button onclick="recordAnswer(1.0)" class="w-full bg-green-700 text-white font-semibold py-2 rounded hover:bg-green-800">Sangat Yakin</button>
</div>


            `;
        }

        function displayResult(solutionCode, cf) {
            const solution = solutions.find(sol => sol.code === solutionCode);

            if (solution) {
                document.getElementById('resultForm').classList.remove("hidden");
                document.getElementById('result_name').value = studentName;
                document.getElementById('result_class').value = studentClass;
                document.getElementById('result_solution').value = solution.description;
                document.getElementById('hidden_solution_code').value = solution.code;
                document.getElementById('result_accuracy').value = (cf * 100).toFixed(2) + "%";
            } else {
                alert("Tidak ada solusi yang cocok berdasarkan gejala yang diberikan.");
            }

            document.getElementById('hidden_selected_symptoms').value = JSON.stringify(selectedSymptoms);
        }
    </script>
</body>
</html>

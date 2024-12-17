<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
</head>
<body>
    <h1>Sistem Pakar</h1>

    <!-- Input Data Diri -->
    <div id="startContainer">
        <h2>Masukkan Data Diri</h2>
        <label for="nameInput">Nama:</label>
        <input type="text" id="nameInput" placeholder="Masukkan nama"><br><br>
        <label for="classInput">Kelas:</label>
        <input type="text" id="classInput" placeholder="Masukkan kelas"><br><br>
        <button onclick="startDiagnosis()">Mulai Diagnosis</button>
    </div>

    <!-- Pertanyaan Gejala -->
    <div id="questionContainer" style="display: none;"></div>

    <!-- Form Hasil Diagnosis -->
    <form id="resultForm" method="POST" action="{{ route('save.consultation') }}" style="display: none;">
        @csrf
        <h2>Hasil Diagnosis</h2>
        <label>Nama:</label>
        <input type="text" name="name" id="result_name" readonly><br><br>
        
        <label>Kelas:</label>
        <input type="text" name="class" id="result_class" readonly><br><br>
        
        <label>Solusi:</label>
        <textarea id="result_solution" readonly></textarea><br><br>
        
        <!-- Hidden Input untuk Mengirim Kode Solusi -->
        <input type="hidden" name="solution_code" id="hidden_solution_code">
        
        <label>Akurasi (%):</label>
        <input type="text" name="accuracy" id="result_accuracy" readonly><br><br>
        
        <button type="submit">Simpan Hasil</button>
    </form>

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

            // Sembunyikan input awal, tampilkan pertanyaan
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

            // Jika Pertanyaan Selesai
            if (currentQuestionIndex >= symptoms.length) {
                questionContainer.style.display = 'none';

                const bestMatch = getBestMatch();
                if (bestMatch) {
                    const solution = solutions.find(sol => sol.code === bestMatch.rule.solution_code);

                    // Menampilkan hasil diagnosis di form
                    document.getElementById('resultForm').style.display = 'block';
                    document.getElementById('result_name').value = studentName;
                    document.getElementById('result_class').value = studentClass;
                    document.getElementById('result_solution').value = solution ? solution.description : 'Solusi tidak ditemukan';
                    document.getElementById('hidden_solution_code').value = solution ? solution.code : 'N/A';
                    document.getElementById('result_accuracy').value = bestMatch.accuracy.toFixed(2);
                } else {
                    questionContainer.innerHTML = `<h2>Hasil Diagnosis</h2>
                        <p>Tidak ada solusi yang cocok dengan gejala yang dipilih.</p>`;
                }
                return;
            }

            // Tampilkan Pertanyaan Gejala
            const symptom = symptoms[currentQuestionIndex];
            questionContainer.innerHTML = `
                <h2>${symptom.name}?</h2>
                <button onclick="recordAnswer(true)">Ya</button>
                <button onclick="recordAnswer(false)">Tidak</button>
            `;
        }
    </script>
</body>
</html>

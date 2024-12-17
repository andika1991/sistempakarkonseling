<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Container Card -->
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Diagnosis Result</h1>

        <!-- Card Content -->
        <div class="mb-6">
            <div class="border rounded-lg p-4 bg-gray-50">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Behavior Code:</h4>
                <p class="text-gray-800 font-medium">{{ $behavior }}</p>
            </div>
            <div class="mt-4 border rounded-lg p-4 bg-gray-50">
                <h4 class="text-xl font-semibold text-gray-700 mb-2">Solusi:</h4>
                <p class="text-gray-800">{{ $solution->description }}</p>
            </div>
        </div>

        <!-- Button Start Over -->
        <a href="{{ route('diagnosis.start') }}" 
            class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Mulai Lagi
        </a>
    </div>
</body>
</html>
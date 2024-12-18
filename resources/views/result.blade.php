<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis Result</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Diagnosis Result</h1>
        <div class="card">
            <div class="card-body">
                <h4>Behavior Code: {{ $behavior }}</h4>
                <p>{{ $solution->description }}</p>
            </div>
        </div>
        <a href="{{ route('diagnosis.start') }}" class="btn btn-primary mt-3">Start Over</a>
    </div>
</body>
</html>
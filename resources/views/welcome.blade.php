<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <h1 class="mb-4">Selamat Datang di Aplikasi Inventori</h1>
        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="{{ route('items.index') }}" class="btn btn-primary btn-lg">Lihat Data</a>
            <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Operator</a>
        </div>
    </div>
</body>
</html>

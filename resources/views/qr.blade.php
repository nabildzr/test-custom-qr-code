<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code with Logo</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; }
        img { width: 300px; height: 300px; object-fit: contain; }
    </style>
</head>
<body>
    <div>
        <h2>QR Code dengan Logo di Tengah</h2>
        {{ $qrPath }}
        <img src="{{ $qrPath }}" alt="QR Code">
        <img src="{{ asset($qrPath) }}" alt="QR Code">
    </div>
</body>
</html>

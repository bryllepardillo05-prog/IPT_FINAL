<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        h2 { color: #333; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        pre { background: #eee; padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report: {{ $title }}</h2>
        <hr>
        <pre>{{ json_encode($results, JSON_PRETTY_PRINT) }}</pre>
    </div>
</body>
</html>
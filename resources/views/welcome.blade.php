<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV BOOK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="p-4 bg-white shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold">CV BOOK</h1>
        <div>
            <a href="{{ route('login') }}" class="px-4 py-2 text-blue-500">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 text-blue-500">Register</a>
        </div>
    </nav>
    
    <div class="flex items-center justify-center h-screen">
        <h2 class="text-4xl font-bold text-gray-800">Bienvenido a CV BOOK</h2>
    </div>
</body>
</html>

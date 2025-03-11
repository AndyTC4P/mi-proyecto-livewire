<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Livewire</title>
    @livewireStyles
    <style>
        /* Estilos para el cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
        }

        /* Título */
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Estilos del formulario */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Estilos del input */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box; /* Asegura que el padding no desborde */
        }

        /* Estilos del botón */
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box; /* Asegura que el padding no desborde */
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Mensaje de éxito */
        .mensaje {
            margin-top: 10px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }

        /* Mensaje de error */
        .error {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <h1>Bienvenido a mi primer formulario de FAZIT LIVEWIRE</h1>
    <p>Por favor, ingresa tu nombre:</p>

    <!-- Aquí va el componente Livewire -->
    @livewire('formulario-nombre')

    @livewireScripts
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a UGB</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"  rel="stylesheet">

    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff); 
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            transition: background 0.5s ease;
        }

        .container {
            max-width: 90%;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.2s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: clamp(1.8rem, 5vw, 2.8rem); /* Responsive font size */
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        p {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            color: #555;
            margin-bottom: 2rem;
        }

        /* Barra de progreso */
        .progress-bar {
            width: 100%;
            height: 10px;
            background-color: #ccc;
            overflow: hidden;
            margin-top: 20px;
        }

        .progress-bar div {
            height: 100%;
            background-color: #0000CC;
            width: 0;
            animation: loadBar 3s linear forwards;
        }

        @keyframes loadBar {
            from { width: 0; }
            to { width: 100%; }
        }

        /* Logo */
        .logo {
            max-width: 200px;
            margin: 20px auto;
        }

        .logo img {
            width: 100%;
            height: auto;
        }

        /* Animaciones adicionales */
        .animated-fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .logo img {
                max-width: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container animated-fade-in">
        <!-- Logo -->
        <div class="logo">
            <img src="https://estudiantes.ugb.edu.sv/img/logos/logo_azul_vertical.png"  alt="Universidad Gerardo Barrios">
        </div>

        <!-- Título -->
        <h1>Bienvenidos a Encuentranos UGB</h1>
        <p>Conéctate con tu comunidad académica de forma rápida y segura.</p>

        <!-- Barra de progreso -->
        <div class="progress-bar">
            <div></div>
        </div>

        <!-- Redirección automática después de 3 segundos -->
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('login') }}";
            }, 3000);
        </script>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
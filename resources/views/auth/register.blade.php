<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | Red Estudiantil UGB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"  rel="stylesheet">
    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #002B5C; /* Fondo azul oscuro */ 
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 4px solid transparent;
            background-clip: padding-box;
        }

        /* Gradiente solo en los bordes */
        .register-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            z-index: -1;
            background: linear-gradient(45deg, #007BFF, #00cfff);
            border-radius: 16px;
            animation: gradientBorder 4s ease-in-out infinite;
        }

        @keyframes gradientBorder {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        }

        button {
            width: 100%;
            padding: 14px;
            background: #002B5C;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 123, 255, 0.3);
        }

        .invalid-feedback {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
        }

        .text-center a {
            color: #007BFF;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Estilos específicos para PC (pantallas grandes) */
        @media (min-width: 769px) {
            .register-container {
                max-width: 500px;
                padding: 70px 50px 50px 60px;
            }

            h2 {
                font-size: 2rem;
            }

            input[type="text"],
            input[type="password"],
            input[type="email"] {
                font-size: 1rem;
            }

            button {
                font-size: 1.05rem;
            }
        }

        /* Estilos para tablet y móvil */
        @media (max-width: 768px) {
            .register-container {
                padding: 25px 20px;
            }

            h2 {
                font-size: 1.5rem;
            }

            button {
                font-size: 0.95rem;
            }
        }

        /* Logo de la Universidad */
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        /* Botón de registro */
        .btn-register {
            background-color: #002B5C;
            color: white;
            font-size: 1.2rem;
            padding: 15px;
            border: none;
            border-radius: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-register i {
            font-size: 1.5rem;
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Registro</h2>

    <div class="logo">
        <img src="https://estudiantes.ugb.edu.sv/img/logos/logo_azul_vertical.png"  alt="Universidad Gerardo Barrios">
    </div>

    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Nombre -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required autofocus
                   autocomplete="name" minlength="2"
                   pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo letras y espacios.">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Correo Institucional</label>
            <input id="email" type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required
                   autocomplete="email"
                   pattern="^[a-zA-Z0-9._%+-]+@ugb\.edu\.sv$"
                   title="Solo se permiten correos institucionales (@ugb.edu.sv)">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required minlength="8"
                   autocomplete="new-password"
                   title="Debe tener al menos 8 caracteres.">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div class="form-group">
            <label for="password-confirm">Confirmar Contraseña</label>
            <input id="password-confirm" type="password" name="password_confirmation"
                   class="form-control" required autocomplete="new-password">
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-register">
            REGISTRARSE
            <i class="bi bi-person-plus"></i>
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> 

</body>
</html>
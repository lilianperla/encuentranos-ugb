<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear Reporte | Red Estudiantil UGB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"  rel="stylesheet" />
    
    <!-- Fuente Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f6fa;  
            padding: 0;
            margin: 0;
        }

        .navbar {
            background: linear-gradient(90deg, #0000CC, #0000CC);
            height: auto;
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }

        .navbar-brand {
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Media Queries Responsivos */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1rem;
                max-width: 150px;
            }

            .nav-link {
                font-size: 0.95rem;
                padding: 0.5rem 1rem;
            }

            .navbar-toggler {
                padding: 0.25rem 0.5rem;
            }
        }

        @media (min-width: 576px) and (max-width: 991px) {
            .navbar-brand {
                font-size: 1.1rem;
            }

            .nav-link {
                font-size: 1rem;
            }
        }

        /* Contenedor del formulario */
        .form-container {
            max-width: 700px;
            width: 100%;
            margin: 3rem auto;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 4px solid transparent;
            background-clip: padding-box;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            z-index: -1;
            background: linear-gradient(45deg, #0000CC, #0000CC);
            border-radius: 1.5rem;
            animation: gradientBorder 4s ease infinite;
        }

        @keyframes gradientBorder {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }

        label {
            font-weight: 600;
            margin-top: 1rem;
            display: block;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
            border: 1px solid #ced4da;
            border-radius: 1rem;
            resize: vertical;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #0000CC;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        textarea {
            min-height: 120px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            font-size: 1.1rem;
            background-color: #0000CC;
            color: white;
            border: none;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px #0000CC;
        }

        #video {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 1rem;
            margin-top: 1rem;
        }

        .camera-buttons {
            margin-top: 1rem;
        }

        .btn-secondary,
        .btn-success,
        .btn-danger {
            margin-right: 0.5rem;
            border-radius: 1rem;
        }

        #preview {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 1rem;
            margin-top: 1rem;
            display: none;
        }

        canvas {
            display: none;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            button[type="submit"] {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">Encuentranos UGB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido"
          aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContenido">
            <ul class="navbar-nav me-auto flex-wrap w-100">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reporte.form') }}">
                        <i class="bi bi-plus-circle"></i> Crear Reporte
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">
                        <i class="bi bi-question-circle"></i> FAQ
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto flex-wrap">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle"></i> Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link btn btn-link text-white p-0 m-0" type="submit">
                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenedor principal -->
<div class="form-container p-4">
    <h1>Nuevo Reporte</h1>
    <form action="{{ route('reporte.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Objeto:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        
        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>
        
        <label for="foto">Foto (puedes seleccionarla o tomarla directamente):</label>
        <input type="file" accept="image/*" id="foto" name="foto" class="form-control">

        <div class="camera-buttons mt-3">
            <button type="button" class="btn btn-secondary" id="activarCamara">Activar Cámara</button>
            <button type="button" class="btn btn-success d-none" id="tomarFoto">Tomar Foto</button>
            <button type="button" class="btn btn-danger d-none" id="descartarFoto">Descartar Foto</button>
        </div>

        <video id="video" autoplay class="mt-3 w-100 d-none" style="max-height: 300px;"></video>
        <canvas id="canvas" class="d-none"></canvas>
        <img id="preview" class="mt-3" alt="Vista previa de foto">

        <button type="submit" class="mt-4">Enviar</button>
    </form>
</div>

<!-- Script para cámara -->
<script>
    const activarCamara = document.getElementById('activarCamara');
    const tomarFoto = document.getElementById('tomarFoto');
    const descartarFoto = document.getElementById('descartarFoto');
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const preview = document.getElementById('preview');
    const inputFoto = document.getElementById('foto');
    let stream;

    activarCamara.addEventListener('click', async () => {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
            video.classList.remove('d-none');
            tomarFoto.classList.remove('d-none');
            descartarFoto.classList.remove('d-none');
            preview.style.display = 'none';
            inputFoto.value = '';
        } catch (err) {
            alert('No se pudo acceder a la cámara: ' + err.message);
        }
    });

    tomarFoto.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        if (stream) stream.getTracks().forEach(track => track.stop());

        video.classList.add('d-none');
        tomarFoto.classList.add('d-none');

        const imageDataUrl = canvas.toDataURL('image/png');
        preview.src = imageDataUrl;
        preview.style.display = 'block';

        fetch(imageDataUrl)
            .then(res => res.blob())
            .then(blob => {
                const file = new File([blob], "captura.png", { type: "image/png" });
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                inputFoto.files = dataTransfer.files;
            });
    });

    descartarFoto.addEventListener('click', () => {
        if (stream) stream.getTracks().forEach(track => track.stop());
        video.classList.add('d-none');
        tomarFoto.classList.add('d-none');
        descartarFoto.classList.add('d-none');
        preview.style.display = 'none';
        inputFoto.value = '';
    });
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>  

</body>
</html>
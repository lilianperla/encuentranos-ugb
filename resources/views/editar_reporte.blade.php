<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Reporte</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Fuente Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body { background-color: #fff; font-family: 'Inter', sans-serif; }
    .navbar { background: linear-gradient(90deg, #0000CC, #0000CC); }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Encuéntranos UGB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContenido">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reportes.create') }}">
            <i class="bi bi-plus-circle"></i> Crear Reporte
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('faq') }}">
            <i class="bi bi-question-circle"></i> FAQ
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.edit') }}">
            <i class="bi bi-person-circle"></i> Perfil
          </a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="nav-link btn btn-link text-white p-0 m-0" type="submit" onclick="return confirm('¿Cerrar sesión?')">
              <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h1>Editar Reporte</h1>

  <form method="POST" action="{{ route('reportes.update', $reporte->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre del Reporte</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $reporte->nombre) }}" required>
    </div>

    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $reporte->descripcion) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="ubicacion" class="form-label">Ubicación</label>
      <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $reporte->ubicacion) }}" required>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto (opcional)</label>
      <input type="file" class="form-control" id="foto" name="foto">
      
      @if($reporte->foto)
        <div class="mt-2">
          <img src="{{ asset('storage/' . $reporte->foto) }}" alt="Foto actual" style="max-width: 200px;">
          <p class="text-muted mt-1">Foto actual</p>
        </div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
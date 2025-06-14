<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Red Estudiantil - Reportes</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Fuente Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body { background-color: #fff; font-family: 'Inter', sans-serif; }
    .navbar { background: linear-gradient(90deg, #0000CC, #0000CC); }
    .reporte-card { position: relative; overflow: hidden; border: 1px solid #ccc; border-radius: .5rem; }
    .reporte-foto-container { 
      width: 100%; 
      height: 200px; 
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 1rem;
      border-radius: .5rem;
      background-color: #f8f9fa;
    }
    .reporte-foto { 
      width: 100%;
      height: 100%;
      object-fit: contain;
      border-radius: .5rem;
    }
    .no-foto { color: #888; font-style: italic; margin-top: 1rem; }
    .btn-action { min-width: 80px; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Encuéntranos UGB</a>
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
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  @if(session('status'))
    <div class="alert alert-info">{{ session('status') }}</div>
  @endif

  <h1>Reportes Estudiantiles</h1>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    @forelse($reportes as $reporte)
      <div class="col">
        <div class="reporte-card p-4 shadow-sm">
          <h5><strong>{{ $reporte->nombre }}</strong></h5>
          <p>{{ $reporte->descripcion }}</p>
          <p><small class="text-muted">Ubicación: {{ $reporte->ubicacion }}</small></p>
          <p><small class="text-muted">Publicado por: {{ $reporte->user->name ?? 'Usuario desconocido' }}</small></p>

          @if($reporte->foto)
            <div class="reporte-foto-container">
              <img src="{{ asset('storage/' . $reporte->foto) }}" alt="Foto del reporte" class="reporte-foto" />
            </div>
          @else
            <p class="no-foto">No hay foto</p>
          @endif

          <div class="mt-3 d-flex gap-2">
            @auth
              @if($reporte->user_id == Auth::id())
                <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-sm btn-primary btn-action">
                  <i class="bi bi-pencil-square"></i> Editar
                </a>

                <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este reporte?');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger btn-action" type="submit">
                    <i class="bi bi-trash"></i> Eliminar
                  </button>
                </form>
              @endif
            @endauth
          </div>
        </div>
      </div>
    @empty
      <p>No hay reportes disponibles.</p>
    @endforelse
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
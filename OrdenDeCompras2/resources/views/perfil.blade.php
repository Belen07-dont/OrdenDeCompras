<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil - C.Store</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Auth Status Banner -->
    <div class="auth-status-banner">
        @auth
            <div class="auth-success">
                <i class="fas fa-check-circle me-2"></i>
                ¡Bienvenido de vuelta, {{ auth()->user()->name }}!
            </div>
        @else
            <div class="auth-warning">
                <i class="fas fa-exclamation-circle me-2"></i>
                No has iniciado sesión. <a href="{{ url('/login') }}" class="auth-link">Inicia sesión aquí</a>
            </div>
        @endauth
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-store me-2"></i>C Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pedidos') }}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/carrito') }}">Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/perfil') }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="border: none; background: none;">
                                <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Hero Section -->
    <div class="profile-hero">
        <div class="container">
            <div class="profile-avatar">
                <i class="fas fa-user "></i>
            </div>
            <h1 class="display-5 fw-bold">Perfil de {{ auth()->user()->name}}</h1>
            <p class="lead">Miembro de C.Store desde {{ auth()->user()->created_at->format('F Y') }}</p>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column - User Info -->
            <div class="col-lg-8 ">
                <!-- Personal Information Card -->
                <div class="profile-card col-10">
                    <div class="profile-card-header">
                        <i class="fas fa-user-circle me-2"></i>Información Personal
                    </div>
                    <div class="card-body p-0">
                        <div class="profile-info-item" >
                            <span class="info-label col-4">Nombre:    </span>
                            <span class="info-value col-6">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label col-4">Email:</span>
                            <span class="info-value col-6">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label col-4">Miembro desde:</span>
                            <span class="info-value col-6">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label col-4">Última actualización:</span>
                            <span class="info-value col-6">{{ auth()->user()->updated_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="profile-card mt-4">
                    <div class="profile-card-header">
                        <i class="fas fa-history me-2"></i>Actividad Reciente
                    </div>
                    <div class="card-body">
                        <ul class="recent-activity">
                            <li class="activity-item">
                                <div class="fw-semibold">Sesión iniciada</div>
                                <div class="activity-time">Hoy a las {{ now()->format('H:i') }}</div>
                            </li>
                            <li class="activity-item">
                                <div class="fw-semibold">Perfil visitado</div>
                                <div class="activity-time">Última vez: {{ now()->subDays(2)->format('d/m/Y') }}</div>
                            </li>
                            <li class="activity-item">
                                <div class="fw-semibold">Configuración actualizada</div>
                                <div class="activity-time">Hace 1 semana</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column - Stats & Actions -->
            <div class="col-lg-4">
                <!-- Quick Stats -->
                <div class="stats-card mb-4">
                    <div class="stats-number">0</div>
                    <div class="stats-label">Pedidos Realizados</div>
                </div>
                
                <div class="stats-card mb-4">
                    <div class="stats-number">0</div>
                    <div class="stats-label">Productos en carrito</div>
                </div>
                

                <!-- Quick Actions -->
                <div class="profile-card">
                    <div class="profile-card-header">
                        <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editarPerfil">
                                <i class="fas fa-edit me-2"></i>Editar Perfil
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-shopping-bag me-2"></i>Mis Pedidos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de editar perfil -->
    <div class="modal" tabindex="-1" id="editarPerfil">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>C. Store</h5>
                    <p>Tu tienda de conveniencia de barrio para todas tus necesidades diarias.</p>
                </div>
                <div class="col-6 text-end social-icons">
                    <a href="#"><i class="fab fa-facebook"> </i></a>
                    <a href="#"><i class="fab fa-twitter">  </i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <p class="text-center mb-0">© 2024 C. Store. Todos los derechos reservados.</p>
        </div>
    </footer>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil - C.Store</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-lg">
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
                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="border: none; background: none;">
                                <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                            </button>
                        </form>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Hero Section -->
    <div class="profile-hero" style="padding-top: 8rem; margin-bottom: 0px;">
        <div class="container">
            @auth
                @if(auth()->user()->image=="")
                    <div class="profile-avatar" style="height: 400px; width:300px; margin-right:200px; position:absolute">
                        <img src="{{asset('img/login.jpg')}}" alt="" class="product-image rounded-circle" style="width:300px; height:300px">
                    </div>
                    <div style="">
                        <h1 class="display-5 fw-bold">Perfil de {{ auth()->user()->name}}</h1>
                        <p class="lead">Miembro de C.Store desde {{ auth()->user()->created_at->format('F Y') }}</p>
                    </div>
                @else   
                    <div class="profile-avatar" style="height: 300px; width:300px; position:absolute">
                        <img src="{{ asset('img/pfps/' . auth()->user()->image) }}" alt="" class="product-image rounded-circle" style="width:300px; height:300px">
                    </div>
                    <div style="">
                        <h1 class="display-5 fw-bold">Perfil de {{ auth()->user()->name}}</h1>
                        <p class="lead">Miembro de C.Store desde {{ auth()->user()->created_at->format('F Y') }}</p>
                    </div>
                @endif
            @else
                <div class="header-card">
                    <div class="empty-state text-light">
                        <i class="fas fa-exclamation-circle " style="width:100px;"></i>
                        <h3 class="h4 mb-3" style="color: rgb(56, 56, 56)">Acceso no autorizado</h3>
                        <h5 class="text-muted mb-4 text-dark">Debes iniciar sesión para ver tu perfil.</h5>
                        <a href="{{ url('/login') }}" class="">
                            <h6>¿Iniciar Sesion?</h6>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    @php 
            use App\Models\Comment;
            use App\Models\Cart;
            $comments = Comment::with('user')->latest()->get();
            $pedidos = \App\Models\Pedido::with('items')
                    ->where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
            $cartItems = Cart::where('user_id', Auth::id())->get();
    @endphp

    <!-- Profile Content -->
    <div class="container">
        @auth   
            <br><br><br><br><br><br>
            
            <div class="row">
                <!-- Personal Information -->
                <div class="col-lg-5">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <i class="fas fa-user-circle me-2"></i>Información Personal
                        </div>
                        <div class="card-body py-2" style="text-align: start; font-size: 13px">
                            <div class="profile-info-item">
                                <span class="info-label" >Nombre:</span>
                                <span class="info-value">{{ auth()->user()->name }}</span>
                            </div>
                            <div class="profile-info-item">
                                <span class="info-label" >Email:</span>
                                <span class="info-value">{{ auth()->user()->email }}</span>
                            </div>
                            <div class="profile-info-item">
                                <span class="info-label" >Miembro desde:</span>
                                <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="profile-info-item">
                                <span class="info-label" >Última actualización:</span>
                                <span class="info-value">{{ auth()->user()->updated_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="col-lg-4">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <i class="fas fa-history me-2"></i>Actividad Reciente
                        </div>
                        <div class="card-body p-0">
                            <ul class="recent-activity">
                                <li class="activity-item">
                                    <div class="fw-semibold">Sesión iniciada</div>
                                    <div class="activity-time">Hoy a las {{ now()->format('H:i') }}</div>
                                </li>
                                <li class="activity-item">
                                    <div class="fw-semibold">Perfil visitado</div>
                                    <div class="activity-time">Última vez: {{ now()->subDays(0)->format('d/m/Y') }}</div>
                                </li>
                                <li class="activity-item">
                                    <div class="fw-semibold">Configuración actualizada</div>
                                    <div class="activity-time">Hace 1 semana</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Stats and Quick Actions -->
                <div class="col-lg-3">
                    <div class="stats-card mb-3" style="padding-top: 2rem; ">
                        <div class="stats-number" value="">{{ $pedidos->count() }}</div>
                        <div class="stats-label">Pedidos Realizados</div>
                    </div>
                    <div class="stats-card mb-3" style="padding-top: 2rem; ">
                        <div class="stats-number">{{ $cartItems->count() }}</div>
                        <div class="stats-label">Productos en carrito</div>
                    </div>
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2 bg-dark-subtle">
                                <button class="btn btn-edit my-1" data-bs-toggle="modal" data-bs-target="#editarPerfil">
                                    <i class="fas fa-edit me-2"></i>Editar Perfil
                                </button>
                                <button class="btn btn-outline-primary">
                                    <a href="{{url('/pedidos')}}" style="font-weight: bold; text-decoration: none;" class="pedidos">
                                        <i class="fa fa-shopping-bag"></i> Mis pedidos
                                    </a>
                                </button>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @if(auth()->id() === 1)
        <div class="container admin-comments-section" style="padding: 20px; margin-bottom: 8rem;">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>User Comments</h1>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                            ← Back
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($comments->count() > 0)
                        <div class="comments-container">
                            @foreach($comments as $comment)
                                <div class="comment-section">
                                    <div class="comment-header">
                                        <div class="user-info">
                                            <div class="user-main">
                                                <h3 class="user-name">User</h3>
                                                <div class="creation-date">
                                                    {{ $comment->created_at->format('d/m/Y') }}
                                                </div>
                                            </div>
                                            <div class="user-email">{{ $comment->email }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="comment-content">
                                        <p class="comment-text">{{ Str::limit($comment->message, 150) }}</p>
                                    </div>
                                    
                                    <div class="user-id-section">
                                        <div class="user-id-badge">
                                            User Id: {{ $comment->user_id }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="comments-summary">
                            Total Comments: {{ $comments->count() }}
                        </div>
                    @else
                        <div class="alert alert-info text-center py-4">
                            <h4>No Comments</h4>
                            <p class="mb-0">No comments found in the system.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @endauth
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal" tabindex="-1" id="editarPerfil">
        @auth
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header footer" style="padding: 10px;">
                    <h5 class="modal-title fs-3">Editar perfil</h5>
                    <button type="button" class="btn-close bg-dark-subtle"style="margin-right:10px" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/edit-user" method="POST" class="text-center">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="fw-bold fs-4 my-0">Usuario:</label>
                            <input type="text" id="name"  class="w-75 fs-5"  name="name" value= "{{ auth()->user()->name }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email" class="fw-bold fs-4 my-0">Email:</label>
                            <input type="text" id="email" class="w-75 fs-5"  name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <br>
                        <div class="form-group text-start my-0 mx-0 ">
                            <label for="image" class="fw-bold fs-4 my-0 mx-2">Foto:</label>
                            <input name="image" type="file" class="form-control" id="image" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        
                        <br>
                        <button type="submit" id="" class="btn btn-primary my-0 w-50 fs-5">Guardar Cambios</button>
                    </form>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
        @endauth
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 ">
                    <h5>C. Store</h5>
                    <p style="text-align:justify">Tu tienda de conveniencia de barrio para todas tus necesidades diarias. Productos de calidad, servicio amable y horarios convenientes.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white">Inicio</a></li>
                        <li><a href="#pasillos" class="text-white">Pasillos</a></li>
                        <li><a href="#" class="text-white">Ofertas Semanales</a></li>
                        <li><a href="#" class="text-white">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Conéctate con Nosotros</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0">¡Suscríbete a nuestro boletín para recibir actualizaciones y ofertas especiales!</p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <p class="text-center mb-0">© 2023 C. Store. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    
</head>
<body>
   
<div class="hero-section" style="background: linear-gradient(rgba(45, 48, 71, 0.9), rgba(45, 48, 71, 0.9)), url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1720&q=80'); padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card aisle-card border-0">
                    <div class="card-header bg-transparent border-0 text-center pt-4">
                        <h2 class="fw-bold" style="color: var(--dark-color);">
                            <i class="fas fa-user-plus me-2"></i>Registro
                        </h2>
                        <p class="text-muted">Únete a C.Store</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <form action="/guardar" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-user text-muted"></i>
                                    </span>
                                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Ingresa tu nombre completo" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Su nombre tiene que tener entre 3 a 20 caracteres</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="tu@email.com" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Lo que inserto no tiene formato de correo</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Crea una contraseña segura" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Su contraseña debe tener un mínimo de 8 caracteres</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-text text-end">Mínimo 8 caracteres</div>
                            </div>
                            
                            <button class="btn btn-primary btn-lg w-100 py-3 fw-semibold mb-3">
                                <i class="fas fa-user-plus me-2"></i>Crear Cuenta
                            </button>
                        </form>
                        
                        <div class="text-center">
                            <p class="text-muted mb-0">¿Ya tienes cuenta? 
                                <a href="/signin" class="text-primary text-decoration-none fw-semibold">Inicia Sesión aquí</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
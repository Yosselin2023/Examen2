<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión | DISFARMA</title>


    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    
    <style>
        body {
            background: linear-gradient(135deg, #123b60, #2876a5);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            max-width: 440px;
            width: 100%;
            border: 0;
            border-radius: 14px;
            box-shadow: 0 15px 45px #0003;
        }
        .brand {
            color: #174a78;
            font-weight: 900;
            letter-spacing: 1px;
        }
        .brand span {
            color: #c62828;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    <div class="card-body p-5">
                        
                        <!-- Encabezado de la tarjeta -->
                        <div class="text-center mb-4">
                            <div class="brand fs-2">DISFARMA <span>HONDURAS</span></div>
                            <p class="text-muted mb-0">Sistema de Gestión Interna</p>
                        </div>

                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="usuario@disfarma.hn" value="{{ old('email') }}" required autofocus>
                                <label for="email">Correo institucional</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           
                            <div class="form-floating mb-3">
                                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Contraseña" required>
                                <label for="password">Contraseña</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                           
                            <div class="form-check mb-4">
                                <input class="form-check-input" id="remember" type="checkbox" name="remember" value="1">
                                <label class="form-check-label" for="remember">Recordar mi sesión</label>
                            </div>

                            <!-- Botón de envío -->
                            <button class="btn btn-primary w-100 py-2" type="submit">
                                Ingresar <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </button>
                        </form>

                    </div>
                </div>

            
                <p class="text-center text-white small mt-3">Acceso exclusivo para personal autorizado @disfarma.hn</p>
            </div>
        </div>
    </div>

</body>
</html>
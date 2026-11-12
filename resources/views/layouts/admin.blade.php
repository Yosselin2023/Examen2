<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Panel') | DISFARMA Honduras</title>

    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --df-blue: #174a78;
            --df-red: #c62828;
        }
        .sb-nav-fixed #layoutSidenav #layoutSidenav_nav {
            width: 225px;
        }
        .sb-sidenav-dark {
            background: #173b5e;
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link {
            color: #eaf2f8;
        }
        .sb-sidenav-dark .sb-sidenav-menu .nav-link:hover {
            background: #24577f;
            color: white;
        }
        .df-brand {
            font-weight: 800;
            letter-spacing: .5px;
            color: #fff;
        }
        .df-brand span {
            color: #ffcf4a;
        }
        .df-card {
            border-left: 4px solid var(--df-blue);
        }
        .table thead th {
            white-space: nowrap;
        }
        .content-wrap {
            min-height: calc(100vh - 130px);
        }
        .small-img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 6px;
        }
        .required:after {
            content: ' *';
            color: #c00;
        }
    </style>

    @stack('estilos')
</head>
<body class="sb-nav-fixed">

    
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: #123b60;">
        <a class="navbar-brand ps-3 df-brand" href="{{ route('dashboard') }}">
            DISFARMA <span>HONDURAS</span>
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4" id="sidebarToggle">
            <i class="bi bi-list text-white"></i>
        </button>

        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Gestión</div>
                        <a class="nav-link" href="{{ route('medicamentos.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-capsule"></i></div>
                            Medicamentos
                        </a>
                        <a class="nav-link" href="{{ route('proveedores.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-truck"></i></div>
                            Proveedores
                        </a>
                        <a class="nav-link" href="{{ route('empleados.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Empleados
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Sesión iniciada como:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="content-wrap">
                <div class="container-fluid px-4 py-4">
                    
               
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Hay errores en el formulario:</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   
                    @yield('contenido')
                    
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">© {{ date('Y') }} DISFARMA Honduras - Sistema de Gestión Interna</div>
                        <div class="text-muted">Droguería y Distribuidora Farmacéutica San Rafael S. de R.L.</div>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
    @stack('scripts')

</body>
</html>
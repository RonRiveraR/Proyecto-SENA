<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Placard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/LogoMinimal.png') }}">
    @yield('cabecera')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-rosado">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/LogoMinimal.png') }}" alt="Logo de Placard" width="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link texto-rosaViejo" aria-current="page" href="{{ url('inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texto-rosaViejo" aria-current="page" href="{{ url ('pedidos') }}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texto-rosaViejo" aria-current="page" href="{{ url('clientes') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link texto-rosaViejo" aria-current="page" href="{{ url('productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link texto-rosaViejo" href="{{route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class=" container">
        <h1 class="text-center texto-rosaViejo bukhari titulo my-5">Placard</h1>
    </div>

    @yield('contenido')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')
</body>

</html>
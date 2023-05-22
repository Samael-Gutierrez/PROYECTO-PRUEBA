<nav class="navbar navbar-expand-lg navbar-dark p-1 fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('bienvenida') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="logo" width="30" height="24"
                class="d-inline-block align-text-top">
            <span class="d-none text-white">Universidad Politectnica Metropolitana de Puebla</span>
            <span class="text-white">UPMP</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle p-0 px-2 h-100 w-100" href="#" id="userData" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('fotos/' . Auth::user()->foto) }}" alt="user-image" class="rounded-pill"
                                width="40px" height="40px">
                            {{ Auth::user()->nombre . ' ' . Auth::user()->apellido_paterno . ' ' . Auth::user()->apellido_materno }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="userData">
                            <li>
                                <a href="{{ route('perfil') }}" class="btn d-block btn-light w-100">
                                    Ver mí Perfil
                                </a>
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                    data-bs-target="#editPassword">
                                    Cambiar Contraseña
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                    data-bs-target="#editPhoto">
                                    Cambiar Foto
                                </button>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn d-block btn-light w-100">Cerrar Sesion</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                </li>
                <li class="nav-item d-lg-none">
                    <div class="row justify-content-center">
                        @include('routing.catalogos')
                    </div>
                    <div class="row justify-content-center">
                        @include('routing.reportes')
                    </div>
                    <div class="row justify-content-center">
                        @include('routing.herramientas')
                    </div>
                </li>

                <li class="nav-item d-lg-none">
                    <a href="{{ route('administradores.index') }}" class="sidebar-link py-2 mx-auto">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-1 p-0 text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-ui-radios" viewBox="0 0 16 16">
                                        <path
                                            d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM0 12a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm7-1.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM3 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                    </svg>
                                </div>
                                <div class="col-11 ps-0 text-start">
                                    <span>Administradores</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



@include('layouts.partials.change-password')
@include('layouts.partials.change-image')


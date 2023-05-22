<aside class="sidebar bg-primary container-fluid p-0">
    <div class="sidebar-layer"></div>
    <div class="logo-sidebar text-center">
        <img src="{{ asset('img/imagotipo.svg') }}" id="sidebar-imagotipo" alt="imagotipo">
    </div>

    <hr class="text-white fw-bold border border-white border-2">

    <div class="navbar-links">

        @if( Auth::user()->ida == 7)
        <div class="row justify-content-center">
            @include('routing.catalogos')
        </div>
        <div class="row justify-content-center">
            @include('routing.reportes')
        </div>

        <div class="row justify-content-center">
            @include('routing.herramientas')
        </div>

        <div class="row justify-content-center">
            <a href="{{ route('administradores.index') }}" class="sidebar-link py-2">
                <div class="col-11">
                    <div class="row w-100 align-items-center mx-auto justify-content-center">
                        <div class="col-4 p-0 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                        </div>
                        <div class="col-8 ps-0">
                            <span>Administradores</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif


        @if( Auth::user()->ida == 1)
        <div class="row justify-content-center">
            @include('routing.catalogosbiblioteca')
        </div>
        @endif


        
    </div>




</aside>

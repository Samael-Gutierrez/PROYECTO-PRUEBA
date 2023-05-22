<a class="sidebar-link catalogos-link py-2" data-bs-toggle="collapse" href="#catalogos" role="button" aria-expanded="true"
    aria-controls="catalogos">

    <div class="w-100 h-100 d-flex justify-content-between">

        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                class="bi bi-bookmark-star" viewBox="0 0 16 16">
                <path
                    d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                <path
                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
            </svg>
            Catálogos
        </span>
        <div id="catalogos-inactive-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path
                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
            </svg>
        </div>
        <div class="d-none" id="catalogos-active-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path
                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
            </svg>
        </div>
    </div>
</a>
<div class="collapse collapse-catalogos" id="catalogos">

    <div class="">
        <a href="{{ route('libros.index') }}" class="sidebar-link py-2">
            <div class="col-11">
                <div class="row w-100 align-items-center mx-auto justify-content-center">
                    <div class="col-4 p-0 text-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                        </svg>
                    </div>
                    <div class="col-8 ps-0">
                        <span>Libros</span>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="">

        <a href="{{ route('autores.index') }}" class="sidebar-link py-2">
            <div class="col-11">
                <div class="row w-100 align-items-center mx-auto justify-content-center">
                    <div class="col-4 p-0 text-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                        </svg>
                    </div>
                    <div class="col-8 ps-0">
                        <span>Autores</span>
                    </div>
                </div>
            </div>
        </a>



    </div>

    <div class="">
        <a href="{{ route('editoriales.index') }}" class="sidebar-link py-2">
            <div class="col-11">
                <div class="row w-100 align-items-center mx-auto justify-content-center">
                    <div class="col-4 p-0 text-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                        </svg>
                    </div>
                    <div class="col-8 ps-0">
                        <span>Editoriales</span>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="">
        <a href="{{ route('temas.index') }}" class="sidebar-link py-2">
            <div class="col-11">
                <div class="row w-100 align-items-center mx-auto justify-content-center">
                    <div class="col-4 p-0 text-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                            <path
                                d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                        </svg>
                    </div>
                    <div class="col-8 ps-0">
                        <span>Temas</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<?php

use App\Http\Controllers\AdministradorPlataformaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthBibliotecaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CicloEscolarController;
use App\Http\Controllers\CuatrimestreController;
use App\Http\Controllers\TipoDeUsuarioController;
use App\Http\Controllers\Exports\PDFDocenteController;
use App\Http\Controllers\Exports\PDFAlumnoController;
use App\Http\Controllers\Exports\ExcelAlumnoController;
use App\Http\Controllers\Exports\ExcelDocenteController;
// <-------------------Biblioteca------------------------->
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;


use App\Http\Controllers\Reportes\ReporteDocenteController;
use App\Http\Controllers\Reportes\ReporteAlumnoController;

use App\Http\Controllers\Importars\ImportarDocenteController;
use App\Http\Controllers\Importars\ImportarAlumnoController;
use App\Models\AdministradorPlataforma;

// <-- Index -->
Route::view('/', 'Auth/Admin/login')->name('index');
// <-- Bienvenida -->
Route::view('/bienvenida', 'bienvenida')->name('bienvenida');

// <-- Authenticacion -->
Route::prefix('authentication')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('loginbiblioteca', [AuthBibliotecaController::class, 'login'])->name('loginbiblioteca');
    Route::post('authenticatebiblioteca', [AuthBibliotecaController::class, 'authenticate'])->name('authenticatebiblioteca');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:root');

// <-- Catalogos -->
Route::middleware('auth:root')->prefix('catalogos')->group(function () {
    // <-- Areas -->
    Route::resource('areas', AreaController::class)->except('show');
    Route::put('areas/togglestatus/{area}', [AreaController::class, 'toggleStatus'])->name('areas.toggle.status');
    // <-- Cuatrimestres -->
    Route::resource('cuatrimestres', CuatrimestreController::class);
    Route::put('cuatrimestre/togglestatus/{cuatrimestre}', [CuatrimestreController::class, 'toggleStatus'])->name('cuatrimestre.toggle.status');
    // <-- Grupos -->
    Route::resource('grupos', GrupoController::class)->except('show');
    Route::put('grupo/togglestatus/{grupo}', [GrupoController::class, 'toggleStatus'])->name('grupo.toggle.status');
    // <-- Roles -->
    Route::resource('tipodeusuarios', TipoDeUsuarioController::class);
    Route::put('tipodeusuario/togglestatus/{tipodeusuario}', [TipoDeUsuarioController::class, 'toggleStatus'])->name('tipodeusuario.toggle.status');
    // <-- Carreras -->
    Route::resource('carreras', CarreraController::class);
    Route::put('carreras/togglestatus/{carrera}', [CarreraController::class, 'toggleStatus'])->name('carreras.toggle.status');
    // <-- Ciclos Escolares -->
    Route::resource('ciclos', CicloEscolarController::class);;
    Route::put('ciclos/togglestatus/{ciclo}', [CicloEscolarController::class, 'toggleStatus'])->name('ciclos.toggle.status');
    // <-- Alumnos -->
    Route::resource('alumnos', AlumnoController::class)->except('show')->parameters(['alumnos' => 'usuario']);
    Route::put('alumnos/togglestatus/{usuario}', [AlumnoController::class, 'toggleStatus'])->name('alumnos.toggle.status');
    // <-- Docentes -->
    Route::resource('docentes', DocenteController::class)->except('show')->parameters(['docentes' => 'usuario']);
    Route::put('docentes/togglestatus/{usuario}', [DocenteController::class, 'toggleStatus'])->name('docentes.toggle.status');
    
    // ----------------------------------------------------Biblioteca
    // <-- Autores -->
    Route::resource('autores', AutorController::class)->except('show')->parameters(['autores' => 'autor']);
    Route::put('autores/togglestatus/{autor}', [AutorController::class, 'toggleStatus'])->name('autores.toggle.status');
    // <-- Editoriales -->
    Route::resource('editoriales', EditorialController::class)->except('show')->parameters(['editoriales' => 'editoprial']);
    Route::put('editoriales/togglestatus/{editoriales}', [EditorialController::class, 'toggleStatus'])->name('editoriales.toggle.status');
    // <-- Temas -->
    Route::resource('temas', TemaController::class)->except('show')->parameters(['temas' => 'temas']);
    Route::put('temas/togglestatus/{temas}', [TemaController::class, 'toggleStatus'])->name('temas.toggle.status');
    // <-- Libros -->
    Route::resource('libros', LibroController::class)->except('show')->parameters(['libros' => 'libros']);
    Route::put('libros/togglestatus/{libro}', [LibroController::class, 'toggleStatus'])->name('libros.toggle.status');
    // <-- Prestamos -->
    Route::resource('prestamos', PrestamoController::class)->except('show')->parameters(['prestamos' => 'prestamo']);
    Route::put('prestamos/togglestatus/{prestamo}', [PrestamoController::class, 'toggleStatus'])->name('prestamos.toggle.status');

});

// <-- Reportes -->
Route::middleware('auth:root')->prefix('reportes')->group(function () {
    // <-- Alumnos -->
    Route::resource('reportealumnos', ReporteAlumnoController::class)->except('show')->parameters(['reportealumnos' => 'usuario']);
    Route::put('reportealumnos/togglestatus/{usuario}', [ReporteAlumnoController::class, 'toggleStatus'])->name('reportealumnos.toggle.status');
    Route::name('consulta1')->get('/consulta1', [ReporteAlumnoController::class, 'consulta01']);
    Route::name('datos1')->get('/datos1', [ReporteAlumnoController::class, 'datos1']);
    // <-- Docentes -->
    Route::resource('reportedocentes', ReporteDocenteController::class)->except('show')->parameters(['reportedocentes' => 'usuario']);
    Route::put('reportedocentes/togglestatus/{usuario}', [ReporteDocenteController::class, 'toggleStatus'])->name('reportedocentes.toggle.status');
    // <-- Importar Alumnos -->
    Route::resource('alumnosimport', ImportarAlumnoController::class)->except('show');
    Route::post('getGrupos', [ImportarAlumnoController::class, 'getGrupos'])->name('getGrupos');
    Route::name('exportarejemploalumnos')->get('exportarejemploalumnos', [ImportarAlumnoController::class, 'exportarejemploalumnos']);
    // <-- Importar Docentes -->
    Route::resource('docentesimport', ImportarDocenteController::class)->except('show');
    Route::name('exportarejemplodocentes')->get('exportarejemplodocentes', [ImportarDocenteController::class, 'exportarejemplodocentes']);
});

// <-- Herramientas -->
    Route::middleware('auth:root')->prefix('herramientas')->group(function () {
    Route::get('movimiento-entre-grupos',[GrupoController::class, 'movimientoEntreGruposIndex'])->name('mover.entre.grupos.index');
    //rutas de herramientas
    Route::get('movimiento-grupal/{grupo}', [GrupoController::class, 'hacerMovimientoGrupal'])->name('movimiento.grupal');
    Route::post('mover-grupo/{grupo}', [GrupoController::class, 'moverGrupo'])->name('mover.grupo');
    Route::get('movimiento-individual/{grupo}', [GrupoController::class, 'hacerMovimientoIndividual'])->name('movimiento.individual');
    Route::post('mover-individual/{grupo}', [GrupoController::class, 'moverIndividual'])->name('mover.individual');
    //Route - POST para cambiar todo un grupo a otro
    //Route - POST para cambiar alumnos de un grupo a otro
});


// <-- Administradores -->
Route::resource('administradores', AdministradorPlataformaController::class)->except('show')->parameters(['administradores' => 'administradorPlataforma'])->middleware('auth:root');

Route::put('administradores/togglestatus/{administradorPlataforma}', [AdministradorPlataformaController::class, 'toggleStatus'])->name('administradores.toggle.status')->middleware('auth:root');
Route::put('updatepassword/{id}', [AdministradorPlataformaController::class, 'updatepassword'])->name('updatepassword');
Route::put('updatefoto/{id}', [AdministradorPlataformaController::class, 'updatefoto'])->name('updatefoto');
Route::get('admin/perfil', [AdministradorPlataformaController::class, 'perfil'])->middleware('auth:root')->name('perfil');
// Route::name('print')->get('/imprimir', 'GeneradorController@imprimir');
// <-- Export PDF docentes -->
Route::get('download-pdf' , [PDFDocenteController::class, 'downloadPDF'])->name('download-pdf');
// <-- Export PDF Alumnos -->
Route::get('download-pdf-alumnos' , [PDFAlumnoController::class, 'downloadPDFAlumno'])->name('download-pdf-alumnos');
// <-- Export Excel Alumnos -->
Route::get('download-excel-alumnos' , [ExcelAlumnoController::class, 'downloadExcelAlumno'])->name('download-excel-alumnos');
// <-- Export Excel Docentes -->
Route::get('download-excel-docentes' , [ExcelDocenteController::class, 'downloadExcelDocente'])->name('download-excel-docentes');

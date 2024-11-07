<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\FormadorController;
use App\Http\Controllers\GestorCursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




//************************************************ T E S T A R ***********************************************

Route::match(['get', 'post'], '/', function () {

    return view('login.login');

    // return redirect()->route('login.login');
});

Route::get('/home', function () {


    switch (Auth::user()->user_type) {
        case User::TYPE_ADMIN:
            return redirect()->route('admin.view');
        case User::TYPE_GESTOR:
            return redirect()->route('gestor.view');
        case User::TYPE_FORMADOR:

            if(Auth::user()->firstLogin==1){

                return redirect()->route('formadorPessoal.view');
            }
            else{
                 return redirect()->route('dashboard.view');
            }
            
           
        default:
            return redirect('/');
    }
    // return view('login.login');
    // return redirect()->route('dashboard.view');

})->name('home');




//************************************************ F O R M A D O R ***********************************************
//main view
Route::get('/formador/dashboard', [FormadorController::class, 'viewDashboard'])
    ->name('dashboard.view');

//criar perfil - 1a vez a usar plataforma
Route::get('/formador/view/info-pessoal', [FormadorController::class, 'viewFormadorPessoal'])
    ->name('formadorPessoal.view');

Route::get('/formador/view/info-profissional', [FormadorController::class, 'viewFormadorProfissional'])
    ->name('formadorProfissional.view');
Route::get('/formador/dashboard', [FormadorController::class, 'viewDashboard'])->name('dashboard.view');

//views
Route::get('/formador/turmas', [FormadorController::class, 'viewTurma'])->name('formadorTurmas.view');
Route::get('/formador/perfil', [FormadorController::class, 'viewPerfil'])->name('formadorPerfil.view');
Route::get('/formador/calendario', [FormadorController::class, 'viewCalendario'])->name('formadorCalendario.view');
Route::get('/formador/disponibilidades', [FormadorController::class, 'viewDisponibilidade'])->name('formadorDisponibilidades.view');
Route::match(['get', 'post'], 'formador/disponibilidade/add', [FormadorController::class, 'addDisponibilidade'])->name('formadorDisponibilidades.add');


//criar perfil - 1a vez a usar plataforma
Route::get('/formador/view/info-pessoal', [FormadorController::class, 'viewFormadorPessoal'])->name('formadorPessoal.view');
Route::get('/formador/view/info-profissional', [FormadorController::class, 'viewFormadorProfissional'])->name('formadorProfissional.view');
Route::post('/formador/info-pessoal', [FormadorController::class, 'createInfoPessoal'])->name('formadorPessoal.add');
Route::post('/formador/info-profissional', [FormadorController::class, 'createInfoProfissional'])->name('formadorProfissional.add');


Route::get('/formador/perfil/editar/view', [FormadorController::class, 'viewEditarPerfil'])->name('formadorEditarPerfil.view');
Route::match(['get', 'post'], '/formador/perfil/editar', [FormadorController::class, 'updateInfoPerfil'])->name('formadorEditarPerfil.update');

Route::get('/formador/perfil/profissional/editar/view', [FormadorController::class, 'viewEditarPerfilProfissional'])->name('formadorEditarPerfilProfissional.view');
Route::match(['get', 'post'], '/formador/perfil/profissional/editar', [FormadorController::class, 'updateInfoPerfilProfissional'])->name('formadorEditarPerfilProfissional.update');


Route::get('/formador/turmas', [FormadorController::class, 'viewTurma'])
    ->name('formadorTurmas.view');

Route::get('/formador/perfil', [FormadorController::class, 'viewPerfil'])
    ->name('formadorPerfil.view');

Route::get('/formador/calendario', [FormadorController::class, 'viewCalendario'])
    ->name('formadorCalendario.view');

Route::get('/formador/disponibilidades', [FormadorController::class, 'viewDisponibilidade'])
    ->name('formadorDisponibilidades.view');

//editar



//apagar

Route::get('/formador/disponibilidades/editar', [FormadorController::class, 'deleteDisponibilidade'])->name('formadorApagarDisponibilidades');


// Route::get('/cursos', [AdminController::class, 'filterCursos'])->name('curso.filter');
Route::get('/turmas', [FormadorController::class, 'filterCursosTurmas'])->name('turma.filter');




//ROTAS DE GESTOR - GESTOR  -------------------- :: GESTOR :: -------------------------------

//Route::get('NOME QUE TERA O URL', [Controlador que tem os metodos ::class, 'NomeMetodo'])->name('Nome da ROTA');

//Dashboard
Route::get('/gestor/dashboard', [GestorCursoController::class, 'viewGestor'])->name('gestor.view');

//Turmas
Route::get('/gestor/turmas', [GestorCursoController::class, 'turmasGestor'])->name('gestor.turmas');
// Turmas - View Adicionar Turma
Route::get('/gestor/addturma', [GestorCursoController::class, 'addTurma'])->name('gestor.addturmas');
// Turmas - Rota - Criar Turma [ DENTRO DA VIEW ADICIONAR TURMA ]
Route::post('/gestor/addturma/createturma', [GestorCursoController::class, 'createTurma'])->name('turma.create');


//Formadores
Route::get('/gestor/formadores', [GestorCursoController::class, 'formadorGestor'])->name('gestor.formadores');

Route::get('/gestor/formador/perfil/{id}', [GestorCursoController::class, 'viewPerfil'])->name('gestor.formadorperfil');

Route::get('/perfil-formador/{id}', 'GestorCursoController@show')->name('perfil.formador');


//Unidades
Route::get('/gestor/unidades', [GestorCursoController::class, 'unidadesGestor'])->name('gestor.unidades');

//Horarios
Route::get('/gestor/horarios', [GestorCursoController::class, 'horariosGestor'])->name('gestor.horarios');

Route::get('/gestor/horarios/turma{id}', [GestorCursoController::class, 'addHorario'])->name('gestor.horario.turma');

//Modulos
Route::get('/gestor/modulos', [GestorCursoController::class, 'modulosGestor'])->name('gestor.modulos');

Route::get('/gestor/modulos/view/{id}',[GestorCursoController::class,'viewModulo'])->name('modulo.view');

Route::get('/gestor/modulos/addModulo',[GestorCursoController::class,'addModulo'])->name('modulo.add');

Route::post('/gestor/modulos/createModulo',[GestorCursoController::class,'createModulo'])->name('modulo.create');

Route::post('/gestor/modulos/update',[GestorCursoController::class,'updateModulo'])->name('modulo.update');

Route::get('/gestor/modulos/delete/{id}',[GestorCursoController::class,'deleteModulo'])->name('modulo.delete');


//Perfil
Route::get('/gestor/perfil', [GestorCursoController::class, 'viewPerfilGestor'])->name('gestorPerfil.view');
Route::get('/gestor/perfil/editar/view', [GestorCursoController::class, 'viewEditarPerfil'])->name('gestorEditarPerfil.view');
Route::match(['get', 'post'], '/gestor/perfil/editar', [GestorCursoController::class, 'updateInfoPerfil'])->name('gestorEditarPerfil.update');






// ---------------------------- ::: ADMINISTRADOR ::: ---------------------------------------

// ---------- DASHBOARD ----------
Route::get('administrador/dashboard', [AdminController::class, 'viewAdmin'])->name('admin.view');

// ------------ CONTAS ------------
Route::get('/administrador/contas', [AdminController::class, 'contasAdmin'])->name('admin.contas');
Route::get('/administrador/contas/view{id}', [AdminController::class, 'viewConta'])->name('conta.view');
//Adicionar nova conta
Route::get('/administrador/contas/addConta', [AdminController::class, 'addConta'])->name('conta.add');
Route::post('/administrador/contas/createConta', [AdminController::class, 'createConta'])->name('conta.create');
//Atualizar conta
Route::post('/administrador/contas/update', [AdminController::class, 'updateConta'])->name('conta.update');
//Apagar conta
Route::get('/administrador/contas/delete/{id}', [AdminController::class, 'deleteConta'])->name('conta.delete');
//Filtro geral
Route::get('/contas', [AdminController::class, 'filterContas'])->name('conta.filter');

// ------------ CURSOS ------------
Route::get('/administrador/cursos', [AdminController::class, 'cursosAdmin'])->name('admin.cursos');
Route::get('/administrador/cursos/view/{id}', [AdminController::class, 'viewCurso'])->name('curso.view');
//Adicionar novo curso
Route::get('/administrador/cursos/addCurso', [AdminController::class, 'addCurso'])->name('curso.add');
Route::post('/administrador/cursos/createCurso', [AdminController::class, 'createCurso'])->name('curso.create');
//Atualizar curso
Route::post('/administrador/cursos/update', [AdminController::class, 'updateCurso'])->name('curso.update');
//Apagar curso
Route::get('/administrador/cursos/delete/{id}', [AdminController::class, 'deleteCurso'])->name('curso.delete');
//Filtros cursos
Route::get('/cursos', [AdminController::class, 'filterCursos'])->name('curso.filter');

//Unidades
Route::get('/administrador/unidades', [AdminController::class, 'unidadesAdmin'])->name('admin.unidades');
Route::get('/administrador/unidades/view/{id}', [AdminController::class, 'viewUnidade'])->name('unidade.view');
//Adicionar nova unidade
Route::get('/administrador/unidades/addCurso', [AdminController::class, 'addUnidade'])->name('unidade.add');
Route::post('/administrador/unidades/createCurso', [AdminController::class, 'createUnidade'])->name('unidade.create');
//Atualizar unidade
Route::post('/administrador/unidades/update', [AdminController::class, 'updateUnidade'])->name('unidade.update');
//Apagar unidade
Route::get('/administrador/unidades/delete/{id}', [AdminController::class, 'deleteUnidade'])->name('unidade.delete');

// ---------- Areas de formação ----------
Route::get('/administrador/area-formacao', [AdminController::class, 'areaFormacaoAdmin'])->name('admin.areaFormacao');
Route::get('/administrador/area-formacao/view/{id}', [AdminController::class, 'viewAreaFormacao'])->name('areaFormacao.view');
//Adicionar nova área de formação
Route::get('/administrador/area-formacao/addCurso', [AdminController::class, 'addAreaFormacao'])->name('areaFormacao.add');
Route::post('/administrador/area-formacao/createCurso', [AdminController::class, 'createAreaFormacao'])->name('areaFormacao.create');
//Atualizar área de formação
Route::post('/administrador/area-formacao/update', [AdminController::class, 'updateAreaFormacao'])->name('areaFormacao.update');
//Apagar área de formação
Route::get('/administrador/area-formacao/delete/{id}', [AdminController::class, 'deleteAreaFormacao'])->name('areaFormacao.delete');

//Perfil
Route::get('/administrador/perfil', [AdminController::class, 'viewPerfil'])->name('adminPerfil.view');
Route::get('/administrador/perfil/editar/view', [AdminController::class, 'viewEditarPerfil'])->name('adminEditarPerfil.view');
Route::match(['get', 'post'], '/administrador/perfil/editar', [AdminController::class, 'updateInfoPerfil'])->name('adminEditarPerfil.update');

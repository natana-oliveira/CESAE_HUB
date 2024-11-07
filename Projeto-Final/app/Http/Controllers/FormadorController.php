<?php

namespace App\Http\Controllers;

use App\Models\Formador;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('formador');
    }

    //DASHBOARD ***********************************

    public function viewDashboard()
    {
        
        $disponibilidades = DB::table('disponibilidades')
            ->join('formadores', 'disponibilidades.formadores_id', '=', 'formadores.id')
            ->join('users', 'formadores.users_id', '=', 'users.id')
            ->select('disponibilidades.*', 'formadores.*', 'users.*', 'formadores.id as idFormador')
            ->get();
        return view('main.formador', compact('disponibilidades'));
    }

    //TURMAS ***********************************

    public function viewTurma()
    {
        $turmas = DB::table('turmas')
            ->join('cursos', 'turmas.cursos_id', '=', 'cursos.id')
            ->join('gestores', 'cursos.gestores_id', '=', 'gestores.id')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->select('turmas.*', 'cursos.nome as nomeCurso', 'cursos.area as area', 'cursos.localidade as localidade', 'users.nome as nomeGestor', 'users.ultimoNome as ultimoNomeGestor')
            ->get();

        $areas = $turmas->pluck('area')->unique();
        $localidades = $turmas->pluck('localidade')->unique();
        $cursos = DB::table('cursos')->get();

        return view('formador-views.view-turmas', compact('turmas', 'areas', 'localidades', 'cursos'));
    }


    public function filterCursosTurmas(Request $request)
    {
        
        
        $turmas = DB::table('turmas')
            ->join('cursos', 'turmas.cursos_id', '=', 'cursos.id')
            ->join('gestores', 'cursos.gestores_id', '=', 'gestores.id')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->select('turmas.*', 'cursos.nome as nomeCurso', 'cursos.area as area', 'cursos.localidade as localidade', 'users.nome as nomeGestor', 'users.ultimoNome as ultimoNomeGestor')
            ->get();

        $areas = $turmas->pluck('area')->unique();
        $localidades = $turmas->pluck('localidade')->unique();


        $query = DB::table('cursos')
                ->get();

       

        // Aplicar filtro por área
        if ($request->filled('area')) {
            $query->where('area', $request->input('area'));
        }


        // Aplicar filtro por localidade
        if ($request->filled('localidade')) {
            $query->where('localidade', $request->input('localidade'));
        }

        //Aplicar filtro por nome do curso
        if ($request->filled('nome')) {
            $query->where('nome', $request->input('nome'));
        }

        // Executar a consulta e recuperar os cursos filtrados
        // $curso = $query->get();
        
//  dd($query);
        
        return view('formador-views.view-turmas', compact('turmas', 'localidades', 'areas'));
    }
    //DISPONIBILIDADES ***********************************

    public function viewDisponibilidade()
    {
        $formadores = $this->getFormador();

        $disponibilidades = DB::table('disponibilidades')
            ->join('formadores', 'disponibilidades.formadores_id', '=', 'formadores.id')
            ->join('users', 'formadores.users_id', '=', 'users.id')
            ->select('disponibilidades.*', 'formadores.*', 'users.*', 'formadores.id as idFormador')
            ->get();

        // dd($formadores);
        return view('formador-views.disponibilidade', compact('disponibilidades', 'formadores'));
    }

    public function deleteDisponibilidade($id)
    {

        db::table('disponibilidade')
            ->where('user_id', $id)
            ->delete();

        return view('formador-views.disponibilidade');
    }

    public function addDisponibilidade(Request $request)
    {
        // dd($request);

        $request->validate([
            //colocar o que e obrigatorio e quais as "restricoes"
            'data_inicio' => 'required',
            'periodo' => 'required|string',
            // 'disponibilidades' => 'required|string',
            'users_id' => 'required',

        ]);

        // $disponibilidades='';

        if ($request->periodo == 'manha' || $request->periodo == 'tarde' || $request->periodo == 'dia-todo') {

            $disponibilidades = 'sim';
        } else {

            $disponibilidades = 'nao';
        }

        $userId = DB::table('formadores')
            ->where('users_id', $request->users_id)
            ->value('formadores.id');

        DB::table('disponibilidades')->insert([
            'data_inicio' => date('Y-m-d', strtotime($request->data_inicio)),
            'periodo' => $request->periodo,
            'disponibilidades' => $disponibilidades,
            'formadores_id' => $userId,
        ]);

        return view('formador-views.disponibilidade');
    }

    //FORMADOR ***********************************

    public function getFormador()
    {
        $formador = User::where('user_type', User::TYPE_FORMADOR)
            ->join('formadores', 'users_id', '=', 'users.id')
            ->select('users.*')
            ->get();
        return $formador;
    }

    public function getAllUsers()
    {
        $allUsers = User::all();
        return $allUsers;
    }

    public function viewPerfil()
    {

        $id = auth()->id();
        // session()->get()->nome;
        $user = $this->getFormador();

        $formador = DB::table('users')
            ->where('users.id', $id)
            ->join('formadores', 'users.id', '=', 'formadores.users_id')
            ->join('modulos', 'formadores.modulos_id', '=', 'modulos.id')
            ->join('modulos_cursos', 'modulos.id', '=', 'modulos_cursos.modulos_id')
            ->join('cursos', 'modulos_cursos.cursos_id', '=', 'cursos.id')
            ->select(
                'users.*',
                'formadores.areaAtuacao as area',
                'formadores.regime as regime',
                'formadores.localizacao as localizacao',
                'modulos.nome as nomeModulos',
                'cursos.nome as nomeCurso',
                'cursos.regime as regimeCurso',
                'cursos.localidade as localidadeCurso'
            )
            ->first();

        // dd($formador);

        return view('formador-views.view-perfil', compact('formador', 'user'));
    }
    public function viewFormadorPessoal()
    {
        $id = auth()->id();

        $formador = DB::table('users')
            ->where('users.id', $id)
            ->join('formadores', 'users_id', '=', 'users.id')
            ->select('users.*')
            ->get();

        return view('formador-views.info-pessoal', compact('formador'));
    }

    public function viewFormadorProfissional()
    {
        $id = auth()->id();


        $formador = DB::table('users')
            ->where('users.id', $id)
            ->join('formadores', 'users.id', '=', 'formadores.users_id')
            ->join('modulos_formadores', 'formadores.id', '=', 'modulos_formadores.formadores_id')
            ->join('modulos', 'modulos_formadores.modulos_id', '=', 'modulos.id')
            ->select('users.*', 'formadores.*', 'modulos.*')
            ->get();

        return view('formador-views.info-profissional', compact('formador'));
    }



    public function viewEditarPerfil()
    {

        return view('formador-views.editar-perfil');
    }

    public function viewEditarPerfilProfissional()
    {
        $id = auth()->id();

        // $user = $this->getAllUsers();

        $formador = DB::table('users')
            ->where('users.id', $id)
            ->join('formadores', 'users.id', '=', 'formadores.users_id')
            // ->join('modulos','formadores.modulos_id','=','modulos.id')
            ->select('users.*', 'formadores.areaAtuacao as area', 'formadores.regime as regime', 'formadores.localizacao as localizacao')
            ->first();

       
        // Retrieve the available modules
        $modulos = DB::table('modulos')->get();


         // Recuperar todos os módulos disponíveis
         $todosModulos = DB::table('modulos')->pluck('nome', 'id');

        return view('formador-views.editar-profissional', compact('formador', 'modulos','todosModulos'));
    }

    public function addInfoPessoal()
    {

        $info = DB::table('users')->get();

        return view('formador-views.info-pessoal', compact('info')); //por nome da view correto
    }

    public function createInfoPessoal(Request $request)
    {

        //dd(request()->all());

        $request->validate([
            //colocar o que e obrigatorio e quais as "restricoes"
            'nome' => 'required|string',
            'ultimoNome' => 'required|string',
            'contacto' => 'required|string|min:9|max:15',
            'localidade' => 'required|string',

        ]);

        DB::table('users')->where('id', auth()->id())->update([
            'nome' => $request->nome,
            'ultimoNome' => $request->ultimoNome,
            'contacto' => $request->contacto,
            'localidade' => $request->localidade,

        ]);

        // Adição do modulos_id na tabela 'modulos_formadores'
        $formadorId = auth()->id();
        $modulosId = $request->modulos_id;

        DB::table('modulos_formadores')->insert([
            'formadores_id' => $formadorId,
            'modulos_id' => $modulosId,
        ]);

        return redirect()->route('formadorProfissional.view');

    }

    public function createInfoProfissional(Request $request)
    {
        $id = auth()->id();

        $request->validate([

            'areaAtuacao' => 'required',
            'regime' => 'required',
            'localizacao' => 'required',

        ]);

        DB::table('formadores')
            ->where('users_id', $id)
            ->update([

            //lado esq nome na coluna sql || lado direito variavel 

            'areaAtuacao' => $request->areaAtuacao,
            'regime' => $request->regime,
            'localizacao' => $request->localizacao,
            // 'modulos_id' => $request->modulos_id,
        ]);

        DB::table('users')
        ->where('id',$id)
        ->update([

            'firstLogin'=>0,
        ]);

        return redirect()->route('dashboard.view')->with('message', 'Perfil criado!');
        //TROCAR ESTA MENSAGEM PELO POP UP DE SUCESSO

    }

    public function updateInfoPerfil(Request $request)
    {
        // dd($request->all()); // Verificar se os dados estão sendo recebidos corretamente

        $id = auth()->id();
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string',
            'ultimoNome' => 'required|string',
            'contacto' => 'required|string|min:9|max:15',
            'localidade' => 'required|string',
            'photo' => 'file'

        ]);




        if ($request->has('photo')) {

            $photo = Storage::putFile('profilePictures/', $request->photo);
        } else {
            $photo = auth()->user()->photo;
        }

        // Atualização dos dados na tabela 'users'
        User::where('id', $id)
            ->update([
                'nome' => $request->nome,
                'ultimoNome' => $request->ultimoNome,
                'contacto' => $request->contacto,
                'localidade' => $request->localidade,
                'photo' => $photo,
            ]);



        return redirect()->route('formadorPerfil.view')->with('message', 'Perfil atualizado com sucesso!');
    }

    public function updateInfoPerfilProfissional(Request $request)
    {
        // dd($request->all()); // Verificar se os dados estão sendo recebidos corretamente

        $id = auth()->id();
        // Validação dos dados do formulário
        $request->validate([

            'areaAtuacao' => 'required',
            'regime' => 'required',
            'localizacao' => 'required',
            'modulos_id'
        ]);



        DB::table('formadores')
            ->where('users_id', $id)
            ->update([
                'areaAtuacao' => $request->areaAtuacao,
                'regime' => $request->regime,
                'localizacao' => $request->localizacao,


            ]);

        return redirect()->route('formadorPerfil.view')->with('message', 'Perfil atualizado com sucesso!');
    }

  



}



<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;



class GestorCursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('gestor');
    }
    // Dashboard *** -------------------- ***
    public function viewGestor()
    {

        return view('main.gestor');
    }

    // Formadores *** -------------------- ***

    public function formadoresGestor(Request $request)
    {

        $formadores = DB::table('users')
            ->where('user_type', 3)
            ->select('nome', 'email', 'photo')
            ->get();


        if ($request->has('photo')) {

            $photo = Storage::putFile('profilePictures/', $request->photo);
        } else {
            $photo = auth()->user()->photo;
        }

        return view('gestor-views.formadores', compact('formadores'));
    }

    // VAI BUSCAR INFO DOS FORMADORES 


    public function getFormador()
    {
        $formador = User::where('user_type', User::TYPE_FORMADOR)
            ->join('formadores', 'users_id', '=', 'users.id')
            ->select('users.*', 'formadores.*')
            ->get();
        return $formador;
    }

    public function formadorGestor()
    {

       // dd("test");


       $formadores = $this->getFormador();

        //dd($formadores);

        return view('gestor-views.formadores', compact('formadores'));
    }

    public function viewPerfil($id)
    {
        $formador = DB::table('users')
            ->where('users_id', $id)
            ->join('formadores', 'users.id', '=', 'users_id')
            ->join('modulos', 'formadores.modulos_id', '=', 'modulos.id')
            ->select('users.*','formadores.*','formadores.areaAtuacao as area',
            'formadores.regime as regime',
            'formadores.localizacao as localizacao','modulos.*',
            'modulos.nome as nomeModulos','users.nome as nomeFormador','users.ultimoNome as ultimoNomeFormador','users.photo as photoFormador')
            ->first();


            
            $disponibilidades = DB::table('disponibilidades')
            ->join('formadores', 'disponibilidades.formadores_id', '=', 'formadores.id')
            ->join('users', 'formadores.users_id', '=', 'users.id')
            ->select('disponibilidades.*', 'formadores.*', 'users.*', 'formadores.id as idFormador')
            ->get();
    
        return view('gestor-views.perfil_formador', compact('formador', 'disponibilidades'));
    }
    
    public function show($id)
    {
        $formador = User::findOrFail($id);

        return view('formador.perfil', compact('formador'));
    }





    // Turmas *** -------------------- ***

    public function turmasGestor()
    {

        // $turmas = DB::table('turmas')
        //     ->where('id', $id)
        //     ->first();

        $turmas = DB::table('turmas')
            ->join('cursos', 'turmas.cursos_id', '=', 'cursos.id')
            ->join('gestores', 'cursos.gestores_id', '=', 'gestores.id')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->select('turmas.*', 'cursos.nome as nomeCurso', 'cursos.area as area', 'cursos.localidade as localidade', 'users.nome as nomeGestor', 'users.ultimoNome as ultimoNomeGestor')
            ->get();




        return view('gestor-views.turmas', compact('turmas'));
    }

    public function addTurma()
    {

        $cursos = db::table('cursos')
            ->join('turmas', 'cursos.id', '=', 'turmas.cursos_id')
            ->select('turmas.*', 'cursos.*')
            ->get();



        return view('gestor-views.add_turmas', compact('cursos'));
    }

    public function createTurma(Request $request)
    {
        //dd($request->all());   

        $request->validate([
            'codigo' => 'required|string',
            'nr_alunos' => 'required|integer',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'cursos_id' => 'required|exists:cursos,id',  // problema aqui
        ]);



        // dd($request->all());



        DB::table('turmas')->insert([
            'cursos_id' => $request->cursos_id,
            'codigo' => $request->codigo,
            'nr_alunos' => $request->nr_alunos,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ]);
        // $this->criarTurma($request->codigo, $request->nr_alunos, $request->data_inicio, $request->data_fim);


        return redirect()->route('gestor.turmas')->with('message', ' Turma criada com sucesso ');
    }




    // Unidades *** -------------------- ***
    public function unidadesGestor()
    {

        return view('gestor-views.unidades');
    }


    // Horario *** -------------------- ***

    public function horariosGestor()
    {

        $turmas = DB::table('turmas')
            ->join('cursos', 'turmas.cursos_id', '=', 'cursos.id')
            ->join('gestores', 'cursos.gestores_id', '=', 'gestores.id')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->select('turmas.*', 'cursos.nome as nomeCurso', 'cursos.area as area', 'cursos.localidade as localidade', 'users.nome as nomeGestor', 'users.ultimoNome as ultimoNomeGestor')
            ->get();

        return view('gestor-views.horarios', compact('turmas'));
    }

    public function addHorario($id)
    {

        $turma = DB::table('turmas')
            ->where('turmas.id', $id)
            ->join('cursos', 'turmas.cursos_id', '=', 'cursos.id')
            ->select('turmas.*', 'cursos.nome as nomeCurso', 'cursos.area as area', 'cursos.localidade as localidade')
            ->first();

        $modulos = DB::table('modulos')->get();

        $disponibilidades = DB::table('disponibilidades')
            ->join('formadores', 'disponibilidades.formadores_id', '=', 'formadores.id')
            ->join('users', 'formadores.users_id', '=', 'users.id')
            ->select('disponibilidades.*', 'formadores.*', 'users.*', 'formadores.id as idFormador')
            ->get();

        return view('gestor-views.horario-turma', compact('turma', 'disponibilidades', 'modulos'));
    }

    public function getModulos()
    {

        $modulos = DB::table('modulos')
            ->get();

        return $modulos;
    }

    public function modulosGestor()
    {

        $modulos = $this->getModulos();

        return view('gestor-views.modulos', compact('modulos'));
    }

    public function viewModulo($id)
    {

        $modulos = DB::table('modulos')
            ->where('id', $id)
            ->first();


        return view('gestor-views.view_modulo', compact('modulos'));

    }

    public function addModulo()
    {

        $modulos = DB::table('modulos')
            ->get();

        return view('gestor-views.add_modulos', compact('modulos'));
    }

    public function createModulo(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:50',
            'nr_horas' => 'required|integer',
        ]);

        DB::table('modulos')
            ->insert([
                'nome' => $request->nome,
                'nr_horas' => $request->nr_horas,
            ]);

        return redirect()->route('gestor.modulos');
    }

    public function deleteModulo($id)
    {

        // Excluir os registros relacionados na tabela intermediária modulos_cursos
        DB::table('modulos_cursos')
            ->where('modulos_id', $id)
            ->delete();

        // Atualizar os registros na tabela formadores onde modulos_id é igual a $id para null
        DB::table('formadores')
            ->where('modulos_id', $id)
            ->update(['modulos_id' => null]);
            
        // Excluir os registros na tabela modulos_formadores onde modulos_id é igual a $id
        DB::table('modulos_formadores')
            ->where('modulos_id', $id)
            ->delete();

        // Excluir o registro do módulo na tabela modulos
        DB::table('modulos')
            ->where('id', $id)
            ->delete();


        return back();
    }

    public function updateModulo(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:50',
            'nr_horas' => 'required|integer',
        ]);

        DB::table('modulos')
            ->where('id', $request->id)
            ->update([

                'nome' => $request->nome,
                'nr_horas' => $request->nr_horas,
            ]);

        return redirect()->route('gestor.modulos');
    }





    //$variavel = DB::tabel('nomeTabela')->get();


    public function mostrarFormadores()
    {
        $formadores = Formador::all();


        //return view('pasta.nomeBlade', compact('nomeVariavel'));

        return view('gestor-views.', 'compact'('formadores'));
    }

    //------------------- PERFIL -------------------

    public function viewPerfilGestor()
    {
        $id = auth()->id();
        $gestor = User::where('user_type', User::TYPE_GESTOR)
            ->first();

        return view('gestor-views.view-perfil', compact('gestor'));
    }

    public function viewEditarPerfil()
    {
        return view('gestor-views.editar-perfil');
    }

    public function updateInfoPerfil(Request $request)
    {
        $id = auth()->id();
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

        User::where('id', $id)
            ->update([
                'nome' => $request->nome,
                'ultimoNome' => $request->ultimoNome,
                'contacto' => $request->contacto,
                'localidade' => $request->localidade,
                'photo' => $photo,
            ]);

        return redirect()->route('gestorPerfil.view')->with('message', 'Perfil atualizado com sucesso!');
    }
}

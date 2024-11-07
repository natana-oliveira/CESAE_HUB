<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function viewAdmin()
    {
        $admin = $this->getAdmin();
        return view('main.admin', compact('admin'));
    }

    public function getAdmin()
    {
        $admin = User::where('user_type', User::TYPE_ADMIN)->get();
        return $admin;
    }

    public function getGestores()
    {
        $gestores = User::where('user_type', User::TYPE_GESTOR)->get();
        return $gestores;
    }

    public function getAllUsers()
    {
        $allUsers = User::all();
        return $allUsers;
    }

    //------------------- CONTAS -------------------

    public function contasAdmin()
    {
        $conta = $this->getAllUsers();
        return view('admin-views.contas', compact('conta'));
    }

    public function viewConta($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('admin-views.view_conta', compact('user'));
    }

    public function addConta()
    {
        $userConta = DB::table('users')->get();
        return view('admin-views.add_conta', compact('userConta'));
    }

    public function createConta(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'ultimoNome' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'user_type' => 'required|integer|max:5',
            'contacto' => 'required|string|min:9|max:15',
        ]);
        $users_id = User::insertGetId([
            'nome' => $request->nome,
            'ultimoNome' => $request->ultimoNome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'localidade' => $request->localidade,
            'contacto' => $request->contacto,
        ]);

        if ($request->user_type == User::TYPE_GESTOR) {
            DB::table('gestores')->insert([
                'users_id' => $users_id,
            ]);
        }

        sleep(1); //atrasa o fechamento do modal
        return redirect()->route('admin.contas');

    }

    public function deleteConta($id)
    {
        DB::table('cursos')
            ->where('gestores_id', ($id))
            ->delete();

        DB::table('gestores')
            ->where('users_id', ($id))
            ->delete();

        DB::table('users')
            ->where('id', ($id))
            ->delete();
        return back();
    }

    public function updateConta(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nome' => 'required|string|max:50',
            'ultimoNome' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'user_type' => 'required|integer|max:5',
            'contacto' => 'required|string|min:9|max:15',
        ]);
        User::where('id', $request->id)
            ->update([
                'nome' => $request->nome,
                'ultimoNome' => $request->ultimoNome,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type,
                'localidade' => $request->localidade,
                'contacto' => $request->contacto,
            ]);

        // Verifica se o tipo de usuário é gestor e atualiza ou insere na tabela de gestores    
        if ($request->user_type == User::TYPE_GESTOR) {
            DB::table('gestores')->updateOrInsert(
                ['users_id' => $request->id], // Procura por este ID na tabela de gestores
                ['users_id' => $request->id] // Define o ID do usuário
            );
        } else {
            // Se o usuário não for um gestor, remove o registro correspondente na tabela de gestores, se existir
            DB::table('gestores')->where('users_id', $request->id)->delete();
        }
        sleep(1); //atrasa o fechamento do modal
        return redirect()->route('admin.contas');
    }

    public function filterContas(Request $request)
    {
        $query = User::query();

        // Aplicar filtro por tipo de conta
        if ($request->filled('user_type')) {
            $query->where('user_type', $request->input('user_type'));
        }

        // Executar a consulta e recuperar os cursos filtrados
        $conta = $query->get();

        // Retornar a view com os cursos filtrados
        return view('admin-views.contas', compact('conta'));
    }



    //------------------- CURSOS -------------------

    public function cursosAdmin()
    {
        $curso = $this->getCursos();
        return view('admin-views.cursos', compact('curso'));
    }

    public function addCurso()
    {
        $cursosGestores = DB::table('gestores')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->leftJoin('cursos', 'cursos.gestores_id', '=', 'gestores.id')
            ->select('gestores.id as gestores_id', 'users.nome as nome_gestor', 'users.ultimoNome as ultimoNome_gestor')
            ->distinct()
            ->get();
        return view('admin-views.add_curso', compact('cursosGestores'));
    }

    public function createCurso(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'localidade' => 'string|required',
            'duracao_horas' => 'required|integer',
            'regime' => 'string|required',
            'area' => 'string|required',
            'tipoFormacao' => 'string|required',
            'gestores_id' => 'required|exists:gestores,id'
        ]);

        // Verificar se já existe um curso com o mesmo nome e gestor
        $cursoExistente = Curso::where('nome', $request->nome)
            ->where('localidade', $request->localidade)
            ->exists();

        if ($cursoExistente) {
            return redirect()->back()->withErrors(['message' => 'Este curso já existe.'])->withInput();
        }

        Curso::insert([
            'nome' => $request->nome,
            'localidade' => $request->localidade,
            'duracao_horas' => $request->duracao_horas,
            'regime' => $request->regime,
            'area' => $request->area,
            'tipoFormacao' => $request->tipoFormacao,
            'gestores_id' => $request->gestores_id
        ]);

        sleep(1); //atrasa o fechamento do modal
        return redirect()->route('admin.cursos')->with('success', 'Curso criado com sucesso');
    }

    public function deleteCurso($id)
    {
        DB::table('cursos')
            ->where('id', ($id))
            ->delete();
        return back();
    }

    public function viewCurso($id)
    {
        $curso = DB::table('cursos')
            ->where('id', $id)
            ->first();

        $cursosGestores = DB::table('gestores')
            ->join('users', 'gestores.users_id', '=', 'users.id')
            ->leftJoin('cursos', 'cursos.gestores_id', '=', 'gestores.id')
            ->select('gestores.id as gestores_id', 'users.nome as nome_gestor', 'users.ultimoNome as ultimoNome_gestor')
            ->distinct()
            ->get();

        return view('admin-views.view_curso', compact('curso', 'cursosGestores'));
    }

    public function updateCurso(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'localidade' => 'string|required',
            'duracao_horas' => 'required|integer',
            'regime' => 'string|required',
            'area' => 'string|required',
            'tipoFormacao' => 'string|required',
            'gestores_id' => 'required|exists:gestores,id'
        ]);
        Curso::where('id', $request->id)
            ->update([
                'nome' => $request->nome,
                'localidade' => $request->localidade,
                'duracao_horas' => $request->duracao_horas,
                'regime' => $request->regime,
                'area' => $request->area,
                'tipoFormacao' => $request->tipoFormacao,
                'gestores_id' => $request->gestores_id
            ]);
        sleep(1); //atrasa o fechamento do modal
        return redirect()->route('admin.cursos');
    }

    private function getCursos()
    {
        $curso = DB::table('cursos')
            ->get();
        return $curso;
    }

    public function filterCursos(Request $request)
    {
        $query = Curso::query();

        // Aplicar filtro por área
        if ($request->filled('area')) {
            $query->where('area', $request->input('area'));
        }

        // Aplicar filtro por tipo de formação
        if ($request->filled('tipoFormacao')) {
            $query->where('tipoFormacao', $request->input('tipoFormacao'));
        }

        // Aplicar filtro por regime
        if ($request->filled('regime')) {
            $query->where('regime', $request->input('regime'));
        }

        // Aplicar filtro por localidade
        if ($request->filled('localidade')) {
            $query->where('localidade', $request->input('localidade'));
        }

        // Executar a consulta e recuperar os cursos filtrados
        $curso = $query->get();

        // Retornar a view com os cursos filtrados
        return view('admin-views.cursos', compact('curso'));
    }


    //------------------- UNIDADES -------------------

    public function unidadesAdmin()
    {
        $admin = $this->getAdmin();

        return view('admin-views.unidades', compact('admin'));
    }

    //------------------- ÁREAS FORMAÇÃO -------------------

    public function areaFormacaoAdmin()
    {
        $admin = $this->getAdmin();

        return view('admin-views.area-formacao', compact('admin'));
    }


    //------------------- PERFIL -------------------

    public function viewPerfil()
    {
        $id = auth()->id();
        $admin = User::where('user_type', User::TYPE_ADMIN)
            ->first();

        return view('admin-views.view-perfil', compact('admin'));
    }

    public function viewEditarPerfil()
    {
        return view('admin-views.editar-perfil');
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

        return redirect()->route('adminPerfil.view')->with('message', 'Perfil atualizado com sucesso!');
    }
}

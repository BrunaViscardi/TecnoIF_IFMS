<?php

namespace App\Http\Controllers;

use App\Http\Requests\MudarSituacaoRequest;
use App\Models\Edital;
use App\Models\Gestor;
use App\Models\Projeto;
use App\Models\Situacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $request = null;
    private $repositoryGestores;
    private $repositoryUsers;
    private $repositoryEditais;
    private $repositoryProjetos;
    private $repositorySituacao;
    public function __construct(Request $request, Gestor $gestor, User $user, Edital $edital, Projeto  $projeto, Situacao $situacao)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
        $this->repositoryEditais = $edital;
        $this->repositoryProjetos = $projeto;
        $this->repositorySituacao = $situacao;
    }
    public function index()
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $editais =  $this->repositoryEditais->orderBy('data')->paginate(4);
            $role = $user->role;
            return view('editais/index', compact('role','user',  'editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function create()
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            return view('editais.create', compact('user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function Store(Request $request)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais = Edital::all();
            $e = new Edital();
            $e->nome = $request->nome;
            $e->data = $request->data;
            $e->situacao ="Abertura";
            $e->link = $request->link;
            $e->save();
            return redirect()->route('editais.index', compact('user',  'editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateSituacaoView($id)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $edital = $this->repositoryEditais->where('id', $id)->first();
            if (!$edital)
                return $edital()->back();
            return view('editais.updateSituacaoView', compact( 'edital', 'user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function filtro(Request $request)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $filtro = $request->filtro ?? '%';
            $data = $request->data ?? '%';

            $editais = Edital::buscar(['filtro'=>$filtro,'data'=>$data])->paginate(4);
            return view('editais.index', compact('user', 'editais','data', 'filtro'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateSituacao ($id, MudarSituacaoRequest $request)
    {

        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $edital = $this->repositoryEditais->where('id', $id)->first();
            if (!$edital)
            {return $edital()->back();
            } else{
                $edital->update(['situacao' => $request->situacao]);
                return redirect()->route('editais.index');
            }
        } else{ Auth::logout();
            return redirect()->route('painel.login');}
    }

    public function Edit($id)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $edital = $this->repositoryEditais->where('id', $id)->first();
            return view('editais.updateView', compact('user', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function update(Request $request, $id)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $edital = $this->repositoryEditais->find($request->id);
            if (!$edital)
                return redirect()->back();
            $edital->update($request->all());
            return redirect()->route('editais.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
}

<?php

namespace App\Http\Controllers;
use App\Http\Requests\AlterarPerfilRequest;
use App\Models\Edital;
use App\Models\Gestor;
use App\Models\Mentorado;
use App\Models\Mentorado_projeto;
use App\Models\Projeto;
use App\Models\Situacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    private $repositoryEditais;
    private $repositoryProjetos;
    private $repositorySituacao;
    private $repositoryGestores;
    private $repositoryUsers;
    private $repositoryMentorado;
    private $repositoryRelacionamento;
    public function __construct(Request $request,  Mentorado $mentorado, Gestor $gestor, User $user, Edital $edital, Projeto  $projeto, Situacao $situacao, Mentorado_projeto $relacionamento)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
        $this->repositoryEditais = $edital;
        $this->repositoryProjetos = $projeto;
        $this->repositoryMentorado = $mentorado;
        $this->repositorySituacao = $situacao;
        $this->repositoryRelacionamento = $relacionamento;
    }
    public function editSenha (){
        $user = Auth()->User();
        return view('profile.editSenha', compact('user'));
    }
    public function editPerfil()
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }

        if (Auth::check() === true) {
            $user = Auth()->User();
            $mentorado =$this->repositoryMentorado->where('email', $user->email)->first();
            return view('profile.editPerfil', compact('user',  'mentorado'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updatePerfil(AlterarPerfilRequest $request)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            if (!$candidatos)
                return redirect()->back();
            $candidatos->update($request->all());
            $user->update(['name'=> $request->nome]);
            return redirect()->route('painel.home');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }


}

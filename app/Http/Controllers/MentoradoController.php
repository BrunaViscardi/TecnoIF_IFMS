<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Models\Mentorado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentoradoController extends Controller
{
    public $request;

    public function __construct(Request $request, Mentorado $mentorados)
    {
        $this->request = $request;
        $this->repositoryMentorados = $mentorados;
    }
    public function create()
    {
        return view( 'auth.create');
    }
    public function store(StoreUserRequest $request)
    {
        $mentorado = new  Mentorado();
        $mentorado->nome = $request-> nome;
        $mentorado-> data_nascimento =  $request-> nascimento;
        $mentorado-> email =  $request-> email;
        $mentorado->campus = $request-> campus;
        $mentorado->curso = $request-> curso;
        $mentorado->periodo = $request-> periodo;
        $mentorado->turno = $request-> turno;
        $mentorado->telefone = $request-> telefone;
        $mentorado->cpf = $request-> cpf;
        if($request->file('anexo')->isvalid()== true){
            $mentorado->anexo = $request->file('anexo')->store('projetos');
        }
        $mentorado->rg = $request-> rg;
      //  $mentorado->anexo = $request-> anexo;

        $mentorado->banco = $request-> banco;
        $mentorado->agencia = $request-> agencia;
        $mentorado->conta = $request-> conta;
        $mentorado->endereco = $request-> endereco;
        $mentorado->bairro = $request-> bairro;
        $mentorado->numero = $request-> numero;
        $mentorado->complemento = $request-> complemento;
        $mentorado->save();


        $users = new User();
        $users->name = $request-> nome;
        $users->role = 0;
        $users->email =  $request-> email;
        $users-> password = $request-> cpf;
        $users->name = $request-> nome;
        $users->mentorado_id= $mentorado->id;
        User::create([
            'role' => $users['role'],
            'name' => $users['name'],
            'email' => $users['email'],
            'mentorado_id' => $users['mentorado_id'],
            'password' => Hash::make($users['password']),
        ]);
        return redirect()->route('painel.home');

    }
    public function download($id){
        $mentorado = $this->repositoryMentorados->where('id', $id)->first();
        return Storage::download($mentorado->anexo);
    }



}

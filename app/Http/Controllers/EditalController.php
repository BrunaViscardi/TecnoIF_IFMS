<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function show(Edital $edital)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function edit(Edital $edital)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edital $edital)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edital $edital)
    {
        //
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


}

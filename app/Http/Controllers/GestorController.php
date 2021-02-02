<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $request = null;
    private $repositoryGestores;
    private $repositoryUsers;

    public function __construct(Request $request, Gestor $gestor, User $user, Edital $edital)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
    }
    public function index()
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
            if (Auth::check() === true && Auth()->User()->isAdministrador()) {
                abort(403);
            }
            if (Auth::check() === true) {
                $user = Auth()->User();
                $gestores =  $this->repositoryGestores->orderBy('nome')->paginate(4);
                return view('gestores.index', compact('user',  'gestores'));
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
                $gestor = Gestor::all();
                return view('gestores.createView', compact('user',  'gestor'));
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
                $gestores = Gestor::all();
    
                $g = new Gestor();
                $g->nome = $request->nome  ;
                $g->senha = $request->senha;
                $g->email = $request->email;
                $g->campus = $request->campus;
                $g->save();
    
    
                $users = new User();
                $users->name = $request->nome;
                $users->role = 1;
                $users->email = $request->email;
                $users->password = $request->senha;
                $users->name = $request->nome;
    
                User::create([
                    'role' => $users['role'],
                    'name' => $users['name'],
                    'email' => $users['email'],
                    'password' => Hash::make($users['password']),
                ]);
                return redirect()->route('gestores.index', compact('user', 'gestores'));
    
            }
            Auth::logout();
            return redirect()->route('painel.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gestor  $gestor
     * @return \Illuminate\Http\Response
     */
    public function show(Gestor $gestor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gestor  $gestor
     * @return \Illuminate\Http\Response
     */
    public function edit(Gestor $gestor)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            return view('gestores.updateView', compact('user','gestor'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestor  $gestor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gestor $gestor)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            $gestor->update($request->all());
            return redirect()->route('gestores.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestor  $gestor
     * @return \Illuminate\Http\Response
     */
   

    public function destroy($email)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->where('email', $email);
            $user = $this->repositoryUsers->where('email', $email);
            if (!$gestor and !$user)
                return redirect()->back();
            $gestor->delete();
            $user->delete();


            return redirect()->route('gestores.index', compact('user'));
        }
        Auth::logout();

        return redirect()->route('painel.login');
}
    public function filtro(Request $request)
    {  if (Auth::check() === true && Auth()->User()->isCandidato()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $filtro = $request->filtro;
            $gestores = Gestor::where('nome', 'LIKE', '%' . $filtro . '%')
                ->orWhere('gestores.email', 'LIKE', '%' . $filtro . '%')
                ->paginate(4);

            return view('gestores.index', compact('user',  'gestores', 'filtro'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    } 


}

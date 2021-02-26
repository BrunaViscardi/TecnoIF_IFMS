
@extends('layout.index')
@section('content')
    <link rel="stylesheet" href="{{asset('pages/css/cadastro.css')}}">
    <link rel="stylesheet" href="{{asset('pages/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Editar Participante</h3>
            </div>
            <form action="{{route('projeto.updateParticipante', ['id'=>$participante->id, 'id_projeto'=> $projeto->id])}}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$participante->nome}}"  placeholder="Nome">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data de nascimento</label>
                            <input name="nascimento" value="{{$participante->data_nascimento}}" type="date" class="form-control @error('nascimento') is-invalid @enderror">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Celular</label>
                            <input name="telefone" value="{{$participante->telefone}}" type="text" class="form-control @error('telefone') is-invalid @enderror">
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>CPF</label>
                            <input name="cpf" value="{{$participante->cpf}}" type="text" placeholder="xxx.xxx.xxx-xx" class="form-control @error('cpf') is-invalid @enderror">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>RG</label>
                            <input name="rg" type="text" value="{{$participante->rg}}" class="form-control @error('rg') is-invalid @enderror">
                            @error('rg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col">
                        <label>Email</label>
                        <input name="email" value="{{$participante->email}}" type="text" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Campus</label>
                        <select name="campus" class="form-control @error('campus') is-invalid @enderror">
                            <option value="">Campus</option>
                            <option value="Aquidauana" {{ $participante->campus == "Aquidauana" ? 'selected' : '' }}>Aquidauana</option>
                            <option value="Campo Grande" {{ $participante->campus == "Campo Grande" ? 'selected' : '' }}>Campo Grande</option>
                            <option value="Corumbá" {{ $participante->campus == "Corumbá" ? 'selected' : '' }}>Corumbá</option>
                            <option value="Coxim" {{ $participante->campus == "Coxim" ? 'selected' : '' }}>Coxim</option>
                            <option value="Dourados"{{ $participante->campus == "Dourados" ? 'selected' : '' }}>Dourados</option>
                            <option value="Jardim"{{ $participante->campus == "Jardim" ? 'selected' : '' }}>Jardim</option>
                            <option value="Naviraí"{{ $participante->campus == "Naviraí" ? 'selected' : '' }}>Naviraí</option>
                            <option value="Nova Andradina"{{ $participante->campus == "Nova Andradina" ? 'selected' : '' }}>Nova Andradina</option>
                            <option value="Ponta Porã"{{ $participante->campus == "Ponta Porã" ? 'selected' : '' }}>Ponta Porã</option>
                            <option value="Três Lagoas"{{ $participante->campus == "Três Lagoas" ? 'selected' : '' }}>Três Lagoas</option>
                        </select>
                        @error('campus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Curso</label>
                            <input name="curso" value="{{$participante->curso}}" type="text" class="form-control @error('curso') is-invalid @enderror">
                            @error('curso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Turno</label>
                            <input name="turno" value="{{$participante->turno}}" type="text" class="form-control @error('turno') is-invalid @enderror">
                            @error('turno')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Período</label>
                            <input name="periodo" value="{{$participante->periodo}}" type="text" class="form-control @error('periodo') is-invalid @enderror">
                            @error('periodo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    @if($projeto->bolsista_id == $participante->id )


                        <div class="row">
                            <div class="form-group col">
                                <label>Conta</label>
                                <input name="conta" value="{{$participante->conta}}" type="text" class="form-control @error('conta') is-invalid @enderror">
                                @error('conta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label>Agência</label>
                                <input name="agencia" value="{{$participante->agencia}}" type="text" class="form-control @error('agencia') is-invalid @enderror">
                                @error('agencia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label>Banco</label>
                                <input name="banco" value="{{$participante->banco}}" type="text" class="form-control @error('banco') is-invalid @enderror">
                                @error('banco')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif

                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="endereco" value="{{$participante->endereco}}" class="form-control @error('endereco') is-invalid @enderror" placeholder="Endereço">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Bairro</label>
                                <input value="{{$participante->numero}}" name="bairro" type="text" class="form-control">


                            </div>
                            <div class="form-group col">
                                <label>Número</label>
                                <input name="numero" value="{{$participante->numero}}"type="number" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <input id="input" name="complemento" value="{{$participante->complemento}}" type="text" class="form-control">


                        </div>
                        </div>


                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
                </div>
            </form>
        </div>
    </section>
@endsection



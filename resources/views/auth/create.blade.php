<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/cadastro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/style.css')}}">
    <title>Cadastro de candidatos</title>
</head>
<body>
@extends('layout.guest')

@section('content')

    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="col-sm">
                <br>
                <div class="form-group">
                    <label>Nome*
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                               placeholder="Nome" name="nome"  value="{{ old('nome') }}">

                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label> Data de Nascimento*
                            <input name="nascimento" type="date"
                                   class="form-control @error('nascimento') is-invalid @enderror" value="{{ old('nascimento') }}">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Celular*
                            <input name="telefone" type="text"
                                   class="form-control @error('telefone') is-invalid @enderror" placeholder="(xx)xxxxx-xxxx" value="{{ old('telefone') }}">
                            @error('telefone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>CPF*
                            <input type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <small>Seu CPF será sua senha</small>
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>RG*
                            <input name="rg" type="text" class="form-control @error('rg') is-invalid @enderror" value="{{ old('rg') }}">
                            @error('rg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Email*
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Campus*
                            <select name="campus" class="form-control @error('campus') is-invalid @enderror" >
                                <option value="">Campus</option>
                                <option value="Aquidauana"{{ old('campus') == "Aquidauana" ? 'selected' : '' }}>Aquidauana</option>
                                <option value="Campo Grande" {{ old('campus') == "Campo Grande" ? 'selected' : '' }}>Campo Grande</option>
                                <option value="Corumbá" {{ old('campus') == "Corumbá" ? 'selected' : '' }}>Corumbá</option>
                                <option value="Coxim" {{ old('campus') == "Coxim" ? 'selected' : '' }}>Coxim</option>
                                <option value="Dourados" {{ old('campus') == "Dourados" ? 'selected' : '' }}>Dourados</option>
                                <option value="Jardim" {{ old('campus') == "Jardim" ? 'selected' : '' }}>Jardim</option>
                                <option value="Naviraí" {{ old('campus') == "Naviraí" ? 'selected' : '' }}>Naviraí</option>
                                <option value="Nova Andradina" {{ old('campus') == "Nova Andradina" ? 'selected' : '' }}>Nova Andradina</option>
                                <option value="Ponta Porã" {{ old('campus') == "Ponta Porã" ? 'selected' : '' }}>Ponta Porã</option>
                                <option value="Três Lagoas"  {{ old('campus') == "Três Lagoas" ? 'selected' : '' }}>Três Lagoas</option>
                            </select>
                            @error('campus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Curso
                            <input name="curso" type="text" class="form-control" value="{{ old('curso') }}">
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Turno
                            <select name="turno" class="form-control">
                                <option value="">Turno</option>
                                <option value="Integral" {{ old('turno') == "Integral" ? 'selected' : '' }}>Integral</option>
                                <option value="Matutino" {{ old('turno') == "Matutino" ? 'selected' : '' }}>Matutino</option>
                                <option value="Vespertino" {{ old('turno') == "Vespertino" ? 'selected' : '' }}>Vespertino</option>
                                <option value="Noturno"  {{ old('turno') == "Noturno" ? 'selected' : '' }}>Noturno</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Período
                            <input name="periodo" type="number" class="form-control" min="1" max="10"  value="{{ old('periodo') }}">
                        </label>
                    </div>
                </div>
                <div class="form-group ">
                    <label id="anexo" class="btn btn-light " for="fupload" style="text-align: center">Anexe um documento
                        que comprove seus dados bancarios:*
                        <input id="fupload" name="anexo" type="file"  value="{{ old('anexo') }}"
                               class="form-control-file @error('anexo') is-invalid @enderror" accept=".png, .jpg, .jpeg, .pdf">
                        @error('anexo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror</label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Conta*
                            <input name="conta" type="text" value="{{ old('conta') }}" class="form-control @error('conta') is-invalid @enderror">
                            @error('conta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Agência*
                            <input name="agencia" type="text" value="{{ old('agencia') }}"
                                   class="form-control @error('agencia') is-invalid @enderror">
                            @error('agencia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Banco*
                            <input name="banco"  value="{{ old('banco') }}" type="text" class="form-control @error('banco') is-invalid @enderror">
                            @error('banco')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Endereço*
                        <input name="endereco"  value="{{ old('endereco') }}" type="text" class="form-control @error('endereco') is-invalid @enderror">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                </div>
                <div class="formR">
                    <div class="form-group col">
                        <label>Bairro
                            <input value="{{ old('bairro') }}" name="bairro" type="text" class="form-control">

                        </label>
                    </div>
                    <div class="form-group col">
                        <label>Número
                            <input name="numero" value="{{ old('numero') }}" type="number" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Complemento
                        <input id="input" name="complemento" value="{{ old('complemento') }}" type="text" class="form-control">

                    </label>
                </div>
                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>

            </div>
        </div>
    </form>
@endsection


@extends('layout.index')
@section('content')
    <section class="content">

        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Alterar dados do perfil</h3>
            </div>
            <form action="{{route('profile.updatePerfil')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{$mentorado->nome}}"  placeholder="Nome">
                        @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data de nascimento</label>
                            <input name="nascimento" value="{{$mentorado->data_nascimento}}" type="date" class="form-control @error('nascimento') is-invalid @enderror">
                            @error('nascimento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Celular</label>
                            <input name="telefone" value="{{$mentorado->telefone}}" type="text" class="form-control @error('telefone') is-invalid @enderror">
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
                            <input name="cpf" value="{{$mentorado->cpf}}" type="text" placeholder="xxx.xxx.xxx-xx" class="form-control @error('cpf') is-invalid @enderror">
                            @error('cpf')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>RG</label>
                            <input name="rg" type="text" value="{{$mentorado->rg}}" class="form-control @error('rg') is-invalid @enderror">
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
                        <input name="email" value="{{$mentorado->email}}" type="text" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Campus</label>
                        <select name="campus" class="form-control @error('campus') is-invalid @enderror">
                            <option value="" >Campus</option>
                            <option value="Aquidauana" {{ $mentorado->campus == "Aquidauana" ? 'selected' : '' }}>Aquidauana</option>
                            <option value="Campo Grande" {{ $mentorado->campus == "Campo Grande" ? 'selected' : '' }}>Campo Grande</option>
                            <option value="Corumbá" {{ $mentorado->campus == "Corumbá" ? 'selected' : '' }}>Corumbá</option>
                            <option value="Coxim" {{ $mentorado->campus == "Coxim" ? 'selected' : '' }}>Coxim</option>
                            <option value="Dourados" {{ $mentorado->campus == "Dourados" ? 'selected' : '' }}>Dourados</option>
                            <option value="Jardim" {{ $mentorado->campus == "Jardim" ? 'selected' : '' }}>Jardim</option>
                            <option value="Naviraí" {{ $mentorado->campus == "Naviraí" ? 'selected' : '' }}>Naviraí</option>
                            <option value="Nova Andradina" {{ $mentorado->campus == "Nova Andradina" ? 'selected' : '' }}>Nova Andradina</option>
                            <option value="Ponta Porã" {{ $mentorado->campus == "Ponta Porã" ? 'selected' : '' }}>Ponta Porã</option>
                            <option value="Três Lagoas" {{ $mentorado->campus == "Três Lagoas" ? 'selected' : '' }}>Três Lagoas</option>
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
                            <input name="curso" value="{{$mentorado->curso}}" type="text" class="form-control @error('curso') is-invalid @enderror">
                            @error('curso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Turno</label>
                            <input name="turno" value="{{$mentorado->turno}}" type="text" class="form-control @error('turno') is-invalid @enderror">
                            @error('turno')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Período</label>
                            <input name="periodo" value="{{$mentorado->periodo}}" type="text" class="form-control @error('periodo') is-invalid @enderror">
                            @error('periodo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group ">
                        <label id="anexo" class="btn btn-light " for="fupload" style="text-align: center">Anexe um documento
                            que comprove seus dados bancarios:
                            <input id="fupload" name="anexo" type="file"  value="{{ old('anexo') }}"
                                   class="form-control-file @error('anexo') is-invalid @enderror" accept=".png, .jpg, .jpeg, .pdf">
                            @error('anexo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror</label>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Conta</label>
                            <input name="conta" value="{{$mentorado->conta}}" type="text" class="form-control @error('conta') is-invalid @enderror">
                            @error('conta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Agência</label>
                            <input name="agencia" value="{{$mentorado->agencia}}" type="text" class="form-control @error('agencia') is-invalid @enderror">
                            @error('agencia')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Banco</label>
                            <input name="banco" value="{{$mentorado->banco}}" type="text" class="form-control @error('banco') is-invalid @enderror">
                            @error('banco')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input name="endereco" value="{{$mentorado->endereco}}" class="form-control @error('endereco') is-invalid @enderror" placeholder="Endereço">
                        @error('endereco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label>Bairro</label>
                                <input value="{{$mentorado->numero}}" name="bairro" type="text" class="form-control">


                        </div>
                        <div class="form-group col">
                            <label>Número</label>
                                <input name="numero" value="{{$mentorado->numero}}"type="number" class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Complemento</label>
                            <input id="input" name="complemento" value="{{$mentorado->complemento}}" type="text" class="form-control">


                    </div>

        </div>
                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection



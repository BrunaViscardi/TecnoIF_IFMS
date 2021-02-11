
@extends('layout.index')

@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Edital</h3>
            </div>
            <form action="{{route('edital.updateSituacao',$edital->id )}}" method="post">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria edital </label>
                        <input name="nome" value="{{$edital->nome}}" class="form-control" placeholder="Categoria edital" disabled>
                    </div>
                    <div class="form-group">
                        <label>Link </label>
                        <input value="{{$edital->link}}" name="link" class="form-control" placeholder="Link" disabled required>
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input value="{{$edital->data->format('Y-m-d')}}" name="data" class="form-control" type="date" disabled>
                    </div>
                    <label>Situação do Edital</label>
                    <div class="form-group">
                        <select class="form-control @error('situacao') is-invalid @enderror" name="situacao">
                            <option value="">Situação</option>
                            <option value="Abertura" {{ $edital->situacao == "Abertura" ? 'selected' : '' }}>Edital de Abertura</option>
                            <option value="Inscrições Abertas" {{ $edital->situacao == "Inscrições Abertas" ? 'selected' : '' }}>Inscrições Abertas</option>
                            <option value="Período de Avalição" {{ $edital->situacao == "Período de Avalição" ? 'selected' : '' }}> Edital em Período de Avalição</option>
                            <option value="Concluído" {{ $edital->situacao == "Concluído" ? 'selected' : '' }}>Edital Concluído</option>
                        </select>

                        @error('situacao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror</div>
                </div>
                <div class="card-footer" style=" text-align: center">
                    <button type="submit" style="text-align: center" class="btn btn-success">Mudar Situação</button>
                </div>
            </form>
        </div>
    </section>
@endsection

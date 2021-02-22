
@extends('layout.index')
@section('content')
    <section class="content">
        <div class="card card-success">
            <div class="card-header">

                <h3 class="card-title">Cadastro de Editais</h3>
            </div>
            <?php
            $now = new DateTime();

            ?>
            <form action="{{route('edital.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria edital* </label>
                        <input name="nome" class="form-control" placeholder="Categoria edital">
                    </div>
                    <div class="form-group">
                        <label>Link*</label>
                        <input name="link" class="form-control" placeholder="Link" required>
                    </div>
                    <div class="form-group">
                        <label>Data*</label>
                        <input name="data" class="form-control" type="date" value="{{$now->format('Y-m-d')}}" required>
                        <small> Data de início do edital</small>
                    </div>

                </div>

                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>

    </section>
@endsection

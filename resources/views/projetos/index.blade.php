@extends('layout.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-bottom: 8px">Projetos</h3>
                        <div class=" card-tools row">
                            <form action="{{ route('projeto.filtro') }}" method="GET">
                                <div class="input-group  input-group-sm " >
                                    <select name="situacao" class="form-control custom-select" style="border-color: lightgrey;" id="inputGroupSelect04">
                                        <option value="" >Situação do edital</option>
                                        <option value="Abertura" {{ request()->situacao == "Abertura" ? 'selected' : '' }}>Aberto</option>
                                        <option value="Inscrições Abertas" {{ request()->situacao == "Inscrições Abertas" ? 'selected' : '' }}>Inscrições Abertas</option>
                                        <option value="Período de Avalição" {{ request()->situacao == "Período de Avalição" ? 'selected' : '' }}>Em período de avaliação</option>
                                        <option value="Concluído" {{ request()->situacao == "Concluído" ? 'selected' : '' }}>Concluído</option>
                                    </select>

                                    <input type="text" name="filtro" value="{{ request()->filtro }}" class="form-control float-right"
                                           placeholder="Filtrar">
                                    <div class="input-group-append">
                                        <button type="submit" style="border-color: lightgrey;" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>


                                <th>Nome</th>
                                <th>Edital</th>
                                <th>Campus</th>
                                <th>Área</th>
                                <th>Situação</th>
                                <th>Email</th>
                                @if(Auth::user() && Auth::user()->isCoordenador() || Auth::user()->isAdministrador())
                                    <th>
                                        <a href="{{route('projeto.export', ['filtro'=>request('filtro','%'),'situacao'=>request('situacao','%')])}}"><button class="btn btn-primary float-right">Exportar</button></a>
                                    </th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projetos as $projeto)

                                <tr>

                                    <td>{{$projeto->nome_projeto}}</td>
                                    <td>{{$projeto->edital->nome}}</td>
                                    <td>{{$projeto->campus}}</td>
                                    <td>{{$projeto->area}}</td>
                                    <td>{{$projeto->situacao->situacao}} </td>
                                    <td>{{$projeto->email}}</td>
                                    @if(Auth::user() && Auth::user()->isCandidato())
                                    <td>
                                        <form method="post" action="{{route('projeto.edit',$projeto->id )}}">
                                            <a href="{{route('projeto.show',$projeto->id)}}"><button type="button" class="btn btn-primary  btn-sm">Ver</button></a>
                                            <a href="{{route('projeto.showEquipe',$projeto->id)}}"><button type="button"  class="btn btn-success btn-sm">Equipe</button></a>
                                            @csrf
                                            @method('PUT')

                                            @if($projeto->situacao->situacao == "Inscrito"  || $projeto->situacao->situacao == "Em andamento" )
                                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                                            @endif
                                        </form>
                                    </td>
                                    @endif
                                    @if(Auth::user() && Auth::user()->isCoordenador() || Auth::user()->isAdministrador())
                                        <td>
                                            <a href="{{route('projeto.show',$projeto->id)}}">
                                                <button type="button" class="btn btn-primary btn-sm">Ver</button>
                                            </a>
                                            @if($projeto->edital->situacao =="Período de Avalição")

                                                @if( $projeto->situacao->situacao =='Inscrito')

                                                    <button class="btn btn-success btn-sm modal-aprovar-btn" data-rota="{{route('projeto.updateAprovacao', $projeto->id)}}" data-projeto="{{ $projeto->id}}">Aprovar</button>

                                                    <a href="{{route('projeto.editRejeicao', $projeto->id)}}"><button type="button" class="btn btn-danger btn-sm">Rejeitar</button></a>
                                                @endif
                                            @endif
                                            @if( $projeto->situacao->situacao =='Em andamento')
                                                <button class="btn btn-success btn-sm modal-concluir-btn" data-rota="{{route('projeto.updateAprovacao', $projeto->id)}}" data-projeto="{{ $projeto->id}}">Concluir mentoria</button>

                                            @endif

                                            @if( $projeto->situacao->situacao =='Rejeitado')
                                                <a href="{{route('projeto.editJustificativa', $projeto->id)}}"><button type="button" class=" btn btn-warning btn-sm">Alterar Situação</button></a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-header">
                        {{ $projetos->appends(['filtro' => $filtro ?? '', 'situacao' => $situacao ?? ''])->links() }}
                    </div>
                </div>
            </div>
        </div>
          <div class="modal fade" id="modal-aprovar" tabindex="-1" role="dialog">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title"> Deseja aprovar projeto?</h5>
                                  <button type="button" class="close" data-dismiss="modal">
                                      <span>&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">

                              </div>
                              <div class="modal-footer">
                                      <a id="href-aprovar-projeto" href="#">
                                      <button type="button" class="btn btn-success">
                                          Aprovar
                                      </button>
                                  </a>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                              </div>
                          </div>
                      </div>
          </div>
        <div class="modal fade" id="modal-concluir" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Deseja concluir a mentoria do projeto?</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <a id="href-concluir-projeto" href="#">
                            <button type="button" class="btn btn-success">
                                Concluir
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.modal-aprovar-btn').on('click', function(event) {
                event.preventDefault();
                let href_da_rota = $(this).attr('data-rota');
                let projeto_id = $(this).attr('data-projeto');
                //define o href do modal para a rota passada
                $('#href-aprovar-projeto').attr('href',href_da_rota);
                //mostra o modal
                $('.modal-body p').text('Deseja aprovar projeto?');
                $('#modal-aprovar').modal("show");
            });
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.modal-concluir-btn').on('click', function(event) {
                event.preventDefault();
                let href_da_rota = $(this).attr('data-rota');
                let projeto_id = $(this).attr('data-projeto');
                //define o href do modal para a rota passada
                $('#href-concluir-projeto').attr('href',href_da_rota);
                //mostra o modal
                $('.modal-body p').text('Deseja concluir  a mentoria do projeto?');
                $('#modal-concluir').modal("show");
            });
        });
    </script>
@endsection

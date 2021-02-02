<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('pages/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('pages/style.css')}}">
    <title>TecnoIF</title>
</head>
<body>
<div role="main">
    <div class="container-brant" id="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand " href="/"> <img id="LogoCabecalho" src="{{ asset('img/TecnoIF.png') }}"
                                                    alt="logo TecnoIF"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSite">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.instagram.com/ifmscg/?igshid=1mn46ve39rvhy"> <img
                                id="redeSocial" src="{{ asset('img/i.png') }}"  alt="logo Instagram"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://pt-br.facebook.com/tecnoif/">
                            <img id="redeSocial" src="{{ asset('img/f.png') }}" alt="logo Facebook"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UC_DLD3-ADKtoa6j-EUTqTvg"> <img
                                id="redeSocial" src="{{ asset('img/y.png') }}" alt="logo youtube"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://linktr.ee/TecnoIF"> <img
                                id="redeSocial" src="{{ asset('img/L.png') }}" alt="logo LinkedIn"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/painel/home">Fazer login</a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
    <main role="main">


        @yield('content')

        <br>
        <br>
        <footer class="container-fluid">
            <strong>Copyright &copy; {{date('Y')}} Incubadora de Empresas do IFMS.</strong>
            Todos os direitos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <div class="modal fade" id="siteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title "> Contatos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container ">
                            <div class="row">
                                <div class="col">
                                    <ul class="text-start">
                                        <p> <b>Campi</b></p>
                                        <li> Aquidauana - tecnoif.aq@ifms.edu.br</li>
                                        <li  > Campo Grande - tecnoif.cg@ifms.edu.br</li>
                                        <li> Corumbá - tecnoif.cb@ifms.edu.br</li>
                                        <li> Coxim - tecnoif.cx@ifms.edu.br</li>
                                        <li> Dourados - tecnoif.dr@ifms.edu.br</li>
                                        <li> Jardim - tecnoif.jd@ifms.edu.br</li>
                                        <li> Naviraí - tecnoif.nv@ifms.edu.br</li>
                                        <li> Nova Andradina-tecnoif.na@ifms.edu.br</li>
                                        <li>Três Lagoas - tecnoif.tl@ifms.edu.br</li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                                        <b>Coordenação Geral da TecnoIF</b>
                                        <p>Lilyan Cristaldo</p>

                                        <li> E-mail: tecnoif@ifms.edu.br </li>
                                        <li>  Telefone: (67) 3378-9605</li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="siteModalDoc" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title "> Documentos</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="col-sm-6">
                        <ul>
                            <br>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/regimentos/regimento-interno-da-tecnoif-incubadora-mista-e-social-de-empresas">
                                    Regimento Interno da TecnoIF;</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/politicas/politica-de-inovacao-do-ifms.pdf">Política
                                    de Inovação do IFMS;</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/programas/programa-empreendedorismo-inovador-pemin-ifms.pdf">Programa
                                    de Empreendedorismo Inovador (Pemin);</a></li>
                            <li>
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/programas/programainstitucionalincentivoextensaopesquisainovacaoresolucao010de26062014.pdf">Programa
                                    Institucional de Incentivo ao Ensino, Extensão, Pesquisa e Inovação (Piepi);</a></li>
                            <li >
                                <a href="https://www.ifms.edu.br/centrais-de-conteudo/documentos-institucionais/regulamentos/regulamento-para-utilizacao-do-cartao-pesquisa-do-ifms.pdf">
                                    Regulamento para Utilização do Cartão Pesquisa;</a></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Fechar</button>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="{{ asset ('pages/jquery.js') }}"></script>
<script src="{{asset('pages/js/script.js')}}"></script>
<script src="{{asset('pages/bootstrap.js')}}"></script>

</body>

</html>
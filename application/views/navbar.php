<!--<div class="row">-->
<div class="col-md-12">
    <nav class="navbar navbar-default">
        <div class="container-fluid" id="nav1">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!--<a class="brand" href="#"></a>-->
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/netcar/c_inicio"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuários <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a id="cad_usuario" data-sort="useradd"  href="#">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cadastrar
                                </a>
                            </li>
                            <li>
                                <a href="/netcar/c_usuario/listarUsuarios">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Listar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Agendamentos <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="cad_agenda" data-sort="agendamento"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cadastrar</a></li>
                            <li><a href="/netcar/c_agendamento/listarAgendamentosDoDia"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></i> Listar agenda do dia</a></li>
                            <li><a href="#"id="btnBuscaAgenda" data-sort="busca_agenda"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Listar por período</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Serviços <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="cad_serv" data-sort="cad_servico"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cadastrar</a></li>
                            <li><a href="/netcar/c_servico"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="/netcar/c_tarifa"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Tarifas</a></li>
                    <li class="dropdown">
                        <a href="?pagina=manutencao" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Faturamento <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/netcar/c_faturamento/listarFaturamentoDiario"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Faturamento do dia </a></li>
                            <li><a href="#" id="btnBuscaFatura" data-sort="busca_fatura"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Faturamento por período </a></li>
                        </ul>
                    </li>
                    <li><a href="/netcar/ajuda"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ajuda</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Área do usuário <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Minha conta</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Trocar senha</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/netcar/c_login/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!--fim da div navbar-colapse-->
        </div> <!--fim da div container-->
    </nav>
</div>
<!--</div>-->
<div class="col-md-12" id="resposta_ajax">

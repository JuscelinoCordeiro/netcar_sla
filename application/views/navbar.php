
<div class="row">
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
                                <li><a href="/netcar/c_agendamento/addAgendamento"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agendar</a></li>
                                <li><a href="/netcar/c_agendamento/listarAgendamentosDoDia"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></i> Listar agenda</a></li>
                                <li><a href="/netcar/c_agendamento/listarAgendamentos"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Listar todos</a></li>
                                <!--<li><a href="/netcar/agendamento_pesquisar"><i class="icon-search"></i> Pesquisar</a></li>-->
                            </ul>
                        </li>
                        <li><a href="/netcar/c_servico"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Serviços</a></li>
                        <li><a href="/netcar/c_tarifa"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Tarifas</a></li>
                        <li class="dropdown">
                            <a href="?pagina=manutencao" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Faturamento <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/netcar/faturamento_diario"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Diário </a></li>
                                <li><a href="/netcar/faturamento_mensal"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Últimos 30 dias </a></li>
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
<script>
    $(document).ready(function() {
        $("#cad_usuario").click(function(e) {
            valor = $("#cad_usuario").data("sort");
//            alert("funciona");

            $.ajax({
                type: 'POST',
                url: '/netcar/c_usuario/cadastrarUsuario',
                cache: false,
                data: {
                    valor: valor
                },
                beforeSend: function(xhr) {
                    xhr.overrideMimeType("text/plain; charset=UTF-8");
                },
                complete: function() {
                },
                success: function(data) {
                    $("#modalTexto").html(data);
                    $("#modal").modal('show');
                },
                error: function() {
                    $("#erroTexto").html("erro");
                    $("#erro").modal('show');
                }
            });
            e.preventDefault();
        });
    });
</script>

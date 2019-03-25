
<div class="view-dados">
    <h2 class="titulo">Agendar Serviço</h2>
    <a class="btn btn-success pull-right" href="/netcar/index.jsp"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/agendamento_adicionar" method="post">
        <div class="control-group">
            <label class="control-label" >Usuario</label>
            <div class="controls">
                <select name="cd_usuario" >
                    <option value="" selected="selected">Selecione o usuario</option>
                    <%
                    UsuarioDAO user = new UsuarioDAO();
                    List<Usuario> listaUsuario = user.getListaDeUsuario();
                        for (Usuario usuario : listaUsuario) {
                        %>
                        <option value="<%= usuario.getCdUsuario()%>"><%= usuario.getNome()%></option>
                        <% }%>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Placa</label>
            <div class="controls">
                <input type="text" name="placa" placeholder="Digite a placa do ve�culo"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tipo de veiculo</label>
            <div class="controls">
                <select name="cd_tpveiculo" id="id_tpveiculo">
                    <option value="" selected="selected">Selecione a tipo de veiculo</option>
                    <%
                    TipoVeiculoDAO tpVeiculo = new TipoVeiculoDAO();
                    List<TipoVeiculo> listTpVeiculo = tpVeiculo.getListaTipoVeiculos();
                        for (TipoVeiculo tipo : listTpVeiculo) {
                        %>
                        <option value="<%= tipo.getCdTpVeiculo()%>"><%= tipo.getTipo()%></option>
                        <% }%>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Servi�o</label>
            <div class="controls">
                <select name="cd_servico" id="id_servico">
                    <option value="" selected="selected">Selecione o servi�o</option>
                    <%
                    ServicoDAO servico = new ServicoDAO();
                    List<Servico> listServico = servico.getListaDeServico();
                        for (Servico sv : listServico) {
                        %>
                        <option value="<%= sv.getCdServico()%>"><%= sv.getServico()%></option>
                        <% }%>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Data</label>
            <span id="dt_agenda">
                <div class="controls">
                    <input id="data_agenda" type="text" name="data" placeholder="Ex.: dd/mm/aaaa"/>
                    <span class="textfieldInvalidFormatMsg msg">Formato de data inv�lido.</span>
                </div>
            </span>
        </div>
        <div class="control-group">
            <label class="control-label">Hor�rio: </label>
            <div class="controls">
                <span id="h_agenda"
                      <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                        <input type="text" name="horario" class="form-control">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <span class="textfieldInvalidFormatMsg msg">Formato de hora inv�lido.</span>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">Pre�o</label>
                <div class="controls">
                    <input type="text" name="preco" value="" id="id_preco"/>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input class="btn btn-danger" type="submit" value="Agendar"/>
                </div>
            </div>
    </form>
</div>
<script>
    $(function() {
        var tarifas = {
            '1': {
                '1': 'R$ 10,00',
                '2': 'R$ 20,00',
                '4': 'R$ 15,00'
            },
            '2': {
                '1': 'R$ 15,00',
                '2': 'R$ 30,00',
                '3': 'R$ 10,00',
                '4': 'R$ 20,00'
            },
            '3': {
                '1': 'R$ 15,00',
                '2': 'R$ 3500',
                '3': 'R$ 10,00',
                '4': 'R$ 20,00'
            },
            '4': {
                '1': 'R$ 25,00',
                '2': 'R$ 50,00',
                '3': 'R$ 10,00',
                '4': 'R$ 40,00'
            },
            '5': {
                '1': 'R$ 20,00',
                '2': 'R$ 50,00',
                '3': 'R$ 20,00',
                '4': 'R$ 40,00'
            },
            '6': {
                '1': 'R$ 50,00',
                '2': 'R$ 150,00',
                '3': 'R$ 30,00',
                '4': 'R$ 70,00'
            },
            '7': {
                '1': 'R$ 15,00',
                '2': 'R$ 40,00',
                '3': 'R$ 15,00',
                '4': 'R$ 30,00'
            }
        };

        $("#id_tpveiculo").change(function() {
            var cdTpVeiculo = $(this).val();
            $("#id_servico").change(function() {
                var cdServico = $(this).val();
                $("#id_preco").val(tarifas[cdTpVeiculo][cdServico]);
            });
        });
    });


    $(function() {
        $("#data_agenda").datepicker(
                {
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Ter�a', 'Quarta', 'Quinta', 'Sexta', 'S�bado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S�b', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Mar�o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                });
    });

    $('.clockpicker').clockpicker();

    var dt_agenda = new Spry.Widget.ValidationTextField("data", "date", {format: "dd/mm/yyyy", useCharacterMasking: true});
    var h_agenda = new Spry.Widget.ValidationTextField("horario", "time", {format: "HH:mm", useCharacterMasking: true});
</script>
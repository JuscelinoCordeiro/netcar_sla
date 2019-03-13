<%@page import="DAO.*, modelo.*, java.util.*"%>


<div class="view-dados">
    <h2 class="titulo">Pesquisar agendamento</h2> 
    <a class="btn btn-success pull-right" href="/netcar/index.jsp"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal"action="/netcar/agendamento_resultadoPesquisa" method="post">                     
        <div class="control-group">
            <label class="control-label">Tipo de veiculo</label>
            <div class="controls">
                <select name="cd_tpveiculo" id="id_tpveiculo">
                    <option value="" selected="selected">Selecione um tipo de veículo</option>
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
            <label class="control-label">Placa</label>
            <div class="controls">
                <input type="text" name="placa" placeholder="Digite a placa do veículo"/><br>
            </div>
        </div> 
               <div class="control-group">
            <label class="control-label">Data: </label>
            <span id="dt_agenda">
                <div class="controls">
                    <input id="data_agenda" type="text" name="data" placeholder="dd/mm/aaaa"/>
                    <span class="textfieldInvalidFormatMsg msg">Formato de data inválido.</span>
                </div>
            </span>
        </div>
             <div class="control-group">
                <div class="controls">
                    <input class="btn btn-danger" type="submit" value="Pesquisar"/>
                </div>
            </div>
    </form>
</div>

<script>
    $(function () {
        $("#data_agenda").datepicker(
                {
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                });
    });
</script>
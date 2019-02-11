<%-- 
    Document   : servico_editar
    Created on : 07/12/2014, 17:25:52
    Author     : apolo
--%>
<%@ page import="java.util.*, DAO.*, modelo.*" %>
<%
    int cdServico = Integer.parseInt(request.getParameter("cd_servico"));
    int cdTpVeiculo = Integer.parseInt(request.getParameter("cd_tpveiculo"));
    TarifaDAO dao = new TarifaDAO();
    Tarifa tarifa = dao.getTarifa(cdServico, cdTpVeiculo);
%>
<div class="view-dados">
    <h2 class="titulo">Editar tarifa</h2> 
    <a class="btn btn-success pull-right" href="/netcar/tarifa_listar"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/tarifa_editar" method="post">
        <div class="control-group">
            <label class="control-label">Tipo de veiculo</label>
            <div class="controls">
                <span class="uneditable-input"><% out.println(tarifa.getTipoVeiculo());%></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Serviço</label>
            <div class="controls">
                <span class="uneditable-input"><% out.println(tarifa.getServico());%></span>
            </div>
        </div>            
        <div class="control-group">
            <label class="control-label">Preço</label>
            <div class="controls">
                <input type="text" name="preco" value="<% out.println(tarifa.getPreco());%>"/>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="hidden" name="cd_servico" value="<%= cdServico%>" />
                <input type="hidden" name="cd_tpveiculo" value="<%= cdTpVeiculo%>" />
                <input class="btn btn-danger" type="submit" value="Gravar" />
            </div>
        </div>
    </form>
</div>


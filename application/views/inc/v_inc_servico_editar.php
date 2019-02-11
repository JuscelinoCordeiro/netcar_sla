<%--
    Document   : servico_editar
    Created on : 07/12/2014, 17:25:52
    Author     : apolo
--%>
<%@ page import="java.util.*, DAO.*, modelo.*" %>
<%
    int codigo = Integer.parseInt(request.getParameter("cd_servico"));
    ServicoDAO dao = new ServicoDAO();
    Servico servico = dao.getServico(codigo);
%>
<div class="view-dados">
    <h2 class="titulo">Editar serviço</h2>
    <a class="btn btn-success pull-right" href="/netcar/servico_listar"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/servico_editar" method="post">
        <div class="control-group">
            <label class="control-label">Código</label>
            <div class="controls">
                <span class="uneditable-input"><% out.println(servico.getCdServico());%></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Serviço</label>
            <div class="controls">
                <input type="text" name="servico" value="<% out.println(servico.getServico());%>"/>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">

                <input type="hidden" name="cd_servico" value="<%= codigo%>" />
                <input class="btn btn-primary" type="submit" value="Gravar" />
            </div>
        </div>
    </form>
</div>


<%-- 
    Document   : listarServicos
    Created on : 02/12/2014, 22:45:30
    Author     : apolo
--%>

<%@ page import="java.util.*, DAO.*, modelo.*" %>

<div id="conteudo">
    <h2 class="titulo">Serviços</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>TIPO DE SERVIÇO</th>                    
                <th>AÇÃO</th>                    
            </tr>
        </thead>
        <%
            int i = 1;
            ServicoDAO dao = new ServicoDAO();
            List<Servico> servicos = dao.getListaDeServico();
            for (Servico servico : servicos) {
        %>
        <tr>
            <td><%= i%></td>
            <td><%=servico.getServico()%></td>
            <td>                
                <a href="/netcar/servico_editar?cd_servico=<% out.println(servico.getCdServico());%>"><img src="img/b_edit.png" alt="editar" title="Editar" border="0"/></a>
                <a class="excluir" data-servico="<% out.println(servico.getServico());%>" data-cd_servico="<% out.println(servico.getCdServico());%>" href="javascript: void(0)"><img src="img/b_excluir.png" alt="excluir" title="Desativar serviço" border="0"/></a>
            </td>
        </tr>
        <%
                i++;
            }
        %>
    </table>
</div>

<script>
    $(function () {
        $(".excluir").click(function () {
            var servico = $(this).data("servico");
            var cd_servico = $(this).data("cd_servico");
            if (confirm("Você deseja desativar o serviço " +servico+"?")) {
                window.location = "/netcar/servico_excluir?cd_servico=" + cd_servico;
            }
        });

    });
</script>
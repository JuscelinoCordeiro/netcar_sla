<%-- 
    Document   : listarAgendamentos
    Created on : 05/12/2014, 10:32:21
    Author     : apolo
--%>
<%@ page import="java.util.*, DAO.*, modelo.*, java.text.*" %>
<%
    int i = 1;
    Date d = new Date();
    SimpleDateFormat dataFormatada = new SimpleDateFormat("dd/MM/yyyy");
    String data = dataFormatada.format(d);
    AgendamentoDAO dao = new AgendamentoDAO();
    List<Agendamento> lista = dao.getListaDeAgendamentos();
    if (lista.size() > 0) {
%>
<div id="conteudo">
    <h2 class="titulo">Agenda para hoje</h2>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>USUÁRIO</th>                    
                <th>TIPO DE VEICULO</th>                    
                <th>PLACA</th>                    
                <th>SERVIÇO</th>                    
                <th>DATA</th>                    
                <th>HORÁRIO</th>                    
                <th>VALOR</th>                    
                <th>AÇÃO</th>                    
            </tr>
        </thead>
        <%
            for (Agendamento agendamento : lista) {
        %>
        <tr>
            <td><%= i%></td>
            <td><%= agendamento.getUsuario()%></td>
            <td><%= agendamento.getTipoVeiculo()%></td>
            <td><%= agendamento.getPlaca().toUpperCase()%></td>
            <td><%= agendamento.getServico()%></td>
            <td><%= agendamento.getDataParaView()%></td>
            <td><%= agendamento.getHorario()%></td>
            <td>R$ <%= agendamento.getPreco()%>0</td><!--com gambiarra-->
            <td>                
                <a class="finalizar" data-id="<% out.println(agendamento.getCdAgendamento()); %> " href="javascript: void(0)"><img src="img/b_finalizar.png" alt="finalizar" title="Finalizar serviço" border="0"/></a>
                <a href="/netcar/agendamento_editar?cd_agendamento=<% out.println(agendamento.getCdAgendamento()); %>"><img src="img/b_edit.png" alt="editar" title="Editar agendamento" border="0"/></a>
                <a class="excluir" data-id="<% out.println(agendamento.getCdAgendamento()); %> " href="javascript: void(0)"><img src="img/b_excluir.png" alt="excluir" title="Excluir agendamento" border="0"/></a>
            </td>
        </tr>
        <%
                i++;
            }
        %>
    </table>
</div>
<%
} else {
%>
<div id="conteudo"><h3>Até o momento não existem agendamentos para hoje <%= data%>.</h3></div>
<%
    }
%>

<script>
    $(function () {

        $(".finalizar").click(function () {
            var id = $(this).data("id");
            if (confirm("Você deseja finalizar o serviço?")) {
                window.location = "/netcar/agendamento_finalizar?id=" + id;
            }
        });

    });

    $(function () {

        $(".excluir").click(function () {
            var id = $(this).data("id");
            if (confirm("Você deseja excluir o agendamento?")) {
                window.location = "/netcar/agendamento_excluir?id=" + id;
            }
        });

    });
</script>    

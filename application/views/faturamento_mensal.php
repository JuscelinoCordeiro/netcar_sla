<%-- 
    Document   : faturamento
    Created on : 08/12/2014, 13:59:20
    Author     : apolo
--%>


<%@page import="java.text.SimpleDateFormat"%>
<%@ page import="java.util.*, DAO.*, modelo.*" %>

<div id="conteudo">
    <h2 class="titulo">Faturamento - Últimos 30 dias</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>DATA</th>
                <th>FATURAMENTO</th>                
            </tr>
        </thead>
        <%
            int i = 1;
            SimpleDateFormat dataFormatada = new SimpleDateFormat("dd/MM/yyyy");
            FaturamentoDAO dao = new FaturamentoDAO();
            List<Faturamento> lista = dao.getFaturamento30Dias();
            for (Faturamento fatura : lista) {
        %>
        <tr>
            <td><%= i%></td>
            <td><%=dataFormatada.format(fatura.getData().getTime())%></td>
            <td>R$ <%=fatura.getFaturamento()%>0</td>            
        </tr>

        <%
                i++;
            }
        %>
    </table>
</div>
<%-- 
    Document   : faturamento
    Created on : 08/12/2014, 13:59:20
    Author     : apolo
--%>


<%@page import="java.text.SimpleDateFormat"%>
<%@ page import="java.util.*, DAO.*, modelo.*" %>
<div id="conteudo">
    <h2 class="titulo">Faturamento</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>                
                <th>DATA</th>
                <th>VALOR FATURADO</th>
            </tr>
        </thead>
        <%
            Date d = new Date();
//            Date d2 = new Date().getTime();
            SimpleDateFormat formataData = new SimpleDateFormat("dd/MM/yyy");
            SimpleDateFormat formataHora = new SimpleDateFormat("HH:mm:ss");
            String dataFormatada = formataData.format(d);
            String horaFormatada = formataHora.format(d);
            
            Calendar data = Calendar.getInstance();
            FaturamentoDAO dao = new FaturamentoDAO();
            Faturamento fatura = dao.getFaturamento(data);           
        %>
        <tr>            
            <td>FATURAMENTO PARA O DIA <%= dataFormatada %> OCORRIDO ATÉ AS <%= horaFormatada %></td>
            <td>R$ <%= fatura.getFaturamento()%>0</td>          
        </tr>
    </table>
</div>

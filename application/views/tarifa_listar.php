<%@ page import="java.util.*, DAO.*, modelo.*" %>
<div id="conteudo">
    <h2 class="titulo">Tarifas</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>TIPO DE VEÍCULO</th>
                <th>SERVIÇO</th>
                <th>PRECO</th>
                <th>AÇÂO</th>
            </tr>
        </thead>
        <%
            int i = 1;
            TarifaDAO dao = new TarifaDAO();
            List<Tarifa> lista = dao.getListaDeTarifa();
            for (Tarifa tarifa : lista) {
        %>
        <tr>

            <td><%= i%></td>
            <td><%=tarifa.getTipoVeiculo()%></td>
            <td><%=tarifa.getServico()%></td>
            <td>R$ <%=tarifa.getPreco()%>0</td>
            <td>                
                <a href="/netcar/tarifa_editar?cd_servico=<% out.println(tarifa.getCdServico()); %>&cd_tpveiculo=<% out.println(tarifa.getCdTpVeiculo());%>">
                    <img src="img/b_edit.png" alt="editar" title="Editar" border="0"/></a>
                <!--<a href="?pagina=usuario&excluir=sim&cd=' . $user->CD_USER . '"><img src="img/b_excluir.png" alt="excluir" title="Excluir" border="0"/></a>-->
            </td>
        </tr>
        <%
                i++;
            }
        %>
    </table>
</div>
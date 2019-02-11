<%-- 
    Document   : listaUsuario
    Created on : 02/12/2014, 09:03:20
    Author     : apolo
--%>


<%@ page import="java.util.*, DAO.*, modelo.*" %>
<div id="conteudo">
    <h2 class="titulo">Usuários</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>NOME</th>
                <th>IDENTIDADE</th>
                <th>ENDEREÇO</th>
                <th>CELULAR</th>
                <th>TEL FIXO</th>
                <th>AÇÂO</th>
            </tr>
        </thead>
        <%
            int i = 1;
            UsuarioDAO dao = new UsuarioDAO();
            List<Usuario> usuarios = dao.getListaDeUsuario();
            for (Usuario usuario : usuarios) {
        %>
        <tr>
            <td><%= i%></td>
            <td><%=usuario.getNome()%></td>
            <td><%=usuario.getIdt()%></td>
            <td><%=usuario.getEndereco()%></td>
            <td><%=usuario.getCelular()%></td>
            <td><%=usuario.getFixo()%></td>
            <td>                
                <a href="/netcar/usuario_editar?cd_usuario=<% out.println(usuario.getCdUsuario());%>"><img src="img/b_edit.png" alt="editar" title="Editar" border="0"/></a>
                <a class="excluir" data-nome="<% out.println(usuario.getNome());%>" data-id="<% out.println(usuario.getCdUsuario());%>" href="javascript: void(0)"><img src="img/b_excluir.png" alt="excluir" title="Excluir" border="0"/></a>
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
            var nome = $(this).data("nome");
            var id   = $(this).data("id");
            if (confirm("Você deseja excluir o usuário "+nome)) {
                window.location = "/netcar/usuario_excluir?id="+id;
            }
        });
        
    });   
</script>
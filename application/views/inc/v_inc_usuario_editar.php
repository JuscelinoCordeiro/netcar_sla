<%-- 
    Document   : usuario_editar
    Created on : 06/12/2014, 17:25:52
    Author     : apolo
--%>
<%@ page import="java.util.*, DAO.*, modelo.*" %>
<%

    int codigo = Integer.parseInt(request.getParameter("cd_usuario"));
    UsuarioDAO dao = new UsuarioDAO();
    Usuario usuario = dao.getUsuario(codigo);
%>
<div class="view-dados">
    <h2 class="titulo">Editar cadastro</h2> 
    <a class="btn btn-success pull-right" href="/netcar/usuario_listar"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/usuario_editar" method="post">
        <div class="control-group">
            <label class="control-label" >Nome</label>
            <div class="controls">
                <input type="text" name="nome" value="<% out.println(usuario.getNome());%>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Endereço</label>
            <div class="controls">
                <input type="text" name="endereco" value="<% out.println(usuario.getEndereco());%>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Celular</label>
            <div class="controls">
                <input type="text" name="celular"  value="<% out.println(usuario.getCelular());%>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Telefone Fixo</label>
            <div class="controls">
                <input type="text" name="fixo"  value="<% out.println(usuario.getFixo());%>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Identidade</label>
            <div class="controls">
                <input type="text" name="idt"  value="<% out.println(usuario.getIdt());%>"/>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="hidden" name="cd_usuario" value="<%= codigo%>" />
                <input class="btn btn-danger" type="submit" value="Editar" />
            </div>
        </div>
    </form>
</div>


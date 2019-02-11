<%-- 
    Document   : adduser
    Created on : 02/12/2014, 23:17:10
    Author     : apolo
--%>

<div class="view-dados">
    <h2 class="titulo">Cadastrar usuário</h2> 
    <a class="btn btn-success pull-right" href="/netcar/index.jsp"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/usuario_adicionar" method="post">
        <div class="control-group">
            <label class="control-label">Nome</label>
            <div class="controls">
                <input type="text" name="nome" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Endereço</label>
            <div class="controls">
                <input type="text" name="endereco" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Celular</label>
            <div class="controls">
                <input type="text" name="celular" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >telefone Fixo</label>
            <div class="controls">
                <input type="text" name="fixo" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" >Identidade</label>
            <div class="controls">
                <input type="text" name="idt" /><br/>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input class="btn btn-danger" type="submit" value="Cadastrar" />
            </div>
        </div>
    </form>
   
</div>
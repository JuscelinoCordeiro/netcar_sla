<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="titulo"><?= $titulo ?></h2>
        <form id="form_edit_usuario" action="" method="post">
            <legend class="text-black hr3">Dados do usuário</legend>
            <div class="form-group">
                <label class="control-label">Senha atual</label>
                <input class="form-control text text-uppercase" type="password" name="senha_atual" required/>
            </div>
            <div class="form-group">
                <label class="control-label">Nova senha</label>
                <input class="form-control text text-uppercase" type="password" name="senha_nova" required/>
            </div>
            <div class="form-group">
                <label class="control-label">Confirme a nova senha</label>
                <input class="form-control text text-uppercase" type="password" name="senha_confirma" required/>
            </div>
            <input type="hidden" name="acao" value="trocar_senha"/>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<script>
    $(document).ready(function() {

        $("#salvarModal").click(function(e) {
            senha_atual = $("input[name=senha_atual]").val();
            senha_nova = $("input[name=senha_nova]").val();
            senha_confirma = $("input[name=senha_confirma]").val();
            acao = $("input[name=acao]").val();

            if (senha_atual === "") {
                alert("Senha atual vazia.");
            } else if (senha_nova === "") {
                alert("A nova senha não pode ser vazia.");
            } else if (senha_nova !== senha_confirma) {
                alert("A nova senha não coincide.");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/netcar/c_usuario/trocarSenha',
                    cache: false,
                    data: {
                        senha_atual: senha_atual,
                        senha_nova: senha_nova,
                        senha_confirma: senha_confirma,
                        acao: acao
                    },
                    beforeSend: function(xhr) {
                        xhr.overrideMimeType("text/plain; charset=UTF-8");
                    },
                    complete: function() {
                    },
                    success: function(data) {
                        if (data === '1') {
                            $('#sucesso').on('hidden.bs.modal', function(e) {
                                window.location.reload();
                            });
//                        $('#alteracao').modal('hide');
                            var msg = 'Senha alterada com sucesso.';
                            $('#sucessoTexto').html(msg);
                            $('#sucesso').modal('show');
                        } else {
                            $('#erro').on('hidden.bs.modal', function(e) {
                                window.location.reload();
                            });
                            $('#excluir').modal('hide');
                            var msg = 'ERRO ao alterar a senha.';
                            $('#erroTexto').html(msg);
                            $('#erro').modal('show');
                        }
                    },
                    error: function() {
                        $("#erroTexto").html("Erro no sistema, tente novamente.");
                        $("#erro").modal('show');
                    }
                });
                e.preventDefault();
            }
        });
    });
</script>
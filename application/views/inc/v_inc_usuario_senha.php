<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="titulo"><?= $titulo ?></h2>
        <form id="form_edit_usuario" action="" method="post">
            <legend class="text-black hr3">Dados do usuário</legend>
            <div class="form-group">
                <label class="control-label">Senha anterior</label>
                <input class="form-control" type="text" name="senha_antiga" required/>
            </div>
            <div class="form-group">
                <label class="control-label">Nova senha</label>
                <input class="form-control" type="text" name="senha_nova" required/>
            </div>
            <div class="form-group">
                <label class="control-label">Confirme a nova senha</label>
                <input class="form-control" type="text" name="senha_confirma" required/>
            </div>
            <input type="hidden" name="acao" value="trocar_senha"/>
            <input type="hidden" name="cd_usuario" value="<?= $usuario['cd_usuario'] ?>"/>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<script>
    $(document).ready(function() {

//        $("#salvarModal").html("Atualizar dados");

        $("#salvarModal").click(function(e) {
            senha_antiga = $("input[name=senha_antiga]").val();
            senha_nova = $("input[name=senha_nova]").val();
            senha_confirma = $("input[name=senha_confirma]").val();
            cd_usuario = $("input[name=cd_usuario]").val();

            if (senha_nova !== senha_confirma) {
                alert("As senhas estão diferentes.");
                exit();
            }


            $.ajax({
                type: 'POST',
                url: '/netcar/c_usuario/trocarSenha',
                cache: false,
                data: {
                    senha_antiga: senha_antiga,
                    senha_nova: senha_nova,
                    senha_confirma: senha_confirma,
                    cd_usuario: cd_usuario
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
        });
    });
</script>
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="titulo">Editar Serviço</h2>
        <!--<a class="btn btn-success pull-right" href="/netcar/index.jsp"><i class="icon-arrow-left icon-white"></i>Voltar</a>-->
        <form id="form_cad_usuario" action="" method="post">
            <legend class="text-black hr3">Dados do Veículo</legend>
            <div class="form-group">
                <label class="control-label">Tipo de veículo</label>
                <input class="form-control text text-uppercase" type="text" name="tipo_veiculo" required value="<?= $veiculo->tipo ?>"/>
            </div>
            <input type="hidden" name="acao" value="editar"/>
            <input type="hidden" name="cd_tpveiculo" value="<?= $veiculo->cd_tpveiculo ?>"/>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<script>
    $(document).ready(function () {
        $("#salvarModal").click(function (e) {
            tipo_veiculo = $("input[name=tipo_veiculo]").val();
            cd_tpveiculo = $("input[name=cd_tpveiculo]").val();
            acao = $("input[name=acao]").val();

            $.ajax({
                type: 'POST',
                url: '/netcar/c_veiculo/editarVeiculo',
                cache: false,
                data: {
                    tipo_veiculo: tipo_veiculo,
                    cd_tpveiculo: cd_tpveiculo,
                    acao: acao
                },
                beforeSend: function (xhr) {
                    xhr.overrideMimeType("text/plain; charset=UTF-8");
                },
                complete: function () {
                },
                success: function (data) {
                    if (data === '1') {
                        $('#sucesso').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                        $('#alteracao').modal('hide');
                        var msg = 'Veículo alterado com sucesso.';
                        $('#sucessoTexto').html(msg);
                        $('#sucesso').modal('show');
                    } else {
                        $('#erro').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                        $('#excluir').modal('hide');
                        var msg = 'ERRO ao alterar o veículo.';
                        $('#erroTexto').html(msg);
                        $('#erro').modal('show');
                    }
                },
                error: function () {
                    $("#erroTexto").html("Erro no sistema, tente novamente.");
                    $("#erro").modal('show');
                }
            });
            e.preventDefault();
        });
    });
</script>
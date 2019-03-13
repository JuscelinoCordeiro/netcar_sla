<?php
$serv = $servico->row();
?>
<link  type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h2 class="titulo">Editar serviço</h2>
        <!--<a class="btn btn-success pull-right" href="/netcar_sla/c_servico">Voltar</a>-->
        <form>
            <div class="form-group">
                <!--<label>Código do serviço</label>-->
            </div>
            <div class="form-group">
                <label>Serviço</label>
                <input id="servico" type="text" class="form-control" data-cd_servico="<?= $serv->cd_servico ?>" value="<?= $serv->servico ?>">
            </div>
            <button id="salvar" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#salvar").click(function(e) {

            servico = $("#servico").val();
            cd_servico = $("#servico").data("cd_servico");
//            alert(servico + cd_servico);
            $.ajax({
                type: 'POST',
                url: 'c_servico/salvarServico',
                cache: false,
                data: {
                    servico: servico,
                    cd_servico: cd_servico
                },
                beforeSend: function(xhr) {
                    xhr.overrideMimeType("text/plain; charset=UTF-8");
                },
                complete: function() {
                },
                success: function(data) {
                    $("#visualizarTexto").html("OK!! Operação concluida com sucesso.");
                    $("#visualizar").modal();
                },
                error: function() {
                    $("#erroTexto").html("erro");
                    $("#erro").modal('show');
                }
            });
            e.preventDefault();
        });
    });
</script>
<div class="view-dados">
    <h2 class="titulo">Agendar Serviço</h2> 
    <a class="btn btn-success pull-right" href="/netcar/c_inicio"><i class="icon-arrow-left icon-white"></i>Voltar</a>
    <form class="form-horizontal" action="/netcar/agendamento_adicionar" method="post">
        <div class="control-group">
            <div class="controls">
                <select name="cd_usuario" >
                    <option value="" selected="selected">Selecione o usuario</option>
                    <?php
                      foreach($usuarios->result() as $usuario){    
                    ?>
                    <option value="<?= $usuario->cd_usuario ?>"><?= $usuario->nome ?></option>
                   <?php
                      }
                   ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Placa</label>
            <div class="controls">
                <input type="text" name="placa" placeholder="Digite a placa do veículo"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tipo de veiculo</label>
            <div class="controls">
                <select name="cd_tpveiculo" id="id_tpveiculo">
                    <option value="" selected="selected">Selecione a tipo de veiculo</option>
                    <?php 
                        foreach($tipo_veiculo->result() as $tipo){
                    ?>
                        <option class="tipo_veiculo" value="<?= $tipo->cd_tpveiculo ?>"><?= $tipo->tipo ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Serviço</label>
            <div class="controls">
                <select name="cd_servico" id="id_servico">
                    <option value="" selected="selected">Selecione o serviço</option>
                    <?php 
                        foreach($servicos->result() as $servico){
                    ?>
                    <option value="<?= $servico->cd_servico ?>"><?= $servico->servico ?></option>
                        <?php
                        }
                        ?>  
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Data</label>
            <span id="dt_agenda">
                <div class="controls">
                    <input id="data_agenda" type="text" name="data" placeholder="Ex.: dd/mm/aaaa"/>
                    <span class="textfieldInvalidFormatMsg msg">Formato de data inválido.</span>
                </div>
            </span>
        </div>
        <div class="control-group">
            <label class="control-label">Horário: </label>
            <div class="controls">
                <span id="h_agenda"
                      <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                        <input type="text" name="horario" class="form-control">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        <span class="textfieldInvalidFormatMsg msg">Formato de hora inválido.</span>
                    </div>
            </div>
            <div class="control-group">
                <label class="control-label">Preço</label>
                <div class="controls">
                    <input type="text" name="preco" value="" id="id_preco"/>
                </div>
            </div>
            <div class="control-group" style="margin-top: 10px;">
                <div class="controls">
                    <input class="btn btn-danger" type="submit" value="Agendar"/>
                </div>
            </div>
            <input type="hidden" name="acao" value="novoAgendamento">
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#id_tpveiculo').on('change', function() {
            var tipo_servico = $(this).val();
            $.ajax({
                url: '/netcar/c_agendamento/addAgendamento',
                type: 'POST',
                data: { tipo_servico : tipo_servico },
                dataType: 'json',
                success: function(data) {    
                var options = '<option value=""></option>';

                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' +
                    data[i].cd_servico + '">' +
                    data[i].servico + '</option>';
                }

                $('#id_servico').html(options);
                }
            });
        });
    });

    $(function () {
        $("#data_agenda").datepicker(
                {
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                    dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
                });
    });

    $('.clockpicker').clockpicker();

    var dt_agenda = new Spry.Widget.ValidationTextField("data", "date", {format: "dd/mm/yyyy", useCharacterMasking: true});
    var h_agenda = new Spry.Widget.ValidationTextField("horario", "time", {format: "HH:mm", useCharacterMasking: true});
</script>
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="titulo">Agendar serviço</h2>
        <form id="form_cad_agendamento" action="" method="post">
            <legend class="text-black hr3">Dados para cadastrar</legend>
            <div class="form-group">
                <label class="control-label">Nome</label>
                <select class="form-control" name="cd_usuario" >
                    <option value="" selected="">Selecione o usuario</option>
                    <?php
                    foreach ($usuarios as $usuario) {
                        echo '<option value=\"' . $usuario->cd_usuario . '\">' . $usuario->nome . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Placa do veículo</label>
                <input class="form-control" type="text" name="idt" required placeholder="Digite a placa do veículo (opicional)"/>
            </div>
            <div class="form-group">
                <label for="Perfil" class="control-label">Tipo de veiculo</label>
                <select class="form-control" name="nivel"  required>
                    <option value="" selected="">Selecione o tipo de veículo</option>
                    <?php
                    foreach ($tipo_veiculos as $tpveiculos) {
                        echo '<option value=\"' . $tpveiculos->cd_tp_veiculo . '\">' . $tpveiculos->tipo . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Perfil" class="control-label">Serviço</label>
                <select class="form-control" name="nivel"  required>
                    <option value="">Selecione uma opção</option>
                    <!--fazer foreach-->
                </select>
            </div>
            <div class="form-inline">
                <div class="form-group">
                    <label class="control-label">Data</label>
                    <span id="dt_agenda">
                        <div class="controls">
                            <input class="form-control" id="data_agenda" type="text" name="data" placeholder="Ex.: dd/mm/aaaa"/>
                            <span class="textfieldInvalidFormatMsg msg">Formato de data inválido.</span>
                        </div>
                    </span>
                </div>
                <!--hora-->
                <div class="form-group">
                    <label class="control-label">Horário: </label>
                    <span id="h_agenda">
                        <div class="controls">
                            <div class="input-group clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                                <input type="text" name="horario" class="form-control">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                                <span class="textfieldInvalidFormatMsg msg">Formato de hora inválido.</span>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Valor</label>
                <input class="form-control" type="text" name="preco" required />
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<script>
    $(function() {
        var tarifas = {
            '1': {
                '1': 'R$ 10,00',
                '2': 'R$ 20,00',
                '4': 'R$ 15,00'
            },
            '2': {
                '1': 'R$ 15,00',
                '2': 'R$ 30,00',
                '3': 'R$ 10,00',
                '4': 'R$ 20,00'
            },
            '3': {
                '1': 'R$ 15,00',
                '2': 'R$ 3500',
                '3': 'R$ 10,00',
                '4': 'R$ 20,00'
            },
            '4': {
                '1': 'R$ 25,00',
                '2': 'R$ 50,00',
                '3': 'R$ 10,00',
                '4': 'R$ 40,00'
            },
            '5': {
                '1': 'R$ 20,00',
                '2': 'R$ 50,00',
                '3': 'R$ 20,00',
                '4': 'R$ 40,00'
            },
            '6': {
                '1': 'R$ 50,00',
                '2': 'R$ 150,00',
                '3': 'R$ 30,00',
                '4': 'R$ 70,00'
            },
            '7': {
                '1': 'R$ 15,00',
                '2': 'R$ 40,00',
                '3': 'R$ 15,00',
                '4': 'R$ 30,00'
            }
        };

        $("#id_tpveiculo").change(function() {
            var cdTpVeiculo = $(this).val();
            $("#id_servico").change(function() {
                var cdServico = $(this).val();
                $("#id_preco").val(tarifas[cdTpVeiculo][cdServico]);
            });
        });
    });


    $(function() {
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
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text text-center"><h3 class="titulo">Todos os agendamentos</h3></div>
    <div class="col-md-2"></div>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>USUÁRIO</th>
                <th>TIPO DE VEICULO</th>
                <th>PLACA</th>
                <th>SERVIÇO</th>
                <th>DATA</th>
                <th>HORÁRIO</th>
                <th>VALOR</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <?php
        foreach ($agendamentos->result() as $agendamento) {
            ?>
            <tr>
                <td><?= $agendamento->cd_agendamento ?></td>
                <td>asdfasd</td>
                <td>asdfsdf</td>
                <td><?= $agendamento->placa ?></td>
                <td>asdfasdfa</td>
                <td><?= date('d/m/Y', strtotime($agendamento->data)) ?></td>
                <td><?= $agendamento->horario ?></td>
                <td>asdfasd</td><!--com gambiarra-->
                <td class="text-center">
                    <?php
                    $status = $agendamento->status;
                    if ($status == 0) {
                        ?>
                        <span class="label label-warning">
                            <?php echo "ABERTO"; ?>
                        </span>
                        <a class="finalizar" data-id="<?= $agendamento->cd_agendamento ?>" href="javascript: void(0)"><img src="<?= base_url('assets/img/b_finalizar.png') ?>" alt="finalizar" title="Finalizar serviço" border="0"/></a>
                        <a href="/netcar/agendamento_editar?cd_agendamento=<?= $agendamento->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar agendamento" border="0"/></a>
                        <a class="excluir" id="btnExc<?= $agendamento->cd_agendamento ?>" cd_agend="<?= $agendamento->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_excluir.png') ?>" alt="excluir" title="Excluir agendamento" border="0"/></a>
                            <?php
                        } else {
                            echo "FINALIZADO";
                        }
                        ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<script>
    $('a[id^=btnExc]').click(function() {

        cd_agend = $(this).attr('cd_agend');

        $('#excluir').on('shown.bs.modal', function(e) {

            $('#excluirModal').click(function() {
                $.ajax({
                    type: "POST",
                    url: '/netcar/c_agendamento/excluirAgendamento',
                    cache: false,
                    data: {cd_agend: cd_agend},
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
                            $('#excluir').modal('hide');
                            var msg = 'Agendamento excluído com sucesso!';
                            $('#sucessoTexto').html(msg);
                            $('#sucesso').modal('show');
                        } else {
                            $('#erro').on('hidden.bs.modal', function(e) {
                                window.location.reload();
                            });
                            $('#excluir').modal('hide');
                            var msg = 'ERRO ao excluir o agendamento.';
                            $('#erroTexto').html(msg);
                            $('#erro').modal('show');
                        }
                    },
                    error: function() {
                        $("#erro").html('Ocorreu um erro no sistema.');
                        $("#erro").dialog("open");
                    }
                });
            });

        });

        $("#excluirTexto").html('<b>Confirma a exclusão do usuário?</b>');
        $("#excluir").modal("show");

    });
</script>

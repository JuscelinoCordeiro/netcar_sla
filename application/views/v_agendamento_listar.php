<div id="row">
    <?php
    if ($agendamentos_dia->result()) {
        ?>
        <h3 class="titulo">Agenda para hoje</h3>
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
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <?php
            foreach ($agendamentos_dia->result() as $agendamento_dia) {
                ?>
                <tr>
                    <td><?= $agendamento_dia->cd_agendamento ?></td>
                    <td>asdfsadf</td>
                    <td>asdf</td>
                    <td><?= strtoupper($agendamento_dia->placa) ?></td>
                    <td> asdfasdf </td>
                    <td><?= date('d/m/Y', strtotime($agendamento_dia->data)) ?></td>
                    <td><?= $agendamento_dia->horario ?></td>
                    <td>adf</td>
                    <td class="text-center">
                        <a class="finalizar" data-id="<?= $agendamento_dia->cd_agendamento ?>" href="javascript: void(0)"><img src="img/b_finalizar.png" alt="finalizar" title="Finalizar serviço" border="0"/></a>
                        <a href="/netcar/agendamento_editar?cd_agendamento=<?= $agendamento_dia->cd_agendamento ?>"><img src="img/b_edit.png" alt="editar" title="Editar agendamento" border="0"/></a>
                        <a class="excluir" data-id="<?= $agendamento_dia->cd_agendamento ?>" href="javascript: void(0)"><img src="img/b_excluir.png" alt="excluir" title="Excluir agendamento" border="0"/></a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    <?php } else { ?>
        <div class="col-md-3"></div>
        <div  id=""class="col-md-6" ><h3>Até o momento não existem agendamentos para hoje, <?= date('d/m/y') ?>.</h3></div>
        <div class="col-md-3"></div>
    <?php } ?>
</div>
<script>
    $(function() {

        $(".finalizar").click(function() {
            var id = $(this).data("id");
            if (confirm("Você deseja finalizar o serviço?")) {
                window.location = "/netcar/agendamento_finalizar?id=" + id;
            }
        });

    });

    $(function() {

        $(".excluir").click(function() {
            var id = $(this).data("id");
            if (confirm("Você deseja excluir o agendamento?")) {
                window.location = "/netcar/agendamento_excluir?id=" + id;
            }
        });

    });
</script>
<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jn_agendamento.js') ?>"></script>
<div class="row">
    <?php
    if ($agendamentos_dia->result()) {
        ?>
        <div class="col-md-2"></div>
        <div class="col-md-8"><h3 class="titulo text text-center">Agenda para hoje</h3></div>
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
            $i = 0;
            foreach ($agendamentos_dia->result() as $agendamento) {
                $i = $i + 1;
                ?>
                <tr class="text text-center text-uppercase">
                    <td><?= $i ?></td>
                    <td><?= $agendamento->nome ?></td>
                    <td><?= $agendamento->tipo ?></td>
                    <td><?= $agendamento->placa ? $agendamento->placa : "---" ?></td>
                    <td><?= $agendamento->servico ?></td>
                    <td><?= date('d/m/Y', strtotime($agendamento->data)) ?></td>
                    <td><?= $agendamento->horario ?></td>
                    <td><?= "R$ " . $agendamento->preco . ",00" ?></td>
                    <td class="text-center">
                        <?php
                        $status = $agendamento->status;
                        if ($status == 0) {
                            ?>
                            <span class="label label-warning">
                                <?php echo "ABERTO"; ?>
                            </span>
                            <a id="btnFin<?= $agendamento->cd_agendamento ?>" class="finalizar" cd_agend="<?= $agendamento->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_finalizar2.png') ?>" height="17" width="17" alt="finalizar" title="Finalizar agendamento" border="0"/></a>
                            <a id="btnEdit<?= $agendamento->cd_agendamento ?>" cd_agend="<?= $agendamento->cd_agendamento ?>" href="#"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar agendamento" border="0"/></a>
                            <a id="btnExc<?= $agendamento->cd_agendamento ?>" cd_agend="<?= $agendamento->cd_agendamento ?>" class="excluir" id="btnExc<?= $agendamento->cd_agendamento ?>" cd_agend="<?= $agendamento->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_excluir.png') ?>" alt="excluir" title="Excluir agendamento" border="0"/></a>
                            <?php
                        } else {
                            echo "SERVIÇO REALIZADO";
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="col-md-2"></div>
    <?php } else { ?>
        <div class="col-md-3"></div>
        <div  id=""class="col-md-6" ><h3>Até o momento não existem agendamentos para hoje, <?= date('d/m/y') ?>.</h3></div>
        <div class="col-md-3"></div>
    <?php } ?>
</div>

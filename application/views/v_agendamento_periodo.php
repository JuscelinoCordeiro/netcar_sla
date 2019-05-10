<script type="text/javascript" language="javascript" src="<?= base_url('assets/js/jn_agendamento.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>
<style>
    #visualizar{
        width: 90%;
        z-index: 2000;
    }
</style>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text text-center"><h3 class="titulo">Agendamentos para o período de <?= inverteData($dt_inicio) . " a " . inverteData($dt_fim) ?></h3></div>
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
            $i = 0;
            foreach ($agendamentos as $ag) {
                $i = $i + 1;
                ?>
                <tr class="text text-center text-uppercase">
                    <td><?= $i ?></td>
                    <td><?= $ag->nome ?></td>
                    <td><?= $ag->tipo ?></td>
                    <td><?= $ag->placa ? $ag->placa : "---" ?></td>
                    <td><?= $ag->servico ?></td>
                    <td><?= date('d/m/Y', strtotime($ag->data)) ?></td>
                    <td><?= $ag->horario ?></td>
                    <td><?= "R$ " . $ag->preco . ",00" ?></td>
                    <td class="text-center">
                        <?php
                        $status = $ag->status;
                        if ($status == 0) {
                            ?>
                            <span class="label label-warning">
                                <?php echo "ABERTO"; ?>
                            </span>
                            <?php
                            if (validaPerfil(array(M_perfil::Operador, M_perfil::Gerente), $this->session->userdata('dados_usuario')->nivel)) {
                                ?>
                                <a id="btnFin<?= $ag->cd_agendamento ?>" class="finalizar" cd_agend="<?= $ag->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_finalizar2.png') ?>" height="17" width="17" alt="finalizar" title="Finalizar agendamento" border="0"/></a>
                                <?php
                            }
                            ?>
                            <a href="/netcar/agendamento_editar?cd_agendamento=<?= $ag->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar agendamento" border="0"/></a>
                            <a  id="btnExc<?= $ag->cd_agendamento ?>" cd_agend="<?= $ag->cd_agendamento ?>" class="excluir" id="btnExc<?= $ag->cd_agendamento ?>" cd_agend="<?= $ag->cd_agendamento ?>"><img src="<?= base_url('assets/img/b_excluir.png') ?>" alt="excluir" title="Excluir agendamento" border="0"/></a>
                                <?php
                            } else {
                                echo "SERVIÇO REALIZADO";
                            }
                            ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9"><h2 class="titulo">Serviços</h2></div>
    <div class="col-md-2"></div>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>TIPO DE SERVIÇO</th>
                <th>STATUS</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($servicos->result() as $servico) {
                ?>
                <tr>
                    <td class="text text-center"><?= $i ?></td>
                    <td class="text-uppercase text text-center"><?= $servico->servico ?></td>
                    <td text text-center><?= $servico->ativo == '1' ? 'ATIVO' : 'DESATIVADO' ?></td>
                    <td class="text text-center">
                        <a href="<?= $servico->cd_servico ?>"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar" border="0"/></a>
                        <a class="excluir" data-servico="<?= $servico->servico ?>" data-cd_servico="<?= $servico->cd_servico ?>" href="javascript: void(0)"><img src="<?= base_url('assets/img/b_excluir.png') ?>" alt="excluir" title="Desativar serviço" border="0"/></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>

</div>

<script>
    $(function() {
        $(".excluir").click(function() {
            var servico = $(this).data("servico");
            var cd_servico = $(this).data("cd_servico");
            if (confirm("Voc� deseja desativar o servi�o " + servico + "?")) {
                window.location = "/netcar/servico_excluir?cd_servico=" + cd_servico;
            }
        });

    });
</script>
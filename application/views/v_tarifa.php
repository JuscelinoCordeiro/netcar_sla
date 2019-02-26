<div id="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text text-center"><h2 class="titulo"><?= $titulo ?></h2></div>
    <div class="col-md-2"></div>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>TIPO DE VEÍCULO</th>
                <th>SERVIÇO</th>
                <th>PREÇO</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <?php
        $i = 1;
        foreach ($tarifas->result() as $tarifa) {
            ?>
            <tr>
                <td class="text text-center text-uppercase"><?= $i ?></td>
                <td class="text text-center text-uppercase"><?= $tarifa->tipo ?></td>
                <td class="text text-center text-uppercase"><?= $tarifa->servico ?></td>
                <td class="text text-center text-uppercase"><?= $tarifa->preco ?></td>
                <td class="text text-center text-uppercase" data-cd_tpveiculo="<?= $tarifa->cd_tpveiculo ?>" data-cd_tpservico="<?= $tarifa->cd_servico ?>">
                    <a href="/netcar_sla/c_usuario/editarTarifa/<?= $tarifa->cd_tarifa ?>"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar" border="0"/></a>
                </td>
            </tr>

            <?php
            $i++;
        }
        ?>
    </table>
</div>


<script>
    $(function() {

        $(".excluir").click(function() {
            var nome = $(this).data("nome");
//            var id = $(this).data("id");
            if (confirm("Você deseja excluir o usuário " + nome)) {
                window.location = "/netcar_sla/c_usuario/excluirUsuario/<?= $tarifa->cd_usuario ?>";
            }
        });

    });
</script>
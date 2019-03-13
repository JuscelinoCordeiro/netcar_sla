<div id="conteudo w-100">
    <h2 class="titulo">Todos os agendamentos</h2>
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
        foreach($agendamentos->result() as $agendamento){
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
                    if ($status == 0){

                ?>
                <span class="label label-warning">
                    <?php echo "ABERTO"; ?>
                </span>
                <a class="finalizar" data-id="<?= $agendamento->cd_agendamento ?>" href="javascript: void(0)"><img src="img/b_finalizar.png" alt="finalizar" title="Finalizar servi�o" border="0"/></a>
                <a href="/netcar/agendamento_editar?cd_agendamento=<?= $agendamento->cd_agendamento ?>"><img src="img/b_edit.png" alt="editar" title="Editar agendamento" border="0"/></a>
                <a class="excluir" data-id="<?= $agendamento->cd_agendamento ?>" href="javascript: void(0)"><img src="img/b_excluir.png" alt="excluir" title="Excluir agendamento" border="0"/></a>
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
    $(function() {

        $(".finalizar").click(function() {
            var id = $(this).data("id");
            if (confirm("Voc� deseja finalizar o servi�o?")) {
                window.location = "/netcar/agendamento_finalizar?id=" + id;
            }
        });

    });

    $(function() {

        $(".excluir").click(function() {
            var id = $(this).data("id");
            if (confirm("Voc� deseja excluir o agendamento?")) {
                window.location = "/netcar/agendamento_excluir?id=" + id;
            }
        });

    });
</script>

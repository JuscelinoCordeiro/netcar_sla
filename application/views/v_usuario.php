<div id="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text text-center"><h2 class="titulo"><?= $titulo ?></h2></div>
    <div class="col-md-2"></div>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>NOME</th>
                <th>IDENTIDADE</th>
                <th>ENDEREÇO</th>
                <th>CELULAR</th>
                <th>TEL FIXO</th>
                <th>PERFIL</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <?php
        $i = 1;
        foreach ($usuarios->result() as $user) {
            ?>
            <tr>
                <td class="text text-center text-uppercase"><?= $i ?></td>
                <td class="text text-center text-uppercase"><?= $user->nome ?></td>
                <td class="text text-center text-uppercase"><?= $user->idt ?></td>
                <td class="text text-center text-uppercase"><?= $user->endereco ?></td>
                <td class="text text-center text-uppercase"><?= $user->celular ?></td>
                <td class="text text-center text-uppercase"><?= $user->fixo ?></td>
                <td class="text text-center text-uppercase"><?= $user->perfil ?></td>
                <td class="text text-center text-uppercase">
                    <a href="/netcar_sla/c_usuario/editarUsuario/<?= $user->cd_usuario ?>"><img src="<?= base_url('assets/img/b_edit.png') ?>" alt="editar" title="Editar" border="0"/></a>
                    <a class="excluir" data-nome="<?= $user->nome ?>" data-cd_usuario="<?= $user->cd_usuario ?>" href="javascript: void(0)"><img src="<?= base_url('assets/img/b_excluir.png') ?>" alt="excluir" title="Excluir" border="0"/></a>
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
                window.location = "/netcar_sla/c_usuario/excluirUsuario/<?= $user->cd_usuario ?>";
            }
        });

    });
</script>
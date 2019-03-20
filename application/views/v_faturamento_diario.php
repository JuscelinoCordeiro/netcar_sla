<div id="conteudo w-100">
    <h2 class="titulo">Faturamento do dia</h2>
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>DATA</th>
                <th>FATURAMENTO</th>
            </tr>
        </thead>
        <?php 
        foreach($faturamento_diario->result() as $fat_diario){
        ?>    
                <td>1</td>
                <td><?= date("d/m/Y") ?></td>
                <td class="text-center">R$ <?= ($fat_diario->faturamento_diario == null ? "0,00" : $fat_diario->faturamento_diario.",00") ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>
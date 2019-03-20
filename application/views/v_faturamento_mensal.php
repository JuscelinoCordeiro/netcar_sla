<div id="conteudo w-100">
    <h2 class="titulo">Faturamento - Últimos 30 dias</h2> 
    <table class="tabela table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>ORD</th>
                <th>Período</th>
                <th>FATURAMENTO</th>                
            </tr>
        </thead>
        <?php 
        foreach($faturamento_mensal->result() as $fat_mensal){
        ?>
            <tr>
                <td>1</td>
                <td title="Últimos 30 dias de faturamento">Ult. 30 dias</td>
                <td>R$ <?= ($fat_mensal->faturamento_mensal == null ? "0,00" : $fat_mensal->faturamento_mensal.",00") ?></td>            
            </tr>
        <?php
        }
        ?>
    </table>
</div>
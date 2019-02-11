<?php
	if (!defined('BASEPATH')) {
		exit('Acesso direto ao arquivo não autorizado, log gerado!');
	}
?>
<script type="text/javascript" language="JavaScript" src="http://127.0.0.1/exemplos-livro-ci/ibge/assets/js/inc/js_tela_inc.js"></script>
<link rel="stylesheet" href="http://127.0.0.1/exemplos-livro-ci/ibge/assets/css/bootstrap.css">

<div class="row" id="total">
	<!--	<h1>Tela Inicial</h1>-->
	<div class="col-md-3"></div>

	<div class="col-md-6" id="corpo">
		<h2 class="text-success">Municípios do <?= $estado ?></h2>
		<table class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>Ord</th>
				<th>Municipio</th>
				<th>Estado</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i = 1;
				foreach ($muniEstado->result() as $linha) {
					echo "<tr>
							<td>$i</td>
							<td>$linha->NM_MUNI</td>
							<td>$linha->NM_UF</td>
							</tr>";
					$i++;
				}
			?>
			</tbody>
		</table>
		<?php

			//			if (isset($muniEstado)) {
			//				echo '<pre>';
			//				print_r($muniEstado);
			//				echo '</pre>';
			//			}

		?>

	</div>
	<!--	div corpo-->

</div>
<!--div total-->


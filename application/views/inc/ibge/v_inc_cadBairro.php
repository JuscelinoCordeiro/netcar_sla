<?php
	if (!defined('BASEPATH')) {
		exit('Acesso direto ao arquivo não autorizado, log gerado!');
	}
?>
<script type="text/javascript" language="JavaScript"
		src="http://127.0.0.1/exemplos-livro-ci/ibge/assets/js/inc/js_tela_inc.js"></script>
<link rel="stylesheet" href="http://127.0.0.1/exemplos-livro-ci/ibge/assets/css/bootstrap.css">

<div class="row" id="total">
	<!--	<h1>Tela Inicial</h1>-->
	<div class="col-md-3"></div>

	<div class="col-md-6" id="corpo">
		<h3 class="text-center">Cadastrar bairro</h3>

		<!--	FORMULARIO PARA BUSCA DOS ESTADOS POR REGIAO	-->
		<form class="form-inline">
			<fieldset>
				<label>Selecione uma região:</label>
				<select id="selectRegiao" class="form-control" name="listaRegiao" required="true">
					<option value="">Selecione uma região</option>
					<option value="1">Norte</option>
					<option value="2">Nordeste</option>
					<option value="3">Sudeste</option>
					<option value="4">Sul</option>
					<option value="5">Centro Oeste</option>
				</select>
			</fieldset>
		</form>
		<br>
		<br>
		<!-- FORMULARIO PARA BUSCA DOS MUNICIPIOS POR ESTADO -->
		<form class="form-inline">
			<fieldset>
				<label>Selecione um estado:</label>
				<select id="selectEstado" class="form-control" name="listaEstado" required="true">
				</select>
			</fieldset>
		</form>
		<br>
		<br>
		<!-- FORMULARIO PARA BUSCA SELCIONAR UM MUNICIPIO -->
		<form class="form-inline">
			<fieldset>
				<label>Selecione um município:</label>
				<select id="selectMunicipio" class="form-control" name="listaMuni" required="true">
				</select>
			</fieldset>
		</form>
		<br>
		<br>
		<!-- FORMULARIO PARA INSERIR O MUNICIPIO A SER CADASTRADO -->
		<form class="form-inline">
			<fieldset>
				<label>Nome do bairro: </label>
				<input class="form-control" type="text" name="nBairro" id="iBairro" required="true">
			</fieldset>
		</form>
	</div>
	<!--	div corpo-->
	<div class="col-md-3"></div>
</div>
<script type="text/javascript" language="JavaScript">
    // function buscaEstRegiao(valor) {
    // 	alert(valor);
    // }
    $(document).ready(function () {
        //FUNÇÃO PARA PREENCHER O COMBO DOS ESTADOS
        $("#selectRegiao").change(function () {
            valor = $(this).val();
            // alert(valor);
            if (valor != "") {
                $.ajax({
                    type: 'POST',
                    url: 'c_inicio/getEstadosPorRegiao',
                    cache: false,
                    data: {
                        valor: valor
                    },
                    beforeSend: function (xhr) {
                        xhr.overrideMimeType("text/plain; charset=UTF-8");
                    },
                    complete: function () {
                    },
                    success: function (data) {

                        $("#selectEstado").html(data);
                    },
                    error: function () {
                        $("#erroTexto").html("erro");
                        $("#erro").modal('show');
                    }
                });
            }
            ;

        });

        //FUNÇÃO PARA PREENCHER O COMBO DOS MUNICIPIOS
        $("#selectEstado").change(function () {
            valor = $(this).val();
            // alert(valor);
            if (valor != "") {
                $.ajax({
                    type: 'POST',
                    url: 'c_inicio/getMunicipiosPorEstado',
                    cache: false,
                    data: {
                        valor: valor
                    },
                    beforeSend: function (xhr) {
                        xhr.overrideMimeType("text/plain; charset=UTF-8");
                    },
                    complete: function () {
                    },
                    success: function (data) {

                        $("#selectMunicipio").html(data);
                    },
                    error: function () {
                        $("#erroTexto").html("erro");
                        $("#erro").modal('show');
                    }
                });
            }
            ;

        });

        //FUNÇÃO PARA SALVAR OS DADOS E CADASTRAR O BAIRRO
        $("#salvarModal").click(function () {
            regiao = $("select[name=listaRegiao]").val();
            estado = $("select[name=listaEstado]").val();
            municipio = $("select[name=listaMuni]").val();
            bairro = $("input[name=nBairro]").val();

            // if (regiao != "" && estado != "" && municipio != "" && bairro != "") {
            // alert(regiao + ' - ' + estado + ' - ' + municipio + ' - ' + bairro);
                $.ajax({
                    type: 'POST',
                    url: 'c_inicio/cadastrarBairro',
                    cache: false,
                    data: {
                        idRegiao: regiao,
                        idEstado: estado,
                        idMunicipio: municipio,
                        bairro: bairro,
						cadastrar: true
                    },
                    beforeSend: function (xhr) {
                        xhr.overrideMimeType("text/plain; charset=UTF-8");
                    },
                    complete: function () {
                    },
                    success: function (data) {
						$("#modal").modal('');
                        $("#visualizarTexto").html("<h2>Bairro Cadastrado com Sucesso.</h2>");
                        $("#visualizar").modal('show');
                    },
                    error: function () {
                        $("#erroTexto").html("erro");
                        $("#erro").modal('show');
                    }
                });
            // };

        });

    });
</script>
<!--div total-->


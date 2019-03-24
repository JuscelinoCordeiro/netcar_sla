<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>"/>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="titulo">Pesquisar Usuário</h2>
        <!--<a class="btn btn-success pull-right" href="/netcar/index.jsp"><i class="icon-arrow-left icon-white"></i>Voltar</a>-->
        <form id="form_cad_usuario" action="" method="post">
            <legend class="text-black hr3">Dados para pesquisa</legend>
            <div class="form-group">
                <label class="control-label">Nome</label>
                <input class="form-control" type="text" name="nome" required />
            </div>
            <div class="form-group">
                <label class="control-label">Identidade</label>
                <input class="form-control" type="text" name="idt" required />
            </div>
            <input type="hidden" name="acao" value="pesquisar"/>
            <!--<input type="submit" value="Cadastrar" class="btn btn-success pull-right"/>-->
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<script>
    $(document).ready(function() {
        $("#salvarModal").click(function(e) {
            nome = $("input[name=nome]").val();
            idt = $("input[name=idt]").val();
            endereco = $("input[name=endereco]").val();
            celular = $("input[name=celular]").val();
            fixo = $("input[name=fixo]").val();
            nivel = $("select[name=nivel]").val();
            acao = $("input[name=acao]").val();
//            alert(nome);

            $.ajax({
                type: 'POST',
                url: '/netcar/c_usuario/cadastrarUsuario',
                cache: false,
                data: {
                    nome: nome,
                    idt: idt,
                    endereco: endereco,
                    celular: celular,
                    fixo: fixo,
                    nivel: nivel,
                    acao: acao
                },
                beforeSend: function(xhr) {
                    xhr.overrideMimeType("text/plain; charset=UTF-8");
                },
                complete: function() {
                },
                success: function(data) {
                    $("#visualizarTexto").html(data);
                    $("#modal").modal('show');
                    $('#sucessoTexto').text("Sucesso ao adicionar usuário.");
                    $('#sucesso').modal('show');
                    $().ready(function() {
                        setTimeout(function() {
                            $('#sucesso').modal('hide');
                        }, 2000);
                    });
//                    $("#visualizarTexto").modal('hide');
//                    location.reload();
                },
                error: function() {
                    $("#erroTexto").html("Erro ao cadastrar, tente novamente.");
                    $("#erro").modal('show');
                    $().ready(function() {
                        setTimeout(function() {
                            $('#erro').modal('hide');
                        }, 2000);
                    });
                }
            });
            e.preventDefault();
        });
    });
</script>
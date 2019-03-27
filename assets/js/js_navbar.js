$(document).ready(function() {
//CADASTRAR agendamento
    $("#minha_conta").click(function(e) {
        cd_usuario = $("#minha_conta").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_usuario/contaUsuario',
            cache: false,
            data: {
                cd_usuario: cd_usuario
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });


    //CADASTRAR agendamento
    $("#cad_agenda").click(function(e) {
        valor = $("#cad_agenda").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_agendamento/cadastrarAgendamento',
            cache: false,
            data: {
                valor: valor
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });

    //CADASTRAR USUÁRIO
    $("#cad_usuario").click(function(e) {
        valor = $("#cad_usuario").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_usuario/cadastrarUsuario',
            cache: false,
            data: {
                valor: valor
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });


    //CADASTRAR SERVIÇO
    $("#cad_serv").click(function(e) {
        valor = $("#cad_serv").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_servico/cadastrarServico',
            cache: false,
            data: {
                valor: valor
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });


    //BUSCAR AGENDAMENTO
    $("#btnBuscaAgenda").click(function(e) {
        valor = $("#btnBuscaAgenda").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_agendamento/listarAgendamentos',
            cache: false,
            data: {
                valor: valor
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });

    //BUSCAR FATURAMENTO
    $("#btnBuscaFatura").click(function(e) {
        valor = $("#btnBuscaFatura").data("sort");
        $.ajax({
            type: 'POST',
            url: '/netcar/c_faturamento/listarFaturamentoPeriodo',
            cache: false,
            data: {
                valor: valor
            },
            beforeSend: function(xhr) {
                xhr.overrideMimeType("text/plain; charset=UTF-8");
            },
            complete: function() {
            },
            success: function(data) {
                $("#modalTexto").html(data);
                $("#modal").modal('show');
            },
            error: function() {
                $("#erroTexto").html("erro");
                $("#erro").modal('show');
            }
        });
        e.preventDefault();
    });


});
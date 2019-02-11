<div class="row" id="total">
    <!--	<h1>Tela Inicial</h1>-->
    <div class="col-md-4"></div>

    <div class="col-md-4" id="corpo">
        <h1>Bem vindo</h1>
        <?php print_r($_SESSION['dados_usuario']); ?>
        <br><br>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
            seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>

    </div>
    <!--	div corpo-->
    <div class="col-md-4"></div>

</div><!--div total-->



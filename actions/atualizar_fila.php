<?php
    include_once("../init/init_user.php");
?>
<!-- Exibição da ordem das salas -->
<div id="fila" class="col s12 black">
	<div class="col s12 white-text">
		<h4>Lista de Salas:</h4>
	</div>
	<div class="lista">
		<?php

			$first = $usuario->exibir_fila();

		?>
	</div>
</div>
<!-- Fim da Exibição da ordem das salas -->

<!-- Sala atual -->
<div id="sala_atual" class="col s12 center-align white-text">
	<p>A sala atual é: </p>
	<h1><?php echo $first->nr_posicao.'º - '.$first->nm_sala; ?></h1>
</div>
<!-- Fim da Exbição da Sala atual -->

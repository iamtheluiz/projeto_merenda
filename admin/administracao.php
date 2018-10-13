<?php
	include_once("../init/init.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('../components/essenciais_head.php'); ?>
		<title>Lista de Salas</title>

		<!-- Estilo Personalizado -->
		<style type="text/css">
			html{
				background-color: #0A1C27;
			}
			.black{
				background-color: #0A1C27 !important;
			}
			.item_sala{
				float:left;
				color:white;
				padding:10px;
			}
			#sala_atual p{
				font-size: 18pt;
			}
			.controles i{
				font-size:7rem;
			}
			.controles a{
				height: 150px !important;
				line-height: 150px;
				text-align: center;
			}
			input[type="color"]{
				border:none;
				background-color: transparent;
				height: 50px;
			}
			.datepicker-modal{
				z-index: 50000 !important;
			}
		</style>
	</head>
	<body>

		<!-- Modal do cadastro de turnos -->
		<div id="cadastro_turno" class="modal modal-fixed-footer">
			<div class="modal-content row">
				<h4>Cadastro de Turno</h4>
				<p>Aqui você pode cadastrar um turno de ensino da sua escola!</p>
				<form action="actions/cadastrar_turno.php" method="post">
					<div class="input-field col s12">
						<i class="material-icons prefix">edit</i>
						<input type="text" name="nm_turno" id="nm_turno">
						<label for="nm_turno">Nome do Turno</label>
					</div>
					<div class="input-field col s12 center-align">
						<button type="submit" class="btn col s12 l6 offset-l3">Enviar&nbsp;<i class="material-icons">send</i></button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<!-- Fim do Modal do cadastro de turnos -->

		<!-- Modal do cadastro de salas -->
		<div id="cadastro_sala" class="modal modal-fixed-footer">
			<div class="modal-content row">
				<h4>Cadastro de sala</h4>
				<p>Aqui você pode cadastrar as salas da sua escola!</p>
				<form action="actions/cadastrar_sala.php" method="post">
					<div class="input-field col s12">
						<i class="material-icons prefix">edit</i>
						<input type="text" name="nm_sala" id="nm_sala">
						<label for="nm_sala">Nome da Sala</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">color_lens</i>
						<input type="color" class="browser-default" name="tx_cor" id="tx_cor">
						<label for="tx_cor" class="active">Cor da Sala</label>
					</div>
					<div class="input-field col s12">
						<select name="id_turno">
							<option value="" disabled selected>Selecione um turno</option>
							<?php

								$turnos = $admin->exibir_turnos();

								foreach ($turnos as $turno) {
									?>
										<option value="<?php echo $turno['cd_turno']; ?>"><?php echo $turno['nm_turno']; ?></option>
									<?php
								}

							?>
						</select>
						<label>Turno</label>
					</div>
					<div class="input-field col s12 center-align">
						<button type="submit" class="btn col s12 l6 offset-l3">Enviar&nbsp;<i class="material-icons">send</i></button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<!-- Fim do Modal do cadastro de salas -->

		<!-- Modal do cadastro de listas -->
		<div id="cadastro_lista" class="modal modal-fixed-footer">
			<div class="modal-content row">
				<h4>Cadastro de Lista</h4>
				<p>Aqui você pode cadastrar as listas que contém a ordem das filas de sua escola!</p>
				<form action="actions/cadastrar_lista.php" method="post">
					<div class="input-field col s12">
						<i class="material-icons prefix">edit</i>
						<input type="date" name="dt_lista" id="dt_lista">
						<label for="dt_lista">Data da Lista</label>
					</div>
					<div class="input-field col s12">
						<select name="id_turno">
							<option value="" disabled selected>Selecione um turno</option>
							<?php

								$turnos = $admin->exibir_turnos();

								foreach ($turnos as $turno) {
									?>
										<option value="<?php echo $turno['cd_turno']; ?>"><?php echo $turno['nm_turno']; ?></option>
									<?php
								}

							?>
						</select>
						<label>Turno</label>
					</div>
					<div class="input-field col s12 center-align">
						<button type="submit" class="btn col s12 l6 offset-l3">Enviar&nbsp;<i class="material-icons">send</i></button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<!-- Fim do Modal do cadastro de lista -->

		<!-- Conteúdo da Página -->
		<div class="content row">

			<!-- Exibição da ordem das salas -->
			<div id="fila" class="col s12 black">
				<div class="col s12 white-text">
					<h4>Lista de Salas:</h4>
				</div>
				<div class="lista">
					<?php

						$salas = $admin->exibir_salas();

						foreach ($salas as $sala) {
							?>
							<div class="item_sala" style="background-color: <?php echo $sala['tx_cor']; ?>;">
								<?php echo $sala['nm_sala']; ?>
							</div>
							<?php
						}

					?>
				</div>
			</div>
			<!-- Fim da Exibição da ordem das salas -->

			<!-- CRUD dos turnos -->
			<div id="crud_turnos" class="card col l6 m6 s12 black white-text">
				<div class="card-content">
					<!-- Titulo do Cartão -->
					<span class="card-title white-text left" style="font-weight: bolder;">Turnos da Escola</span>
					<a class="waves-effect waves-light btn-floating right red modal-trigger" href="#cadastro_turno">
						<i class="material-icons right">add</i>
					</a>
					<!-- Fim do Titulo do Cartão -->

					<!-- Tabela com os turnos -->
					<table class="white-text">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome do Turno</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$turnos = $admin->exibir_turnos();

								foreach ($turnos as $turno) {
									?>
										<tr>
											<td><?php echo $turno['cd_turno']; ?></td>
											<td><?php echo $turno['nm_turno']; ?></td>
										</tr>
									<?php
								}

							?>
						</tbody>
					</table>
					<!-- Fim da Tabela com os turnos -->
				</div>
			</div>
			<!-- Fim do CRUD dos listas -->

			<!-- CRUD das listas -->
			<div id="crud_listas" class="card col l6 m6 s12 black white-text">
				<div class="card-content">
					<!-- Titulo do Cartão -->
					<span class="card-title white-text left" style="font-weight: bolder;">Listas de Merenda</span>
					<a class="waves-effect waves-light btn-floating right red modal-trigger" href="#cadastro_lista">
						<i class="material-icons right">add</i>
					</a>
					<!-- Fim do Titulo do Cartão -->

					<!-- Tabela com os listas -->
					<table class="white-text">
						<thead>
							<tr>
								<th>Código</th>
								<th>Dia da Lista</th>
								<th>Turno</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$listas = $admin->exibir_listas();

								foreach ($listas as $lista) {
									?>
										<tr>
											<td><?php echo $lista['cd_lista']; ?></td>
											<td><?php echo $lista['dt_lista']; ?></td>
											<td><?php echo $lista['nm_turno']; ?></td>
											<td><a class="btn-floating" href="editar_lista.php?cd_lista=<?php echo $lista['cd_lista']; ?>"><i class="material-icons">edit</i></a></td>
										</tr>
									<?php
								}

							?>
						</tbody>
					</table>
					<!-- Fim da Tabela com os listas -->
				</div>
			</div>
			<!-- Fim do CRUD dos listas -->

			<!-- CRUD das salas -->
			<div id="crud_salas" class="card col l6 m6 s12 black white-text">
				<div class="card-content">
					<!-- Titulo do Cartão -->
					<span class="card-title white-text left" style="font-weight: bolder;">Salas da Escola</span>
					<a class="waves-effect waves-light btn-floating right red modal-trigger" href="#cadastro_sala">
						<i class="material-icons right">add</i>
					</a>
					<!-- Fim do Titulo do Cartão -->

					<!-- Tabela com as salas -->
					<table class="white-text">
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Cor</th>
								<th>Turno</th>
							</tr>
						</thead>
						<tbody>
							<?php

								$salas = $admin->exibir_salas();

								foreach ($salas as $sala) {
									?>
										<tr style="background-color: <?php echo $sala['tx_cor']; ?>;">
											<td><?php echo $sala['cd_sala']; ?></td>
											<td><?php echo $sala['nm_sala']; ?></td>
											<td><?php echo $sala['tx_cor']; ?></td>
											<td><?php echo $sala['nm_turno']; ?></td>
										</tr>
									<?php
								}

							?>
						</tbody>
					</table>
					<!-- Fim da Tabela com as salas -->
				</div>
			</div>
			<!-- Fim do CRUD das salas -->

			<!-- Link para a página de cadastros -->
			<div class="col s12 center-align" style="margin-top:100px;">
				<a href="index.php">Página Principal</a>
			</div>

		</div>
		<!-- Fim do Conteúdo da Página -->

		<!--Scripts-->
		<?php include('../components/essenciais_scripts.php'); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$('select').formSelect();
				$('.datepicker').datepicker();''
			});
		</script>
	</body>
</html>
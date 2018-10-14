<?php
	include_once("../init/init.php");

  //Verifica se o código da lista é válido
  if(isset($_GET['cd_lista']) and !empty($_GET['cd_lista'])){
    $cd_lista = $_GET['cd_lista'];
    $lista = $admin->exibir_listas($cd_lista);

    if(empty($lista)){
      $admin->redirect("administracao.php");
    }
  }else{
    $admin->redirect("administracao.php");
  }
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
		</style>
	</head>
	<body>

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

			<!-- CRUD das listas -->
			<div id="crud_listas" class="card col s12 black white-text">
				<div class="card-content">
					<!-- Titulo do Cartão -->
					<span class="card-title white-text left" style="font-weight: bolder;">Ordem das Salas: <?php echo $lista[0]['dt_lista'].' - '.$lista[0]['nm_turno']; ?></span>
					<!-- Fim do Titulo do Cartão -->

					<!-- Tabela com as listas -->
					<div class="col s12" id="salas">
            <?php

  						$salas = $admin->exibir_salas($lista[0]['nm_turno']);
              $c = 0;
              $cds = '';

  						foreach ($salas as $sala) {
                $c++;
                if($c == 1){
                  $cds = $sala['cd_sala'];
                }else{
                  $cds .= ','.$sala['cd_sala'];
                }
  							?>
  							<div cd_sala="<?php echo $sala['cd_sala']; ?>" class="drag_sala col s12" style="background-color: <?php echo $sala['tx_cor']; ?>; padding:10px;">
  								<?php echo $sala['nm_sala']; ?>
  							</div>
  							<?php
  						}

  					?>
          </div>
					<!-- Fim da Tabela com as listas -->

          <!-- Formulário que envia as posições -->
          <form action="actions/guardar_posicao.php" method="post">
            <input id="cds" type="hidden" name="cds" value="<?php echo $cds; ?>">
            <input id="lista" type="hidden" name="cd_lista" value="<?php echo $cd_lista; ?>">
            <div class="col s12">
              <button type="submit" class="btn col s12 l6 offset-l3">Enviar <i class='material-icons'>send</i></button>
            </div>
          </form>
				</div>
			</div>
			<!-- Fim do CRUD dos listas -->

			<!-- Link para a página de cadastros -->
			<div class="col s12 center-align" style="margin-top:100px;">
				<a href="index.php">Página de Administração</a>
			</div>

		</div>
		<!-- Fim do Conteúdo da Página -->

		<!--Scripts-->
		<?php include('../components/essenciais_scripts.php'); ?>
    <!-- Documentação do sortable -->
    <!-- https://github.com/RubaXa/Sortable -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.6.1/Sortable.min.js"></script>
    <script type="text/javascript">
      function atualizar_input(){
        //Zera o array
        var cds = document.getElementById("cds");
        cds.value = '';
        var ordem = '';

        //Verifica a nova ordem das salas
        $(".drag_sala").each(function(){
          if(ordem == ''){
            ordem = $(this).attr('cd_sala');
          }else{
            ordem += ','+$(this).attr('cd_sala');
          }
        });

        cds.value = ordem;
      }

      var el = document.getElementById('salas');
      var sortable = Sortable.create(el, {
        onEnd: function (/**Event*/evt) {
      		var itemEl = evt.item;  // dragged HTMLElement
      		// console.log(evt.oldIndex);  // previous list
      		// console.log(evt.newIndex);    // target list
          atualizar_input();
      	}
      });
    </script>
	</body>
</html>

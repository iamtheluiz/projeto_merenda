<?php
    include_once("init/init_user.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('components/essenciais_head.php'); ?>
        <title>Lista de Salas</title>
		<link rel="manifest" href="manifest.json">

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
            #sala_atual{
                margin-top:calc((100vh - 100px - 311px) / 2);
            }
            #sala_atual p{
                font-size: 18pt;
            }
        </style>
    </head>
    <body>

        <!-- Conteúdo da Página -->
        <div id="conteudo" class="content row">

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

        </div>
        <!-- Fim do Conteúdo da Página -->

        <!--Scripts-->
        <?php include('components/essenciais_scripts.php'); ?>
		<!-- Scripts Personalizados -->
		<script type="text/javascript">
			function enviar_form(isto){
				if(isto == null){
					isto = $('#form_chat');
				}
				event.preventDefault();
				var formDados = new FormData($(isto)[0]);

				$.ajax({
					url:'actions/msg_privado.php',
					type:'POST',
					data:formDados,
					cache:false,
					contentType:false,
					processData:false,
					success:function (data)
					{
						$("#form_chat").trigger("reset");
						$("#tx_chat").html('');
					},
					dataType:'html'
				});
				return false;
			}

			function atualizar_fila() {

				jQuery.ajax({
					url: "actions/atualizar_fila.php",
					dataType: "html",

					success: function(response){
						jQuery("#conteudo").html(response);
						//console.log(1);
					},
					// quando houver erro
					error: function(){
						//alert("Ocorreu um erro durante a requisição");
					}
				});

			}

			setInterval(atualizar_fila,2000);
		</script>
    </body>
</html>

<?php
    include_once("../init/init.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../components/essenciais_head.php'); ?>
        <title>Lista de Salas</title>
		<link rel="manifest" href="manifest_admin.json">

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

                        $first = $admin->exibir_fila();

                    ?>
                </div>
            </div>
            <!-- Fim da Exibição da ordem das salas -->

            <!-- Sala atual -->
            <div id="sala_atual" class="col s12 center-align white-text">
                <p>A sala atual é: </p>
                <h1><?php echo $first->nr_posicao.'º - '.$first->nm_sala; ?></h1>
            </div>
            <div class="controles col s12">
                <div class="col s4 offset-s2">
                    <a id="voltar_sala" href="#" class="btn waves-effect waves-light col s12"><i class="material-icons">arrow_back</i></a>
                </div>
                <div class="col s4">
                    <a id="passar_sala" href="#" class="btn waves-effect waves-light col s12"><i class="material-icons">arrow_forward</i></a>
                </div>
            </div>
            <!-- Fim da Exbição da Sala atual -->

            <!-- Link para a página de cadastros -->
            <div class="col s12 center-align" style="margin-top:100px;">
                <a href="administracao.php">Página de Administração</a>
            </div>

        </div>
        <!-- Fim do Conteúdo da Página -->

        <!--Scripts-->
        <?php include('../components/essenciais_scripts.php'); ?>
		<script type="text/javascript">
			$("#voltar_sala").on('click',function(){
				//Volta a sala
				window.location = "actions/controlar_fila.php?tp=voltar&cd_lista=<?php echo $first->id_lista; ?>";
			});
			$("#passar_sala").on('click',function(){
				//passa a sala
				window.location = "actions/controlar_fila.php?tp=passar&cd_lista=<?php echo $first->id_lista; ?>";
			});
		</script>
    </body>
</html>

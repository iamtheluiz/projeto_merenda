<?php
    include_once("init/init_user.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('components/essenciais_head.php'); ?>
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
        <div class="content row">

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
    </body>
</html>

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

            <!-- Sala atual -->
            <div id="sala_atual" class="col s12 center-align white-text">
                <p>A sala atual é: </p>
                <h1>2MIN1</h1>
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
    </body>
</html>
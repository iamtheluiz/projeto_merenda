<?php

    $pathFile = $_SERVER['DOCUMENT_ROOT'].'/class/Utilitarios.php' ;
    include($pathFile);

    class Sys extends Utilitarios{
        /* Atributos */


        /* Métodos */
        public function __construct(){
            $this->db_connect(2); //Se for 1 - Mysqli //Se for 2 - PDO
        }

        /* Métodos Especiais */



    }
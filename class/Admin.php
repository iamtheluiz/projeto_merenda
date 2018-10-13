<?php

    $pathFile = $_SERVER['DOCUMENT_ROOT'].'/class/Usuario.php' ;
    include($pathFile);

    class Admin extends Usuario{
        /* Atributos */


        /* Métodos */
        public function __construct(){
            $this->db_connect();
        }
        public function cadastrar_turno($nm_turno){
            $sql = "INSERT into tb_turno values (null,'$nm_turno')";

            //Efetua o cadastro
            if($this->pdo->query($sql)){
                //Caso envie
                $this->redirect("../administracao.php");
            }else{
                $this->redirect("../administracao.php");
            }
        }
        public function cadastrar_sala($nm_sala,$tx_cor,$id_turno){
            $sql = "INSERT into tb_sala values (null,'$nm_sala','$tx_cor','$id_turno')";

            //Efetua o cadastro
            if($this->pdo->query($sql)){
                //Caso envie
                $this->redirect("../administracao.php");
            }else{
                $this->redirect("../administracao.php");
            }
        }
        public function cadastrar_lista($dt_lista,$id_turno){

            $sql = "INSERT into tb_lista values (null,'$dt_lista','$id_turno')";

            //Efetua o cadastro
            if($this->pdo->query($sql)){
                //Caso envie
                $this->redirect("../administracao.php");
            }else{
                $this->redirect("../administracao.php");
            }
        }

        /* Métodos Especiais */



    }
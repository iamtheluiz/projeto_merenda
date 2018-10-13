<?php

    $pathFile = $_SERVER['DOCUMENT_ROOT'].'/class/Utilitarios.php' ;
    include($pathFile);

    class Usuario extends Utilitarios{
        /* Atributos */


        /* Métodos */
        public function __construct(){
            $this->db_connect();
        }
        public function exibir_turnos(){
            //Consulta todos os turnos
            $sql = "SELECT * from tb_turno";
            $query = $this->pdo->query($sql);

            //Define um array de retorno
            $turnos = [];
            $c = 0;
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                $turnos[$c] = [];
                $turnos[$c]['cd_turno'] = $row->cd_turno;
                $turnos[$c]['nm_turno'] = $row->nm_turno;

                $c++;
            }

            //Retorna os dados
            return $turnos;
        }
        public function exibir_salas(){
            //Consulta todos os turnos
            $sql = "SELECT * from tb_sala join tb_turno on id_turno = cd_turno";
            $query = $this->pdo->query($sql);

            //Define um array de retorno
            $turnos = [];
            $c = 0;
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                $turnos[$c] = [];
                $turnos[$c]['cd_sala'] = $row->cd_sala;
                $turnos[$c]['nm_sala'] = $row->nm_sala;
                $turnos[$c]['tx_cor'] = $row->tx_cor;
                $turnos[$c]['nm_turno'] = $row->nm_turno;

                $c++;
            }

            //Retorna os dados
            return $turnos;
        }

        /* Métodos Especiais */



    }
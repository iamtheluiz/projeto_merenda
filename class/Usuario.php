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
        public function exibir_salas($turno=''){
            //Consulta todas as salas
            if($turno != ''){
              $sql = "SELECT * from tb_sala join tb_turno on id_turno = cd_turno where nm_turno = '$turno'";
            }else{
              $sql = "SELECT * from tb_sala join tb_turno on id_turno = cd_turno";
            }
            $query = $this->pdo->query($sql);

            //Define um array de retorno
            $salas = [];
            $c = 0;
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                $salas[$c] = [];
                $salas[$c]['cd_sala'] = $row->cd_sala;
                $salas[$c]['nm_sala'] = $row->nm_sala;
                $salas[$c]['tx_cor'] = $row->tx_cor;
                $salas[$c]['nm_turno'] = $row->nm_turno;

                $c++;
            }

            //Retorna os dados
            return $salas;
        }
        public function exibir_listas($tp = '',$valor = ''){
            //Consulta todas as listas
			$sql = "SELECT * from tb_lista join tb_turno on id_turno = cd_turno ";
			if($tp == 'cd'){
				if($valor != ''){
	              $sql .= "where cd_lista = $valor";
	            }
			}else if($tp == 'dt'){
				if($valor != ''){
	              $sql .= "where dt_lista = $valor";
	            }
			}

            $query = $this->pdo->query($sql);

            //Define um array de retorno
            $listas = [];
            $c = 0;
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                $listas[$c] = [];
                $listas[$c]['cd_lista'] = $row->cd_lista;
                $listas[$c]['dt_lista'] = $row->dt_lista;
                $listas[$c]['nm_turno'] = $row->nm_turno;

                $c++;
            }

            //Retorna os dados
            return $listas;
        }
		public function exibir_fila(){
			date_default_timezone_set('America/Sao_Paulo');
			$sql = "SELECT * from tb_lista where dt_lista = '".date('Y-m-d')."'";
			$query = $this->getPdo()->query($sql);

			if($query->rowCount() > 0){
				$row = $query->fetch(PDO::FETCH_OBJ);

				$sql_v = "SELECT * from tb_sala_lista join tb_sala on id_sala = cd_sala where id_lista = $row->cd_lista and st_sala = 'esperando' order by nr_posicao";
				$query_v = $this->getPdo()->query($sql_v);
				$c = 0;

				while($row_v = $query_v->fetch(PDO::FETCH_OBJ)){
					if($c == 0){
						$retorno = $row_v;
						$c++;
					}
					?>
					<div class="item_sala" style="background-color: <?php echo $row_v->tx_cor; ?>;">
						<?php echo $row_v->nm_sala; ?>
					</div>
					<?php
				}

				return $retorno;	//Retorna a primeira sala

			}
		}

        /* Métodos Especiais */



    }

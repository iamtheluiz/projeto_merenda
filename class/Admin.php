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
        public function guardar_posicao($cd_lista,$ordem){

			$ordem = explode(',',$ordem);
			$c = 0;	//Posição da sala

			foreach ($ordem as $sala) {
				$c++;

				//Verifica se a sala já está cadastrada na lista
				$sql_v = "SELECT * from tb_sala_lista where id_lista = $cd_lista and id_sala = $sala";
				$query_v = $this->pdo->prepare($sql_v);
				$query_v->execute();

				if($query_v->rowCount() > 0){
					//Já tem cadastro
					$row_v = $query_v->fetch(PDO::FETCH_OBJ);

					//Faz um update
					$sql_u = "UPDATE tb_sala_lista set nr_posicao = $c, st_sala = 'esperando' where cd_sala_lista = $row_v->cd_sala_lista";
					if($this->pdo->query($sql_u)){
						//Sucesso
		            }else{
		                $this->alert("Ocorreu um erro!");
		            }
				}else{
					//Faz o cadastro
					$sql_i = "INSERT into tb_sala_lista values (null,'$sala','$cd_lista','$c',DEFAULT)";
					if($this->pdo->query($sql_i)){
						//Sucesso
		            }else{
		                $this->alert("Ocorreu um erro!");
		            }
				}

			}

			$this->redirect("../administracao.php");

        }

        /* Métodos Especiais */



    }

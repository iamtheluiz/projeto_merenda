<?php 
/*  Copyright (c) 2018 Luiz Gustavo da Silva Vasconcellos

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
 */

/*
    Essa classe possui diversos métodos utilitarios para os sistemas PHP
*/

abstract class Utilitarios{
    /* Atributos */
    private $host = "localhost";		//Servidor do banco
    private $usuario = "root";			//Nome de usuario do banco
    private $senha = "usbw";			//Senha do usuario do banco
    private $banco = "db_merenda";		//Nome do banco
    protected $pdo;						//Conexão com o banco

    /* Métodos */

    //Conexão com banco
    public function db_connect(){
		$this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->banco.';charset=utf8;port=3307',$this->usuario,$this->senha);
    }

    //Função de login - EDITAR
    public function login($login, $pass){
		$pass_e = $this->encriptar_senha($pass);

		$pdo = $this->getPdo();
		$sql = "SELECT * from tb_login where nm_login = '$login' and nm_pass = '$pass_e'";
		$query = $pdo->prepare($sql);
		$query->execute();

		if($query->rowCount() > 0){
			session_start();

			$row = $query->fetch(PDO::FETCH_ASSOC);

			$_SESSION['logged_in'] = true;
			$_SESSION['login'] = $login;

			$this->redirect('Seu login foi efetuado com sucesso','../home.php');
		}else{
			$this->redirect('Seu login não pôde ser efetuado!','../index.php');
		}
	}

	//Função de logout
    public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Logout efetuado com sucesso!','../index.php');
	}

    //Redireciona junto de uma mensagem (JS)
	public function redirect($pag){
		echo "<script>";
		echo "window.location = '".$pag."';";
		echo "</script>";
	}

    //Voltar para página anterior
	public function history_back($alert){
		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.history.back();";
		echo "</script>";
	}

    //Exibe um alerto do JS
	public function alert($alert){
		echo "<script>";
		echo "alert('".$alert."');";
		echo "</script>";
	}

	//Encripta uma string
	private function encriptar_senha($pass){
		$encript = hash('sha256',$pass);

		return $encript;
	}

	//Validar se usuário fez login
	public function validar_login(){
		if($_SESSION['logged_in'] == true){

		}else{
			$this->redirect('Você precisa fazer login para acessar essa Página!','../index.php');
		}
	}

	//Formatar data do DATE materialize css
	public function formatar_data_materialize($data){
		$data_php = explode(',', $data);
		$data_php = $data_php[0].$data_php[1];
		$data_php = explode(' ',$data_php);

		$dia = $data_php[1];
		$mes = $data_php[0];
		$ano = $data_php[2];

		if($mes == 'Jan'){
			$mes = '01';
		}else if($mes == 'Fev'){
			$mes = '02';
		}else if($mes == 'Mar'){
			$mes = '03';
		}else if($mes == 'Abr'){
			$mes = '04';
		}else if($mes == 'Mai'){
			$mes = '05';
		}else if($mes == 'Jun'){
			$mes = '06';
		}else if($mes == 'Jul'){
			$mes = '07';
		}else if($mes == 'Ago'){
			$mes = '08';
		}else if($mes == 'Set'){
			$mes = '09';
		}else if($mes == 'Out'){
			$mes = '10';
		}else if($mes == 'Nov'){
			$mes = '11';
		}else if($mes == 'Dez'){
			$mes = '12';
		}

		$data_final = $ano.'-'.$mes.'-'.$dia;

		return $data_final;
	}

	//Formatar para materialize
	function formatar_para_materialize($dt_termino){
		$dt = explode('-',$dt_termino);
        $ano = $dt[0];
        $mes = $dt[1];
        $dia = $dt[2];

        if($mes == '01'){
            $mes = 'Jan';
        }else if($mes == '02'){
            $mes = 'Fev';
        }else if($mes == '03'){
            $mes = 'Mar';
        }else if($mes == '04'){
            $mes = 'Abr';
        }else if($mes == '05'){
            $mes = 'Mai';
        }else if($mes == '06'){
            $mes = 'Jun';
        }else if($mes == '07'){
            $mes = 'Jul';
        }else if($mes == '08'){
            $mes = 'Ago';
        }else if($mes == '09'){
            $mes = 'Set';
        }else if($mes == '10'){
            $mes = 'Out';
        }else if($mes == '11'){
            $mes = 'Nov';
        }else if($mes == '12'){
            $mes = 'Dez';
        }

        return $dt_fim_final = $mes.' '.$dia.', '.$ano;
	}

	//Formata a data dd/mm/yyyy para yyyy-mm-dd
	function formatar_data_para_banco($dt,$ex){
		$dt = explode($ex,$dt);

		$dt_final = $dt[2].'-'.$dt[1].'-'.$dt[0];
		
		return $dt_final;
	}

	/* Métodos Especiais */
	public function getPdo(){
		return $this->pdo;
	}
	public function getMysqli(){
		return $this->mysqli;
	}
}
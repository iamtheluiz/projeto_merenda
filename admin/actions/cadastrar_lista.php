<?php 

	include_once("../../init/init.php");

	if(isset($_POST['dt_lista']) and !empty($_POST['dt_lista']) and isset($_POST['id_turno']) and !empty($_POST['id_turno'])){

		$dt_lista = $_POST['dt_lista'];
		$id_turno = $_POST['id_turno'];
		$admin->cadastrar_lista($dt_lista,$id_turno);

	}else{
		$admin->redirect("../administracao.php");
	}
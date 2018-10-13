<?php 

	include_once("../../init/init.php");

	if(isset($_POST['nm_sala']) and !empty($_POST['nm_sala']) and isset($_POST['tx_cor']) and !empty($_POST['tx_cor']) and isset($_POST['id_turno']) and !empty($_POST['id_turno'])){

		$nm_sala = $_POST['nm_sala'];
		$tx_cor = $_POST['tx_cor'];
		$id_turno = $_POST['id_turno'];

		$admin->cadastrar_sala($nm_sala,$tx_cor,$id_turno);

	}else{
		$admin->redirect("../administracao.php");
	}
<?php 

	include_once("../../init/init.php");

	if(isset($_POST['nm_turno']) and !empty($_POST['nm_turno'])){

		$nm_turno = $_POST['nm_turno'];
		$admin->cadastrar_turno($nm_turno);

	}else{
		$admin->redirect("../administracao.php");
	}
<?php

	include_once("../../init/init.php");

	if(isset($_POST['cd_lista']) and !empty($_POST['cd_lista']) and isset($_POST['cds']) and !empty($_POST['cds'])){

		$cd_lista = $_POST['cd_lista'];
		$cds = $_POST['cds'];

		$admin->guardar_posicao($cd_lista,$cds);

	}else{
		$admin->redirect("../administracao.php");
	}

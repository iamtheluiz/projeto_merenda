<?php

	include_once('../../init/init.php');

	if(isset($_GET['tp']) and isset($_GET['cd_lista']) and !empty($_GET['tp']) and !empty($_GET['cd_lista'])){

		$tp = $_GET['tp'];
		$cd_lista = $_GET['cd_lista'];

		if($tp == 'passar'){
			$admin->passar_sala($cd_lista);
		}else if($tp == 'voltar'){
			$admin->voltar_sala($cd_lista);
		}

	}else{
		$admin->redirect("../index.php");
	}

<?php

    session_start();

    $pathFile = $_SERVER['DOCUMENT_ROOT'].'/class/Sys.php' ; //Include da classe principal, altere conforme necessário

    include($pathFile);

    $sys = new Sys;
    $sys->validar_login();
    $pdo = $sys->getPdo(); //Pode usar mysqli também, só mudar getMysqli()
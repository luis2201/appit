<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Login.php";
include_once "models/Dashboard.php";
include_once "models/Validar.php";
include_once "models/Periodo.php";
include_once "models/Listainscritos.php";
include_once "models/Estudiantes.php";
include_once "models/Examenubicacion.php";
include_once "models/Registrocalificacion.php";
include_once "models/Examensuficiencia.php";
include_once "models/Certificadosuficiencia.php";

$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['idusuario_ceie']) || $_SESSION['tipousuario_ceie']!= 'CEIE'){
    $controller = "login";
}

$action = $_GET['action'];
$id = $_GET['id'];

if (empty($action))
    $action = "index";

$ctrlName = ucfirst($controller) . "Controller";

include "./controllers/$ctrlName.php";
$ctrl = new $ctrlName;
$ctrl->{$action}($id);
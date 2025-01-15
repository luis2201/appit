<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Login.php";
include_once "models/Periodo.php";
include_once "models/Carrera.php";
include_once "models/Solicitudmatricula.php";
include_once "models/Pais.php";
include_once "models/Ciudad.php";
include_once "models/Datosestudiante.php";
include_once "models/Matricula.php";
include_once "models/Listapagomatricula.php";
include_once "models/Pagomatricula.php";
include_once "models/Detallepagomatricula.php";
include_once "models/Estudiante.php";
include_once "models/Pagoadmisiones.php";
include_once "models/Admisiones.php";
include_once "models/Admisiones.php";
include_once "models/Listapagoadmisiones.php";
include_once "models/Promocion.php";
include_once "models/Datosmatriculados.php";

$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['idusuario_appit']) || $_SESSION['tipousuario_appit']!= 'FINANCIERO'){
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
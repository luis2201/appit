<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Estudiante.php";
include_once "models/Contrasena.php";
include_once "models/Docente.php";
include_once "models/Login.php";
include_once "models/Periodo.php";
include_once "models/Carrera.php";
include_once "models/Modalidad.php";
include_once "models/Nivel.php";
include_once "models/Matricula.php";
include_once "models/Materia.php";
include_once "models/Mallaacademica.php";

$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['idusuario_appit']) || $_SESSION['tipousuario_appit']!= 'ADMINISTRADOR'){
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
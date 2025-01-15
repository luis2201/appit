<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Login.php";
include_once "models/Register.php";
include_once "models/Datospersonales.php";
include_once "models/Pais.php";
include_once "models/Ciudad.php";
include_once "models/Solicitudmatricula.php";
include_once "models/Periodo.php";
include_once "models/Carrera.php";
include_once "models/Nivel.php";
include_once "models/Seccion.php";
include_once "models/Materia.php";
include_once "models/Detallematricula.php";
include_once "models/Mensajeria.php";
include_once "models/Historialmatricula.php";
include_once "models/Notas.php";
include_once "models/Cuadrogeneral.php";
include_once "models/Resumen.php";
include_once "models/Asistencia.php";


$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['idestudiantevali_appit']) && $controller != "Register"){
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
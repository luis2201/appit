<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Login.php";
include_once "models/Ciudad.php";
include_once "models/Dashboard.php";
include_once "models/Datosestudiante.php";
include_once "models/Docente.php";
include_once "models/Docenteadmisiones.php";
include_once "models/Estudiante.php";
include_once "models/Periodo.php";
include_once "models/Solicitudmatricula.php";
include_once "models/Solicitudvalidacion.php";
include_once "models/Pais.php";
include_once "models/Provincia.php";
include_once "models/Matricula.php";
include_once "models/Registromatricula.php";
include_once "models/Listasniveles.php";
include_once "models/Carrera.php";
include_once "models/Seccion.php";
include_once "models/Nivel.php";
include_once "models/Materias.php";
include_once "models/Malla.php";
include_once "models/Modulo.php";
include_once "models/Cargahoraria.php";
include_once "models/Admisiones.php";
include_once "models/Listasadmisiones.php";
include_once "models/Configuracion.php";
include_once "models/Cuadrodocente.php";
include_once "models/Cuadrogeneral.php";
include_once "models/Ingresocalificacion.php";
include_once "models/Ingresocalificaciontotal.php";
include_once "models/Tutor.php";
include_once "models/Datosincompletos.php";
include_once "models/Promocion.php";
include_once "models/Certificadomatricula.php";
include_once "models/Enlineacalificaciontotal.php";
include_once "models/Listasvalidacion.php";
include_once "models/Estudiantes.php";
include_once "models/Modalidad.php";
include_once "models/Record.php";
include_once "models/Asistencia.php";
include_once 'dompdf/autoload.inc.php';
include_once 'models/Matriculadosporsexo.php';

$controller = ucfirst($_GET['controller']);

if(!file_exists("./controllers/".$controller."Controller.php")){
    $controller = "error";
}

if(!isset($_SESSION['idusuario_appit']) || $_SESSION['tipousuario_appit']!= 'SECRETARIA'){
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
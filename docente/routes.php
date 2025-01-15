<?php

session_start();

include_once "utils/defaults.php";
include_once "models/DB.php";
include_once "models/Main.php";
include_once "models/Login.php";
include_once "models/Dashboard.php";
include_once "models/Periodo.php";
include_once "models/Pais.php";
include_once "models/Provincia.php";
include_once "models/Ciudad.php";
include_once "models/Carrera.php";
include_once "models/Seccion.php";
include_once "models/Nivel.php";
include_once "models/Docente.php";
include_once "models/Registrocalificacion.php";
include_once "models/Contrasena.php";
include_once "models/Modalidad.php";
include_once "models/Cuadrogeneral.php";
include_once "models/Cuadroparcial.php";
include_once "models/Supletorio.php";
include_once "models/Materia.php";
include_once "models/Mensaje.php";
include_once "models/Estudiante.php";
include_once "models/Registrocalificacionvirtual.php";
include_once "models/Leccionario.php";
include_once "models/Registroasistencia.php";
include_once "models/Asistencia.php";
include_once "models/Modulo.php";
include_once "models/Calificacionadmisiones.php";
include_once "models/Registrocalificacionvalidacion.php";
include_once "models/Cuadrogeneralenlinea.php";
include_once "models/Programaanalitico.php";
include_once "models/Firmaelectronica.php";
include_once "models/Calificacionintroductorio.php";
include_once "models/Materiaintroductorio.php";
include_once "models/Asistenciadocente.php";

$controller = ucfirst($_GET['controller']);

if (!file_exists("./controllers/" . $controller . "Controller.php")) {
    $controller = "error";
}

if (!isset($_SESSION['idusuario_appit']) || $_SESSION['tipousuario_appit'] != 'DOCENTE') {
    $controller = "login";
}

$action = $_GET['action'];
$id = $_GET['id'];
$extra1 = $_GET['extra1'] ?? null; // Captura el valor de extra1, si existe
$extra2 = $_GET['extra2'] ?? null; // Captura el valor de extra2, si existe

if (empty($action)) {
    $action = "index";
}

$ctrlName = ucfirst($controller) . "Controller";

include "./controllers/$ctrlName.php";
$ctrl = new $ctrlName;

// Pasar los parámetros adicionales al método de la acción
if ($extra1 !== null && $extra2 !== null) {
    $ctrl->{$action}($id, $extra1, $extra2);
} elseif ($extra1 !== null) {
    $ctrl->{$action}($id, $extra1);
} else {
    $ctrl->{$action}($id);
}

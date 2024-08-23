<?php

if (!function_exists("view")) {
    function view($nombreVista, $params)
    {
      foreach ($params as $key => $param) {
          $key = $param;
      }
      $vista = explode('.', $nombreVista); // [0] => tareas, [1] => index

      if($vista[0]=='login' || $vista[0]=='register' || $vista[0]=='carrera' || $vista[0]=='syllabuspdf' || $vista[1]=='pdf') {
        include_once "./views/{$vista[0]}/$vista[1].php";
        
      } else{
        include_once './views/layout/header.php';
        include_once './views/layout/sidebar.php';
        include_once './views/layout/topbar.php';
        include_once "./views/{$vista[0]}/$vista[1].php";
      }
    }
}
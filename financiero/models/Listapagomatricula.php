<?php

  class Listapagomatricula extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("CALL sp_detalle_pagomatricula_selectAll()");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Listapagomatricula::class);
    }

  }
?>
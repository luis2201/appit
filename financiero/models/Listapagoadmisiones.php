<?php

  class Listapagoadmisiones extends DB
  {

    public static function findAll()
    {
      $db = new DB();
      $prepare = $db->prepare("CALL sp_pagoadmisiones_selectAll()");
      $prepare->execute();

      return $prepare->fetchAll(PDO::FETCH_CLASS, Listapagomatricula::class);
    }

  }

?>
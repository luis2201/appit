<?php 

  class Listasvalidacion extends DB
  {

    public static function viewlista($idperiodo, $idcarrera, $idnivel)
    {
      $db = new DB();
      $prepare = $db->prepare("SELECT M.idmatricula, CONCAT(E.apellido1, space(1), E.apellido2, space(1), E.nombre1, space(1), E.nombre2)AS alumnos, E.numero_identificacion, E.fecha_nacimiento, E.tipo_sangre, E.numero_celular, E.doc_cedula, E.doc_titulo
                               FROM tb_matricula M
                               INNER JOIN tb_estudiante E ON M.idestudiante=E.idestudiante
                               WHERE M.idperiodo = :idperiodo
                               AND M.idcarrera = :idcarrera
                               AND M.idnivel = :idnivel
                               AND M.estado = 1
                               ORDER BY E.apellido1, E.apellido2, E.nombre1, E.nombre2;");
      $prepare->execute([":idperiodo" => $idperiodo, ":idcarrera" => $idcarrera, ":idnivel" => $idnivel]);

      return $prepare->fetchAll(PDO::FETCH_CLASS, Listasvalidacion::class);
    }

  }

?>
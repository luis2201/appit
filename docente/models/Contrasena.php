<?php 

    class Contrasena extends DB
    {   
        public $iddocente;
        public $contrasena;
    
        public static function passwordValidate($iddocente, $contrasena)
        {
            $db = new DB();
            $prepare = $db->prepare("call sp_valida_contrasena_docente(:iddocente, :contrasena)");
            $prepare->execute([":iddocente" => $iddocente, ":contrasena" => $contrasena]);

            return $prepare->fetchAll(PDO::FETCH_CLASS, Contrasena::class);
        }

        public function passwordChange()
        {
            $params = [":iddocente" => $this->iddocente, ":contrasena" => $this->contrasena ];

            $prepare = $this->prepare("call sp_contrasena_change(:iddocente, :contrasena);"); 
            $prepare->execute($params);
        }

    }

?>
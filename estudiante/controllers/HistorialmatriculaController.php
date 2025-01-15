<?php

  class HistorialmatriculaController
  {

    public function index()
    {
      view('historialmatricula.index', []);
    }

    public function getmateriasidperiodo()
    {
      $data = json_decode(file_get_contents('php://input'));
      
      $idestudiante = Main::limpiar_cadena($data->idestudiante);
      $idestudiante = Main::decryption($idestudiante);

      $historial = '';

      $resp = Periodo::findAll();
      foreach($resp as $periodos){
        $idperiodo = $periodos->idperiodo;

        $head= '';
        $rows = '';
        $food = '';

        $resp = Historialmatricula::getMateriasIdPeriodo($idestudiante, $idperiodo);
        if(count($resp)>0){ 
          $head .= '<div class="card border-bottom-info">
                      <div class="card-header bg-info">
                        <h6 class="text-light"><strong>'.$periodos->periodo.'</strong></h6>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered dataTable table-striped text-center" id="tbLista" width="100%" cellspacing="0">
                          <thead class="bg-primary text-light">
                            <tr class="text-center">
                              <td class="text-center">Código</td>
                              <td class="text-center">Materia</td>
                              <td class="text-center">Nivel</td>
                            </tr>
                          </thead>
                          <tbody>';

          foreach($resp as $row){
            $rows .= '<tr>
                        <td>'.$row->codigo.'</td>
                        <td>'.$row->materia.'</td>
                        <td>'.$row->nivel.'</td>
                      </tr>';
          }

          $food = '</tbody>
                  </table>
                </div>
              </div>';
        }

        $historial .= $head . $rows . $food;
      }

      echo json_encode($historial);
    }

  }

?>
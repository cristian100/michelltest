<?php

include '../database/DBConnection.php';

class Ladas {

  private $makeConn;
  
  function __construct()
  {
    $this->makeConn = new DBConnection();  
  }

  /**
   * Se obtienen todas las ladas de la tabla
   *
   * @return void
   */
  public function getLadas()
  {
    try {

      $conn = $this->makeConn->makeConnection();

      $res = $conn->query('select * from Ladas;');

      $array_result = [];

      foreach ($res->fetchAll() as $item) {
        array_push($array_result,
          [
            'lada' => $item['lada'],
            'city' => $item['city'],
            'state' => $item['state'],
            'lada' => $item['lada'],
            'id' => $item['id']
          ]
        );
      }

      echo json_encode($array_result);

    } catch (Exception $e) {
      echo 'Ocurrió un error al obtener las ladas';
    }
  }
}

header('Content-Type: application/json');
$ej = new Ladas();

$ej->getLadas();
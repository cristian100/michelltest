<?php

include '../database/DBConnection.php';

class Ladas
{

  private $makeConn;

  function __construct()
  {
    $this->makeConn = new DBConnection();
  }

  /**
   * Crea un registro en la taba Ladas
   *
   * @param array $data
   * @return void
   */
  public function createLada($data)
  {
    try {

      $conn = $this->makeConn->makeConnection();
      $res = $conn->prepare('insert into Ladas(lada, city, state) values(:lada, :city, :state);');

      $res->bindParam(':lada', $data['lada']);
      $res->bindParam(':city', $data['city']);
      $res->bindParam(':state', $data['state']);


      $res->execute();

      echo json_encode(['code' => 200]);
    } catch (Exception $e) {
      echo json_encode(['code' => 500]);
    }
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
        array_push(
          $array_result,
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
$lada = new Ladas();

$method = $_SERVER['REQUEST_METHOD'];

/**
 * Selección de metodo para poder elegir la función a utilizar
 */

switch ($method) {
  case 'GET':
    $lada->getLadas();
    break;
  case 'POST':
    $lada->createLada($_POST);
    break;
  default:
    break;
}

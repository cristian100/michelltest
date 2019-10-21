<?php

include '../database/DBConnection.php';

class People
{

  private $makeConn;

  function __construct()
  {
    $this->makeConn = new DBConnection();
  }

  /**
   * Se obtiene todos los registros mediante la busqueda en la tabla People
   *
   * @param array $search
   * @return void
   */
  public function search($search)
  {
    try {

      $conn = $this->makeConn->makeConnection();

      $res = $conn->query("
      select p.first_name, p.company, l.lada, p.last_name, p.id, p.phone_number, l.lada, l.city, l.state from People as p
      inner join Ladas as l on l.id = p.lada_id where p." . $search['filter'] . " like '%" . $search['search'] . "%';
      ");


      $array_result = [];

      foreach ($res->fetchAll() as $item) {
        array_push(
          $array_result,
          [
            'last_name' => $item['last_name'],
            'first_name' => $item['first_name'],
            'city' => $item['city'],
            'lada' => $item['lada'],
            'state' => $item['state'],
            'company' => $item['company'],
            'phone_number' => $item['phone_number'],
            'id' => $item['id']
          ]
        );
      }

      echo json_encode($array_result);
    } catch (Exception $e) {
      echo 'Ocurrió un error al realizar la busqueda';
    }
  }


  /**
   * Crea un nuevo registro en la tabla Person
   *
   * @param array $data
   * @return void
   */
  public function createNewPerson($data)
  {
    try {

      $conn = $this->makeConn->makeConnection();
      $res = $conn->prepare('insert into People(last_name, first_name, phone_number, lada_id, company) values(:last_name, :first_name, :phone_number, :lada_id, :company)');

      $res->bindParam(':last_name', $data['last_name']);
      $res->bindParam(':first_name', $data['first_name']);
      $res->bindParam(':phone_number', $data['phone_number']);
      $res->bindParam(':lada_id', $data['lada_id']);
      $res->bindParam(':company', $data['company']);

      $res->execute();

      echo json_encode(['code' => 200]);
    } catch (Exception $e) {
      echo json_encode(['code' => 500]);
    }
  }

  /**
   * Obtiene la lista de todas las personas registradas en la tabla People
   *
   * @return void
   */
  public function getPeople()
  {
    try {

      $conn = $this->makeConn->makeConnection();

      $res = $conn->query('
      select p.first_name, p.company, l.lada, p.last_name, p.id, p.phone_number, l.lada, l.city, l.state from People as p
      inner join Ladas as l where l.id = p.lada_id;');

      $array_result = [];

      foreach ($res->fetchAll() as $item) {
        array_push(
          $array_result,
          [
            'last_name' => $item['last_name'],
            'first_name' => $item['first_name'],
            'city' => $item['city'],
            'lada' => $item['lada'],
            'state' => $item['state'],
            'company' => $item['company'],
            'phone_number' => $item['phone_number'],
            'id' => $item['id']
          ]
        );
      }

      echo json_encode($array_result);
    } catch (Exception $e) {
      echo 'Ocurrió un error al obtener las ladas';
    }
  }

  /**
   * Elimina el registro con el id indicado
   *
   * @param string $id
   * @return void
   */
  public function deletePerson($id)
  {
    try {
      $conn = $this->makeConn->makeConnection();

      $result = $conn->prepare('delete from People where id = :id');

      $result->bindParam(':id', $id);

      $result->execute();

      echo json_encode(['code' => 200]);
    } catch (Exception $e) {
      echo json_enconde(['code' => 200]);
    }
  }
}

header('Content-Type: application/json');
$person = new People();

$method = $_SERVER['REQUEST_METHOD'];

/**
 * Selección de metodo para poder elegir la función a utilizar
 */

switch ($method) {
  case 'GET':
    $person->getPeople();
    break;
  case 'POST':
    if ($_POST['method'] === 'create') {
      $person->createNewPerson($_POST);
      break;
    }

    if ($_POST['method'] === 'delete') {
      $person->deletePerson($_POST['id']);
      break;
    }

    if ($_POST['method'] === 'search') {
      $person->search($_POST);
      break;
    }


    break;
  default:
    break;
}

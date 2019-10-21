<?php

include '../database/DBConnection.php';

class People
{

  private $makeConn;

  function __construct()
  {
    $this->makeConn = new DBConnection();
  }


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
$ej = new People();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    $ej->getPeople();
    break;
  case 'POST':
    if ($_POST['method'] === 'create') {
      $ej->createNewPerson($_POST);
    }

    if ($_POST['method'] === 'delete') {
      $ej->deletePerson($_POST['id']);
    }
    break;
  default:
    break;
}

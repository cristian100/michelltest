<?php


class DBConnection {

  private $servername = 'localhost';
  private $dbname = 'test_michel';
  private $username = 'test_michel';
  // private $username = 'root';
  private $password = 't3st_m1ch3ll.';
  // private $password = 'michel88';

  function __construct()
  {
    
  }

  public function makeConnection()
  {
    try {

      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8;", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $conn;

    } catch (Exception $e) {
      echo 'Ocurrió un error al hacer la conexión';
    }
  }
}
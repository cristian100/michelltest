<?php


class DBConnection
{

  /**
   * Nombre del servidor
   *
   * @var string
   */
  private $servername = 'localhost';
  /**
   * Nombre de la base de datos
   *
   * @var string
   */
  private $dbname = 'test_michel';

  /**
   * Nombre del usuario
   * @var string
   */
  // private $username = 'root';
  private $username = 'test_michel';
  /**
   * Password del usuario
   *
   * @var string
   */
  // private $password = 'michel88';
  private $password = 't3st_m1ch3ll.';

  function __construct()
  { }

  /**
   * Función para realizar la conexióon a la base de datos.
   *
   * @return PDO
   */
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

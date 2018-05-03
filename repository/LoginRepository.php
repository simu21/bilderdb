<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
  class LoginRepository extends Repository
  {

    protected $tableName = 'users';
    protected $tableId = 'uid';
    protected $order = '';
  	//EIn Benutzer in die Datenbank eintragen per SQL query
  	public function create($email, $username, $passwort)
    {
      $query = "INSERT INTO $this->tableName (email, benutzername, passwort) VALUES (?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('sss', $email, $username, $passwort);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }

    $statement->close();
    }

    public function login($email, $pwd) {
      $query = "SELECT * FROM users WHERE email=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $email);
      $statement->execute();
      $result = $statement->get_result();
      $user = $result->fetch_object();
      if(password_verify($pwd, $user->passwort)) {
        return true;
      } else {
        return false;
      }

    }
  }
?>
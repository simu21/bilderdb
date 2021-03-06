<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
  class LoginRepository extends Repository
  {

    protected $tableName = 'users';
    protected $tableId = 'id';
    protected $order = '';

  	public function create($email, $username, $passwort)
    {
        $query = "INSERT INTO $this->tableName (email, benutzername, passwort) VALUES (?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $email, $username, $passwort);
        $statement->execute();
        $statement->close();
        header('Location: '.$GLOBALS['appurl'].'/login');
    }

    public function login($email, $pwd) {
      $query = "SELECT * FROM users WHERE email=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $email);
      $statement->execute();
      $result = $statement->get_result();
      $user = $result->fetch_object();
      if(password_verify($pwd, $user->passwort)) {
        $_SESSION['uid'] = $user->id;
        $_SESSION['username'] = $user->benutzername;
        return true;
      } else {
        return false;
      }

    }
  }
?>
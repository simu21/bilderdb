<?php
require_once '../repository/LoginRepository.php';
/**
 * Controller für das Login und die Registration, siehe Dokumentation im DefaultController.
 */
  class LoginController
  {
    /**
     * Default-Seite für das Login: Zeigt das Login-Formular an
	 * Dispatcher: /login
     */
    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('login_index');
      $view->title = 'Bilder-DB';
      $view->heading = 'Login';
      $view->display();
    }
    /**
     * Zeigt das Registrations-Formular an
	 * Dispatcher: /login/registration
     */
    public function registration()
    {
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }

      public function myProfile()
      {
          $view = new View('login_myProfile');
          $view->title = 'Bilder-DB';
          $view->heading = 'my Profile';
          $view->display();
      }


    //Ein Benutzer registrieren und werte an create (im repository) übergeben
    public function doCreate()
    {
<<<<<<< HEAD
        if(isset($_POST['email']) & isset($_POST['username']) & isset($_POST['passwort1']) & isset($_POST['passwort2'])){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $passwort = $_POST['passwort1'];

          $passwort = password_hash($passwort, PASSWORD_DEFAULT);
          $loginRepository = new LoginRepository();
          $loginRepository->create($email, $username, $passwort);
          header('Location: '.$GLOBALS['appurl'].'/login');
       } else {
       header('Location: '.$GLOBALS['appurl'].'/login/registration');
       }
=======
        if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['passwort1']) && isset($_POST['passwort2'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $regexuser = "/[a-zA-Z][a-zA-Z0-9]{6,16}/";

            if(!preg_match($regexuser ,$username)) {
                header('Location: '.$GLOBALS['appurl'].'/login/registration?registererror=username');
            } else {
                $regexpwd = "/[a-zA-Z][a-zA-Z0-9]{6,16}/";
                $passwort1 = password_hash($_POST['passwort1'], PASSWORD_DEFAULT);
                $passwort2 = password_hash($_POST['passwort2'], PASSWORD_DEFAULT);
                if(!preg_match($regexpwd, $passwort1)) {
                    header('Location: '.$GLOBALS['appurl'].'/login/registration?registererror=passwort');
                }elseif ($passwort1 != $passwort2){
                    header('Location: '.$GLOBALS['appurl'].'/login/registration?registererror=passwort2');
                } else {
                    $loginRepository = new LoginRepository();
                    $loginRepository->create($email, $username, $passwort1);
                }
            }
        } else {
            header('Location: '.$GLOBALS['appurl'].'/login/registration?registererror=felder');
        }
>>>>>>> ca64dd174c0c350c7e6dfcf52eb5422a1721878e
    }
    public function doLogin() {
      $email = $_POST['email'];
      $pwd = $_POST['passwort'];
      $loginRepository = new LoginRepository();
      $result = $loginRepository->login($email, $pwd);
      if(!$result){
        header('Location: '.$GLOBALS['appurl'].'/login?loginsuccess=false');
      } else {
        session_start();
        $_SESSION['uid'] = $user->uid;
        $_SESSION['username'] = $user->username;
       header('Location: '.$GLOBALS['appurl'].'/login/myProfile');
      }
    }
}
?>
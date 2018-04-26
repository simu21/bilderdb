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
<<<<<<< HEAD
=======

      public function myProfile()
      {
          $view = new View('login_myProfile');
          $view->title = 'Bilder-DB';
          $view->heading = 'Registration';
          $view->display();
      }


    //Ein Benutzer registrieren und werte an create (im repository) übergeben
    public function doCreate()
    {
        if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['passwort2']) && isset($_POST['passwort2'])){
            $username = $_POST['username'];
            $regexuser = "/[a-zA-Z][a-zA-Z0-9]{6,16}/";

            if(!preg_match($regexuser ,$username)) {
                header('Location: '.$GLOBALS['appurl'].'/login?loginsuccess=falseUsername');
            }

            $regexpwd = "/[a-zA-Z][a-zA-Z0-9]{6,16}/";
            $passwort = $_POST['passwort'];
            if(!preg_match($regexpwd, $passwort)) {

            }
        }





        if($valid) {
          $loginRepository = new LoginRepository();
          $loginRepository->create($email, $username, $passwort);
          // Anfrage an die URI /entry weiterleiten (HTTP 302)
          header('Location: '.$GLOBALS['appurl'].'/login');
        }
        else {
          header('Location: '.$GLOBALS['appurl'].'/login/registration');
        }
    }

    public function doLogin() {
      $email = $_POST['email'];
      $pwd = $_POST['passwort'];
      $loginRepository = new LoginRepository();
      $result = $loginRepository->login($email, $pwd);
      if(!$result){
        header('Location: '.$GLOBALS['appurl'].'/login?loginsuccess=false');
      } else {
       header('Location: '.$GLOBALS['appurl'].'/login/myProfile?loginsuccess=true');
      }
    }
>>>>>>> f9ec732f8770f3b4edc08c90ca48d33d1a7dd83c
}
?>
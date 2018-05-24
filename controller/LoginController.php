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
    }
    public function doLogin() {
      $email = $_POST['email'];
      $pwd = $_POST['passwort'];
      $loginRepository = new LoginRepository();
      $result = $loginRepository->login($email, $pwd);
      if(!$result){
        header('Location: '.$GLOBALS['appurl'].'/login?loginsuccess=false');
      } else {
       header('Location: '.$GLOBALS['appurl'].'/login/myProfile');
      }
    }

    public function logout() {
        unset($_SESSION);
        session_destroy();
        header('Location: '.$GLOBALS['appurl'].'/login');
    }
}
?>
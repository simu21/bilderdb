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
          $view->heading = 'Registration';
          $view->display();
      }


    //Ein Benutzer registrieren und werte an create (im repository) übergeben
    public function doCreate()
    {
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
}
?>
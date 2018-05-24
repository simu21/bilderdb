<?php
require_once '../repository/BilderRepository.php';

class BilderController 
{
	public function index()
    {
      $bilderRepository = new BilderRepository();
      $view = new View('bilder_index');
      $view->title = 'Bilder-DB';
      $view->heading = 'Gallerie';
      $view->display();
    }

    public function profil()
    {
      $bilderRepository = new BilderRepository();
      $view = new View('bilder_profil');
      $view->title = 'Bilder-DB';
      $view->heading = 'Meine Bilder';
      $view->bilder = $bilderRepository->userSignedIn($_SESSION['uid']);
      $view->display();
    }

    public function upload() {
        $bilderRepository = new BilderRepository();
        $upload_folder = 'C:/xampp/htdocs/m151/bilderdb/public/images/user_images/'; //Das Upload-Verzeichnis
        $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));



        //Überprüfung der Dateiendung
        $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
        if(!in_array($extension, $allowed_extensions)) {
            header('Location: '.$GLOBALS['appurl'].'/bilder/profil?uploaderror=type');
            die();
        }

        //Überprüfung der Dateigröße
        $max_size = 500*1024; //500 KB
        if($_FILES['datei']['size'] > $max_size) {
            header('Location: '.$GLOBALS['appurl'].'/bilder/profil?uploaderror=size');
            die();
        }

        //Pfad zum Upload
        $new_path = $upload_folder.$filename.'.'.$extension;

        //Neuer Dateiname falls die Datei bereits existiert
        if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
            $id = 1;
            do {
                $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
                $id++;
            } while(file_exists($new_path));
        }
        $uid = $_SESSION['uid'];
        //Datei auf dem Server speichern und Datenbank eintrag machen
        move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
        $bilderRepository->uploadPicture($new_path, $uid);
        header('Location: '.$GLOBALS['appurl'].'/bilder/profil');
    }
}
?>
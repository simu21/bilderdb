<?php
require_once '../lib/Repository.php';

class BilderRepository extends Repository
{
	public function uploadPicture($path, $uid) {
		$text = "placeholder_text";
		$gid = 0;
        $query="INSERT INTO bilder (gallerie_id, user_id, titel, beschreibung, bild_pfad) VALUES (?,?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iisss', $gid, $uid, $text, $text, $path);
        $statement->execute();
        $statement->close();
    }

    public function userSignedIn($uid) {
        $query = "SELECT titel, bilder.beschreibung, bild_pfad, galleriename, gallerien.beschreibung FROM bilder join gallerien on gallerien.id=bilder.id WHERE user_id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uid);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $statement->close();
        return $rows;
    }
}
?>
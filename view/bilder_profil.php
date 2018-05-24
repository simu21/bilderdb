<?php
    foreach($bilder as $bild) {
    	echo"<h2>bong</h2>";
    	echo "<h2>$bild->galleriename</h2>";
        echo "<img src=$bild->bild_pfad>>";
    }
?>
        <form class="upload_form" action="upload" method="post" enctype="multipart/form-data">
            <input class="input_format" type="file" name="datei"><br>
            <input class="input_format" type="submit" value="Hochladen">
        </form>
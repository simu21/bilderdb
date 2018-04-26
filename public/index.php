<?php

/*
 * Die index.php Datei ist der Einstiegspunkt des MVC. Hier werden zuerst alle
 * vom Framework benötigten Klassen geladen und danach wird die Anfrage dem
 * Dispatcher weitergegeben.
 *
 * Wie in der .htaccess Datei beschrieben, werden alle Anfragen, welche nicht
 * auf eine bestehende Datei zeigen hierhin umgeleitet.
 */

  // fix schf: approot für url
<<<<<<< HEAD
  $GLOBALS['appurl'] = '/bilderdb/public';
  $GLOBALS['numAppurlFragments'] = 2;
=======
  $GLOBALS['appurl'] = '/m151/bilderdb/public';
  $GLOBALS['numAppurlFragments'] = 3;
>>>>>>> f9ec732f8770f3b4edc08c90ca48d33d1a7dd83c

  require_once '../lib/Dispatcher.php';
  require_once '../lib/formbuilder/FormBuilder.php';
  require_once '../lib/View.php';

  $dispatcher = new Dispatcher();
  $dispatcher->dispatch();
?>
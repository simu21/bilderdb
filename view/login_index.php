<?php
  /**
   * Login-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-success";
<<<<<<< HEAD
  $form = new Form($GLOBALS['appurl']."/login");
  $button = new ButtonBuilder();
  echo $form->input()->label('E-Mail')->name('email')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('passwort')->type('text')->lblClass($lblClass)->eltClass($eltClass);
=======
  $form = new Form($GLOBALS['appurl']."/login/doLogin");
  $button = new ButtonBuilder();
  echo $form->input()->label('E-Mail')->name('email')->type('email')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('passwort')->type('password')->lblClass($lblClass)->eltClass($eltClass);
>>>>>>> f9ec732f8770f3b4edc08c90ca48d33d1a7dd83c
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Login')->name('send')->type('submit')->class('btn-success');
  echo $button->end();
  echo $form->end();
?>

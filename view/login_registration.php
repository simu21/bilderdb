<?php
  /**
   * Registratons-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
<<<<<<< HEAD
 
=======
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-success";
  $form = new Form($GLOBALS['appurl']."/login/doCreate");
  $button = new ButtonBuilder();
  $select = new SelectBuilder();
  echo $form->input()->label('E-Mail')->name('email')->type('email')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Username')->name('username')->pattern('/[a-zA-Z][a-zA-Z0-9]{6,16}/')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort')->name('passwort1')->pattern('/[a-zA-Z][a-zA-Z0-9]{8,16}/')->type('text')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Passwort wiederholen')->name('passwort2')->pattern('/[a-zA-Z][a-zA-Z0-9]{8,16}/')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('registrieren')->name('send')->type('submit')->class('btn-success');
  echo $button->end();
  echo $form->end();
>>>>>>> f9ec732f8770f3b4edc08c90ca48d33d1a7dd83c
?>

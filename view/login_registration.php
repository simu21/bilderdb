<div class="register_form_div">
 <form method='post' action='<?=$GLOBALS['appurl']?>/login/doCreate'>


   <label for='email' class='col-md-2'>email</label>

     <input type='email' name='email' class='form-control' onblur='this.placeholder="email"' onfocus="this.placeholder=''" placeholder='email'/>


   <label for='username' class='col-md-2'>username</label>

     <input type='text' name='username' class='form-control' onblur='this.placeholder="username"' onfocus="this.placeholder=''" placeholder='username'/>


   <label for='passwort1' class='col-md-2'>passwort</label>

     <input type='password' name='passwort1' class='form-control' onblur='this.placeholder="passwort"' onfocus="this.placeholder=''" placeholder='passwort'/>


   <label for='passwort2' class='col-md-2'>passwort wiederholen</label>

     <input type='password' name='passwort2' class='form-control' onblur='this.placeholder="passwort wiederholen"' onfocus="this.placeholder=''" placeholder='passwort wiederholen'/>


   <button type="submit" class="btn btn-success">registrieren</button>
 </form>
</div>
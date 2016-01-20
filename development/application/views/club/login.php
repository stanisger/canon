<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canon</title>
	<link rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/style_club.css"> 
</head>
<body>
      <div class="headLogin">
   	 <img src="<?php echo URL::base(); ?>assets/images/Canon-Logo-Black.png" alt="">
      </div>
     <form action="<?php echo URL::base(); ?>club/login/index" method="POST">
     <input type="hidden" name="token" value="<?php echo Security::token(); ?>">
      <section class="login">
      	<article>
      		<input name="email" type="text" placeholder="Dirección de Correo Electrónico">
      		<input name="password" type="password" placeholder="Contraseña">
      		<input name="remember" type="checkbox" id="cb2" name="cb"value="" checked>
           <label for="cb2">Recordarme   •</label>
      		<a href="#">  Olvide mi Contraseña</a>
            <div class="button">
      		 <button>INICIAR SESIÓN</button>	
            </div> 
      	</article>
      </section>
	</form>
</body>
</html>

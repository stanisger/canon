<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Canon</title>
      <link rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/style_member.css">
   </head>
   <body>
      <div class="headLogin">
         <img src="<?php echo URL::base(); ?>assets/images/Canon-Logo-Black.png" alt="">
      </div>
      <form action="<?php echo URL::base(); ?>member/login/index" method="POST">
         <input type="hidden" name="token" value="<?php echo Security::token(); ?>">
         <section class="login">
            <article>
               <input type="text" placeholder="Dirección de Correo Electrónico" name="email">
               <input type="password" placeholder="Contraseña" name="password">
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
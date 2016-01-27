<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Canon</title>
    <link rel="stylesheet" href="<?php echo URL::base(); ?>assets/css/style_member.css">
    
  </head>
  <body>
    <?php echo $header; ?>
    <?php echo $sidebar; ?>
    <?php echo $body ; ?>
    <?php echo $footer; ?>
    <!-- Modal 1 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
        <div class="modal-content modalclubesBody">
          
        </div>
      </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
        <div class="modal-content modalclubesBody">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="flaticon-forbidden15"></span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Editar Perfil</h4>
          </div>
          <div class="modal-body profileClub row">
            <article class="col-sm-3">
              <a class="flaticon-pencil86" href="#">
                <input type="file" name="upload">
              </a>
              <figure>
                <img src="<?php echo URL::base(); ?>assets/images/photografer.jpg" alt="">
              </figure>
            </article>
            <article class="col-sm-9">
              <input type="text" placeholder="Nombre completo">
              <input type="text" placeholder="Descripción">
            </article>
            
            <div class="contentProfileEdit col-xs-12">
              <div class="datesProfileMember col-xs-6">
                <label for="dates">DATOS</label>
                <input type="email" placeholder="Correo electrónico*">
                <input type="text" placeholder="Ciudad*">
                <input type="telephone" placeholder="Teléfono*">
              </div>
              <div class="datesProfileMember col-xs-6">
                <label for="password">CONTRASEÑA</label>
                <input type="password" placeholder="Contraseña*">
                <input type="password" placeholder="Confirmar contraseña*">
              </div>
            </div>
            <div class="contentProfileClubes col-xs-12">
              <h3>CLUBES A  LOS QUE PERTENECE</h3>
              <div class="ProfileClubes col-xs-4">
                <article>
                  <a class="flaticon-pencil86" href="#">
                    <input type="file" name="upload">
                  </a>
                  <figure>
                    <img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt="">
                  </figure>
                </article>
                <input type="text" placeholder="Nombre del club">
                <div class="textEdit">
                  Matrícula
                  <input type="text">
                </div>
              </div>
              <div class="ProfileClubes col-xs-4">
                <button class="addClub">
                <span class="flaticon-round69"></span>
                <p>Agregar <br>
                  nuevo Club
                </p>
                </button>
              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo URL::base(); ?>assets/js/canon_member.js"></script>
  <?php echo Assets::scripts(); ?>
</html>
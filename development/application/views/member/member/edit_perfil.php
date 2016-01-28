<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">
  <button type="button" class="close" onclick="closeModal();">
  <span aria-hidden="true" class="flaticon-forbidden15"></span>
  </button>
  <h4 class="modal-title" id="myModalLabel">Editar Perfil</h4>
</div>
<form action="<?php echo URL::base(); ?>member/member/edit" method="POST" id="edit_perfil" enctype="multipart/form-data">
  <div class="modal-body profileClub row">
    <article class="col-sm-3">
      <a class="flaticon-pencil86" href="#">
        <input type="file" name="upload" name="avatar" id="avatar">
      </a>
      <figure>
        <?php if('' == $member->avatar): ?>
        <img src="<?php echo URL::base(); ?>assets/images/photografer.jpg" alt="">
        <?php else: ?>
        <img src="<?php echo URL::base(); ?>assets/images/members/<?php echo $member->avatar; ?>" alt="">
        <?php endif; ?>
      </figure>
    </article>
    <article class="col-sm-9">
      <input type="text" placeholder="Nombre completo" name="name" value="<?php echo $member->name; ?>">
      <input type="text" placeholder="Descripción" name="description" value="<?php echo $member->description; ?>">
    </article>
    
    <div class="contentProfileEdit col-xs-12">
      <div class="datesProfileMember col-xs-6">
        <label for="dates">DATOS</label>
        <input type="email" placeholder="Correo electrónico*" name="email" value="<?php echo $member->email; ?>">
        <input type="text" placeholder="Ciudad*" name="state" value="<?php echo $member->state; ?>">
        <input type="telephone" placeholder="Teléfono*" name="phone" value="<?php echo $member->phone; ?>">
      </div>
      <div class="datesProfileMember col-xs-6">
        <label for="password">CONTRASEÑA</label>
        <input type="password" placeholder="Contraseña*" name="password" id="password">
        <input type="password" placeholder="Confirmar contraseña*" name="repit_password" id="repit_password">
      </div>
    </div>
    
    <div class="contentProfileClubes col-xs-12">
      <h3>CLUBES A  LOS QUE PERTENECE</h3>
      <?php foreach($my_clubs as $club): ?>
    <div class="ProfileClubes col-xs-4">
      <figure>
        <?php if('' == $club->logotipo): ?>
        <img src="<?php echo URL::base(); ?>assets/images/logoGeneric.png" alt="">
        <?php else: ?>
        <img src="<?php echo URL::base(); ?>assets/images/clubs/<?php echo $club->logotipo; ?>" alt="">
        <?php endif; ?>
      </figure>
      <p><?php echo $club->name; ?></p>
      <div class="text">
        Matrícula
        <strong><?php echo $club->enrollment; ?></strong>
      </div>
    </div>
    <?php endforeach; ?>

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
        <select id="clubs">
          <?php foreach($clubs as $club): ?>
              <option value=""><?php echo $club->name; ?></option>
          <?php endforeach; ?>
        </select>
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
    <button type="button" onclick="closeModal();">Cancelar</button>
    <button type="submit" >Guardar Cambios</button>
  </div>
</form>
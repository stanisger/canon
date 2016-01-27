<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:none;">
  <button type="button" class="close" onclick="closeModal();">
  <span aria-hidden="true" class="flaticon-forbidden15"></span>
  </button>
  <h4 class="modal-title" id="myModalLabel">Mi perfil</h4>
</div>
<div class="modal-body profileClub row">
  <article class="col-sm-3">
    <figure>
      <img src="<?php echo URL::base(); ?>assets/images/photografer.jpg" alt="">
    </figure>
  </article>
  <article class="col-sm-9">
    <label for="nameClub"><?php echo $member->name.' '.$member->lastname.' '.$member->surname; ?></label>
    <p> <?php echo $member->description; ?></p>
  </article>
  <div class="contentProfile col-xs-12">
    <label for="textTwo" class="col-xs-6">DATOS</label>
    <label for="textThree" class="col-xs-6">CONTRASEÑA</label>
    <p><?php echo $member->name.' '.$member->lastname.' '.$member->surname; ?>   <br>
      <?php echo $member->email; ?><br>
      tel : <?php echo $member->phone; ?>
    </p>
    <p><?php echo Helpers_Encrypt::decrypt($member->password); ?></p>
  </div>
  <div class="contentProfileClubes col-xs-12">
    <h3>CLUBES A  LOS QUE PERTENECE</h3>
    <div class="ProfileClubes col-xs-4">
    <figure><img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt=""></figure>
    <p>Nombre del club</p>
    <div class="text">
      Matrícula
      <strong>2121212</strong>
    </div>
  </div>
  <div class="ProfileClubes col-xs-4">
  <figure><img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt=""></figure>
  <p>Nombre del club</p>
  <div class="text">
    Matrícula
    <strong>2121212</strong>
  </div>
</div>
<div class="ProfileClubes col-xs-4">
<figure><img src="<?php echo URL::base(); ?>assets/images/profileGeneric.png" alt=""></figure>
<p>Nombre del club</p>
<div class="text">
  Matrícula
  <strong>2121212</strong>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal"
data-toggle="modal" data-target="#myModal2"
>Editar Perfil <span class="flaticon-edit45"></span>
</button>
</div>
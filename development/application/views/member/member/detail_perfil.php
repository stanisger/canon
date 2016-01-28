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
      <?php if('' == $member->avatar): ?>
      <img src="<?php echo URL::base(); ?>assets/images/photografer.jpg" alt="">
      <?php else: ?>
      <img src="<?php echo URL::base(); ?>assets/images/members/<?php echo $member->avatar; ?>" alt="">
      <?php endif; ?>
    </figure>
  </article>
  <article class="col-sm-9">
    <label for="nameClub"><?php echo $member->name; ?></label>
    <p> <?php echo $member->description; ?></p>
  </article>
  <div class="contentProfile col-xs-12">
    <label for="textTwo" class="col-xs-6">DATOS</label>
    <label for="textThree" class="col-xs-6">CONTRASEÑA</label>
    <p><?php echo $member->name; ?>   <br>
      <?php echo $member->email; ?><br>
      tel : <?php echo $member->phone; ?>
    </p>
    <p><?php echo Helpers_Encrypt::decrypt($member->password); ?></p>
  </div>
  <div class="contentProfileClubes col-xs-12">
    <h3>CLUBES A  LOS QUE PERTENECE</h3>
    <?php foreach($clubs as $club): ?>
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
  </div>
</div>
<div class="modal-footer">
  <button onclick="edit_perfil('<?php echo URL::base(); ?>member/member/edit');" type="button" class="btn btn-primary"
  data-toggle="modal" data-target="#myModal2"
  >Editar Perfil <span class="flaticon-edit45"></span>
  </button>
</div>
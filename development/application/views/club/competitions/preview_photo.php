<button data-dismiss="modal"><span class="flaticon-close7"></span></button>
<figure  class="col-sm-8">
	<img class="vertical"src="<?php echo URL::base().'assets/images/gallery/'.$gallery->file; ?>" alt="#">
</figure>
<div class="detailsPhoto col-sm-4">
	<div class="headDetailsPhoto">
		<figure>
			<?php if('' == $member->avatar): ?>
			<img src="assets/images/photografer.png" alt="">
			<?php else: ?>
				<img src="<?php echo URL::base().'assets/images/members/'.$member->avatar; ?>">
			<?php endif; ?>
		</figure>
		<div class="text">
			<h2><?php echo $member->name; ?></h2>
			<a href="<?php echo $member->email; ?>"><?php echo $member->email; ?></a>
			<p><?php echo $member->state; ?><br>
				<?php echo $member->phone; ?>
			</p>
		</div>
	</div>
	<div class="contentDetailsPhoto">
		<article>
			<p><?php echo $gallery->name; ?></p>
			<h4>Toros y toreros y toritos</h4>
		</article>
		<hr class="clear">
		<article>
			<p>Ficha Técnica</p>
			<table>
				<tr>
					<td>Cámara</td>
					<td><?php echo $gallery->camera; ?></td>
				</tr>
				<tr>
					<td>Lente</td>
					<td><?php echo $gallery->lens; ?></td>
				</tr>
				<tr>
					<td>Apertura</td>
					<td><?php echo $gallery->opening; ?></td>
				</tr>
				<tr>
					<td>Speed</td>
					<td><?php echo $gallery->speed; ?></td>
				</tr>
				<tr>
					<td>ISO</td>
					<td><?php echo $gallery->iso; ?></td>
				</tr>
				
			</table>
		</article>
		<article>
			<p>Folio de la fotofrafía</p>
			<span><?php echo $gallery->id_gallery; ?></span>
		</article>
	</div>
</div>
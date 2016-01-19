<ul class="pagination">
	<?php for($i=1;$i<=$data['pages'];$i++): ?>
		<li><a href="<?php echo URL::base(); ?>administrator/clubs/index/<?php echo $i; ?>" class="<?php echo ($data['page'] == $i)?'active':''; ?>"><?php echo $i; ?></a></li>
	<?php endfor; ?>
</ul>
<?php defined('_JEXEC') or die; ?>

<div class="mypreview">
	
	<?php 
	foreach ($this->items as $item) : ?>
		<div class="mysportsimage">
			<div class="sportsimage">
				<?php echo $item->image; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
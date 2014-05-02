<?php
defined('_JEXEC') or die;
?>
<div class="featured_sportsvideo<?php echo $moduleclass_sfx ?>">
	<div class="row-striped">
		<?php foreach ($list as $item) : ?>
		<div class="mysportsvideo">
			<div class="sportsvideo_nmvideo">
                <a href="<?php echo $item->nmurl; ?>" rel="nofollow" target="_new">
				<?php echo $item->nmvideo; ?>
				</a>
			</div>
			<div class="sportsvideo_element">
				<a href="<?php echo $item->nmurl; ?>" rel="nofollow" target="_new">
				<img src="<?php echo JURI::root() . 'media/com_sportsvideo/media/' . $item->nmphoto; ?>" width="<?php echo $imagewidth; ?>">
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
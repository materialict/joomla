<?php
defined('_JEXEC') or die;
?>

<div class="mypreview">
	<?php
	foreach ($this->items as $item) : 

//		$thumbnail  = "";	
//		if (defined($item->thumbnail)){
			$thumbnail = $item->thumbnail;		
//		}
	?>
	<div class="myarticle">
        <div class="sportsarticle_nmtitle1_small">
            <a href="<?php echo JRoute::_('index.php?option=com_sportsarticle&view=sportsarticle&idarticle='.(int)$item->idarticle); ?>">
                <?php echo $item->nmtitle1; ?>
            </a>
        </div>
    	<?php
		if (isset($thumbnail) && !empty($thumbnail)){
		?>
		<div class="thumbnail_left">
			<div class="thumbnail"><?php echo $thumbnail; ?></div>
		</div>
        <?php
		}
		?>
		<div style="thumbnail_right">
            <div class="sportsarticle_nmwriter_small">
                <?php echo $item->nmwriter; ?>
            </div>
            <div class="sportsarticle_nmauthor_small">
                <?php echo $item->nmauthor; ?>
            </div>
            <div class="sportsarticle_dtpublished_small">
                <?php echo $item->dtpublished; ?>
            </div>
            <div class="sportsarticle_ftarticle_small">
                <?php echo $item->ftarticle; ?>
                <a href="<?php echo JRoute::_('index.php?option=com_sportsarticle&view=sportsarticle&idarticle='.(int)$item->idarticle); ?>">Lees meer...</a>            
            </div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
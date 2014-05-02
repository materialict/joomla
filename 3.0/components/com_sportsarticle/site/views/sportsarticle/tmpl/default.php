<?php
defined('_JEXEC') or die;

?>

<div class="mypreview">
	<?php foreach ($this->items as $item) : ?>

	<div class="myarticle">
		<!-- Logo -->
		<div class="sportsarticle_idsource"><?php echo $item->articleLogo; ?></div>

		<!-- author and date published -->
		<div class="sportsarticle_nmauthor"><?php echo $item->nmauthor; ?></div>
		<div class="sportsarticle_dtpublished"><?php echo $item->dtpublished; ?></div>

		<div class="sportsarticle_nmtitle1"><?php echo $item->nmtitle1; ?></div>
		<?php if (!empty($item->nmtitle2)){ ?>
			<div class="sportsarticle_nmtitle2"><?php echo $item->nmtitle2; ?></div>
		<?php } ?>
		<?php if (!empty($item->nmtitle3)){ ?>
			<div class="sportsarticle_nmtitle"><?php echo $item->nmtitle3; ?></div>
		<?php } ?>

		<div class="sportsarticle_ftarticle"><?php echo $item->ftarticle; ?></div>
	</div>
	<?php endforeach; ?>
</div>
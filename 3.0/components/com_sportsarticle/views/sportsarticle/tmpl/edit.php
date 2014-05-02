<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_sportsarticle&layout=edit&idarticle='.(int) $this->item->idarticle); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">

			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

				<?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->idarticle) ? JText::_('COM_SPORTSARTICLE_NEW_SPORTSARTICLE', true) : JText::sprintf('COM_SPORTSARTICLE_EDIT_SPORTSARTICLE', $this->item->idarticle, true)); ?>

					<!-- Source -->
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('idsource');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('idsource'); ?>
						</div>
					</div>
					<!-- Year -->
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('nryear');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('nryear'); ?>
						</div>
					</div>
					<!-- Publish date -->
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('dtpublished');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('dtpublished'); ?>
						</div>
					</div>
					<!-- Author -->
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('nmauthor');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('nmauthor'); ?>
						</div>
					</div>

					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('nmtitle1');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('nmtitle1'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('nmtitle2');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('nmtitle2'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('nmtitle3');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('nmtitle3'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="control-label">
							<?php
							echo $this->form->getLabel('ftarticle');
							?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('ftarticle'); ?>
						</div>
					</div>
				<?php echo JHtml::_('bootstrap.endPanel'); ?>

				<input type="hidden" name="task" value="" />
				<?php echo JHtml::_('form.token'); ?>

			<?php echo JHtml::_('bootstrap.endPane'); ?>
		</fieldset>
		</div>
	</div>
</form>
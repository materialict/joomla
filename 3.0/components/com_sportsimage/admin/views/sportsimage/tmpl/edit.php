<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_sportsimage&layout=edit&idimage='.(int) $this->item->idimage); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">

			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

				<?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->idimage) ? JText::_('COM_SPORTSIMAGE_NEW_SPORTSIMAGE', true) : JText::sprintf('COM_SPORTSIMAGE_EDIT_SPORTSIMAGE', $this->item->idimage, true)); ?>

					<!-- print the fields from the models/forms/sportsimage.xml -->
					<?php foreach ($this->form->getFieldset('fields') as $field) : ?>
						<div class="control-group">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
					<?php endforeach; ?>

			<?php echo JHtml::_('bootstrap.endPane'); ?>
		</fieldset>
		</div>
	</div>
</form>
<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_sportswriter&layout=edit&idwriter='.(int) $this->item->idwriter); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">

			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

				<?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->idwriter) ? JText::_('COM_SPORTSWRITER_NEW_SPORTSWRITER', true) : JText::sprintf('COM_SPORTSWRITER_EDIT_SPORTSWRITER', $this->item->idwriter, true)); ?>

					<!-- print the fields from the models/forms/sportswriter.xml -->
					<?php foreach($this->form->getFieldset('fields') as $field) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
					<?php endforeach; ?>

				<?php echo JHtml::_('bootstrap.endPanel'); ?>

				<input type="hidden" name="task" value="" />
				<?php echo JHtml::_('form.token'); ?>

			<?php echo JHtml::_('bootstrap.endPane'); ?>
		</fieldset>
		</div>
	</div>
</form>
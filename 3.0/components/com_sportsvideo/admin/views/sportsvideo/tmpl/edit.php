<?php
defined('_JEXEC') or die;
?>
<form action="<?php echo JRoute::_('index.php?option=com_sportsvideo&layout=edit&idvideo='.(int) $this->item->idvideo); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
        <div class="span10 form-horizontal">
            <fieldset>
                <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>
                <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->idvideo) ? JText::_('COM_SPORTSVIDEO_NEW_SPORTSVIDEO', true) : JText::sprintf('COM_SPORTSVIDEO_EDIT_SPORTSVIDEO', $this->item->idvideo, true)); ?>

                <!-- better way to display fields -->
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
                <!-- better way to display fields -->

                <?php echo JHtml::_('bootstrap.endPanel'); ?>
                <input type="hidden" name="task" value="" />
                <?php echo JHtml::_('form.token'); ?>
                <?php echo JHtml::_('bootstrap.endPane'); ?>
            </fieldset>
        </div>
    </div>
</form>

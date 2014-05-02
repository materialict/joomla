<?php
defined('_JEXEC') or die;

/* sorting */
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

?>

<form action="<?php echo JRoute::_('index.php?option=com_sportswriter&view=sportswriters'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span10">

		<div class="clearfix"> </div>
		<table class="table table-striped" id="sportswriterList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th class="nmwriter">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSWRITER_FIELD_NMWRITER_TITLE', 'a.nmwriter', $listDirn, $listOrder); ?>
					</th>
					<th class="nmsearch">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSWRITER_FIELD_NMSEARCH_TITLE', 'a.nmsearch', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php
						echo JHtml::_('grid.id', $i, $item->idwriter);
						?>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportswriter&task=sportswriter.edit&idwriter='.(int) $item->idwriter); ?>">
							<?php echo $this->escape($item->nmwriter); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportswriter&task=sportswriter.edit&idwriter='.(int) $item->idwriter); ?>">
							<?php echo $this->escape($item->nmsearch); ?>
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
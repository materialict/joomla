<?php
defined('_JEXEC') or die;

/* sorting */
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

?>

<form action="<?php echo JRoute::_('index.php?option=com_sportsimage&view=sportsimages'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-main-container" class="span10">

		<div class="clearfix"> </div>
		<table class="table table-striped" id="sportsimageList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>

					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_IDSOURCE', 'a.idsource', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_NMPHOTOGRAPHER', 'a.nmphotographer', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_NRORDER', 'a.nrorder', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_NRYEAR', 'a.nryear', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_DTPUBLISHED', 'a.dtpublished', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_CDMUGSHOT', 'a.cdmugshot', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_CDACTION', 'a.cdaction', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_CDTEAMPHOTO', 'a.cdteamphoto', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_FTPICTURED', 'a.ftpictured', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap">
						<?php echo JHtml::_('grid.sort', 'COM_SPORTSIMAGE_FIELD_HEADING_NMAUTHOR', 'a.ftcaption', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php
						echo JHtml::_('grid.id', $i, $item->idimage);
						?>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->idsource); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->nmphotographer); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->nrorder); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->nryear); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->dtpublished); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->cdoriginal); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->cdmugshot); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->cdaction); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->cdteamphoto); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->ftpictured); ?>
						</a>
					</td>
					<td class="nowrap has-context">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&task=sportsimage.edit&idimage='.(int) $item->idimage); ?>">
							<?php echo $this->escape($item->ftcaption); ?>
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
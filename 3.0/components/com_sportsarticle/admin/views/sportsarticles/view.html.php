<!-- Articles -->
<?php
defined('_JEXEC') or die;
class SportsarticleViewSportsarticles extends JViewLegacy
{
	protected $items;

	/* add the ordering stuff */
	protected $state;

	public function display($tpl = null)
	{
		$this->items = $this->get('Items');

		/* add the ordering stuff */
		$this->state = $this->get('State');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$canDo	= SportsarticleHelper::getActions();
		$bar	= JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_SPORTSARTICLE_MANAGER_SPORTSARTICLES'), '');
		JToolbarHelper::addNew('sportsarticle.add');
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('sportsarticle.edit');
		}
		if ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::publish('sportsarticles.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('sportsarticles.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('sportsarticles.archive');
			JToolbarHelper::checkin('sportsarticles.checkin');
		}
		$state = $this->get('State');
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'sportsarticles.delete', 'JTOOLBAR_EMPTY_TRASH');
		} elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('sportsarticles.trash');
		}

		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_sportsarticle');
		}

		JHtmlSidebar::setAction('index.php?option=com_sportsarticle&view=sportsarticles');
		/* want to add a dropdown just add a line here */
		JHtmlSidebar::addFilter(JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true));
//		JHtmlSidebar::addFilter(JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true));
	}

	protected function getSortFields()
	{
		return array(
			'sa.ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'sa.idarticle' => JText::_('JGRID_HEADING_ID'),
			'sa.nmtitle1' => JText::_('JGRID_HEADING_ID'),
			'sa.dtpublished' => JText::_('JGRID_HEADING_ID')
		);
	}
}
?>
<?php
defined('_JEXEC') or die;
class SportsvideoViewSportsvideos extends JViewLegacy
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
		$canDo = SportsvideoHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');
		JToolbarHelper::title(JText::_('COM_SPORTSVIDEO_MANAGER_SPORTSVIDEOS'), '');
		JToolbarHelper::addNew('sportsvideo.add');
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('sportsvideo.edit');
		}
		
		if ($canDo->get('core.edit.state')) 
		{
			JToolbarHelper::publish('sportsvideos.publish', 'JTOOLBAR_PUBLISH', true);
			JToolbarHelper::unpublish('sportsvideos.unpublish', 'JTOOLBAR_UNPUBLISH', true);
			JToolbarHelper::archiveList('sportsvideos.archive');
			JToolbarHelper::checkin('sportsvideos.checkin');
		}
		$state = $this->get('State');
		if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
		{
			JToolbarHelper::deleteList('', 'sportsvideos.delete', 'JTOOLBAR_EMPTY_TRASH');
		} elseif ($canDo->get('core.edit.state'))
		{
			JToolbarHelper::trash('sportsvideos.trash');
		}
				
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_sportsvideo');
		}

		JHtmlSidebar::setAction('index.php?option=com_sportsviceo&view=sportsvideos');
		JHtmlSidebar::addFilter(JText::_('JOPTION_SELECT_PUBLISHED'), 'filter_state', JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true));		
	}

	protected function getSortFields()
	{
		return array(
			'sv.ordering' => JText::_('JGRID_HEADING_ORDERING'),
			'sv.nmvideo' => JText::_('JGLOBAL_NMVIDEO'),
			'sv.nmurl' => JText::_('JGLOBAL_NMURL'),
			'sv.nmphoto' => JText::_('JGLOBAL_NMPHOTO'),
			'sv.idvideo' => JText::_('JGRID_HEADING_ID')
		);
	}	
}
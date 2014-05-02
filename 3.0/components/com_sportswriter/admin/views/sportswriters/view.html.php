<?php
defined('_JEXEC') or die;

class SportswriterViewSportswriters extends JViewLegacy
{
	protected $items;
	/* sorting */
	protected $state;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		/* sorting */
		$this->state = $this->get('State');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		$canDo	= SportswriterHelper::getActions();
		$bar	= JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_SPORTSWRITER_MANAGER_SPORTSWRITERS'), '');

		JToolbarHelper::addNew('sportswriter.add');

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('sportswriter.edit');
		}
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_sportswriter');
		}
	}
}
<?php
defined('_JEXEC') or die;

class SportsimageViewSportsimages extends JViewLegacy
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
		$canDo	= SportsimageHelper::getActions();
		$bar	= JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_SPORTSIMAGE_MANAGER_SPORTSIMAGES'), '');

		JToolbarHelper::addNew('sportsimage.add');

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('sportsimage.edit');
		}
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_sportsimage');
		}
	}
}
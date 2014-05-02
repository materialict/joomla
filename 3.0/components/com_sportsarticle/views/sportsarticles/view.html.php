<?php
defined('_JEXEC') or die;

class SportsarticleViewSportsarticles extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');

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
		$canDo	= SportsarticleHelper::getActions();
		$bar	= JToolBar::getInstance('toolbar');

		JToolbarHelper::title(JText::_('COM_SPORTSARTICLE_MANAGER_SPORTSARTICLES'), '');

		JToolbarHelper::addNew('sportsarticle.add');

		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('sportsarticle.edit');
		}
		if ($canDo->get('core.admin'))
		{
			JToolbarHelper::preferences('com_sportsarticle');
		}
	}
}
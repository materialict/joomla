<?php
defined('_JEXEC') or die;

class SportsarticleViewSportsarticle extends JViewLegacy
{
	protected $item;
	protected $form;

	public function display($tpl = null)
	{
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

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
		JFactory::getApplication()->input->set('hidemainmenu', true);

		JToolbarHelper::title(JText::_('COM_SPORTSARTICLE_MANAGER_SPORTSARTICLE'), '');

		JToolbarHelper::save('sportsarticle.save');

		if (empty($this->item->idarticle))
		{
			JToolbarHelper::cancel('sportsarticle.cancel');
		}
		else
		{
			JToolbarHelper::cancel('sportsarticle.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
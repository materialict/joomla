<?php
defined('_JEXEC') or die;

class SportsimageViewSportsimage extends JViewLegacy
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

		JToolbarHelper::title(JText::_('COM_SPORTSIMAGE_MANAGER_SPORTSIMAGE'), '');

		JToolbarHelper::save('sportsimage.save');

		if (empty($this->item->idimage))
		{
			JToolbarHelper::cancel('sportsimage.cancel');
		}
		else
		{
			JToolbarHelper::cancel('sportsimage.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
<?php
defined('_JEXEC') or die;
class SportsvideoViewSportsvideo extends JViewLegacy
{
	protected $item;
	protected $form;
	public function display($tpl = null)
	{
		$this->item = $this->get('Item');
		$this->form = $this->get('Form');
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
		JToolbarHelper::title(JText::_('COM_SPORTSVIDEO_MANAGER_SPORTSVIDEO'), '');
		JToolbarHelper::save('sportsvideo.save');
		if (empty($this->item->idvideo))
		{
			JToolbarHelper::cancel('sportsvideo.cancel');
		}
		else
		{
			JToolbarHelper::cancel('sportsvideo.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
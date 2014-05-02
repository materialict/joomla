<?php
defined('_JEXEC') or die;

class SportswriterController extends JControllerLegacy
{
	protected $default_view = 'sportswriters';

	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/sportswriter.php';

		$view   = $this->input->get('view', 'sportswriter');
		$layout = $this->input->get('layout', 'default');
//		$id     = $this->input->getInt('id');
		$id     = $this->input->getInt('idwriter');

		if ($view == 'sportswriter' && $layout == 'edit' && !$this->checkEditId('com_sportswriter.edit.sportswriter', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_sportswriter&view=sportswriters', false));

			return false;
		}

		parent::display();

		return $this;
	}
}
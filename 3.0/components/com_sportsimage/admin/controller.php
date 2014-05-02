<?php
defined('_JEXEC') or die;

class SportsimageController extends JControllerLegacy
{
	protected $default_view = 'sportsimages';

	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/sportsimage.php';

		$view   = $this->input->get('view', 'sportsimage');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('idimage');

		if ($view == 'sportsimage' && $layout == 'edit' && !$this->checkEditId('com_sportsimage.edit.sportsimage', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_sportsimage&view=sportsimages', false));

			return false;
		}

		parent::display();

		return $this;
	}
}
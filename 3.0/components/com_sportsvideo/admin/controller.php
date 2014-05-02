<?php
defined('_JEXEC') or die;

class SportsvideoController extends JControllerLegacy
{
	protected $default_view = 'sportsvideos';
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/sportsvideo.php';
		$view = $this->input->get('view', 'sportsvideo');
		$layout = $this->input->get('layout', 'default');
		$id = $this->input->getInt('idvideo');
		if ($view == 'folio' && $layout == 'edit' && !$this->checkEditId('com_sportsvideo.edit.sportsvideo', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_sportsvideo&view=sportsvideos', false));
			return false;
		}
		parent::display();
		return $this;
	}
}
?>
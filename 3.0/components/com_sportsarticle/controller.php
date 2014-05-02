<?php
defined('_JEXEC') or die;

class SportsarticleController extends JControllerLegacy
{
	protected $default_view = 'sportsarticles';

	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/sportsarticle.php';

		$view   = $this->input->get('view', 'sportsarticle');
		$layout = $this->input->get('layout', 'default');
//		$id     = $this->input->getInt('id');
		$id     = $this->input->getInt('idarticle');

		if ($view == 'sportsarticle' && $layout == 'edit' && !$this->checkEditId('com_sportsarticle.edit.sportsarticle', $id))
		{
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_sportsarticle&view=sportsarticles', false));

			return false;
		}

		parent::display();

		return $this;
	}
}
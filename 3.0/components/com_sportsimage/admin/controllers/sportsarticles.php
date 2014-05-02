<?php
defined('_JEXEC') or die;

class SportsarticleControllerSportsarticles extends JControllerAdmin
{
	public function getModel($name = 'Sportsarticle', $prefix = 'SportsarticleModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}
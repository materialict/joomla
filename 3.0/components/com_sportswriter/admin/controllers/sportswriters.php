<?php
defined('_JEXEC') or die;

class SportswriterControllerSportswriters extends JControllerAdmin
{
	public function getModel($name = 'Sportswriter', $prefix = 'SportswriterModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}
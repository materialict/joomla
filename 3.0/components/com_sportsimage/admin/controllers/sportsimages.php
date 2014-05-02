<?php
defined('_JEXEC') or die;

class SportsimageControllerSportsimages extends JControllerAdmin
{
	public function getModel($name = 'Sportsimage', $prefix = 'SportsimageModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
}
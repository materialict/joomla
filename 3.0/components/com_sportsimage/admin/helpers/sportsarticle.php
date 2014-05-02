<?php
defined('_JEXEC') or die;

class SportsarticleHelper
{
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_sportsarticle';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_sportsarticle.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_sportsarticle', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
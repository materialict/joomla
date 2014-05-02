<?php
defined('_JEXEC') or die;

class SportsimageHelper
{
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_sportsimage';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_sportsimage.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_sportsimage', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
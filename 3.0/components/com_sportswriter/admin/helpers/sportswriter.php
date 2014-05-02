<?php
defined('_JEXEC') or die;

class SportswriterHelper
{
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_sportswriter';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_sportswriter.category.'.(int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_sportswriter', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}
}
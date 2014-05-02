<?php
defined('_JEXEC') or die;
class SportsvideoHelper
{
	public static function getActions($categoryId = 0)
	{
		$user = JFactory::getUser();
		$result = new JObject;
		if (empty($categoryId))
		{
			$assetName = 'com_sportsvideo';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_sportsvideo.category.'.(int) $categoryId;
			$level = 'category';
		}
		$actions = JAccess::getActions('com_sportsvideo', $level);
		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}
		return $result;
	}
}
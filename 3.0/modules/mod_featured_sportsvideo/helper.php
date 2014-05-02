<?php
defined('_JEXEC') or die;
abstract class mod_featured_sportsvideoHelper
{
	public static function getList(&$params)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('idvideo, nmvideo, nmphoto, nmurl');
		$query->from('#__sportsvideo');
		$query->where('featured=1');
		$query->where("nmphoto NOT LIKE ''");
		$query->order('ordering DESC');
		$db->setQuery($query, 0, $params->get('count', 5));
		
		try
		{
			$results = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseError(500, $e->getMessage());
			return false;
		}

		foreach ($results as $k => $result)
		{			
			$results[$k] = new stdClass;
			$results[$k]->nmvideo	= htmlspecialchars( $result->nmvideo );
			$results[$k]->idvideo 	= htmlspecialchars( $result->idvideo );
			$results[$k]->nmphoto	= htmlspecialchars( $result->nmphoto );
			$results[$k]->nmurl		= htmlspecialchars( $result->nmurl );
		}
		return $results;
	}
}
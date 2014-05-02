<?php
defined('_JEXEC') or die;

class SportsimageModelSportsimages extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.idimage',
				'idsource', 'a.idsource',
				'nmphotographer', 'a.nmphotographer',
				'nrorder', 'a.nrorder',
				'nryear', 'a.nryear',
				'dtpublished', 'a.dtpublished',
				'cdoriginal', 'a.cdoriginal',
				'cdmugshot', 'a.cdmugshot',
				'cdaction', 'a.cdaction',
				'cdteamphoto', 'a.cdteamphoto',
				'ftpictured', 'a.ftpictured',
				'ftcaption', 'a.ftcaption'

			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
				'a.idimage'
			)
		);
		$query->from($db->quoteName('#__sportsimage').' AS a');

//		$query->where('(a.state IN (0, 1))');

//		$query->where("a.image NOT LIKE ''");

		return $query;
	}
}
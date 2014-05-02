<?php
defined('_JEXEC') or die;

/* <Componentname>Model<Viewname> */
class SportsimageModelSportsimages extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			/* sorting */
			$config['filter_fields'] = array(
				'id', 'a.idimage',
				'source', 'a.idsource',
				'photographer', 'a.nmphotographer',
				'order', 'a.nrorder',
				'year', 'a.nryear',
				'publishdate', 'a.dtpublished',
				'publishdate', 'a.dtpublished',
				'publishdate', 'a.dtpublished',
				'publishdate', 'a.dtpublished',
				'original', 'a.cdoriginal',
				'mugshot', 'a.cdmugshot',
				'actionphoto', 'a.cdaction',
				'teamphoto', 'a.cdteamphoto',
				'pictured', 'a.ftpictured',
				'caption', 'a.ftcaption'
			);
		}
		parent::__construct($config);
	}

	/* sorting */
	protected function populateState($ordering = null, $direction = null)
	{
		parent::populateState('a.idsource', 'asc');
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select', 'a.idimage, a.idsource, a.nmphotographer, a.nrorder, a.nryear, a.dtpublished, a.cdoriginal, a.cdmugshot, a.cdaction, a.cdteamphoto, a.ftpictured, a.ftcaption'));
		$query->from($db->quoteName('#__sportsimage') . ' AS a');

		/* sorting */
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
	}
}
?>
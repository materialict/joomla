<?php
defined('_JEXEC') or die;

class SportsimageModelSportsimage extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.idimage'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$id = JRequest::getInt('idimage');
		$this->setState('idimage', $id);
	}

	protected function getListQuery()
	{
		$db= $this->getDbo();
		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'a.idimage, a.nmphotographer'
			)
		);
		$query->from($db->quoteName('#__sportsimage').' AS a');
//		$query->where('(a.state IN (0, 1))');

		if ($id = $this->getState('idimage'))
		{
			$query->where('a.idimage = '.(int) $id);
		}
//		print_r($query);
		return $query;
	}
}

?>
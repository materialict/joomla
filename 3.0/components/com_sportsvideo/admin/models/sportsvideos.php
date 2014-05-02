<?php
defined('_JEXEC') or die;
class SportsvideoModelSportsvideos extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'idvideo', 'sv.idvideo',
				'nmvideo', 'sv.nmvideo',
				'nmurl', 'sv.nmurl',
				'nmphoto', 'sv.nmphoto',
				'publish_up', 'sv.publish_up',
				'publish_down', 'sv.publish_down',
				'ordering', 'sv.ordering',
				'featured', 'sv.featured',
				'state', 'sv.state' 				/* we add state but not the image and the catid */

			);
		}
		parent::__construct($config);
	}

	/* add the ordering stuff */
	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		$this->setState('filter.state', $published);

		parent::populateState('sv.ordering', 'asc');
	}

	protected function getListQuery()
	{
		$db = $this->getDbo();

		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
				/* we add state but not the image and the catid */
				'list.select',
				'sv.idvideo, sv.nmvideo, sv.nmurl, sv.nmphoto, sv.publish_up, sv.publish_down, sv.ordering, sv.state, sv.featured'
			)
		);
		$query->from($db->quoteName('#__sportsvideo').' AS sv');

		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			$query->where('sv.state = '.(int) $published);
		} elseif ($published === '')
		{
			$query->where('(sv.state IN (0, 1))');
		}

		// Filter by search in nmvideo
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('sv.idvideo = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
//				$query->where('(sv.nmvideo LIKE '.$search.' OR a.company LIKE'.$search.')');
				$query->where('(sv.nmvideo LIKE '.$search.')');
			}
		}

		/* add the ordering stuff */
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
	}
}
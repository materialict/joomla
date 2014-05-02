<?php
defined('_JEXEC') or die;

/* <Componentname>Model<Viewname> */
class SportsarticleModelSportsarticles extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'idarticle', 'sa.idarticle',

				'publish_up', 'sa.publish_up',
				'publish_down', 'sa.publish_down',
				'ordering', 'sa.ordering',
				'featured', 'sa.featured',
				'state', 'sa.state' 				/* we add state but not the image and the catid */
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

		parent::populateState('sa.ordering', 'asc');
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select(
			$this->getState(
				/* we add state but not the image and the catid */
				'list.select', 
				'sa.idarticle, sa.nmtitle1, sa.nmauthor, sa.dtpublished, sa.publish_up, sa.publish_down, sa.ordering, sa.state, sa.featured'
			)
		);
		$query->from($db->quoteName('#__sportsarticle') . ' AS sa');

		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			$query->where('sa.state = '.(int) $published);
		} elseif ($published === '')
		{
			$query->where('(sa.state IN (0, 1))');
		}

		// Filter by search in article and nmtitles
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('sa.idarticle = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(sa.ftarticle LIKE '.$search.' OR a.nmtitle1 LIKE '.$search.'  OR a.nmtitle2 LIKE '.$search.'  OR a.nmtitle3 LIKE '.$search.')');
			}
		}

		/* add the ordering stuff */
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));



		return $query;
	}
}
?>
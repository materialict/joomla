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
				'id', 'a.id',
				'title', 'a.title',
			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select', 'a.idarticle, a.nmtitle1, a.nmauthor, a.dtpublished'));
		$query->from($db->quoteName('#__sportsarticle') . ' AS a');

		return $query;
	}
}
?>
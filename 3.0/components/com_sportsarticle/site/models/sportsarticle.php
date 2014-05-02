<?php
defined('_JEXEC') or die;

class SportsarticleModelSportsarticle extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'idarticle', 'sa.idarticle',
				'nmtitle1', 'sa.nmtitle1',
				'nmtitle2', 'sa.nmtitle2',
				'nmtitle3', 'sa.nmtitle3',
				'dtpublished', 'sa.dtpublished',
				'nmauthor', 'sa.nmauthor',
				'ftarticle', 'sa.ftarticle'
			);
		}
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null)
	{
		$id = JRequest::getInt('idarticle');
		$this->setState('idarticle', $id);
	}

	protected function getListQuery()
	{
		$db= $this->getDbo();
		$query = $db->getQuery(true);
		$query->select(
			$this->getState(
				'list.select',
				'sa.idarticle, sa.idsource,' .
				'sa.nmauthor, sa.dtpublished,' .
				'sa.nmtitle1, sa.nmtitle2, sa.nmtitle3,' .
				'sa.ftarticle, sw.nmsearch'
			)
		);
		$query->from($db->quoteName('#__sportsarticle').' AS sa');
		$query->from($db->quoteName('#__sportswriter').' AS sw');
//		$query->where('(a.state IN (0, 1))');

		$query->where('sa.idsource = sw.idwriter');
		if ($id = $this->getState('idarticle'))
		{
			$query->where('sa.idarticle = '.(int) $id);
		}

		return $query;
	}
}

?>
<?php
defined('_JEXEC') or die;
class SportsarticleModelSportsarticles extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
			'idarticle', 'a.idarticle',
			'idsource', 'a.idsource',
			'nmtitle1', 'a.nmtitle1',
			'nmauthor', 'a.nmauthor',
			'ftarticle', 'a.ftarticle'
			);
		}
//		print_r($config);
		parent::__construct($config);
	}
	protected function getListQuery()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select(
		$this->getState(
			'list.select',
			'sa.idarticle, sw.nmwriter, sa.nmtitle1, sa.nmauthor, sa.dtpublished, sa.ftarticle'
			)
		);
		$query->from($db->quoteName('#__sportsarticle').' AS sa');
		$query->from($db->quoteName('#__sportswriter').' AS sw');
		$query->where('sa.idsource = sw.idwriter');
//		$query->where('(a.state IN (0, 1))');
//		$query->where("a.image NOT LIKE ''");
//print_r($query);
		return $query;
	}
}
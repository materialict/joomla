<?php
defined('_JEXEC') or die;

/* <Componentname>Model<Viewname> */
class SportswriterModelSportswriters extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.idwriter',
				'searchname', 'a.nmsearch',
				'writername', 'a.nmwriter',
				'contact', 'a.nmcontact',
				'address', 'a.nmaddress',
				'postalcode', 'a.nmpostal',
				'city', 'a.nmcity',
				'phone', 'a.ftphone',
				'cellphone', 'a.ftcellphone',
				'email', 'a.ftemail',
				'website', 'a.ftwebsite',
				'permission', 'a.cdpermission'
			);
		}

		parent::__construct($config);
	}

	/* sorting */
	protected function populateState($ordering = null, $direction = null)
	{
		parent::populateState('a.idwriter', 'asc');
	}

	protected function getListQuery()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select($this->getState('list.select', 'a.idwriter, a.nmsearch, a.nmwriter'));
		$query->from($db->quoteName('#__sportswriter') . ' AS a');

		/* sorting */
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol.' '.$orderDirn));

		return $query;
	}
}
?>
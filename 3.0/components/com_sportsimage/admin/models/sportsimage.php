<?php
defined('_JEXEC') or die;

class SportsimageModelSportsimage extends JModelAdmin
{
	/* name of the component */
	protected $text_prefix = 'COM_SPORTSIMAGE';

	public function getTable($type = 'Sportsimage', $prefix = 'SportsimageTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/* get the form definition based on the layout xml */
	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_sportsimage.sportsimage', 'Sportsimage', array('control'=>'jform', 'load_data'=>$loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}

	/* get the data from the database into the form */
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_sportsimage.edit.sportsimage.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}

	/* transform the data before it is displayed */
	protected function prepareTable($table)
	{
		/* remove the HTML special characters and replace them by the ASCII equivalent.*/
		$table->nmtitle1 = htmlspecialchars_decode($table->nmtitle1, ENT_QUOTES);
		$table->nmtitle2 = htmlspecialchars_decode($table->nmtitle2, ENT_QUOTES);
		$table->nmtitle3 = htmlspecialchars_decode($table->nmtitle3, ENT_QUOTES);
	}
}
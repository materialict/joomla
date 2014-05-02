<?php
defined('_JEXEC') or die;
class SportsvideoModelSportsvideo extends JModelAdmin
{
	protected $text_prefix = 'COM_SPORTSVIDEO';
	public function getTable($type = 'Sportsvideo', $prefix = 'SportsvideoTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		$form = $this->loadForm('com_sportsvideo.sportsvideo', 'sportsvideo', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_sportsvideo.edit.sportsvideo.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	protected function prepareTable($table)
	{
		$table->nmvideo = htmlspecialchars_decode($table->nmvideo, ENT_QUOTES);
	}

	/* start featured stuff */
	public function featured($pks, $value = 0)
	{
		// Sanitize the ids.
		$pks = (array) $pks;
		JArrayHelper::toInteger($pks);
		if (empty($pks))
		{
			$this->setError(JText::_('COM_FOLIO_NO_ITEM_SELECTED'));
			return false;
		}
		try
		{
			$db = $this->getDbo();
			$db->setQuery(
				'UPDATE #__sportsvideo' .
				' SET featured = ' . (int) $value .
				' WHERE idvideo IN (' . implode(',', $pks) . ')'
			);
			$db->execute();
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());
			return false;
		}
		$this->cleanCache();
		return true;
	}
	/* end featured stuff */
}
<?php
defined('_JEXEC') or die;

class com_sportswriterInstallerScript
{
	function install($parent)
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_sportswriter');
	}
	function uninstall($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSWRITER_UNINSTALL_TEXT') . '</p>';
	}
	function update($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSWRITER_UPDATE_TEXT') . '</p>';
	}
	/* function runs BEFORE installation */
	function preflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSWRITER_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}
	/* function runs AFTER installation */
	function postflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSWRITER_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
?>
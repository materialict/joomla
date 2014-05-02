<?php
defined('_JEXEC') or die;
class com_sportsvideoInstallerScript
{
	function install($parent)
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_sportsvideo');
	}
	function uninstall($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSVIDEO_UNINSTALL_TEXT') . '</p>';
	}
	function update($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSVIDEO_UPDATE_TEXT') . '</p>';
	}
	function preflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSVIDEO_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}
	function postflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSVIDEO_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
<?php
defined('_JEXEC') or die;

class com_sportsarticleInstallerScript
{
	function install($parent)
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_sportsarticle');
	}
	function uninstall($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSARTICLE_UNINSTALL_TEXT') . '</p>';
	}
	function update($parent)
	{
		echo '<p>' . JText::_('COM_SPORTSARTICLE_UPDATE_TEXT') . '</p>';
	}
	/* function runs BEFORE installation */
	function preflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSARTICLE_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}
	/* function runs AFTER installation */
	function postflight($type, $parent)
	{
		echo '<p>' . JText::_('COM_SPORTSARTICLE_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
?>
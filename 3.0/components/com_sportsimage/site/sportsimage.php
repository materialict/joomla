<?php
defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('Sportsimage');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
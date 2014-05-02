<?php
defined('_JEXEC') or die;

$controller	= JControllerLegacy::getInstance('Sportsvideo');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
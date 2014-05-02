<?php
defined('_JEXEC') or die;

/* add the css file */
$document = JFactory::getDocument();
$cssFile = "./media/com_sportsarticle/css/site.stylesheet.css";
$document->addStyleSheet($cssFile);

$controller = JControllerLegacy::getInstance('Sportsarticle');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

?>
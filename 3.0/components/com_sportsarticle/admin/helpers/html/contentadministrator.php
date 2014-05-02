<!-- Sportsarticles -->
<?php
defined('_JEXEC') or die;
abstract class JHtmlContentAdministrator
{
	public static function featured($value = 0, $i, $canChange = true)
	{
		JHtml::_('bootstrap.tooltip');
		// Array of image, task, title, action
		$states = array(0 => array('star-empty', 'sportsarticles.featured', 'COM_SPORTSARTICLE_UNFEATURED', 'COM_SPORTSARTICLE_TOGGLE_TO_FEATURE'),
				1 => array('star', 'sportsarticles.unfeatured', 'COM_SPORTSARTICLE_FEATURED', 'COM_SPORTSARTICLE_TOGGLE_TO_UNFEATURE'),
		);
		$state = JArrayHelper::getValue($states, (int) $value,
		$states[1]);
		$icon = $state[0];
		if ($canChange)
		{
			$html = '<a href="#" onclick="return listItemTask(\'cb'.$i.'\', \''.$state[1].'\')" class="btn btn-micro hasTooltip' . ($value == 1 ?
' active' : '') . '" title="'.JText::_($state[3]).'"><i class="icon-' . $icon.'"></i></a>';
		}
		else
		{
			$html = '<a class="btn btn-micro hasTooltip disabled' . ($value == 1 ? ' active' : '') . '" title="'.JText::_($state[2]).'"><i
class="icon-' . $icon.'"></i></a>';
		}
		return $html;
	}
}
<?php
defined('_JEXEC') or die;

/* include the helpers */
require_once JPATH_COMPONENT . '/helpers/class.sportsimage.php';

class SportsimageViewSportsimages extends JViewLegacy
{
	protected $items;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		/* create the object */
		$objImage = new sportsImage();

		/* do some additional processing */
		for ($i = 0; $i < count($this->items); $i++){

			/* create the thumbnail */
			$this->items[$i]->thumbnail	= $objImage->createThumbnailHtml($this->items[$i]->idimage);
		}//endfor
		
		/* display the result */
		parent::display($tpl);
	}
}
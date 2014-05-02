<?php
defined('_JEXEC') or die;

/* include the sportsimage class helper */
require_once JPATH_ROOT . '/components/com_sportsimage/helpers/class.sportsimage.php';

/* componentname View viewname */
class SportsarticleViewSportsarticles extends JViewLegacy
{
	protected $items;
	public function display($tpl = null){
		/* get the records */
		$this->items = $this->get('Items');
		/* error handling */
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("/n", $errors));
			return false;
		}

		/* do some additional processing */
		for ($i = 0; $i < count($this->items); $i++){
			/* cut the ftarticle to a max length of ?? */
			$this->items[$i]->ftarticle = substr($this->items[$i]->ftarticle, 0, 300);
			/* and remove the half words i.e. go back to the last space */
			$this->items[$i]->ftarticle = substr($this->items[$i]->ftarticle, 0,strrpos($this->items[$i]->ftarticle, " "));

			/* get the logo */
			$imageObject 	= new sportsImage();
			$idimage 		= $imageObject->getArticleImage($this->items[$i]->idarticle);
			if (!empty($idimage)){
				$this->items[$i]->thumbnail = $imageObject->createThumbnailHtml($idimage);
			} else {
				$this->items[$i]->thumbnail = "";
			}
			
		}

		/* display the result */
		parent::display($tpl);
	}
}
?>
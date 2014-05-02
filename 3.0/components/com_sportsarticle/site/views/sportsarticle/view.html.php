<?php
defined('_JEXEC') or die;

/* include the sportsimage class helper */
//require_once JPATH_COMPONENT . '/helpers/class.sportsimage.php';
require_once JPATH_ROOT . '/components/com_sportsimage/helpers/class.sportsimage.php';
require_once JPATH_ROOT . '/components/com_sportsarticle/helpers/class.sportswriter.php';

/* componentname View viewname */
class SportsarticleViewSportsarticle extends JViewLegacy
{
	protected $items;
	
	/* overriding the display function from JViewLegacy */
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

			/* alter the date */
			$this->items[$i]->dtpublished = $this->createArticleDate($this->items[$i]->dtpublished);

			/* create the article layout */
			$this->items[$i]->ftarticle = $this->createArticleLayout($this->items[$i]);

			/* get the logo */
			$writerObject 	= new sportsWriter();
			$this->items[$i]->articleLogo = $writerObject->createNewspaperLogo($this->items[$i]->nmsearch);


		}//endfor
		/* display the result */
		parent::display($tpl);
	}

	private function createArticleLayout($data){
		/*
		This function changes the layout of the article so that:
		- the article is seperated in paragraphs
		- the first paragraph is displayed in bold
		- headers in between the articles are displayed in bold.
		*/
		
		/* init */
		$ftarticle	= $data->ftarticle;
		$idarticle	= $data->idarticle;
		
		$imageObject = new sportsImage();
		$images = $imageObject->getArticleImages($idarticle);
	
		/* add line breaks */
		$ftarticle = nl2br($ftarticle);

		// determine length of text
		$article_length = strlen($ftarticle);

		$x=0;
		do {
			// get the position for the first eol character
			$pointer = strpos($ftarticle, chr(10));

			// if the pointer is empty we have reached the end of the text
			if ($pointer == ""){
				// so write the last peace of text in the last paragraph array
				$paragraphs[$x] 	= $ftarticle;
				// clear the text and set the text length to 0 so we leave the while loop
				$ftarticle 		= "";
				$article_length = 0;
			} else {
				// there are still EOL characters
				// get the text before the EOL character
				$paragraphs[$x] = substr($ftarticle, 0, $pointer);
				// $x goes up 1
				$x++;
				// get the next text after the EOL character
				$ftarticle	= substr($ftarticle, $pointer+1, $article_length);
				// determine the new length
				$article_length = strlen($ftarticle);
			} // endif
		} while ($article_length>0);

		$nrparagraphs_between = $this->calculateNumberParagraphs($paragraphs, $images);
		
		/* reconstruct the article */
		$ftarticle = "";
		$y = 0;
		$nrparagraphs_passed = 0;
		for ($x=0;$x<count($paragraphs);$x++){

			if (count($images) > 0 and (count($images) > $y)) {
				// there are images so we must use them
				// if the length is a considerable paragraph/alinea then add the image
				if ($y==0 && !empty($images)){
					// add the first photo
					$ftarticle .= $images[$y]->HTML;
					$y++;
				}

				if (strlen($paragraphs[$x])>= 100){
					$nrparagraphs_passed++;
					//echo $atalineas_passed;
					// if the number of alineas passed is equal to a multitude of atalineas_between the photos then print a new photo
					if ($nrparagraphs_passed == ($nrparagraphs_between * $y)){
						$ftarticle .= $images[$y]->HTML;
						$y++;
					}
				} // endif
		   }// endif

			// the first alinea must be bold and the short texts (25 char) in between as well
			if (($x==0) or (strlen($paragraphs[$x])<= 25)){
				$ftarticle .= "<b>" . $paragraphs[$x] . "</b>";
			} else {
				$ftarticle .= $paragraphs[$x];
			}
		}

		return $ftarticle;
	}//createArticleLayout

	private function calculateNumberParagraphs($paragraphs, $images){
		/*
		count the number of paragraphs
		a paragraph is a line of text larger than 100 characters
		*/
		if (!isset($images) or $images ==""){
			$images = 0;
		}

		$nrlarge_paragraphs = 0;
		for ($x=0;$x<count($paragraphs);$x++){
			if (strlen($paragraphs[$x]) > 100){
				$nrlarge_paragraphs++;
			}
		}// endfor

		return round($nrlarge_paragraphs/count($images));
//		$nrparagraphs_between = $nrlarge_paragraphs;
	}	
	
	function createArticleDate($dtpublished){
		$dateTime = DateTime::createFromFormat('Y-m-d', $dtpublished);

		/* as found in http://php.net/manual/en/function.date.php */
		return $dateTime->format('l, j F Y');
	}
	
}
?>
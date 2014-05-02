<?php
defined('_JEXEC') or die;

class sportsImage{
	var $maxImageWidth		= 400;
	var $maxImageHeight		= 400;
	var $maxThumbWidth 		= 125;
	var $maxThumbHeight		= 125;
	var $imageWidth;
	var $imageHeight;

    var $Image;
	var $imageUrl;
	var $thumbnailUrl;
	var $imagePath;
	var $thumbnailPath;


	/* the constructor */
	function sportsImage(){
		$this->imageUrl 		= JURI::root() . 'media/com_sportsimage/images/';
		$this->thumbnailUrl 	= JURI::root() . 'media/com_sportsimage/thumbnails/';
		$this->imagePath 		= JPATH_ROOT . '/media/com_sportsimage/images/';
		$this->thumbnailPath 	= JPATH_ROOT . '/media/com_sportsimage/thumbnails/';
//		JPATH_ROOT
	}


	function getArticleImage($idarticle){
		/* get a single image */

		// Get a db connection.
		$db = JFactory::getDbo();
		// Create a new query object.
		$query = $db->getQuery(true);

		// Select all the images in the article
		$query->select($db->quoteName(array('sai.idimage')));
		$query->from($db->quoteName('#__sportsarticlephoto').' AS sai' );
		$query->where('sai.idarticle = '.(int) $idarticle);

//		print_r($query);

		// Reset the query using our newly populated query object.
		$db->setQuery($query);

		// Load the results as a list of stdClass objects (see later for more options on retrieving data).
//		$results = $db->loadObjectList();
		$row = $db->loadRow();
		return $row[0];
	}


	function getArticleImages($idarticle){
		/* return an array of article images */

		// Get a db connection.
		$db = JFactory::getDbo();
		// Create a new query object.
		$query = $db->getQuery(true);

		// Select all the images in the article
		$query->select($db->quoteName(array('sai.ftcaption', 'si.idimage', 'si.nrorder', 'si.nmphotographer', 'sw.nmwriter', 'sw.ftwebsite')));
		$query->from($db->quoteName('#__sportsarticlephoto').' AS sai' );
		$query->from($db->quoteName('#__sportsimage').' AS si' );
		$query->from($db->quoteName('#__sportswriter').' AS sw' );
		$query->where('sai.idarticle = '.(int) $idarticle);
		$query->where('sai.idimage = si.idimage');
		$query->where('si.idsource = sw.idwriter');
		$query->order('sai.idarticlephoto ASC');

		// Reset the query using our newly populated query object.
		$db->setQuery($query);

		// Load the results as a list of stdClass objects (see later for more options on retrieving data).
		$results = $db->loadObjectList();

		/* create the catpion and add it to the result */
		$images = "";
		for ($i=0; $i < count($results); $i++){
			/* if the vaariable is even place it on the left. If odd place it on the right */
			if ($i%2 == 0){
				$class = "sportsarticleimage_left";				
			} else {
				$class = "sportsarticleimage_right";
			}
			
//			print_r($results);
			$ftcaption = $this->createCaption($results[$i]->nmwriter, $results[$i]->ftcaption, $results[$i]->ftwebsite);
			$images[$i]->HTML	= $this->createImageWithCaptionHTML($results[$i]->idimage, $ftcaption, $class);
		}

		return $images;
	}

	function createCaption($nmwriter, $ftcaption, $ftwebsite){
		/* create the caption that goes with the sportsimage */

		/* create the order number information */
        if (isset($nrorder) and $nrorder != ""){
			$nrorder = ", bestelnummer " . $nrorder;
        }

		/* create the sportswriter information */
		if (isset($nmwriter) and $nmwriter != ""){
			if (isset($ftwebsite) and $ftwebsite != ""){
				$nmwriter = "Foto: <a href='" . $ftwebsite . "' target='_new'>" . $nmwriter . "</a>";
			} else {
				$nmwriter = "Foto: " . $nmwriter;
			}
			if (!empty($nrorder)){
				$nmwriter = '(' . $nmwriter . ', ' . $nrorder .  ')';
			} else {
				$nmwriter = '(' . $nmwriter . ')';
			}
		}

		/* put them together */
		$result = $ftcaption . $nmwriter;
		return $result;
	}

    function createImageName($id, $url, $path){
		/* create the filename for the imaage */
		
		/* construct the image name */
        $filename = substr(strval(1000000 + $id),1, 6);
        $filename .= ".jpg";

		/* check if it exists in the path */
		if (!file_exists($path . $filename)){
			/* create a dummy filename */
	        $filename = "000000.jpg";
		}
		
		/* create the url */
        $filename = $url . $filename;

        return $filename;
    }// GetImageName

	function createImageWithCaptionHTML($idimage, $ftcaption, $class){
		/* Create a div tag containing the image as well as the caption.  */

		/* create the image HTML tag */
		$image = $this->createImageHtml($idimage);

		/* put it together in a div element */
		$html = "<div class='$class' style='width={$this->imageWidth}px' >\n";
		$html .= "<div>$image</div>\n";
		$html .= "<div class='sportsarticle_ftcaption' style='width={$this->imageWidth}px'>" . $ftcaption . "</div>\n";
		$html .= "</div>\n";

		return $html;
	}

	function getImageProperties($filename){
		/* Determine the properties based on the image name */

		/* get the properties */
		$properties = getimagesize($filename);
		// $Size[0] = Width
		// $Size[1] = Height

		/* put them in a variable */
		$this->imageWidth	= $properties[0];
		$this->imageHeight	= $properties[1];
	}

	function scaleImage($width, $height, $maxWidth, $maxHeight){
		/* calculate the dimensions of the image */

		if  ($width > $height){
			/* set width to the maximum */
			$this->imageWidth	= $maxWidth;
			/* recalculate the height */
			$this->imageHeight	=  round(($height/$width) * $maxWidth);
		} else {
			/* set height to the maximum */
			$this->imageHeight	= $maxHeight;
			/* recalculate the height */
			$this->imageWidth	=  round(($width/$height) * $maxHeight);
		}
	}

	function createThumbnailHtml($idimage){
		/* create the image html tag for the thumbnail */

		/* create the file name */
		$filename = $this->createImageName($idimage, $this->thumbnailUrl, $this->thumbnailPath);

		/* get the properties */
		$this->getImageProperties($filename);

		/* scale the image */
		$this->scaleImage($this->imageWidth, $this->imageHeight, $this->maxThumbWidth, $this->maxThumbHeight);

		/* create the HTML */
		$html = "<img name='' src='$filename' width='$this->imageWidth' height='$this->imageHeight' alt='' />";

		/* return it */
		return $html;
	}
	
	function createImageHtml($idimage){
		/* create the image html tag for the thumbnail */

		/* create the file name */
		$filename = $this->createImageName($idimage, $this->imageUrl, $this->imagePath);

		/* get the properties */
		$this->getImageProperties($filename);

		/* scale the image */
		$this->scaleImage($this->imageWidth, $this->imageHeight, $this->maxImageWidth, $this->maxImageHeight);

		/* create the HTML */
		$html = "<img name='' src='$filename' width='$this->imageWidth' height='$this->imageHeight' alt='' />";

		/* return it */
		return $html;
	}
	
}
?>
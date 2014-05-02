<?php 
class sportsImage{
	var $MaxWidth	= 400;
	var $MaxHeight	= 400;
    var $Image;
//	var $imagePath = JURI::root() . 'media/com_sportsimage/'; 
	var $imagePath = './image/'; 
	var $thumbnailPath = './thumbnails/'; 
	
	
	/* the constructor */
	function sportsImage(){
		$this->imagePath = JURI::root() . 'media/com_sportsimage/images/'; 
	}		
		
	function getArticleImages($idarticle){
		/* return an array of article images */
		
		// Get a db connection.
		$db = JFactory::getDbo();
		// Create a new query object.	
		$query = $db->getQuery(true);

		// Select all the images in the article 
		$query->select($db->quoteName(array('sai.ftcaption', 'si.idimage', 'si.nrorder', 'si.nmphotographer', 'sw.nmwriter')));
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
			$images[$i]->ftcaption	= $this->createImageCaption($results[$i]);
			$images[$i]->image		= $this->createImageName($results[$i]->idimage, $this->imagePath);
			$images[$i]->HTML		= $this->createImageHTML($images[$i]);
		}
		
		return $images;
	}

	function createImageCaption($data){
		/* create the caption that goes with the sportsimage */

		/* get the caption and maybe do some highlighting */
		$ftcaption = $data->ftcaption;

		/* create the order number information */
		$nrorder = "";
        if (isset($data->nrorder) and $data->nrorder != ""){
			$nrorder = ", bestelnummer " . $data->nrorder;
        }

		/* create the sportswriter information */
		$nmwriter = "";
		if (isset($data->nmwriter) and $data->nmwriter != ""){
			if (isset($data->ftwebsite) and $data->ftwebsite != ""){
				$nmwriter = "Foto: <a href='" . $data->ftwebsite . "' target='_new'>" . $data->nmwriter . "</a>"; 												
			} else {
				$nmwriter = "Foto: " . $data->nmwriter; 
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
	
    function createImageName($id, $path){
        $this->Image = substr(strval(1000000 + $id),1, 6);
        $this->Image = $path . $this->Image . ".jpg";

        return $this->Image;
    }// GetImageName
	
	function createImageHTML($data){
		/* turn the array into a HTML string */
		
		/* init */
		$ftcaption	= $data->ftcaption; 
		$image		= $data->image;
		$width		= $data->width;
		$height		= $data->height;

		$html = "<div class='sportsarticleimage'>\n";
		$html .= "<div>\n";
		$html .= "<img  src='" . $image . "' width='$height' height='$width'>\n"; 
		$html .= "</div>\n";
		$html .= "<div class='sportsarticle_ftcaption'>" . $ftcaption . "</div>\n";
		$html .= "</div>\n";		
				
		return $html;
	}
	
	function getImageProperties($data){
		/* Determine the properties based on the image name */
		$properties = getimagesize($data->image);
		// $Size[0] = Width
		// $Size[1] = Height
		$data->width        = $properties[0];
		$data->height       = $properties[1];
	
	}
}
?>
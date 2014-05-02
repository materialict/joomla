<?php
defined('_JEXEC') or die;

class sportsWriter{
	var $imageUrl;
	var $imagePath;
		
	/* the constructor */
	function sportsWriter(){
		$this->imageUrl 	= JURI::root() . 'media/com_sportswriter/media/'; 		
		$this->imagePath	= JPATH_ROOT . '/media/com_sportswriter/media/';

	}
	function createNewspaperLogo($filename){
		/* create an image tag with the newspaper logo */
		
		$filename = $this->createNewspaperFilename($filename, $this->imageUrl, $this->imagePath);
		$filename = "<img border='0'name='' src='$filename' width='' height='' alt='' />";
		return $filename;
	}
	
    function createNewspaperFilename($filename, $url, $path){
		/* create the filename for the imaage */
		
		/* construct the image name */
        $filename .= ".jpg";

		/* check if it exists in the path */
		if (!file_exists($path . $filename)){
			/* create a dummy filename */
	        $filename = "unknown.jpg";
		}
		
		/* create the url */
        $filename = $url . $filename;

        return $filename;
    }// GetImageName

	/* getters and setters */
	function getImageUrl(){
		return $this->imageUrl;	
	}
	function getImagePath(){
		return $this->imagePath;	
	}
}
?>
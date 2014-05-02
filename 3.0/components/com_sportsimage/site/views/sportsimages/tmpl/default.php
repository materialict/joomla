<?php
defined('_JEXEC') or die;
	$curcolumn = 0;
    $nrcolumns = 5;
?>
<div class="mypreview">

	<table>
        <tr>

		<?php 
        foreach ($this->items as $item) : 
    //		echo fmod($curcolumn, $nrcolumns);
            if (fmod($curcolumn, $nrcolumns) == 0 && $curcolumn !=0){
                ?>
                </tr>
                <tr>
                <?php
            } 
            ?>
            <td>
                <div class="mysportsimages">
                    <div class="sportsimage">
						<a href="<?php echo JRoute::_('index.php?option=com_sportsimage&view=sportsimage&idimage='.(int)$item->idimage); ?>">
            	            <?php echo $item->thumbnail; ?>
						</a>
                    </div>
                </div>
            </td>
            <?php 
                $curcolumn++;
        endforeach; 
		?>
		</tr>
	</table>
</div>
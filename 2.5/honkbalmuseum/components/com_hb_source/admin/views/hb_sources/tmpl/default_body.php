<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
                <td>
                        <?php echo $item->idsource; ?>
                </td>
                <td>
                        <?php echo JHtml::_('grid.idsource', $i, $item->idsource); ?>
                </td>
                <td>
                        <?php echo $item->nmsource; ?>
                </td>
        </tr>
<?php endforeach; ?>
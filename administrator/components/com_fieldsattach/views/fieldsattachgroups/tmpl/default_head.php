<?php
/**
 * @version		$Id: default_head.php 15 2011-09-02 18:37:15Z cristian $
 * @package		fieldsattach
 * @subpackage		Components
 * @copyright		Copyright (C) 2011 - 2020 Open Source Cristian Grañó, Inc. All rights reserved.
 * @author		Cristian Grañó
 * @link		http://joomlacode.org/gf/project/fieldsattach_1_6/
 * @license		License GNU General Public License version 2 or later
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
 
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_FIELDSATTACH_FIELDSATTACH_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_FIELDSATTACH_FIELDSATTACH_HEADING_TITLE'); ?>
	</th>
        <th>
		<?php echo JText::_('COM_FIELDSATTACH_FIELDSATTACH_HEADING_NOTE'); ?>
	</th>
        <th>
		<?php echo JText::_('COM_FIELDSATTACH_FIELDSATTACH_HEADING_GOTOFIELDSLIST'); ?>
	</th>
        <th width="10%">
                <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'ordering', $listDirn, $listOrder); ?>
                <!--<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'fieldattachgroups.saveorder'); ?>
-->
        </th>
        <th width="5%">
		<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'state', $listDirn, $listOrder); ?>
	</th>
</tr>


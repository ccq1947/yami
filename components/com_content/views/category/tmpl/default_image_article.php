<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');
				
// Create some shortcuts.
$params		= &$this->item->params;
$n			= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$db = JFactory::getDbo();		

?>

<?php if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>
  <div class="lifestyle">
    <h1><?php echo($this->items[0]->category_title); ?></h1>
      <ul class="epidemic31">

	<?php foreach ($this->items as $i => $activity) : 
				$images = json_decode($activity->images);
	?>
    	<li>
			<p class="pic">
				<a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id='.$activity->id);?>">
					<img src="<?php echo htmlspecialchars($images->image_intro) ?>" width="110" height="110" />
				</a>
			</p>
			<h3><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id='.$activity->id);?>"><?php echo $activity->title;?></a></h3>
			<div class="Txt"><?php echo $activity->introtext;?></div>
			<div class="More"><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id='.$activity->id);?>">更多</a></div><p class="Date"><?php echo $activity->created;?></p>
    	</li>
		<?php endforeach; ?>
      </ul>
    </div>
<?php endif; ?>

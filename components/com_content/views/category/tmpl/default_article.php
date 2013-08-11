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
// var_dump($this->items);
?>

<?php if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>
  <div class="lifestyle">
    <h1><?php echo($this->items[0]->category_title); ?></h1>
      <ul class="Read_News">
	<?php foreach ($this->items as $i => $activity) : ?>
        <li>
          <div class="newstitle"><a href="<?php echo JRoute::_('index.php?option=com_content&view=category&id='.$activity->id);?>"><?php echo $activity->title;?></a><span class="newstime"><?php echo $activity->created;?></span></div>
          <div class="newscontent"><?php echo $activity->introtext;?></div>
        </li>
		<?php endforeach; ?>
      </ul>
    </div>
<?php endif; ?>

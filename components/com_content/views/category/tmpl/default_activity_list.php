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
      <ul class="activity-time">
	<?php foreach ($this->items as $i => $activity) : 
				$images = json_decode($activity->images);
				$query = "select yfv.value,yf.title from yami_fieldsattach as yf left join yami_fieldsattach_values as yfv on yf.id=yfv.fieldsid where articleid=".$activity->id;
				$db->setQuery($query);
				$results = $db->loadObjectList();

				foreach($results as $result){
					$activityInfo[$result->title] = $result->value;
				}
	?>
        <li>
          <div class="activity-timePic"><img src="<?php echo htmlspecialchars($images->image_intro) ?>" /></div>
          <div class="activity-timeContant"><strong><?php echo $activity->title;?></strong>
			<?php echo $activity->introtext;?>
            <div>时间：<?php echo $this->escape($activityInfo['starttime'].' ~ '.$activityInfo['endtime']); ?><br />
              地点：<?php echo $this->escape($activityInfo['address']); ?><br />
              网址：<?php echo $this->escape($activityInfo['links']); ?></div>
          </div>
          <div class="clearfix"></div>
        </li>
		<?php endforeach; ?>
      </ul>
    </div>
<?php endif; ?>

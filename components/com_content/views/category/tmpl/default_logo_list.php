<?php


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
// var_dump($this->category);
?>

<?php if (empty($this->brand)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>
<h1>主流品牌产品研发动态、时尚资讯汇总</h1>
<div class="epidemic1">
      <h2>全部品牌</h2>
      <div class="BrandObservesearch"><span>检索：</span><a href="#A">A</a><a href="#B">B</a><a href="#C">C</a><a href="#D">D</a><a href="#E">E</a><a href="#F">F</a><a href="#G">G</a><a href="#H">H</a><a href="#I">I</a><a href="#J">J</a><a href="#K">K</a><a href="#L">L</a><a href="#M">M</a><a href="#N">N</a><a href="#O">O</a><a href="#P">P</a><a href="#Q">Q</a><a href="#R">R</a><a href="#S">S</a><a href="#T">T</a><a href="#U">U</a><a href="#V">V</a><a href="#W">W</a><a href="#X">X</a><a href="#Y">Y</a><a href="#Z">Z</a><a href="#OTHER">其他</a></div>
      <div class="BrandLogoListTitle">热门品牌</div>
      <ul class="BrandLogoList">
	  <?php echo $this->popularbrand; ?>
        <div class="clearfix"></div>
      </ul>
	  <?php echo $this->brand; ?>
</div>

<?php endif; ?>

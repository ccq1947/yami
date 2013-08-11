<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="location">当前位置：<a href="Home.html">首页</a><a href="Epidemic.html"><?php echo $this->ancestor->ancestor->title ?></a><?php echo $this->parent->title ?></div>
<div class="content1">
<?php if ($this->params->get('show_page_heading')) : ?>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<!-- <?php if ($this->params->get('show_base_description')) : ?>
	<?php 	//If there is a description in the menu parameters use that; ?>
		<?php if($this->params->get('categories_description')) : ?>
			<?php echo  JHtml::_('content.prepare', $this->params->get('categories_description'), '', 'com_content.categories'); ?>
		<?php  else: ?>
			<?php //Otherwise get one from the database if it exists. ?>
			<?php  if ($this->parent->description) : ?>
				<div class="category-desc">
					<?php  echo JHtml::_('content.prepare', $this->parent->description, '', 'com_content.categories'); ?>
				</div>
			<?php  endif; ?>
		<?php  endif; ?>
	<?php endif; ?>  -->

<?php
	echo $this->loadTemplate('items');
?>
 <div class="conright">
<?php	 
switch(JRequest::getVar('id')){
case 79:
		require_once('liuxingbaogao.php'); //
		break;
case 82:
		require_once('lingshouxinwen.php'); //
		break;
case 83:
		require_once('shineibaogao.php'); //
		break;
case 84:
		require_once('xinwenshangwu.php'); //
		break;
case 85:
		require_once('chaoliudushi.php');  //
		break;
case 86:
		require_once('zhanhuihuodong.php'); //
		break;
case 87:
		require_once('pinpaiguancha.php'); //
		break;
case 116:
		require_once('yuanchuangsheji.php');//
		break;
case 117:
		require_once('yanse.php');//
		break;
case 118:
		require_once('shejixiazai.php');//
		break;
case 128:
		require_once('gongyifenxi.php');//
		break;
case 130:
		require_once('shejifengge.php');//
		break;
case 131:
		require_once('cailiao.php');//
		break;
default:
null;
}

if(JRequest::getVar('id') != 116 && JRequest::getVar('id') != 118 && JRequest::getVar('id') != 87&& JRequest::getVar('id') != 131){
$content ='';
		 foreach($this->tabcontent as $catid=>$row){
			if($row->catTile !='城市介绍' && $row->catTile !='展会活动日程' && $row->catTile !='材料' ){
				$content .= ' <div class="epidemic2">
									<h2><a href="'.JRoute::_('index.php?option=com_content&view=category&id='.$catid).'">更多</a>'.$row->catTile.'</h2>
									<ul class="epidemic21">';
				if(sizeof($row->result) > 0){
					foreach ($row->result as $key=>$result) {
						$images = json_decode($result->images);
						if ($images->image_intro_caption){
							$title = htmlspecialchars($images->image_intro_caption);
						}else{
							$title='';
						}
						if($key == 5){
							$content .="<li class='' style='margin-right:0;'>";
						}else{
							$content .=  '<li class="">';
						}
						if(!empty($result->images)){
						$content .=  '
									<p><a href="'.JRoute::_('index.php?option=com_content&view=article&catid='.$result->catid.'&id='.$result->id).'"><img title="' .$title .'" src="'.htmlspecialchars($images->image_intro).'" width="110" height="110" alt="'.htmlspecialchars($images->image_intro_alt).'"/></a></p>
									<p class="Txt"><a href="'.JRoute::_('index.php?option=com_content&view=article&catid='.$result->catid.'&id='.$result->id).'">'.$result->title.'</a></p><p class="Date">'.date('Y-m-d', strtotime($result->created) ).'</p>
								</li>';
								
						}else{
						$content .=  '
									<p><a href="'.JRoute::_('index.php?option=com_jshopping&controller=product&task=view&category_id='.$result->category_id.'&product_id='.$result->product_id).'&catid='.$catid.'&parent_id='.JRequest::getVar('id').'"><img title="' .$title .'" src="components/com_jshopping/files/img_products/'.htmlspecialchars($result->product_thumb_image).'" width="110" height="110""/></a></p>
									<p class="Txt"><a href="'.JRoute::_('index.php?option=com_jshopping&controller=product&task=view&category_id='.$result->category_id.'&product_id='.$result->product_id).'&catid='.$catid.'&parent_id='.JRequest::getVar('id').'">'.$result->title.'</a></p><p class="Date">'.date('Y-m-d', strtotime($result->created) ).'</p>
								</li>';
						}
					}
				}
				$content .= '</ul></div>';

			}
		}
		echo $content;
}
if(JRequest::getVar('id') == 86){
require_once('zuixinzhanhuihuodong.php');
}
?>
  
</div>


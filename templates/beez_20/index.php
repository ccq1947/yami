<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/public.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/web.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/general.css', $type = 'text/css', $media = 'screen,projection');


// $files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
// if ($files):
	// if (!is_array($files)):
		// $files = array($files);
	// endif;
	// foreach($files as $file):
		// $doc->addStyleSheet($file);
	// endforeach;
// endif;

// $doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
// if ($this->direction == 'rtl') {
	// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
	// if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
		// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
	// }
// }

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery-1.9.1.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/menu.js', 'text/javascript');
$user = JFactory::getUser();
$userId = $user->get('id');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<script type="text/javascript">
	$(".wx").hover(function(){
		$(".wbtc").addClass("hover");
		$(this).addClass("wxhoverBg");
		},function(){
		$(".wbtc").removeClass("hover");
		$(this).removeClass("wxhoverBg");
	});
</script>

</head>

<body>

<div class="top">
  <div class="logo"><!--<img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"  alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" />!--><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.jpg" width="149" height="51" /></div>
  <div class="topRight">
    <div class="topLogin"><a href="#">中文</a><a href="#">ENGLISH</a><a href="<?php echo JRoute::_("index.php?option=com_jshopping&controller=cart&task=view&Itemid=$userId"); ?>">购物车</a>
		<?php if($userId > 0 ): ?>
			<a href="<?php echo JRoute::_('index.php?option=com_content'); ?>"><?php echo $user->get('username'); ?></a><a href="<?php echo JRoute::_('index.php?option=com_users&task=user.logout&'. JUtility::getToken() .'=1'); ?>" style="padding-right:0; background:none;">退出</a>
		<?php else: ?>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>">登录</a><a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" style="padding-right:0; background:none;">注册</a>
		<?php endif; ?>
	</div>
    <div class="topWbwx"><span style="margin-right:0"></span>
      <div class="wx">
        <div class="wbtc"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/wbtc1.png" width="181" height="279" /></div>
      </div>

      <span></span>
      <div class="wb wba">
        <div class="wbtc"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/wbtc1.png" width="181" height="279" /></div>
      </div>
      <script>          
	$(".wb").hover(function(){
		$(".wbtc").addClass("hover");
		$(this).addClass("wbhoverBg");
		},function(){
		$(".wbtc").removeClass("hover");
		$(this).removeClass("wbhoverBg");
	});
    </script> 
      <span></span></div>
  </div>
</div>
<div class="nav homeNav">
      <jdoc:include type="modules" name="tab_menu"/>

<!--  <div class="search">
    <input name="" type="text" />
    <a href="#" class="SeaButton"></a> <span><a href="<?php echo JRoute::_('index.php?option=com_search&view=search') ?>">高级搜索</a></span> </div> -->
<div class="search">
	  <form method="post" action="<?php echo JRoute::_('index.php?option=com_search&view=search') ?>" role="search" name="search">
			<input type="text" onfocus="if (this.value=='搜索...') this.value='';" onblur="if (this.value=='') this.value='搜索...';" value="搜索..." size="20"  maxlength="20" id="mod-search-searchword" name="searchword">
			    <a href="javascript:void(0);" class="SeaButton" onclick="document.search.submit();"></a> <span><a href="javascript:void(0);" onclick="document.search.submit();">高级搜索</a></span> 
		<input type="hidden" value="search" name="task">
		<input type="hidden" value="com_search" name="option">
	</form>
</div>
  <!-- search -->
  <div class="hoanbor"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/home_borber.jpg" width="960" height="8" /></div><!-- hoanbor -->
</div><!-- nav homeNav -->
	<jdoc:include type="message" />
	<?php if(JRequest::getVar('view') != 'categories'):  
				$module = JModuleHelper::getModule('articles_categories');
				echo JModuleHelper::renderModule($module);
	endif; ?>

	<jdoc:include type="component" />
<div class="conbottom"><img width="962" height="8" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images//conzd2.jpg"></div>
</div>
<div class="foot">
  <p><a href="#">关于我们</a>｜<a href="Contact1.html">联络我们</a>｜<a href="#">法律信息</a>｜<a href="#">常见问题</a>｜<a href="#">隐私条例</a></p>
  <p>©2013蕥觅 版权所有</p>
  <div class="footImg"><a href="#"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/copimg1.jpg" width="108" height="46" /></a><a href="#"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/copimg2.jpg" width="108" height="46" /></a><a href="#"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/copimg3.jpg" width="108" height="46" /></a></div>
</div><!-- foot -->
<jdoc:include type="modules" name="debug" />

 </body>
</html>

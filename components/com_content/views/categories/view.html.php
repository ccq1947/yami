<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Content categories view.
 *
 * @package		Joomla.Site
 * @subpackage	com_content
 * @since 1.5
 */
class ContentViewCategories extends JViewLegacy
{
	protected $state = null;
	protected $item = null;
	protected $items = null;

	/**
	 * Display the view
	 *
	 * @return	mixed	False on error, null otherwise.
	 */
	function display($tpl = null)
	{
		// Initialise variables
		$catId = JRequest::getVar('id');
		$model		= $this->getModel(); 
		$state		= $this->get('State');
		$items		= $this->get('Items');
		$parent		= $this->get('Parent');
		$ancestor		= $this->get('Ancestor'); 
		$lastcontent		= $this->get('LastContent'); 
		// $new_content  = $model->getTabContent1($catId); 


		if(trim($ancestor->ancestor->title) == '设计下载'){
			$tabcontent = $this->get('ItemImages'); 		
		}else{	
			$tabcontent		= $model->getTabResults($catId); 
			if($parent->title =='品牌观察'){
							$brand = $model->getBrand(110);
					$popularBrand = $model->getPopularBrand(110);
					$this->assignRef('popularBrand',		$popularBrand);
					$this->assignRef('brand',		$brand);

			}else{
				foreach($items as $item){
					switch($item->title){
						case '城市介绍':
								$cityIntroduced 		= $model->getCityIntroduced($item->id); 
								$this->assignRef('cityIntroduced',	$cityIntroduced);
								break ;
						case '展会活动日程':
								$exhibitionActivity 		= $model->getExhibitionActivity($item->id);
								$exhibitionActivity_id 		= $item->id;
									
								$this->assignRef('exhibitionActivity',	$exhibitionActivity);
								$this->assignRef('exhibitionActivity_id',	$exhibitionActivity_id);
								break ;
					}
				}

			}
		}
		// var_dump($tabcontent);
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseWarning(500, implode("\n", $errors));
			return false;
		}

		if ($items === false)
		{
			JError::raiseError(404, JText::_('COM_CONTENT_ERROR_CATEGORY_NOT_FOUND'));
			return false;
		}

		if ($parent == false)
		{
			JError::raiseError(404, JText::_('COM_CONTENT_ERROR_PARENT_CATEGORY_NOT_FOUND'));
			return false;
		}
		if ($ancestor == false)
		{
			JError::raiseError(404, JText::_('COM_CONTENT_ERROR_PARENT_CATEGORY_NOT_FOUND'));
			return false;
		}

		$params = &$state->params;

		$items = array($parent->id => $items);

		//Escape strings for HTML output
		$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));

		$this->maxLevelcat = $params->get('maxLevelcat', -1);
		$this->assignRef('params',		$params);
		$this->assignRef('parent',		$parent);
		$this->assignRef('ancestor',		$ancestor);
		$this->assignRef('lastcontent',		$lastcontent);
		$this->assignRef('tabcontent',		$tabcontent);
		$this->assignRef('items',		$items);

		$this->_prepareDocument();

		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('JGLOBAL_ARTICLES'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
}

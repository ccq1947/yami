  <?php
defined('_JEXEC') or die;
// var_dump($this->cityContent); 
?>
<div class="lifestyle">
     <h1><?php echo $this->item->title ?></h1>
     <div class="TownSuggest">
		<div class="TownSuggest_pic"><?php echo $this->cityContent->image?></div>
	    <strong class="TownSuggest_title">城市简介</strong>
        <p class="TownSuggest_content"><?php echo $this->item->introtext ?></p>
		 <strong class="TownSuggest_title">城市地图</strong>
        <p class="TownSuggest_content"><?php echo $this->cityContent->map ?></p>
		<strong class="TownSuggest_title">城市生活指南</strong>
        <p class="TownSuggest_content"><?php echo $this->cityContent->lifestyle ?></p>
		<strong class="TownSuggest_title">实用旅游信息</strong>
        <p class="TownSuggest_content"><?php echo $this->cityContent->info ?></p>
	</div>
 </div>

  <?php
defined('_JEXEC') or die;
?>
    <div class="EpidemicDetailedLeft">
        <h1><?php echo $this->item->title; ?></h1>
        <h6><?php echo date('Y-m-d',strtotime($this->item->created)); ?></h6>
        <div class="EpidemicDetailedContant">
                <?php echo $this->item->introtext; ?>
        </div>
    </div>
    <div class="EpidemicDetailedRight">
        <span>编号：YM203409876<br />所需：20共享分<a href="<?php echo JRoute::_('download.php?f='.$this->item->id.'/'.$this->file);?>">下载</a></span>
        <a class="EpidemicDetailedMore" href="#">更多详情</a>
        <div class="EpidemicDetailedKeyword">
            <strong>风格</strong>
            <p>街头 嘻哈</p>
            <strong>来源</strong>
            <p>巴黎时装周</p>
            <strong>城市</strong>
            <p>巴黎</p>
        </div>
    </div>    

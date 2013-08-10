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

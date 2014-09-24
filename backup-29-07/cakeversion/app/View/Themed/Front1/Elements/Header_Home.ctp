<?php if($this->params['controller']=='homes' && $this->params['action']=='index'){ ?>
<section class="slideshow_container">
  <div class="slideshow_inner">
  
		<?php echo $this->element('three_panal'); ?>
    
    <div class="slideshow" >
    <!--<div id="fragment-1" class="ui-tabs-panel slider1">
        
        <div class="slideshow_content">
          <p class="fonsize18">Desire has peace, harmony bliss, and hapiness for your dear once...</p>
          <p class="more_details"><a href="">more details</a></p>
        </div>
      </div>-->
    	
      <?php $i='1'; foreach($bannerLists as $bannerList) { ?>  
      <div id="fragment-<?php echo $i; ?>" class="ui-tabs-panel ui-tabs-hide"> <img src="<?php echo $this->webroot; ?>/banner/<?php echo $bannerList['Banner']['banner_image']; ?>" alt="<?php echo $bannerList['Banner']['banner_title']; ?>" title="<?php echo $bannerList['Banner']['banner_title']; ?>" width="972" height="430" /> </div>
     <?php $i++; }  ?>
     
     
      <ul class="ui-tabs-nav">
          <?php $i='1'; foreach($bannerLists as $bannerList) { ?>
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $i; ?>"><a href="#fragment-<?php echo $i; ?>"><img src="<?php echo $this->webroot; ?>/banner/thumb_<?php echo $bannerList['Banner']['banner_image']; ?>" alt="<?php echo $bannerList['Banner']['banner_title']; ?>" title="<?php echo $bannerList['Banner']['banner_title']; ?>" width="90" height="58" /></a></li>
      <?php $i++; }  ?>

      </ul>
    </div>

  </div>
</section>
<?php }?>
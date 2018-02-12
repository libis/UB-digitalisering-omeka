<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<section class="item-section">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12  col-lg-8 col-xl-9 image-row">
            <div class="">
                <a id="prev" class="image-control"><i class="material-icons">&#xE5CB;</i></a>
                <a id="next" class="image-control"><i class="material-icons">&#xE5CC;</i></a>
                <?php echo $this->openLayersZoom()->zoom(get_current_record('Item')); ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-3">
          <?php $texts =  all_element_texts('item',array('return_type'=>'array'));?>
            <div class='metadata'>
              <h1 class="">
                  <?php echo strip_tags(metadata('item', array('Dublin Core', 'Title'))); ?>
              </h1>

              <?php if (isset($texts['Dublin Core']['Subject'])): ?>
              <div class="element">
                  <h3><?php echo __('Subject'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Subject']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Description'])): ?>
              <div class="element">
                  <h3><?php echo __('Description'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Description']);?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Source'])): ?>
              <div class="element">
                  <h3><?php echo 'Collectie'; ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Source']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Object Item Type Metadata']['Call number'])): ?>
              <div class="element">
                  <h3><?php echo __('Subject'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Object Item Type Metadata']['Call number']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Creator'])): ?>
              <div class="element">
                  <h3><?php echo __('Creator'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Creator']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Date'])): ?>
              <div class="element">
                  <h3><?php echo __('Date'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Date']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Publisher'])): ?>
              <div class="element">
                  <h3><?php echo __('Publisher'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Publisher']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Dublin Core']['Coverage'])): ?>
              <div class="element">
                  <h3><?php echo 'Plaats'; ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Coverage']); ?></p></div>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Object Item Type Metadata']['Call number'])): ?>
              <div class="element">
                  <h3><?php echo __('Subject'); ?></h3>
                  <div class="element-text"><p><?php echo implode(', ',$texts['Object Item Type Metadata']['Call number']); ?></p></div>
              </div>
              <?php endif; ?>

              <!-- The following prints a list of all tags associated with the item -->
              <?php if (metadata('item', 'has tags')): ?>
              <div id="item-tags" class="element">
                  <h3><?php echo __('Tags'); ?></h3>
                  <div class="element-text"><?php echo solr_tag_string(); ?></div>
              </div>
              <?php endif;?>

              <br>

              <?php if (isset($texts['Object Item Type Metadata']['LIMO'])): ?>
              <div class="element">
                  <i class="material-icons">&#xE02F;</i><a href="<?php echo $texts['Object Item Type Metadata']['LIMO'][0]; ?>"><?php echo __('Bekijk uitgebreide beschrijving');?></a>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Object Item Type Metadata']['IE nummer'])): ?>
              <div class="element">
                  <i class="material-icons">&#xE3B6;</i><a href="https://resolver.libis.be/<?php echo $texts['Object Item Type Metadata']['IE nummer'][0]; ?>/representation"><?php echo __('Bekijk het volledige object');?></a>
              </div>
              <?php endif; ?>

              <?php echo libis_link_to_related_exhibits($item);?>
            </div>
        </div>
    </div>
  </div>
</section>
<script>
    //image control
    var divs = jQuery('div[id^="map-"]').hide(),

    N = divs.length,
    C = 0;

    if(N > 1){
      jQuery("#prev").fadeIn();
      jQuery("#next").fadeIn();
    }

    divs.hide().eq( C ).show();

    jQuery("#next, #prev").click(function(){
        jQuery("#prev").hide();
        jQuery("#next").hide();

        divs.stop().hide().fadeOut(1000).eq( (this.id=='next'? ++C : --C) %N ).fadeIn(800);
        jQuery("#prev").delay( 800 ).fadeIn();
        jQuery("#next").delay( 800 ).fadeIn();
    });
</script>

<?php echo foot(); ?>

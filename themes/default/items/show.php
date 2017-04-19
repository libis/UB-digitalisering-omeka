<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<section class="item-title-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
          <div class="col-sm-12 col-xs-12 page">
            <h1 class="section-title projecten-title">
              <span><?php echo metadata('item', array('Dublin Core', 'Title')); ?></span>
            </h1>
            <?php if(metadata('item','item_type_name')):?>
              <h2><i><?php echo metadata('item','item_type_name');?></i></h2>
            <?php endif;?>
          </div>
      </div>
    </div>
</section>
<section class="item-section">
    <div class="container-fluid">
        <div class="row image-row">
            <a id="prev" class="image-control"><i class="material-icons">&#xE5CB;</i></a>
            <a id="next" class="image-control"><i class="material-icons">&#xE5CC;</i></a>
            <?php echo $this->openLayersZoom()->zoom(get_current_record('Item')); ?>
        </div>
    </div>
</section>
<section class="metadata-section">
    <div id="content" class='container' role="main" tabindex="-1">
        <div class="row">
            <div class="offset-sm-2 col-sm-10 col-xs-12 page">
                <div class='content'>
                    <?php echo all_element_texts('item'); ?>

                    <!-- The following returns all of the files associated with an item. -->
                    <?php if (metadata('item', 'has files') && (get_theme_option('Item FileGallery') == 1)): ?>
                    <div id="itemfiles" class="element">
                        <h3><?php echo __('Files'); ?></h3>
                        <div class="element-text"><?php echo item_image_gallery(); ?></div>
                    </div>
                    <?php endif; ?>

                    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
                    <?php if (metadata('item', 'Collection Name')): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Collection'); ?></h3>
                        <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <!-- The following prints a list of all tags associated with the item -->
                    <?php if (metadata('item', 'has tags')): ?>
                    <div id="item-tags" class="element">
                        <h3><?php echo __('Tags'); ?></h3>
                        <div class="element-text"><?php echo tag_string('item'); ?></div>
                    </div>
                    <?php endif;?>

                </div>
                <nav>
                <ul class="item-pagination navigation">
                    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
                    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
                </ul>
                </nav>
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

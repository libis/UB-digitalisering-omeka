<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
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
            <div class="offset-sm-1 col-sm-10 col-xs-12 page">
                <div class='content'>
                    <?php if(metadata('item','item_type_name')):?>
                        <h4><i><?php echo metadata('item','item_type_name');?></i></h4>
                    <?php endif;?>
                    <h1 class="section-title projecten-title">
                        <span><?php echo metadata('item', array('Dublin Core', 'Title')); ?></span>
                    </h1>

                    <?php $texts =  all_element_texts('item',array('return_type'=>'array')); ?>

                    <?php //echo"<pre>";var_dump($texts);echo '</pre>';?>

                    <?php if (isset($texts['Dublin Core']['Title'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Title'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Title']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Subject'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Subject'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Subject']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Description'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Description'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Description']);?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Source'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo 'Collectie'; ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Source']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Text Item Type Metadata']['Call number'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Subject'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Text Item Type Metadata']['Call number']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Creator'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Creator'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Creator']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Date'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Date'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Date']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Publisher'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Publisher'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Publisher']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Dublin Core']['Spatial coverage'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo 'Plaats'; ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Dublin Core']['Spatial coverage']); ?></p></div>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Text Item Type Metadata']['LIMO'])): ?>
                    <div id="collection" class="element">
                        <a href="<?php echo $texts['Text Item Type Metadata']['LIMO']; ?>"><?php echo __('Bekijk uitgebreide beschrijving');?></a>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Text Item Type Metadata']['Rosetta ID'])): ?>
                    <div id="collection" class="element">
                        <a href="https://resolver.libis.be/<?php echo $texts['Text Item Type Metadata']['Rosetta ID']; ?>"><?php echo __('Bekijk het volledige object');?></a>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Text Item Type Metadata']['Call number'])): ?>
                    <div id="collection" class="element">
                        <h3><?php echo __('Subject'); ?></h3>
                        <div class="element-text"><p><?php echo implode(', ',$texts['Text Item Type Metadata']['Call number']); ?></p></div>
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

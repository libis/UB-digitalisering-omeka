<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<section class="item-section">
        <div class="image-row">
            <a id="prev" class="image-control"><i class="material-icons">&#xE5CB;</i></a>
            <a id="next" class="image-control"><i class="material-icons">&#xE5CC;</i></a>
            <?php echo $this->openLayersZoom()->zoom(get_current_record('Item')); ?>
        </div>
</section>

<section class="metadata-section">
    <div id="content" class='container' tabindex="-1">
        <div class="row">
            <div class="offset-sm-1 col-sm-10 col-xs-12 page">
              <?php $texts =  all_element_texts('item',array('return_type'=>'array'));?>

                <div class='content'>
                    <h1 class="section-title projecten-title">
                        <?php echo strip_tags(metadata('item', array('Dublin Core', 'Title'))); ?>
                    </h1>

                    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
                    <!--<?php if (metadata('item', 'Collection Name')): ?>
                    <div id="collection">
                        <p><?php echo __('Collection'); ?>: <a href='<?php echo url('/solr-search?q=&facet=collection:"'.metadata('item', 'Collection Name').'"'); ?>'><?php echo metadata('item', 'Collection Name');?></a></p>
                    </div>
                  <?php endif; ?>-->


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
                        <div class="element-text"><?php echo tag_string('item'); ?></div>
                    </div>
                    <?php endif;?>

                    <!--<?php if(isset($texts['Object Item Type Metadata']['IE nummer'])):?>
                        <div class="element">
                        <i class="material-icons">&#xE3B6;</i><a href="http://resolver.libis.be/<?php echo $texts['Object Item Type Metadata']['IE nummer'][0];?>/representation">
                          Bekijk het volledige object
                        </a>
                      </div>
                    <?php endif;?>-->

                    <br>

                    <?php if (isset($texts['Object Item Type Metadata']['LIMO'])): ?>
                    <div class="element">
                        <i class="material-icons">&#xE02F;</i><a href="<?php echo $texts['Object Item Type Metadata']['LIMO'][0]; ?>"><?php echo __('Bekijk uitgebreide beschrijving');?></a>
                    </div>
                    <?php endif; ?>

                    <?php if (isset($texts['Object Item Type Metadata']['IE nummer'])): ?>
                    <div class="element">
                        <i class="material-icons">&#xE3B6;</i><a href="https://resolver.libis.be/<?php echo $texts['Object Item Type Metadata']['IE nummer']; ?>/representation"><?php echo __('Bekijk het volledige object');?></a>
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

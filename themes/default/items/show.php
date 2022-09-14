<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>
<?php $lang = Zend_Registry::get('bootstrap')->getResource('Locale')->toString();?>
<section class="item-section">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12  col-lg-7 col-xl-8 image-row">

          <div id="lightgallery">
            <?php
              $files = get_current_record('item')->getFiles();
              foreach($files as $file):
            ?>
                <a href="<?php echo $file->getWebPath('fullsize');?>">
                    <img src="<?php echo $file->getWebPath('fullsize');?>" />
                </a>
            <?php endforeach;?>
          </div>
        </div>
        <div class="col-md-12 col-lg-5 col-xl-4">
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
                <?php
                $string = file_get_contents(PLUGIN_DIR."/AlmaImport/sigil_mapping.json");
                $json_a = json_decode($string, true);
                $bibcode = '';$source = '';$source_l='';$loccode='';

                foreach($json_a as $sigil):
                  $bibcode = '';
                  if(isset($texts['Object Item Type Metadata']['Bibliotheekcode'][0])):
                    $bibcode = $texts['Object Item Type Metadata']['Bibliotheekcode'][0];
                  endif;
                  $loccode = $texts['Dublin Core']['Source'][0];
                  if($bibcode == $sigil["Library Code"]):
                    $source = $sigil[$lang];
                  elseif($loccode == $sigil["Location Code"]):
                    $source_l = $sigil[$lang];                  
                  endif;
                endforeach;
                if($source == '' && $source_l != ''){
                  $source = $source_l;
                }
                if($source == '' && $source_l == ''){
                  $source = implode(', ',$texts['Dublin Core']['Source']);
                }
                  
                ?>
              <div class="element">
                  <h3><?php echo __('Collection'); ?></h3>
                  <div class="element-text"><p><?php echo $source; ?></p></div>
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
                  <h3><?php echo __('Coverage'); ?></h3>
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

              <?php if (isset($texts['Object Item Type Metadata']['MMS ID'])): ?>
              <div class="element">
                  <i class="material-icons">&#xE02F;</i>
                  <a target="_blank" href="https://limo.libis.be/primo-explore/search?query=any,contains,<?php echo $texts['Object Item Type Metadata']['MMS ID'][0]; ?>&tab=all_content_tab&search_scope=ALL_CONTENT&vid=KULeuven&lang=en_US&offset=0"><?php echo __('View more information');?></a>
              </div>
              <?php endif; ?>

              <?php if (isset($texts['Object Item Type Metadata']['IE nummer'])): ?>
              <div class="element">
                  <i class="material-icons">&#xE3B6;</i><a target="_blank" href="https://resolver.libis.be/<?php echo $texts['Object Item Type Metadata']['IE nummer'][0]; ?>/representation"><?php echo __('View the complete object');?></a>
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

    jQuery('#lightgallery').slick({
      dots: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      infinite: false,
    });

    jQuery("#lightgallery").lightGallery(
      {
        selector:'a',
        download: false
      }
    );
</script>

<?php echo foot(); ?>

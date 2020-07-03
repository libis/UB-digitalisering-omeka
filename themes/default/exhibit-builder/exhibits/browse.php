<?php
$title = __('Exhibitions');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));

$params = $_GET;
$show_featured = false;
$tags="";

if(isset($params['featured'])):
  if($params['featured']=="1"):
      $show_featured = true;
  endif;
endif;

$tag="";
if(isset($_GET['tag'])):
  $tag = $_GET['tag'];
endif;
if(isset($params['tags'])):
  $tag = $params['tags'];
endif;
$exhibits = get_db()->getTable('Exhibit')->findBy(array('tags'=>$tag));
$ftags = array();
$no_array = array('tentoonstelling','project','showcase');
foreach($exhibits as $exhibit):
  $etags = $exhibit->getTags();
  foreach($etags as $etag):
    if(!in_array($etag->name,$no_array)):
      $ftags[$etag->name] = $etag;
    endif;
  endforeach;
endforeach;

?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
        <?php

            if (strpos($tag, 'tentoonstelling') !== false) {
              $theme = "tentoonstelling";
              $title = "Exhibits";
            }elseif (strpos($tag, 'project') !== false) {
              $theme = "project";
              $title = "Projects";
            }elseif (strpos($tag, 'galerij') !== false) {
              $theme = "galerij";
              $title = "Gallery";
            }else{
              $theme = '';
              $title = "All";
            }
        ?>
        <h1 class="white"><?php echo __($title); ?></h1>
    </div>
  </section>
</div>

<section class="exhibit-show-section">
  <div id="content" class='container' tabindex="-1">
    <div id="sort-links">
       <span class="sort-label"><i class="material-icons">&#xE152;</i>
           <?php echo __('Filter: '); ?></span>
           <?php if($show_featured):?>
             <a href="<?php echo url('exhibits/browse?tag='.$tag.'&sort_field=added&sort_dir=d');?>">
               <?php echo __("All"); ?>
             </a>
           <?php else:?>
             <a href="<?php echo url('exhibits/browse?featured=1&tag='.$tag.'&sort_field=added&sort_dir=d');?>">
               <?php echo __("Featured"); ?>
             </a>
           <?php endif;?>
    </div>
    <div class="tags">
      <?php foreach($ftags as $ftag):?>
        <a href="<?php echo url('exhibits/browse/?tags='.$theme.','.$ftag->name); ?>"><?php echo $ftag->name;?></a>
      <?php endforeach;?>
      <?php if($ftags){?>
        <a class="clear-tags" href="<?php echo url('exhibits/browse/?tags='.$theme); ?>"><?php echo __($title); ?></a>
      <?php } ?>
      <?php //echo tag_string($ftags,'/exhibits/browse?tags=tentoonstelling');?>
    </div>
    <?php echo pagination_links(); ?>
      <div class="row">
        <?php if (count($exhibits) > 0): ?>
          <?php $exhibitCount = 0;$i=0; ?>
          <?php foreach (loop('exhibit') as $exhibit): ?>
              <div class="col-md-6 col-lg-4 col-xs-12">
              <a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>" style="text-decoration:none;">
              <div class="card">
                <?php $exhibitCount++;$i++; ?>

                <?php $file = $exhibit->getFile();?>
                <?php if ($file): ?>
                          <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("thumbnail"); ?>)"></div>
                <?php endif;?>

                <div class="card-block browse-block page">
                  <h2><?php echo metadata($exhibit, 'title'); ?></h2>
                  <!--<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                  <div class="exhibit-credits">
                      <h4><?php echo $exhibitCredits; ?></h4>
                  </div>
                  <?php endif; ?>-->
                  <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                  <div class="card-text description"><?php echo snippet($exhibitDescription,0,150); ?></div>
                  <?php endif; ?>

                </div>
                <div class="card-footer">
                  <a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>"><?php echo __("read more");?></a>
                </div>
              </div>
              </a>
          </div>
      <?php endforeach; ?>
      </div>
      <?php echo pagination_links(); ?>

      <?php else: ?>
      <p><?php echo __('There are no exhibits available yet.'); ?></p>
      <?php endif; ?>
    </div>
</section>
<?php echo foot(); ?>

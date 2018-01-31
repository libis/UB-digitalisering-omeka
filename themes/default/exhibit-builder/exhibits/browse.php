<?php
$title = __('Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));

$params = $_GET;
$show_featured = false;
$tags="";

if(isset($params['featured'])):
  if($params['featured']=="1"):
      $show_featured = true;
  endif;
endif;

if(isset($params['tag'])):
  $tags = $params['tag'];
endif;

?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
        <?php
            $tag="";
            if(isset($_GET['tag'])):
              $tag = $_GET['tag'];
            endif;

            switch($tag){
              case "tentoonstelling":
                $title = "Tentoonstellingen";
                break;
              case "project":
                $title = "Projecten";
                break;
              case "showcase":
                $title = "Showcases";
                break;
              default:
                $title = "Alles";
            }
        ?>
        <h1 class="white"><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
    </div>
  </section>
</div>

<section class="exhibit-show-section">
  <div id="content" class='container' tabindex="-1">
    <div id="sort-links">
       <span class="sort-label"><i class="material-icons">&#xE152;</i>
           <?php echo __('Filter: '); ?></span>
           <?php if($show_featured):?>
             <a href="<?php echo url('exhibits/browse?tag='.$tags.'&sort_field=added&sort_dir=d');?>">
               <?php echo __("Alles"); ?>
             </a>
           <?php else:?>
             <a href="<?php echo url('exhibits/browse?featured=1&tag='.$tags.'&sort_field=added&sort_dir=d');?>">
               <?php echo __("Featured"); ?>
             </a>
           <?php endif;?>
    </div>
      <div class="row">
        <?php if (count($exhibits) > 0): ?>
          <?php echo pagination_links(); ?>

          <?php $exhibitCount = 0;$i=0; ?>

          <?php foreach (loop('exhibit') as $exhibit): ?>
              <div class="col-md-6 col-lg-4 col-xs-12">
              <div class="card">
                <?php $exhibitCount++;$i++; ?>

                <?php if($exhibit->cover_image_file_id):
                  $file = $exhibit->getCoverImage();
                ?>
                  <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                  <!--<img class="card-img" src="<?php echo $file->getWebPath(); ?>">-->
                <?php endif; ?>

                <div class="card-block browse-block page">
                  <h2><a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>"><?php echo metadata($exhibit, 'title'); ?></a></h2>
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
                  <a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>">lees meer</a>
                </div>
              </div>
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

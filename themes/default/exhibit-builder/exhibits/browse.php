<?php
$title = __('Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<section class="item-title-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
          <div class="col-sm-12 col-xs-12 page">
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
            <h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
          </div>
      </div>
    </div>
</section>
</header>
<section class="general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="col-sm-12 col-xs-12 page">
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
                      <div class="card-img" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                      <!--<img class="card-img" src="<?php echo $file->getWebPath(); ?>">-->
                    <?php endif; ?>

                    <div class="card-block browse-block page">
                      <h3 class="card-title"><a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>"><?php echo metadata($exhibit, 'title'); ?></a></h3>
                      <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                      <div class="exhibit-credits">
                          <h4><?php echo $exhibitCredits; ?></h4>
                      </div>
                      <?php endif; ?>
                      <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                      <div class="card-text description"><?php echo snippet($exhibitDescription,0,150); ?></div>
                      <?php endif; ?>
                      <div class="card-footer">
                          <p class="lees-meer"><a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>">lees meer</a></p>
                      </div>
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
    </div>
  </div>
</section>
<?php echo foot(); ?>

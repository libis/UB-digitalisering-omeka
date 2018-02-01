<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <div class="row">
          <div class="col-sm-12">

            <h1 class="white"><?php echo metadata('exhibit', 'title'); ?></h1>
            <?php $tags = tag_string($exhibit,'exhibits/browse');?>
            <!--<?php if($tags):?>
              <h4><?php echo $tags;?></h4>
            <?php endif;?>-->
            <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
            <div class="exhibit-credits">
                  <h3><?php echo $exhibitCredits; ?></h3>
            </div>
            <?php endif; ?>
          </div>
      </div>
    </div>
  </section>
</div>
<section class="general-section exhibit-show-section">
  <div id="content" class='container' tabindex="-1">

      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-7 page">
          <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
            <h1>Overzicht tentoonstelling</h1>
            <div class="exhibit-description">
                <?php echo $exhibitDescription; ?>
                <?php
                  $page = $exhibit->TopPages[0];
                ?>
            </div>
            <p><a class="btn btn-primary" href="<?php echo html_escape($page->getRecordUrl()); ?>">Start tentoonstelling</a></p>
          <?php endif; ?>
          <div class="nav">

            <?php echo exhibit_builder_page_nav(); ?>
            <?php
            $pageTree = exhibit_builder_page_tree();
            if ($pageTree):
            ?>
            <nav id="exhibit-pages">
                <?php echo $pageTree; ?>
            </nav>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-5">
          <?php if ($exhibit->cover_image_file_id): ?>
              <?php
                $file = get_record_by_id('File',$exhibit->cover_image_file_id);
                $cover_url = $file->getWebPath('fullsize');
              ?>
              <div class="cover"><img src="<?php echo $cover_url ?>"></div>
          <?php endif; ?>
        </div>
      </div>
  </div>
</section>
<script>
  var slug = "<?php echo $exhibit->slug;?>";
</script>

<?php echo foot(); ?>

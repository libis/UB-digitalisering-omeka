<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<section class="item-title-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
          <div class="col-sm-12 col-xs-12 page">
            <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
            <div class="exhibit-credits">
                  <h3><?php echo $exhibitCredits; ?></h3>
            </div>
            <?php endif; ?>

            <h1><?php echo metadata('exhibit', 'title'); ?></h1>
          </div>
      </div>
    </div>
</section>
<section class="general-section exhibit-show-section">
  <div id="content" class='container-fluid' role="main" tabindex="-1">
      <div class="row">
        <div class="col-sm-5 page">
            <div class='content'>
                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>

                <div class="exhibit-description">
                    <h3>Overzicht tentoonstelling</h3>
                    <hr class="top-exhibit">
                    <?php echo $exhibitDescription; ?>
                    <hr class="top-exhibit">
                </div>

                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-5 cover">
            <?php if (($exhibit->cover_image_file_id)): ?>
            <?php
              $file = get_record_by_id('File',$exhibit->cover_image_file_id);
              $cover_url = $file->getWebPath('fullsize');
            ?>
            <?php endif; ?>
            <img src="<?php echo $cover_url ?>">
        </div>
        <div class="col-md-2 nav">
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
  </div>
<?php echo foot(); ?>

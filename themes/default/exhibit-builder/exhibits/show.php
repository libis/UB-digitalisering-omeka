<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title').' &middot; '.metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show', ));
?>
<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <div class="row">
          <div class="col-sm-12">
            <h1 class="white"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
            <?php $tags = tag_string($exhibit,'exhibits/browse');?>
            <?php if($tags):?>
              <h4><?php echo $tags;?></h4>
            <?php endif;?>
          </div>
      </div>
    </div>
  </section>
</div>

<section class="exhibit-show-section">
  <div id="content" class='container' tabindex="-1">
    <p id="breadcrumbs">
      <span><a href="<?php echo url('/');?>">Home</a></span>
       > <?php echo exhibit_builder_link_to_exhibit($exhibit); ?>
       > <?php echo metadata('exhibit_page', 'title'); ?>
     </p>
    <div id="exhibit-blocks">
      <?php exhibit_builder_render_exhibit_page(); ?>
    </div>

    <div id="exhibit-page-navigation">
      <div class="row">
        <div class="col-sm-6 col-md-4">
          <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
              <div id="exhibit-nav-prev">
                <?php echo $prevLink; ?>
              </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-6 offset-md-4 col-md-4">
          <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
            <div id="exhibit-nav-next">
            <?php echo $nextLink; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo foot(); ?>

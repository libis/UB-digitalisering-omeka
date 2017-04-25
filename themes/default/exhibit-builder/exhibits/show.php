<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title').' &middot; '.metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show', ));
?>
<section class="item-title-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
          <div class="offset-sm-1 col-sm-11 col-xs-12 page">
            <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
            <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
          </div>
      </div>
    </div>
</section>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="offset-sm-1 col-sm-9 col-xs-12 page">
          <div class='top'>

              <p id="simple-pages-breadcrumbs"><span>
                <a href="<?php echo url('exhibits');?>">Tentoonstellingen</a>
                > <?php echo exhibit_builder_link_to_exhibit($exhibit); ?>
                > <?php echo metadata('exhibit_page', 'title'); ?>
              </span></p>
          </div>
            <div class='content'>

              <div id="exhibit-blocks">
                <?php exhibit_builder_render_exhibit_page(); ?>
              </div>
              <div id="exhibit-page-navigation">
                  <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                  <div id="exhibit-nav-prev">
                  <?php echo $prevLink; ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                  <div id="exhibit-nav-next">
                  <?php echo $nextLink; ?>
                  </div>
                  <?php endif; ?>
                  <!--<div id="exhibit-nav-up">
                  <?php echo exhibit_builder_page_trail(); ?>
                </div>-->
              </div>
            </div>

          </div>
          <div class="col-md-2 nav">
            <nav id="exhibit-pages">
                <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
            </nav>
          </div>

        </div>
  </div>
</section>
<?php echo foot(); ?>

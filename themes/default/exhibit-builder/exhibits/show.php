    <?php
    echo head(array(
        'title' => metadata('exhibit_page', 'title').' &middot; '.metadata('exhibit', 'title'),
        'bodyclass' => 'exhibits show', ));
    ?>
    <section class="item-title-section">
      <div id="content" class='container' role="main" tabindex="-1">
          <div class="row">
              <div class="col-sm-12 col-xs-12 page">
                <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
                <h4>Tentoonstelling: <span><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></span></h4>
              </div>
          </div>
        </div>
    </section>
</header>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="col-xs-12 col-md-9 col-xs-12 page">
              <div id="exhibit-blocks">
                <?php exhibit_builder_render_exhibit_page(); ?>
              </div>
              <div id="exhibit-page-navigation">
                  <?php if ($prevLink = exhibit_builder_link_to_previous_page('<i class="material-icons">&#xE5C4;</i>')): ?>
                  <div id="exhibit-nav-prev">
                  <?php echo $prevLink; ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($nextLink = exhibit_builder_link_to_next_page('<i class="material-icons">&#xE5C8;</i>')): ?>
                  <div id="exhibit-nav-next">
                  <?php echo $nextLink; ?>
                  </div>
                  <?php endif; ?>
                  <!--<div id="exhibit-nav-up">
                  <?php echo exhibit_builder_page_trail(); ?>
                </div>-->
              </div>
          </div>
          <div class="col-xs-12 col-md-3 col-md-3 nav">
            <nav id="exhibit-pages">
                <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
            </nav>
          </div>

        </div>
  </div>
</section>
<?php echo foot(); ?>

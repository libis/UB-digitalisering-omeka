<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<section class="item-title-section">
    <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
          <div class="col-sm-12 col-xs-12 page">
              <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
          </div>
      </div>
    </div>
</section>
</header>
<div class="content-wrapper simple-page-section ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9 col-xs-12 page">
                <!--<div class='top hidden-sm-down'>
                    <?php if (!$is_home_page): ?>
                        <p id="simple-pages-breadcrumbs"><span><?php echo simple_pages_display_breadcrumbs(); ?></span></p>
                    <?php endif; ?>
                </div>-->
                <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    echo $this->shortcodes($text);
                ?>
            </div>
            <div class="col-xs-12 col-md-3 nav simple-nav"><?php echo simple_nav();?></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>

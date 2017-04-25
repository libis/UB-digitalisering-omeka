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
          <div class="offset-sm-1 col-sm-11 col-xs-12 page">
              <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
          </div>
      </div>
    </div>
</section>
<div class="content-wrapper simple-page-section ">
    <div class="container">
        <div class="row">

            <div class="offset-sm-1 col-sm-9 col-xs-12 page">
                <div class='top'>
                    <?php if (!$is_home_page): ?>
                        <p id="simple-pages-breadcrumbs"><span><?php echo simple_pages_display_breadcrumbs(); ?></span></p>
                    <?php endif; ?>
                </div>
                <div class='content'>
                    <?php
                        $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                        echo $this->shortcodes($text);
                    ?>
                </div>
            </div>
            <div class="col-sm-2 nav simple-nav"><?php echo simple_nav();?></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>

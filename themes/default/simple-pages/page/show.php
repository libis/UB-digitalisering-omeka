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
<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <h1 class="white"><?php echo metadata('simple_pages_page', 'title'); ?></h1>
    </div>
  </section>
</div>
<div class="content-wrapper simple-page-section ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9 page">
                <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    echo $this->shortcodes($text);
                ?>
            </div>
            <div class="col-xs-12 col-md-3 nav simple-nav">
              <?php echo simple_pages_navigation( metadata('simple_pages_page', 'id'));?>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>

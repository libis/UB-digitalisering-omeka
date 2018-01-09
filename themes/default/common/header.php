<!DOCTYPE html>
<html class="easy-sidebar-active" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')) :?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <?php
      queue_js_file('masonry');
      queue_js_file('jquery.bg');
      queue_js_file('jquery.detect_swipe');
      queue_js_file("lightbox");
      echo head_js();
    ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Google Fonts used in the housestyle -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Material+Icons|Open+Sans:400italic,600italic,700italic,400,700,600|Merriweather:400italic,400,700">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//stijl.kuleuven.be/2016/css/main.css">

    <!-- Stylesheets -->
    <?php
      queue_css_file(array('iconfonts', 'app','lightbox'));
      queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
      echo head_css();
      echo theme_header_background();
    ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<header role="banner">
    <div class="container nav-container">
        <nav class="navbar public-nav">
            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="modal" data-target="#modalNav" aria-controls="exCollapsingNavbar2">
              &#9776;
            </button>
            <a class="navbar-brand" href="<?php echo WEB_ROOT;?>">EXPO</a>
            <div class="logo"><img src="<?php echo img("KULEUVEN.png") ?>"></div>

            <div class="pull-xs-right">
              <button type="button" class="btn search-btn" data-toggle="modal" data-target="#exampleModal">
                <i class="material-icons">search</i>
              </button>
            </div>
            <div class="pull-xs-right hidden-sm-down">
              <?php echo public_nav_main(array('role' => 'navigation')) -> setUlClass('nav navbar-nav'); ?>
            </div>
        </nav>
    </div>
    <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-xs-11">
                  <form id="search-modal" action="<?php echo url('/search');?>">
                    <div class="input-group">
                      <input type="search" class="form-control" name="query" value="" placeholder="Zoek..." />
                      <span class="input-group-btn">
                        <button class="btn" type="submit"><i class="material-icons">search</i></button>
                      </span>
                    </div>
                  </form>
                </div>
                <div class="col-xs-1 close-col">
                  <a class="close" href="#" data-dismiss="modal"><i class="material-icons">close</i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>

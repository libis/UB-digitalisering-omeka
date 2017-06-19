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

    <!-- Stylesheets -->
    <?php
      queue_css_file(array('iconfonts', 'app'));
      queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
      echo head_css();
      echo theme_header_background();
    ?>

    <?php
      queue_js_file('masonry');
      queue_js_file('jquery.detect_swipe');
      echo head_js();
    ?>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
        <header role="banner">
            <div class="container-fluid nav-container">
                <nav class="navbar public-nav">
                    <div class="row">
                        <button class="navbar-toggler easy-sidebar-toggle pull-xs-left" type="button" aria-expanded="false" aria-label="Toggle navigation">
                          &#9776;
                        </button>
                        <a class="navbar-brand" href="<?php echo WEB_ROOT;?>"><span>Expo</span></a>
                        <div class="logo" class=""><img src="<?php echo img("KULEUVEN.png") ?>"></div>
                    </div>
                    <div class="row">
                        <div class="collapse navbar-toggleable-xl" id="exCollapsingNavbar2">
                          <?php echo public_nav_main(array('role' => 'navigation')) -> setUlClass('nav navbar-nav'); ?>
                        </div>
                    </div>
                </nav>
            </div>
            <?php fire_plugin_hook('public_header', array('view' => $this)); ?>

            <nav class="navbar navbar-inverse easy-sidebar">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                  </div>

                  <form action="<?php echo url("/solr-search/");?>" class="form-inline">
                    <input class="form-control" name="q" type="text" placeholder="Search">
                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
                  </form>

                  <?php echo public_nav_main(array('role' => 'navigation')); ?>
                </div>
                <!-- /.container-fluid -->
              </nav>
        <?php //echo search_form();?>

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
      queue_js_file('jquery.bg');
      queue_js_file('jquery.detect_swipe');
      queue_js_file("lightgallery-all.min");
      queue_js_file("slick.min");
      echo head_js();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <!-- Google Fonts used in the housestyle -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Material+Icons|Open+Sans:400italic,600italic,700italic,300,400,700,600|Merriweather:400italic,400,700">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//stijl.kuleuven.be/2016/css/main.css">

    <!-- Stylesheets -->
    <?php
      queue_css_file(array('iconfonts', 'app.min','lightgallery.min','slick','slick-theme'));
      //queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
      echo head_css();
      echo theme_header_background();
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-27663946-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-27663946-2');
    </script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<header role="banner">
    <div class="container nav-container">
        <nav class="navbar public-nav">
            <button class="navbar-toggler pull-xs-right hidden-lg-up" type="button" data-toggle="modal" data-target="#modalNav" aria-controls="exCollapsingNavbar2">
              &#9776;
            </button>
            <a class="navbar-brand" href="<?php echo WEB_ROOT;?>">EXPO</a>
            <?php
              $languages = array('en'=> 'EN','nl_BE' => 'NL');
              $path = url();
              $request = Zend_Controller_Front::getInstance()->getRequest();
              $currentLocale = Zend_Registry::get('bootstrap')->getResource('Locale')->toString();
              $currentUrl = $request ->getRequestUri();
              if($currentUrl == '/?lang=en'):
                $currentUrl = '/';
              endif;
              $query = array();
            ?>
            <?php if($currentLocale == 'en'):?>
              <div class="logo"><a target="_blank" href="//bib.kuleuven.be/english"><img src="<?php echo img("KULEUVENen.png") ?>"></a></div>

            <?php else: ?>
              <div class="logo"><a target="_blank" href="//bib.kuleuven.be"><img src="<?php echo img("KULEUVEN.png") ?>"></a></div>
            <?php endif; ?>
            <div class="pull-xs-right hidden-md-down">
              <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
            </div>
            <div class="pull-xs-right hidden-md-down">
              <button type="button" class="btn search-btn" data-toggle="modal" data-target="#exampleModal">
                <i class="material-icons">search</i>
              </button>
            </div>
            <div class="pull-xs-right hidden-md-down">
              <?php echo public_nav_main(array('role' => 'navigation')) -> setUlClass('nav navbar-nav'); ?>
            </div>

        </nav>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-xs-11">
                  <form id="search-modal" action="<?php echo url('/solr-search');?>">
                    <div class="input-group">
                      <input type="search" id="inputSearch" class="form-control" name="q" value="" placeholder="<?php echo __("Search...");?> " autofocus/>
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
              <div class="search-tips">
                <i class="material-icons">
chevron_right
</i><a href="<?php echo url("search-tips");?>"><?php echo __("Search tips");?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalNav" tabindex="-1" role="dialog" aria-labelledby="modalNav" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <a class="close" href="#" data-dismiss="modal">Menu <i class="material-icons">close</i></a>
          </div>
          <div class="modal-body">
            <div class="container">
                  <form id="search-modal" action="<?php echo url('/solr-search');?>">
                    <div class="input-group">
                      <input type="search" class="form-control" name="q" value="" placeholder="Zoek..." />
                      <span class="input-group-btn">
                        <button class="btn" type="submit"><i class="material-icons">search</i></button>
                      </span>
                    </div>
                  </form>
              <?php echo public_nav_main(array('role' => 'navigation')); ?>
              <div class="pull-xs-right">
              <div class="lang-switcher-modal">
                  <?php
                    $languages = array('en'=> 'EN','nl_BE' => 'NL');
                    $path = url();
                    $request = Zend_Controller_Front::getInstance()->getRequest();
                    $currentLocale = Zend_Registry::get('bootstrap')->getResource('Locale')->toString();
                    $currentUrl = $request ->getRequestUri();
                    $query = array();
                  ?>

                  <?php foreach ($languages as $locale => $language): ?>
                    <?php if ($locale == $currentLocale): ?>
                        <span><?php echo __('Language');?>: </span> <strong><?php echo $language ?></strong>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <?php foreach ($languages as $locale => $language): ?>
                      <?php $url = url('setlocale', array('locale' => $locale, 'redirect' => $currentUrl) + $query); ?>
                      <?php if ($locale != $currentLocale): ?>
                           <a href="<?php echo $url;?>">
                               <?php echo $language ?>
                           </a>
                      <?php endif;?>
                  <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

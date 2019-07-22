<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <div class="row">
          <div class="col-md-8 col-lg-6">
            <div class="card card-block card_banner">
              <h1><?php echo __('EXPO collection');?></h1>
                <p class="spacer">
                    <?php echo __(libis_get_simple_page_content('homepage-intro'));?>
                </p>
                <form class="" role="search" action="<?php echo url("/solr-search/");?>" name="searchform">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?php echo __("Search the website");?>" aria-label="Zoek..." name="q">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit"><?php echo __('search');?></button>
                    </span>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>

<section class="feature-section">
    <div id="content" class='container' tabindex="-1">
        <div class="row featured">
          <div class="col-xs-12 col-md-6">
              <img src="<?php echo img("ph/bg4.jpg");?>">
          </div>
          <div class="col-sm-12 col-md-6 featured-column">
            <div class="feature-text">
              <h1><?php echo __("Virtual exhibitions");?></h1>

              <p class="description">
                <?php echo __("Collection curators draw inspiration from KU Leuven Libraries' rich collections and guide you through their histories. Discover our online exhibitions.");?>
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=tentoonstelling&sort_field=added&sort_dir=d'); ?>"><?php echo __("Visit the exhibitions");?></a></p>
              </div>
            </div>
          </div>
      </div>
    </div>
</section>
<section class="feature-section gray">
    <div id="content" class='container' tabindex="-1">
        <div class="row featured">

          <div class="col-xs-12 col-md-6 featured-column">
            <div class="feature-text">
              <h1><?php echo __("Gallery");?></h1>
              <p class="description">
                <?php echo __("The diverse collections of KU Leuven Libraries hold many fascinating works, both famous masterpieces and hidden treasures. Dive into our gallery of showcases and their stories.");?>
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=galerij&sort_field=added&sort_dir=d'); ?>"><?php echo __("Discover selected showcases");?></a></p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
              <img src="<?php echo img("ph/bg5.jpg");?>">
          </div>
      </div>
    </div>
</section>
<section class="feature-section">
    <div id="content" class='container' tabindex="-1">
        <div class="row featured">
          <div class="col-xs-12 col-md-6">
              <img src="<?php echo img("ph/bg1.jpg");?>">
          </div>
            <div class="col-xs-12 col-md-6 featured-column">
                <div class="feature-text">
                    <h1><?php echo __("Projects");?></h1>
                    <p class="description">
                        <?php echo __("The digital availability of its collections is a top priority for KU Leuven Libraries. Find out more about our digitisation projects and programmes.");?>
                    </p>
                    <div class="link">
                        <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=project&sort_field=added&sort_dir=d'); ?>"><?php echo __("View the digitisation projects");?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- tentoonstellingen -->
<?php
    $exhibits = libis_get_exhibits_home(3,"tentoonstelling");
    if($exhibits):
?>
<section class="home-section gray">
    <div id="content" class='container'>
        <h2><?php echo __("Recent exhibitions");?></h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("thumbnail"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("View exhibition")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=tentoonstelling&sort_field=added&sort_dir=d"); ?>"><?php echo __("All exhibitions");?></a>
        </div>
    </div>
</section>
<?php endif;?>

<!-- Galerij -->
<?php
    $exhibits = libis_get_exhibits_home(3,"galerij");
    if($exhibits):
?>
<section class="home-section">
    <div id="content" class='container'>
        <h2><?php echo __("Recent selected showcases");?></h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("thumbnail"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("View this selected showcase")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=galerij&sort_field=added&sort_dir=d"); ?>"><?php echo __("All selected showcases");?></a>
        </div>
    </div>
</section>
<?php endif;?>

<!-- projecten -->
<?php
    $exhibits = libis_get_exhibits_home(3,"project");
    if($exhibits):
?>
<section class="home-section gray">
    <div id="content" class='container'>
        <h2><?php echo __("Recent projects");?></h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("thumbnail"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("View project")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=project&sort_field=added&sort_dir=d"); ?>"><?php echo __("All projects");?></a>
        </div>
    </div>
</section>
<?php endif;?>

<?php echo foot(); ?>

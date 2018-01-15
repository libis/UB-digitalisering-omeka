<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <div class="row">
          <div class="col-md-8 col-lg-6">
            <div class="card card-block card_banner">
              <h1>Ontdek enkele topstukken digitaal</h1>
                <p class="spacer">
                    <?php echo libis_get_simple_page_content('homepage-intro');?>
                </p>
                <form class="" role="search" action="<?php echo url("/solr-search/");?>" name="searchform">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Zoek in de website" aria-label="Zoek..." name="q">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="button">zoeken</button>
                    </span>
                  </div>
                </form>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>

<!-- tentoonstellingen -->
<?php
    $exhibits = libis_get_exhibits_home(3,"tentoonstelling");
    if($exhibits):
        $exhibit = $exhibits[0];
?>
<?php endif;?>
<section class="feature-section">
    <div id="content" class='container' tabindex="-1">
        <div class="row featured">
          <div class="col-xs-12 col-md-6">
              <?php $file = $exhibit->getFile();?>
              <div class="card">
                  <?php if ($file): ?>
                      <div class="card-img" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                      <!--<img class="card-img" src="<?php echo $file->getWebPath(); ?>">-->
                  <?php endif; ?>
              </div>
          </div>
          <div class="col-sm-12 col-md-6 featured-column">
            <div class="feature-text">
              <h1>Bezoek onze virtuele tentoonstellingen</h1>

              <p class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id sem eget libero pellentesque dignissim. Aliquam tempus tortor dapibus metus consectetur laoreet. Etiam risus nulla, cursus et erat in, molestie rutrum eros. Suspendisse potenti. Mauris nec elit auctor, faucibus felis sit amet, mollis leo.
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=tentoonstelling'); ?>">Ontdek de tentoonstellingen</a></p>
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
                    <h1>Ontdek wat wij digitaliseren</h1>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id sem eget libero pellentesque dignissim. Aliquam tempus tortor dapibus metus consectetur laoreet. Etiam risus nulla, cursus et erat in, molestie rutrum eros. Suspendisse potenti. Mauris nec elit auctor, faucibus felis sit amet, mollis leo.
                    </p>
                    <div class="link">
                        <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=project'); ?>">Bekijk de digitaliseringsprojecten</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php $file = $exhibit->getFile();?>
                <div class="card">
                    <?php if ($file): ?>
                        <div class="card-img" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                        <!--<img class="card-img" src="<?php echo $file->getWebPath(); ?>">-->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-section">
    <div id="content" class='container' tabindex="-1">
        <div class="row featured">
          <div class="col-xs-12 col-md-6">
              <?php $file = $exhibit->getFile();?>
              <div class="card">
                  <?php if ($file): ?>
                      <div class="card-img" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                      <!--<img class="card-img" src="<?php echo $file->getWebPath(); ?>">-->
                  <?php endif; ?>
              </div>
          </div>
          <div class="col-xs-12 col-md-6 featured-column">
            <div class="feature-text">
              <h1>Onze showcases</h1>
              <p class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque id sem eget libero pellentesque dignissim. Aliquam tempus tortor dapibus metus consectetur laoreet. Etiam risus nulla, cursus et erat in, molestie rutrum eros. Suspendisse potenti. Mauris nec elit auctor, faucibus felis sit amet, mollis leo.
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=showcase'); ?>">Meer over onze showcases</a></p>
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
        <h2>Recente Tentoonstellingen</h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("Bekijk tentoonstelling")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=tentoonstelling"); ?>">Alle tentoonstellingen</a>
        </div>
    </div>
</section>
<?php endif;?>

<!-- projecten -->
<?php
    $exhibits = libis_get_exhibits_home(3,"project");
    if($exhibits):
?>
<section class="home-section ">
    <div id="content" class='container'>
        <h2>Recente Projecten</h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("Bekijk tentoonstelling")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=project"); ?>">Alle projecten</a>
        </div>
    </div>
</section>
<?php endif;?>
<!-- showcases -->
<?php
    $exhibits = libis_get_exhibits_home(3,"showcase");
    if($exhibits):
?>
<section class="home-section gray">
    <div id="content" class='container'>
        <h2>Recente Showcases</h2>
        <hr align=left>
        <div class="row">
            <?php foreach($exhibits as $exhibit):?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <div class="card-img-top" style="background-image: url(<?php echo $file->getWebPath("fullsize"); ?>)"></div>
                        <?php endif; ?>
                        <div class="card-block">
                              <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
                              <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true,'snippet'=>'150'))): ?>
                              <div class="description"><p><?php echo $exhibitDescription; ?></p></div>
                              <?php endif; ?>
                        </div>
                        <div class="card-footer">
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("Bekijk showcase")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=showcase"); ?>">Alle showcases</a>
        </div>
    </div>
</section>
<?php endif;?>

<?php echo foot(); ?>

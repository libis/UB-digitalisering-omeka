<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <div class="row">
          <div class="col-md-8 col-lg-6">
            <div class="card card-block card_banner">
              <h1>EXPO collectie</h1>
                <p class="spacer">
                    <?php echo libis_get_simple_page_content('homepage-intro');?>
                </p>
                <form class="" role="search" action="<?php echo url("/solr-search/");?>" name="searchform">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Zoek in de website" aria-label="Zoek..." name="q">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">zoeken</button>
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
              <h1>Virtuele tentoonstellingen</h1>

              <p class="description">
                Curatoren putten uit de rijke collecties van KU Leuven Bibliotheken en nemen je mee in hun geschiedenis. Ontdek onze online exposities.
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=tentoonstelling&sort_field=added&sort_dir=d'); ?>">Bezoek de tentoonstellingen</a></p>
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
              <h1>Galerij</h1>
              <p class="description">
                De veelzijdige collecties van KU Leuven Bibliotheken bevatten zowel gekende topstukken als minder bekende, maar minstens even fascinerende werken. Laat je verrassen door het verhaal dat zij vertellen.
              </p>
              <div class="link">
                  <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=galerij&sort_field=added&sort_dir=d'); ?>">Ontdek bijzondere werken</a></p>
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
                    <h1>Projecten</h1>
                    <p class="description">
                        Voor KU Leuven Bibliotheken is het digitaal beschikbaar maken van haar collecties een topprioriteit. Maak kennis met onze digitaliseringsprojecten en –programma’s.
                    </p>
                    <div class="link">
                        <p><a class="btn btn-primary" href="<?php echo url('exhibits/?tag=project&sort_field=added&sort_dir=d'); ?>">Bekijk de digitaliseringsprojecten</a></p>
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
        <h2>Recente tentoonstellingen</h2>
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
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=tentoonstelling&sort_field=added&sort_dir=d"); ?>">Alle tentoonstellingen</a>
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
        <h2>Recente bijzondere werken</h2>
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
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("Bekijk dit werk")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=galerij&sort_field=added&sort_dir=d"); ?>">Alle bijzondere werken</a>
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
        <h2>Recente projecten</h2>
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
                          <?php echo exhibit_builder_link_to_exhibit($exhibit, __("Bekijk project")); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="link-to-all">
            <a class="btn btn-inverse" href="<?php echo url("exhibits/browse?tag=project&sort_field=added&sort_dir=d"); ?>">Alle projecten</a>
        </div>
    </div>
</section>
<?php endif;?>

<?php echo foot(); ?>

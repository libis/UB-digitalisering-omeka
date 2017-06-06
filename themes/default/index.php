<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
  <div class="jumbotron">
    <div class="container">
      <div class="row">
          <div class="grid-sizer col-xs-12 intro">
            <div class="row">
                <div class="grid-sizer col-lg-8 col-xs-12 intro-box">
                    <?php echo libis_get_simple_page_content('homepage-intro');?>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</header>
<section class="front-search-section">
    <div class="container">
        <div class="row row-search">
            <div class="col-lg-8 col-xs-12 front-search">
                 <!-- Search form. -->
                 <div class="solr">
                   <form action="<?php echo url("/solr-search/");?>" id="solr-search-form">
                       <input type="text" placeholder="ZOEK IN DE COLLECTIE" title="<?php echo __('Search keywords') ?>" name="q" />
                     <button type="submit" /><i class="material-icons">&#xE8B6;</i></button>
                   </form>
                 </div>
            </div>
        </div>
    </div>
</section>
<!-- tentoonstellingen -->
<?php
    $exhibits = libis_get_exhibits_home(5,"tentoonstelling");
    if($exhibits):
        $exhibit = $exhibits[0];
        $size = 4 - sizeof($exhibits);
?>
<section class="feature-section">
    <div id="content" class='container' role="main" tabindex="-1">
        <div class="row featured">
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <?php $file = $exhibit->getFile();?>
                <div class="card">
                    <?php if ($file): ?>
                        <img class="card-img" src="<?php echo $file->getWebPath(); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 featured-column">
              <div class="title-kijker">
                  <p class="featured-tag"><span>Tentoonstelling</span> <span>in de kijker</span></p>
              </div>
              <div class="feature-text">
                <h4 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                <div class="description"><?php echo $exhibit->description;?></div>
                <div class="to-exhibit">
                    <p><a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>">Start tentoonstelling</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
</section>
<section class="exhibit-section home-section general-section">
    <div id="content" class='container'>
        <div class="row">
            <div class="col-sm-12 exhibit-section-title">
                <h2 class="section-title"><span>Recente Tentoonstellingen</span></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach(array_slice($exhibits,1) as $exhibit):?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <img class="card-img" src="<?php echo $file->getWebPath(); ?>">
                        <?php endif; ?>
                        <div class="card-img-overlay">
                            <div class="overlay-text">
                              <hr class="top">
                              <h4 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <?php for($i=0;$i<=$size;$i++){?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="no-exhibit"></div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="link-to-all">
                  <a href="<?php echo url("exhibits/browse?tag=tentoonstelling"); ?>">Alle tentoonstellingen</a>
              </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
<!-- projecten -->
<?php
    $exhibits = libis_get_exhibits_home(5,"project");
    if($exhibits):
        $exhibit = $exhibits[0];
        $size = 4 - sizeof($exhibits);
?>
<section class="feature-section">
    <div id="content" class='container' role="main" tabindex="-1">
        <div class="row featured">

            <div class="col-sm-12 col-md-7 col-lg-5 col-xl-5">
                <?php $file = $exhibit->getFile();?>
                <div class="card">
                    <?php if ($file): ?>
                        <img class="card-img" src="<?php echo $file->getWebPath(); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-5 col-xl-7 featured-column">
              <div class="title-kijker">
                  <p class="featured-tag"><span>Project</span> <span>in de kijker</span></p>
              </div>
              <div class="feature-text">
                <h4 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                <div class="description"><?php echo $exhibit->description;?></div>
                <div class="to-exhibit">
                    <p><a href="<?php echo html_escape(exhibit_builder_exhibit_uri($exhibit)); ?>">Start tentoonstelling</a></p>
                </div>
              </div>
            </div>
        </div>
      </div>
</section>
<section class="exhibit-section home-section general-section">
    <div id="content" class='container'>
        <div class="row">
            <div class="col-sm-12 exhibit-section-title">
                <h2 class="section-title"><span>Recente Projecten</span></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach(array_slice($exhibits,1) as $exhibit):?>
                <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3">
                    <div class="card">
                        <?php $file = $exhibit->getFile();?>
                        <?php if ($file): ?>
                            <img class="card-img" src="<?php echo $file->getWebPath(); ?>">
                        <?php endif; ?>
                        <div class="card-img-overlay">
                            <div class="overlay-text">
                              <hr class="top">
                              <h4 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
            <?php for($i=0;$i<=$size;$i++){?>
                <div class="col-sm-12 col-md-5 col-lg-3 col-xl-3">
                    <div class="no-exhibit">

                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="link-to-all">
                  <a href="<?php echo url("exhibits/browse?tag=project"); ?>">Alle tentoonstellingen</a>
              </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
<!-- showcases -->
<?php $exhibits = libis_get_exhibits_home(5,"showcase");?>
<?php if($exhibits): ?>
<section class="showcase-section home-section">
    <div id="content" class='container'>
        <div class="row exhibit-section-row">
            <div class="col-sm-12 exhibit-section-title">
                <h2 class="section-title"><span>Showcases</span></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card-columns">
          <?php foreach($exhibits as $showcase):?>
            <div class="card">
                <?php $file = $exhibit->getFile();?>
                <?php if ($file): ?>
                    <img class="card-img-top" src="<?php echo $file->getWebPath(); ?>">
                <?php endif; ?>
                <div class="card-block">
                    <h4 class="card-title"><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                </div>
            </div>
          <?php endforeach;?>
        </div>

        <div class="link-to-all">
            <a href="<?php echo url("exhibits/browse?tag=showcase"); ?>">Alle showcases<i class="material-icons">&#xE5CC;</i></a>
        </div>
    </div>
</section>
<?php endif;?>
<script>
    jQuery( document ).ready(function() {

    });
</script>

<?php echo foot(); ?>

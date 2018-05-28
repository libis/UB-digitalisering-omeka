    <footer>
      <section class="info">
        <div class="container">
            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12 col-md-7 col-lg-8">
                      <div class="footer-images">
                        <a target="_blank" href="http://bib.kuleuven.be"><img src="<?php echo img("KULEUVEN.png");?>"></a>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-4">
                        <ul>
                          <li><a href="<?php echo url("contact");?>">Contact</a></li>
                          <li><a href="<?php echo url("collectiehouders_partners");?>">Collectiehouders & partners</a></li>
                          <li><a href="<?php echo url("copyright");?>">Copyright</a></li>
                          <li><a href="<?php echo url("over-de-website");?>">Over de website</a></li>
                          <li><a target="_blank" href="http://bib.kuleuven.be/">KU Leuven Bibliotheken</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
        </div>
      </section>
      <section class="made-by">
        <div class="container">
            Website door
            <a target="_blank" href="http://libis.be"><img src="<?php echo img("libis_logo.png");?>"></a>
        </div>
      </section>
    </footer><!-- end footer -->
</body>
<script>

  if(typeof slug !== 'undefined'){
    jQuery('.jumbotron').backstretch(
      [
          "<?php echo WEB_PUBLIC_THEME;?>/default/images/exhibits/"+slug+".jpg"
    ], {duration: 12000, fade: 1500});
  }else{
    jQuery('.jumbotron').backstretch(
      [
          "<?php echo img('bg/bg1.jpg');?>",
          "<?php echo img('bg/bg2.jpg');?>",
          "<?php echo img('bg/bg3.jpg');?>",
          "<?php echo img('bg/bg4.jpg');?>"
    ], {duration: 12000, fade: 1500});
  }

</script>

<!-- Latest compiled and minified JS -->
<script src="//stijl.kuleuven.be/2016/js/all.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.8.0/slick.min.js"></script>

</html>

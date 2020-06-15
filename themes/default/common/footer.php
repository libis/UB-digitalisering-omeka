<?php $lang = Zend_Registry::get('bootstrap')->getResource('Locale')->toString();?>
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
                        <?php if($lang == 'en'):?>
                          <a target="_blank" href="http://bib.kuleuven.be/english"><img src="<?php echo img("KULEUVENen.png");?>"></a>
                        <?php else: ?>
                          <a target="_blank" href="http://bib.kuleuven.be"><img src="<?php echo img("KULEUVEN.png");?>"></a>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-4">
                      <?php if($lang == 'nl_BE'):?>
                        <ul>
                          <li><a href="<?php echo url("contact");?>"><?php echo __("Contact");?></a></li>
                          <li><a href="<?php echo url("collectiehouders_partners");?>"><?php echo __("Collection holders & partners");?></a></li>
                          <li><a href="<?php echo url("copyright");?>"><?php echo __("Copyright");?></a></li>
                          <li><a href="<?php echo url("over-de-website");?>"><?php echo __("About the website");?></a></li>
                          <li><a target="_blank" href="http://bib.kuleuven.be/"><?php echo __("KU Leuven Libraries");?></a></li>
                        </ul>
                      <?php else: ?>
                        <ul>
                          <li><a href="<?php echo url("en/contact");?>"><?php echo __("Contact");?></a></li>
                          <li><a href="<?php echo url("en/partners");?>"><?php echo __("Collection holders & partners");?></a></li>
                          <li><a href="<?php echo url("en/copyright");?>"><?php echo __("Copyright");?></a></li>
                          <li><a href="<?php echo url("about");?>"><?php echo __("About the website");?></a></li>
                          <li><a target="_blank" href="http://bib.kuleuven.be/english"><?php echo __("KU Leuven Libraries");?></a></li>
                        </ul>
                      <?php endif;?>
                    </div>
                </div>
            </div>
            <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
        </div>
      </section>
      <section class="made-by">
        <div class="container">
            <?php echo __("Website by");?>
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
  jQuery(document).ready(function(){
    jQuery('#lang-switcher1').find('.ui-dropdown-list-trigger').each(function() {
      jQuery(this).click(function(){
        jQuery(this).parent().toggleClass('active');
      });
    });

    jQuery('#exampleModal').on('shown.bs.modal', function () {
    jQuery('#inputSearch').focus();
})
  });

</script>

<!-- Latest compiled and minified JS -->
<script src="//stijl.kuleuven.be/2016/js/all.min.js"></script>
<script src="<?php echo WEB_PUBLIC_THEME;?>/default/javascripts/salvattore.js"></script>

</html>

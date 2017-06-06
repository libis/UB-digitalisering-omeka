    <footer role="contentinfo">
        <div class="container">
            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-sm-6 col-lg-4">
                        <img src="<?php echo img("KULEUVEN.png");?>">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                        <h4>Locatie titel</h4>
                        <p>Straatstraat 22<br>
                            3000 Leuven<br>
                            016222222<br>
                        .....</p>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-3 col-lg-2 hidden-sm-down">
                        <ul>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-3 col-lg-2 hidden-sm-down">
                        <ul>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-3 col-lg-2 hidden-sm-down">
                        <ul>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>
                            <li><a href="">Menu item 1</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
        </div>

    </footer><!-- end footer -->

</body>
<script>
jQuery('.grid').masonry({
  itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
  columnWidth: '.grid-sizer',
  percentPosition: true
});

jQuery('.easy-sidebar-toggle').click(function(e) {
  e.preventDefault();
  jQuery('body').toggleClass('toggled');
  jQuery('.navbar.easy-sidebar').removeClass('toggled');
  if(jQuery('body').hasClass('toggled')){
    jQuery('.easy-sidebar-toggle').html("&#10005;");
  }else{
    jQuery('.easy-sidebar-toggle').html("&#9776;");
  }

});
jQuery('html').on('swiperight', function(){
  jQuery('body').addClass('toggled');
});
jQuery('html').on('swipeleft', function(){
  jQuery('body').removeClass('toggled');
});


</script>
</html>

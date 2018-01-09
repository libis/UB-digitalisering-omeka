<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['file-size'])
    ? html_escape($options['file-size'])
    : 'fullsize';
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<div class="row">
<?php if($position == "left"):?>
  <div class="col-xs-12 col-md-5">
    <div class="cover">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
    </div>
  </div>
  <div class="col-xs-12 col-md-7">
    <h1><?php echo metadata('exhibit_page', 'title'); ?></h1>
    <?php echo $text; ?>
  </div>
<?php else: ?>
  <div class="col-xs-12 col-md-7">
    <?php echo $text; ?>
  </div>
  <div class="col-xs-12 col-md-5">
    <div class="cover">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
    </div>
  </div>
<?php endif;?>
</div>

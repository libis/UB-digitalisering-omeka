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
<div class="captions-<?php echo $captionPosition; ?>">
<div class="row no-gutters">
<?php if($position == "left"):?>
  <div class="col-xs-12 col-md-5">
        <?php foreach ($attachments as $attachment): ?>
          <div class="text-file">
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
          </div>
        <?php endforeach; ?>
  </div>
  <div class="col-xs-12 col-md-6 offset-md-1">
    <?php echo $text; ?>
  </div>
<?php else: ?>
  <div class="col-xs-12 col-md-6">
    <?php echo $text; ?>
  </div>
  <div class="col-xs-12 col-md-5 offset-md-1">
        <?php foreach ($attachments as $attachment): ?>
          <div class="text-file">
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
          </div>
        <?php endforeach; ?>
  </div>
<?php endif;?>
</div>
</div>

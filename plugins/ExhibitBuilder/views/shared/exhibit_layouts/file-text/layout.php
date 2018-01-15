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
<div class="row">
<?php if($position == "left"):?>
  <div class="col-xs-12 col-md-6">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
  </div>
  <div class="col-xs-12 col-md-6">
    <?php echo $text; ?>
  </div>
<?php else: ?>
  <div class="col-xs-12 col-md-6">
    <?php echo $text; ?>
  </div>
  <div class="col-xs-12 col-md-6">
        <?php foreach ($attachments as $attachment): ?>
            <?php echo $this->exhibitAttachment($attachment, array('imageSize' => $size)); ?>
        <?php endforeach; ?>
  </div>
<?php endif;?>
</div>
</div>

<?php
$showcasePosition = isset($options['showcase-position'])
    ? html_escape($options['showcase-position'])
    : 'none';
$showcaseFile = $showcasePosition !== 'none' && !empty($attachments);
$galleryPosition = isset($options['gallery-position'])
    ? html_escape($options['gallery-position'])
    : 'left';
$galleryFileSize = isset($options['gallery-file-size'])
    ? html_escape($options['gallery-file-size'])
    : null;
$captionPosition = isset($options['captions-position'])
    ? html_escape($options['captions-position'])
    : 'center';
?>
<div class="gallery <?php if ($showcaseFile || !empty($text)) echo "with-showcase $galleryPosition"; ?> captions-<?php echo $captionPosition; ?>">
<?php if(!empty($text)):?>
  <div class="gallery-text">
    <?php echo $text; ?>
  </div>
<?php endif; ?>
<div class="row">
  <div class="col-xs-12">
    <div class="card-columns">
        
        <?php echo $this->exhibitAttachmentGallery($attachments, array('imageSize' => 'fullsize')); ?>
      </div>
    </div>
  </div>
</div>

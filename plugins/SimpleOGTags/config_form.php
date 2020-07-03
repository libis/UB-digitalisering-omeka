<?php
$image_url = get_option('default_image_url');
$image_height = get_option('default_image_height');
$image_width = get_option('default_image_width');
$image_mime_type = get_option('default_image_mime_type');
$image_url_secure = get_option('default_image_url_secure');
$repository = get_option('default_repository');
$view = get_view();
?>

<div class="field">
    <h3>Default Image URL</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('image_url', $image_url, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit http:// url for default image.
        </p>
    </div>
</div>

<div class="field">
    <h3>Default Image Height</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('image_height', $image_height, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit height setting in pixels.
        </p>
    </div>
</div>

<div class="field">
    <h3>Default Image Width</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('image_width', $image_width, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit width setting in pixels.
        </p>
    </div>
</div>

<div class="field">
    <h3>Default Image Mime Type</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('image_mime_type', $image_mime_type, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit mime type for default image.
        </p>
    </div>
</div>

<div class="field">
    <h3>Default Image URL Secure</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('image_url_secure', $image_url_secure, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit secure https:// URL for default image.
        </p>
    </div>
</div>

<div class="field">
    <h3>Default Repository</h3>
    <div class="inputs">
        <?php echo $view->formTextarea('repository', $repository, array('rows' => '2', 'cols' => '60', 'class' => array('textinput'))); ?>
        <p class="explanation">
            Add or edit Repository name.
        </p>
    </div>
</div>

<?php
function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function simple_nav(){
    $page = get_current_record('SimplePagesPage');

    $links = simple_pages_get_links_for_children_pages();
    if(!$links):
        $links = simple_pages_get_links_for_children_pages($page->parent_id);
    endif;

    $html="<ul class='simple-nav'>";
    foreach($links as $link):
        $html .= "<li><a href='".$link['uri']."'>".$link['label']."</a></li>";
    endforeach;
    $html .="</ul>";

    return $html;
}

function libis_get_featured_exhibits()
{
  $exhibits = get_records('Exhibit', array('sort_field' => 'added', 'sort_dir' => 'd'), 3);

  $i = 0;
  foreach($exhibits as $exhibit):?>
  <?php $file = $exhibit->getFile();?>
    <?php if ($file): ?>
      <div class="carousel-item <?php if($i == 0){ echo "active";} ?>">
        <img class="<?php if($i == 0){ echo "first-slide";} ?>" src="<?php echo $file->getWebPath(); ?>">
        <div class="carousel-caption">
          <H3><span>In de kijker</span></h3>
          <h1><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
          <p><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
          <p class="caption-auteur">Door: <strong>Tester</strong></p>
        </div>
      </div>
      <?php $i++; ?>
    <?php endif; ?>
  <?php endforeach;
}

function libis_get_exhibits_home($number = 5,$tag)
{
  $exhibits = get_records('Exhibit', array('tags'=>$tag,'sort_field' => 'added', 'sort_dir' => 'd','featured'=>'1'), $number);
  //var_dump($exhibit);
  return $exhibits;
}

function libis_get_simple_page_content($title) {
    $page = get_record('SimplePagesPage', array('title' => $title));
    if($page):
        return $page->text;
    else:
        return false;
    endif;
}

function libis_link_to_related_exhibits($item) {

    $db = get_db();

    $select = "
    SELECT e.* FROM {$db->prefix}exhibits AS e
    INNER JOIN {$db->prefix}exhibit_pages AS ep on ep.exhibit_id = e.id
    INNER JOIN {$db->prefix}exhibit_page_blocks AS epb ON epb.page_id = ep.id
    INNER JOIN {$db->prefix}exhibit_block_attachments AS epba ON epba.block_id = epb.id
    WHERE epba.item_id = ?";

    $exhibits = $db->getTable("Exhibit")->fetchObjects($select,array($item->id));

    if(!empty($exhibits)) {
        echo '';
        foreach($exhibits as $exhibit) {
            echo '<p class="in-exhibit"><i class="material-icons">&#xE3B6;</i><a href="'.url($exhibit->slug).'">Bekijk in tentoonstelling <em>'.$exhibit->title.'</em></a></p>';
        }
    }
}

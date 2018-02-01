<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search'))); ?>

<div class="jumbotron">
  <section class="overlay">
    <div class="container">
      <section class="front-search-section">
        <h1 class="white">De collectie <span>(<?php echo $results->response->numFound; ?> resultaten)</span></h1>
        <div class="row row-search">
            <div class="col-lg-8 col-xs-12 front-search">
                 <!-- Search form. -->
                 <div class="solr">
                   <form id="solr-search-form">
                     <div class="input-group">
                       <input type="text" class="form-control" placeholder="Zoek in de collectie" aria-label="Zoek..." name="q">
                       <span class="input-group-btn">
                         <button class="btn btn-primary" type="submit">zoeken</button>
                       </span>
                     </div>
                   </form>
                 </div>
            </div>
        </div>
      </section>
    </div>
  </section>
</div>
<div class="solr-section-results">
  <div class="container-fluid solr-container">
    <!-- Applied facets. -->
    <div id="solr-applied-facets">
      <ul>
        <!-- Get the applied facets. -->
        <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f) : ?>
          <li>
            <!-- Facet label. -->
            <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
            <span class="applied-facet-label"><?php echo $label; ?></span> >
            <span class="applied-facet-value"><?php echo $f[1]; ?></span>

            <!-- Remove link. -->
            <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
            <a href="<?php echo $url; ?>"><i class="material-icons">&#xE14C;</i></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="row">
      <div id="solr-facets" class="col-xs-12 col-sm-12 col-md-3 col-xl-2">
          <!-- Facets. -->
          <h5><?php echo __('Filter op:'); ?></h5>
          <?php $i=0;?>
          <?php foreach ($results->facet_counts->facet_fields as $name => $facets) : ?>
              <!-- Does the facet have any hits? -->
              <?php if(count(get_object_vars($facets))) : ?>
                  <!-- Facet label. -->
                  <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
                  <div class="facet">
                      <a class="facet-name" data-toggle="collapse" href="#list<?php echo $i;?>" aria-expanded="false" aria-controls="#list<?php echo $i;?>"><?php echo $label; ?></a>
                      <ul class="collapse" id="list<?php echo $i;?>">
                          <!-- Facets. -->
                          <?php foreach ($facets as $value => $count) : ?>
                            <li class="<?php echo $value; ?>">
                              <!-- Facet URL. -->
                              <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

                              <!-- Facet link. -->
                              <a href="<?php echo $url; ?>" class="facet-value">
                                  <?php echo $value; ?>
                              </a>

                              <!-- Facet count. -->
                              (<span class="facet-count"><?php echo $count; ?></span>)
                            </li>
                            <?php $i++;?>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>
          <?php endforeach; ?>
      </div>
      <div class="solr-results col-md-9 col-xl-10 col-xs-12">
          <!-- Number found. -->
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <?php echo pagination_links(array('scrolling_style'=>'Sliding')); ?>
            </div>
          </div>
          <div class="card-columns">
          <?php foreach ($results->response->docs as $doc) : ?>
            <div class="card result">
                <!-- Document. -->
                <?php if ($doc->resulttype == 'Item') :
                    $item = get_db()->getTable($doc->model)->find($doc->modelid);
                    if (metadata($item, 'has files')) :?>
                        <div class="col-img">
                            <?php
                            echo link_to_item(
                                item_image('fullsize', array('alt' => $doc->title), 0, $item),
                                array(),
                                'show',
                                $item
                            );
                            ?>
                        </div>
                    <?php else:?>
                      <div class="col-img">
                        <img src="<?php echo img("dummy.png") ?>">
                      </div>
                    <?php endif; ?>
                  <?php elseif ($doc->resulttype == 'Exhibit') :
                    $exhibit = get_db()->getTable($doc->model)->find($doc->modelid);
                    if ($exhibit->cover_image_file_id):
                      $file = get_record_by_id('File',$exhibit->cover_image_file_id);
                      $cover_url = $file->getWebPath('fullsize');
                    ?>
                        <div class="col-img">
                          <img src="<?php echo $cover_url ?>">
                        </div>
                    <?php else:?>
                      <div class="col-img">
                        <img src="<?php echo img("dummy.png") ?>">
                      </div>
                    <?php endif; ?>
                <?php else:?>
                  <div class="col-img">
                    <img src="<?php echo img("dummy.png") ?>">
                  </div>
                <?php endif;?>

                <!-- Header. -->
                <div class="col-text">
                    <!-- Record URL. -->
                    <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>

                    <!-- Title. -->
                    <h2><a href="<?php echo $url; ?>" class="result-title">
                    <?php
                        $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                        if (empty($title)) {
                            $title = '<i>'.__('Untitled').'</i>';
                        }
                        echo strip_tags($title);
                    ?>
                    </a></h2>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="offset-md-8 col-md-4 col-xs-12">
        <?php echo pagination_links(array('scrolling_style'=>'Sliding')); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot();

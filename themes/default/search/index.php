<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<div class="container">
  <h1><?php echo $pageTitle; ?></h1>
  <?php //echo search_filters(); ?>
  <?php if ($total_results): ?>
  <?php echo pagination_links(); ?>
  <table id="search-results">
      <tbody>
          <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
          <?php foreach (loop('search_texts') as $searchText): ?>
          <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
          <?php $recordType = $searchText['record_type']; ?>
          <?php set_current_record($recordType, $record); ?>
          <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
              <td class="first">
                  <?php if ($recordImage = record_image($recordType)): ?>
                      <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                  <?php else:?>
                    <div class="placeholder">
                      
                    </div>
                  <?php endif; ?>
                  <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
              </td>
              <td>
                  <?php echo $searchRecordTypes[$recordType]; ?>
              </td>
          </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
  <?php echo pagination_links(); ?>
  <?php else: ?>
  <div id="no-results">
      <p><?php echo __('Your query returned no results.');?></p>
  </div>
  <?php endif; ?>
</div>
<?php echo foot(); ?>

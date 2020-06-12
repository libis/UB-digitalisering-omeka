<?php
if ($locales):
    $currentLocale = Zend_Registry::get('bootstrap')->getResource('Locale')->toString();
    $request = Zend_Controller_Front::getInstance()->getRequest();
    $currentUrl = $request->getRequestUri();
    $query = array();
    // Append the record for managed plugins in public front-end.
    if (!is_admin_theme()):
        $module = $request->getModuleName();
        switch ($module):
            case 'exhibit-builder':
                $action = $request->getActionName();
                switch ($action):
                    case 'summary':
                        $query['record_type'] = 'Exhibit';
                        $exhibit = get_current_record('exhibit');
                        $query['id'] = $exhibit->id;
                        break;
                    case 'show':
                        $query['record_type'] = 'ExhibitPage';
                        $exhibitPage = get_current_record('exhibit_page');
                        $query['id'] = $exhibitPage->id;
                        break;
                endswitch;
                break;
            case 'simple-pages':
                $query['record_type'] = 'SimplePagesPage';
                $query['id'] = $request->getParam('id');
                break;
        endswitch;
    endif;
    ?>
    <div id="lang-switcher1" class="ui-dropdown-list">
        <?php foreach ($locales as $locale): ?>
            <?php $country = $this->localeToCountry($locale); ?>
            <?php $language = Zend_Locale::getTranslation(substr($locale, 0, 2), 'language'); ?>
                <?php if ($currentLocale == $locale): ?>
                  <p class="ui-dropdown-list-trigger">
                  <span class="visuallyhidden">Aktuelle Sprache: </span> <strong><?php echo substr($locale, 0, 2) ?></strong></p>
                <?php else: ?>

                <?php endif; ?>

        <?php endforeach; ?>
        <ul>
        <?php foreach ($locales as $locale): ?>
            <?php $language = Zend_Locale::getTranslation(substr($locale, 0, 2), 'language'); ?>
            <?php $url = url('setlocale', array('locale' => $locale, 'redirect' => $currentUrl) + $query); ?>
            <?php $url = url('setlocale', array('locale' => $locale, 'redirect' => $currentUrl) + $query); ?>
            <?php if ($locale != $currentLocale): ?>
                 <li><a href="<?php echo $url;?>">
                     <?php echo substr($locale, 0, 2) ?>
                 </a></li>
            <?php endif;?>

        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

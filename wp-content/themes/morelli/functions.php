<?php
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );
function is_login_page( )
		{
				return in_array( $GLOBALS[ 'pagenow' ], array(
								 'wp-login.php',
								'wp-register.php' 
				) );
		}
add_filter( 'query_vars', 'add_my_var' );
function add_my_var( $public_query_vars )
		{
				$public_query_vars[ ] = 'paged';
				return $public_query_vars;
		}
function cpt( )
		{
				$post_types = array(
					 array(
									 'title' => 'Áreas de Atuação',
									'slug' => 'areas-de-atuacao' 
					) 
				);
				foreach ( $post_types as $key => $value )
						{
								register_post_type( $value[ 'slug' ], array(
												 'labels' => array(
																 'name' => _x( $value[ 'title' ], 'post type general name' ),
																'singular_name' => _x( $value[ 'title' ], 'post type singular name' ),
																'add_new' => _x( 'Novo', $value[ 'title' ] ),
																'add_new_item' => __( 'Novo ' . $value[ 'title' ] ),
																'edit_item' => __( 'Editar ' . $value[ 'title' ] ),
																'new_item' => __( 'Novo ' . $value[ 'title' ] ),
																'view_item' => __( 'Ver ' . $value[ 'title' ] ),
																'search_items' => __( 'Buscar ' . $value[ 'title' ] ),
																'not_found' => __( 'Nada encontrado' ),
																'not_found_in_trash' => __( 'Nada encontrado' ),
																'parent_item_colon' => '' 
												),
												'exclude_from_search' => false,
												'public' => false,
												'publicly_queryable' => true,
												'show_ui' => true,
												'query_var' => true,
												'rewrite' => true,
												'show_in_nav_menus' => false,
												'capability_type' => 'post',
												'hierarchical' => false,
												'menu_position' => -2,
												'supports' => array(
																 'title',
																'editor',
																'excerpt',
																'thumbnail' 
												) 
								) );
						} //$post_types as $key => $value
		}
cpt();
if ( !function_exists( 'the_widgets_init' ) )
		{
				function the_widgets_init( )
						{
								if ( !function_exists( 'register_sidebars' ) )
												return;
								register_sidebar( array(
												 'id' => 'sidebar',
												'name' => __( 'Sidebar' ),
												'before_widget' => '<div id="%1$s" class="widget %2$s">',
												'after_widget' => '</div>',
												'before_title' => '<div class="title-header"><h4 class="section-title"><strong>',
												'after_title' => '</strong></h4></div>' 
								) );
						}
		} //!function_exists( 'the_widgets_init' )
function regScripts( )
		{
				wp_deregister_script( 'jquery' );
				wp_enqueue_script( 'vendors', get_template_directory_uri() . "/assets/js/vendors.js", '', '', false );
				wp_enqueue_script( 'commons', get_template_directory_uri() . "/assets/js/commons.js", '', '', false );
				wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array( ), '', 'all' );
		}
function remove_menus( )
		{
	        global $post;
	        remove_menu_page( 'index.php' );                  //Dashboard
	        remove_menu_page( 'jetpack' );                    //Jetpack*
	        // remove_menu_page( 'edit.php' );                   //Posts
	        // remove_menu_page( 'upload.php' );                 //Media
	        // remove_menu_page( 'edit.php?post_type=page' );    //Pages
	        remove_menu_page( 'edit-comments.php' );          //Comments
	        // remove_menu_page( 'themes.php' );                 //Appearance
	        remove_menu_page( 'plugins.php' );                //Plugins
	        // remove_menu_page( 'users.php' );                  //Users
	        remove_menu_page( 'tools.php' );                  //Tools
	        remove_menu_page( 'options-general.php' );        //Settings
		}
function wp_before_admin_bar_render( )
		{
				echo '

            <style type="text/css">

				#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu{
				            background: #a58823 !important
				        }

                #menu-appearance ul.wp-submenu.wp-submenu-wrap li:not(.wp-submenu-head):not(.hide-if-no-customize),

                #wp-admin-bar-comments,

                #wp-admin-bar-new-content,

                #wp-admin-bar-updates,

                .wp_welcome_panel-hide,

                #wp-admin-bar-wp-logo,

                #wpfooter,

                .updated.success.fs-notice.fs-has-title.fs-slug-widgets-for-siteorigin.fs-type-plugin,

                #footer-upgrade,

                #welcome-panel{

                    display: none !important;

                }

            </style>

        ';
		}
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets', 999 );
remove_action( 'welcome_panel', 'wp_welcome_panel' );
add_action( 'wp_before_admin_bar_render', 'wp_before_admin_bar_render' );
add_filter('acf/settings/show_admin', '__return_false');
function disable_default_dashboard_widgets( )
		{
				remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
				remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
		}
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
if ( function_exists( 'acf_add_local_field_group' ) ):
				acf_add_local_field_group( array(
								 'key' => 'group_5c8cea882a553',
								'title' => 'Paginas',
								'fields' => false,
								'location' => array(
												 array(
																 array(
																				 'param' => 'post_type',
																				'operator' => '==',
																				'value' => 'page' 
																) 
												) 
								),
								'menu_order' => 0,
								'position' => 'side',
								'style' => 'seamless',
								'label_placement' => 'top',
								'instruction_placement' => 'label',
								'hide_on_screen' => array(
												 0 => 'discussion',
												1 => 'comments',
												2 => 'revisions',
												3 => 'slug',
												4 => 'author',
												5 => 'format',
												6 => 'tags',
												7 => 'send-trackbacks' 
								),
								'active' => 1,
								'description' => '' 
				) );
endif;
function query_post_type( $query )
		{
				if ( is_category() || is_tag() )
						{
								$post_type = get_query_var( 'post_type' );
								if ( $post_type )
												$post_type = $post_type;
								else
												$post_type = array(
																 'nav_menu_item',
																'post',
																'articles' 
												);
								$query->set( 'post_type', $post_type );
								return $query;
						} //is_category() || is_tag()
		}
function remove_customizer_settings( $wp_customize )
		{
				$wp_customize->remove_section( 'static_front_page' );
		}
function get_custom_field_data( $key, $echo = false )
		{
				$value = get_post_meta( $post->ID, $key, true );
				if ( $echo == false )
						{
								return $value;
						} //$echo == false
				else
						{
								echo $value;
						}
		}
function hide_admin_bar( )
		{
				wp_add_inline_style( 'admin-bar', '<style> html { margin-top: 0 !important; } </style>' );
				return false;
		}
function menu( )
		{
				register_nav_menus( array(
								 'header' => __( 'Header' ) 
				) );
		}
function cc_mime_types( $mimes )
		{
				$mimes[ 'svg' ] = 'image/svg+xml';
				return $mimes;
		}
function df_terms_clauses( $clauses, $taxonomy, $args )
		{
				if ( !empty( $args[ 'post_type' ] ) )
						{
								global $wpdb;
								$post_types = array( );
								foreach ( $args[ 'post_type' ] as $cpt )
										{
												$post_types[ ] = "'" . $cpt . "'";
										} //$args[ 'post_type' ] as $cpt
								if ( !empty( $post_types ) )
										{
												$clauses[ 'fields' ] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses[ 'fields' ] ) . ', COUNT(t.term_id) AS count';
												$clauses[ 'join' ] .= ' INNER JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
												$clauses[ 'where' ] .= ' AND p.post_type IN (' . implode( ',', $post_types ) . ')';
												$clauses[ 'orderby' ] = 'GROUP BY t.term_id ' . $clauses[ 'orderby' ];
										} //!empty( $post_types )
						} //!empty( $args[ 'post_type' ] )
				return $clauses;
		}
function sanitize( $input, $setting )
		{
				global $wp_customize;
				$control = $wp_customize->get_control( $setting->id );
				if ( array_key_exists( $input, $control->choices ) )
						{
								return $input;
						} //array_key_exists( $input, $control->choices )
				else
						{
								return $setting->default;
						}
		}
function mytheme_remove_help_tabs( $old_help, $screen_id, $screen )
		{
				$screen->remove_help_tabs();
				return $old_help;
		}
function customizer( $wp_customize )
		{
				$wp_customize->add_panel( 'customization', array(
								 'priority' => 2,
								'title' => __( 'Customização' ) 
				) );
				$wp_customize->add_section( 'contato', array(
								 'title' => __( 'Contato' ),
								'panel' => 'customization',
								'priority' => 3 
				) );
				$wp_customize->add_setting( 'email' );
				$wp_customize->add_control( 'email', array(
								 'label' => 'E-mail',
								'section' => 'contato',
								'type' => 'email',
								'settings' => 'email' 
				) );
				$wp_customize->add_setting( 'telefone' );
				$wp_customize->add_control( 'telefone', array(
								 'label' => 'Telefone',
								'section' => 'contato',
								'type' => 'tel',
								'settings' => 'telefone' 
				) );

				$wp_customize->add_setting( 'maps' );
				$wp_customize->add_control( 'maps', array(
								 'label' => 'Maps',
								'section' => 'contato',
								'type' => 'textarea',
								'settings' => 'maps' 
				) );

	            $wp_customize->add_setting( 'endereco' );

	            $wp_customize->add_control('endereco',  array(

	                'label' => 'Endereço',

	                'section' => 'contato',

	                'type' => 'textarea',

	                'settings' => 'endereco'

	            ));
				$wp_customize->add_section( 'header', array(
								 'title' => __( 'Header' ),
								'panel' => 'customization',
								'priority' => 1 
				) );
				$wp_customize->add_setting( 'logo' );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
								 'label' => __( 'Logo' ),
								'section' => 'header',
								'settings' => 'logo' 
				) ) );
				$social_networks = array(
								//  array(
								// 				 'title' => 'Facebok',
								// 				'slug' => 'facebook' 
								// )
				);
				if ( !empty( $social_networks ) )
						{
								$wp_customize->add_section( 'social_networks', array(
												 'title' => __( 'Social Networks' ),
												'panel' => 'customization',
												'priority' => 0 
								) );
								foreach ( $social_networks as $key => $value )
										{
												$wp_customize->add_setting( $value[ 'slug' ] );
												$wp_customize->add_control( $value[ 'slug' ], array(
																 'label' => $value[ 'title' ],
																'section' => 'social_networks',
																'type' => 'text',
																'settings' => $value[ 'slug' ] 
												) );
										} //$social_networks as $key => $value
						} //!empty( $social_networks )
		}
function count_post_visits( )
		{
				if ( is_single() )
						{
								global $post;
								$views = get_post_meta( $post->ID, 'my_post_viewed', true );
								if ( $views == '' )
										{
												update_post_meta( $post->ID, 'my_post_viewed', '1' );
										} //$views == ''
								else
										{
												$views_no = intval( $views );
												update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
										}
						} //is_single()
		}
if ( is_admin() )
		{
				if ( $current_user->roles[ 0 ] == 'subscriber' )
						{
								$subdomain = str_replace( 'user_', '', $current_user->roles[ 0 ] );
								$protocol  = stripos( $_SERVER[ 'SERVER_PROTOCOL' ], 'https' ) === true ? 'https://' : 'http://';
								$url       = str_replace( $protocol, '', network_site_url() );
								wp_redirect( $protocol . $subdomain . '.' . $url, 301 );
								exit;
						} //$current_user->roles[ 0 ] == 'subscriber'
		} //is_admin()
function remove_thumbnail_support( )
		{
				remove_post_type_support( 'page', 'comments' );
				remove_post_type_support( 'page', 'revisions' );
				remove_post_type_support( 'post', 'comments' );
				remove_post_type_support( 'post', 'revisions' );
		}
add_action( 'init', 'remove_thumbnail_support' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
add_action( 'wp_head', 'count_post_visits' );
add_action( 'init', 'menu' );
add_action( 'init', 'the_widgets_init' );
add_action( 'admin_menu', 'remove_menus' );
add_action( 'wp_enqueue_scripts', 'regScripts' );
add_filter( 'show_admin_bar', 'hide_admin_bar' );
add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
add_action( 'customize_register', 'remove_customizer_settings', 20 );
add_action( 'customize_register', 'customizer' );
add_filter( 'terms_clauses', 'df_terms_clauses', 10, 3 );
add_filter( 'upload_mimes', 'cc_mime_types' );
add_filter( 'pre_get_posts', 'query_post_type' );
<?php
/**
 * Plugin Getting Started Page
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Action to add menu
add_action('admin_menu', 'wprpswr_register_getting_started_page');

/**
 * Register plugin design page in admin menu
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
function wprpswr_register_getting_started_page() {
	add_menu_page( __('Recent Post Slider', 'wp-recent-post-slider-with-responsive'), __('Default Post Slider', 'wp-recent-post-slider-with-responsive'), 'manage_options', 'wprpswr-about', 'wprpswr_getting_started_page', 'dashicons-welcome-write-blog', 6 );
}
/**
 * Function to display plugin design HTML
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
function wprpswr_getting_started_page() {
	$wpoh_feed_tabs = wprpswr_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>
	<div class="wrap wprpswr-wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpoh_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array('page' => 'wprpswr-about', 'tab' => $tab_key), admin_url('admin.php') );
			?>
			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>
			<?php } ?>
		</h2>		
		<div class="wprpswr-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				wprpswr_howitwork_page();
			}
			else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo wprpswr_get_plugin_design( 'plugins-feed' );
			} else {
				echo wprpswr_get_plugin_design( 'offers-feed' );
			}
		?>
		</div><!-- end .wprpswr-tab-cnt-wrp -->
	</div><!-- end .wprpswr-wrap -->
<?php
}
/**
 * Gets the plugin design part feed
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
function wprpswr_get_plugin_design( $feed_type = '' ) {	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}
	// Taking some variables
	$wpoh_feed_tabs = wprpswr_help_tabs();
	$transient_key 	= isset($wpoh_feed_tabs[$active_tab]['transient_key']) 	? $wpoh_feed_tabs[$active_tab]['transient_key'] 	: 'wprpswr_' . $active_tab;
	$url 			= isset($wpoh_feed_tabs[$active_tab]['url']) 			? $wpoh_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpoh_feed_tabs[$active_tab]['transient_time']) ? $wpoh_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );	
	if ( false === $cache ) {		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'wp-recent-post-slider-with-responsive' ) . '</div>';
		}
	}
	return $cache;	
}
/**
 * Function to get plugin feed tabs
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
function wprpswr_help_tabs() {
	$wpoh_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'wp-recent-post-slider-with-responsive'),
												)
					);
	return $wpoh_feed_tabs;
}
/**
 * Function to get 'How It Works' HTML
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
function wprpswr_howitwork_page() { ?>	
	<style type="text/css">
		.wpoh-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpoh-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpoh-list li:before{font-family: dashicons; content: "\f119"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wprpswr-wrap .wpoh-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wprpswr-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>
	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and Shortcode', 'wp-recent-post-slider-with-responsive' ); ?></span>
								</h3>								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Geeting Started with Post Slider', 'wp-recent-post-slider-with-responsive'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. This plugin create a menu "Recent Post Slider".', 'wp-recent-post-slider-with-responsive'); ?></li>
														<li><?php _e('Step-2. This plugin get all the latest POST from WordPress Post section with a simple shortcode', 'wp-recent-post-slider-with-responsive'); ?></li>									
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('How Shortcode Works', 'wp-recent-post-slider-with-responsive'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Create a page like WP default Post OR add the shortcode in a page.', 'wp-recent-post-slider-with-responsive'); ?></li>
														<li><?php _e('Step-2. Put below shortcode as per your need.', 'wp-recent-post-slider-with-responsive'); ?></li>
													</ul>
												</td>
											</tr>
											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'wp-recent-post-slider-with-responsive'); ?>:</label>
												</th>
												<td>
													<span class="wprpswr-shortcode-preview">[wpoh_post_slider design="design-1"]</span> – <?php _e('WP default Post slider Shortcode. Where you can use 4 designs', 'wp-recent-post-slider-with-responsive'); ?>
													
												</td>
											</tr>												
											<tr>
												<th>
													<label><?php _e('Need Support?', 'wp-recent-post-slider-with-responsive'); ?></label>
												</th>
												<td>
													<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wp-recent-post-slider-with-responsive'); ?></p> <br/>
													<a class="button button-primary" href="#" target="_blank"><?php _e('Documentation', 'wp-recent-post-slider-with-responsive'); ?></a>									
													<a class="button button-primary" href="#" target="_blank"><?php _e('Demo for Designs', 'wp-recent-post-slider-with-responsive'); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }
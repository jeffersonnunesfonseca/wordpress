<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

##  ADICIONADO MANUALMENTE PARA DEIXAR OPÇOES DESABILITADAS EM OPCOES DE TELA
function remove_dashboard_widgets() {
	// add your widget
	$uid =  get_current_user_id();
	// hide welcome panel
	update_user_meta( $uid, 'show_welcome_panel', '0' );
	// get the current hidden metaboxes
	$hidden = get_user_meta( $uid, 'metaboxhidden_dashboard' );
	// the metaboxes to be hidden
	$to_hide = array(
	  'dashboard_right_now',
	  'dashboard_activity',
	  'dashboard_quick_press',
	  'dashboard_primary'
	);
	// if not already hidden, hide
	if ( $hidden !== $to_hide ) {
	  update_user_meta( $uid, 'metaboxhidden_dashboard', $to_hide );
	}
  }
  add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

  function remove_menus(){  

	remove_menu_page( 'index.php' );                  //Dashboard  
	remove_menu_page( 'plugins.php' );                   //Posts  
	
	remove_menu_page( 'edit.php' );                   //Posts  
	// remove_menu_page( 'upload.php' );                 //Media  
	remove_menu_page( 'wp-mail-smtp' );    //Pages  
	remove_menu_page( 'admin.php?page=wc-addons' );    //Pages

	
	remove_menu_page( 'wc-admin&path=/marketing' );    //Pages  
	remove_menu_page( 'tools.php' );                  //Tools  
  
  }  
  add_action( 'admin_init', 'remove_menus' );

  //remove menus woocomerce
  function wooninja_remove_items() {
	$remove = array( 'wc-admin','wc-addons', );
	 foreach ( $remove as $submenu_slug ) {
	//   if ( ! current_user_can( 'update_core' ) ) {
	   remove_submenu_page( 'woocommerce', $submenu_slug );
	//   }
	 }
   }
   
   add_action( 'admin_init', 'wooninja_remove_items');

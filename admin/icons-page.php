<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Create Menu Pages

function ctic_icons_plugin_add_menu_page() {

	// Top Level Menu
	add_menu_page(
		__('Coothemes Icons','coothemes-icons'),
		'Coothemes Icons',
		'manage_options',
		'coothemes-icons',
		'ctic_icons_options_page',
		'dashicons-awards'
	);


	// Sub Pages

	/* Settings Page */
	
	add_submenu_page(
		'coothemes-icons',
		__( 'Coothemes Icons - Settings' , 'coothemes-icons' ),
		__( 'Settings' , 'coothemes-icons'  ),
		'manage_options',
		'coothemes-icons',
		'ctic_icons_options_page'
	);
	

}
add_action('admin_menu', 'ctic_icons_plugin_add_menu_page');


/** Settings Page **/

function ctic_icons_settings_init(  ) {

	register_setting( 'ctic_icons_settings_page', 'ctic_icons_defualt_icon_container' );
	register_setting( 'ctic_icons_settings_page', 'ctic_icons_clear_all_data_on_uninstall' );

	/* Register settings section */
	add_settings_section(
		'ctic_icons_plugin_section',
		__( '', 'coothemes-icons' ),
		'ctic_icons_settings_section_callback',
		'ctic_icons_settings_page'
	);


	/* Default Icon Element */
	add_settings_field(
		'ctic_icons_defualt_icon_container',
		__( 'Defualt Icon Element', 'coothemes-icons' ),
		'ctic_icons_enqueue_defualt_icon_container_callback',
		'ctic_icons_settings_page',
		'ctic_icons_plugin_section'
	);

	add_settings_field(
		'ctic_icons_defualt_icon',
		__( 'How to Use', 'coothemes-icons' ),
		'ctic_icons_callback',
		'ctic_icons_settings_page',
		'ctic_icons_plugin_section'
	);
	
}
add_action( 'admin_init', 'ctic_icons_settings_init' );


// Default icons element cotainer - dropdown - callback
// doesn't currently do anything
// unable to use get_option() on edit.php to dictate the default icons
function ctic_icons_enqueue_defualt_icon_container_callback(  ) {

	$default_icon_container = get_option( 'ctic_icons_defualt_icon_container' , 'i' );

	?>
	<select id="ctic_icons_defualt_icon_container" name="ctic_icons_defualt_icon_container">
		<option val="H1" <?php selected( $default_icon_container , 'h1' ); ?>>h1</option>
		<option val="h2" <?php selected( $default_icon_container , 'h2' ); ?>>h2</option>
		<option val="h3" <?php selected( $default_icon_container , 'h3' ); ?>>h3</option>
		<option val="span" <?php selected( $default_icon_container , 'span' ); ?>>span</option>
		<option val="div" <?php selected( $default_icon_container , 'div' ); ?>>div</option>
		<option val="i" <?php selected( $default_icon_container , 'i' ); ?>>i</option>
		<option val="b" <?php selected( $default_icon_container , 'b' ); ?>>b</option>
	</select>

	<?php

}

function ctic_icons_callback(  ) {

	?>

	<!-- display our icons and stuff -->
	<div class="wrap coothemes-icons-wrap">

		<div class="w-main centered">

			<div class="help-boxes" >

				<div class="how-to-use">

					<?php $selected = get_option( 'ctic_icons_defualt_icon_container' , 'i' ); ?>

					<section class="ctic-how-to-use-container">
						<h3 style="padding-left:10px;"><?php _e( "How to use:" , "coothemes-icons" ); ?></h3>
						<ul style="margin-left:35px; list-style-type:square; margin-bottom: 20px;">
							<li><?php _e( "Step 1: Locate and click the icon you want to use." , "coothemes-icons" ); ?></li>
							<li><?php _e( "Step 2: Select the element to wrap your icon with." , "coothemes-icons" ); ?></li>
							<span class="element_selection_container">
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'h1' ) { echo ' selected-element-wrap'; } ?>" alt="h1">h1</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'h2' ) { echo ' selected-element-wrap'; } ?>" alt="h2">h2</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'h3' ) { echo ' selected-element-wrap'; } ?>" alt="h3">h3</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'span' ) { echo ' selected-element-wrap'; } ?>" alt="span">span</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'div' ) { echo ' selected-element-wrap'; } ?>" alt="div">div</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'i' ) { echo ' selected-element-wrap'; } ?>" alt="i">i</a>
								<a href="#" onclick="return false;" class="button-secondary icon-wrapper<?php if ( $selected === 'b' ) { echo ' selected-element-wrap'; } ?>" alt="b">b</a>
							</span>
							<li><?php _e( "Step 3: Copy the shortcode and paste it into a post or page, or use the generated shortcode anywhere on your site, or in any template file." , "coothemes-icons" ); ?></li>
							<!-- copy paste input field -->
							<li style="list-style-type:none !important; display:block;margin-top:.75em;">
								<i style="color:red;"><?php _e( 'Shortcode:' , 'coothemes-icons' ); ?></i>
								<div class="copy_paste_input" style="padding-left:0;width:100%;resize:none;" contentEditable="true">[ctic-icons icon="<?php _e( 'icon-name' , 'coothemes-icons' ); ?>" wrap=""]</div>
							</li>
                            
							<li><a href="https://www.coothemes.com/coothemes-icons/"><?php _e( "See more features and usages of coothemes icons!" , "coothemes-icons" ); ?></a></li>                            
                            
                            
                            <?php if( defined( 'CTIC_PRO' ) && CTIC_PRO ){?>
							<li style="list-style:none;margin-top:1em;display:black;" id="advanced-attr-toggle-list-item">
								<a href="#" class="button-secondary" id="advanced-shortcode-attr-toggle"><?php _e( "Advanced Attributes" , "coothemes-icons" ); ?></a>
                                
								<a href="#" class="button-secondary" id="ctic-icon-container-toggle" ><?php _e( "Icon Container" , "coothemes-icons" ); ?></a>
                          	</li>
                            <?php }?>
                            
						</ul>

					</section>
                    
                    
  					<!-- preview box -->
					<div class="ctic-icon-preview-box default-icons">
						<i style="font-size:14px;" class="copy-paste-text"><?php _e( 'Icon Preview:' , 'coothemes-icons' ); ?></i>
                        <p class="ctic-clear"></p>
                        <b class="ctic-icon-preview"></b>
					</div>                  


				</div>	<!-- end how to use -->

			</div><!-- end help boxes -->

				<!-- tabs, to switch between default and custom packs on edit.php -->
				<h2 class="nav-tab-wrapper" id="ctic-nav-tab-wrapper" style="display:none;">
					<a href="#" class="nav-tab default-icon-pack nav-tab-active" onclick="show_defualt_pack( this );"><?php _e( 'Default Pack' , 'coothemes-icons' ); ?></a>
				</h2>
			
            <p style="clear:both; margin:0; padding:0;"></p>
			<div class="coothemes-iconset1-all-glyphs" style="display:inline-block; margin-top:1em; ">

				<section class="mtm clearfix" id="glyphs">
 
 					<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/icon-html.php';?>
				</section>

			</div>

			<div class="custom-pack-container-ajax" style="display:inline-block; margin-top:1em; "></div>

			<div class="clear"></div>

			<footer>
				<p><?php _e( 'Plugin Created By' , 'coothemes-icons' ); ?> <a style="color:#B35047;" href="https://www.coothemes.com" target="_blank"><?php _e( 'Coothemes Icons' , 'coothemes-icons' ); ?></a></p>
			</footer>

		</div>

	</div>   

    
	<?php

}
// description of the settings page
function ctic_icons_settings_section_callback(  ) {
	echo '<p>' . __( 'Settings are limited in Coothemes Icons. This plugin was created to be as user friendly and as easy to maintain as possible, which includes a very minimal settings page.', 'coothemes-icons' ) . '</p>';
	echo '<hr />';
	// Display a confirmation to the user when the settings have been updated
	if( isset( $_GET['settings-updated'] ) ) {
		?>
			<div class="updated">
				<p><?php _e( 'Settings successfully updated.' , 'coothemes-icons' ); ?></p>
			</div>
		<?php
	}
}

/* Options Page Callback */
function ctic_icons_options_page(  ) {
	?>
	<div class="svg-custom-upload-wrap wrap">
		<form action='options.php' method='post'>
			<h1 class="ctic-title"><span style="color:#FF8000;">Coothemes Icons</span> | <?php _e( 'Settings' , 'coothemes-icons' ) ?></h1>
			<!-- review us container -->
			<div id="review-coothemes-icons" style="position:absolute;right:15em;top:0;text-align:center;">
				<p><?php _e( 'Leave Us A Review!' , 'coothemes-icons' ); ?></p>
				<p style="margin-top:-8px;"><a href="https://wordpress.org/support/view/plugin-reviews/svg-vector-icon-plugin" target="_blank" style="text-decoration:none;"><b class="ctic-happy" style="font-size:2.5em;"></b></a></p>
			</div>
			<!-- social media icons -->
			<div id="social-icons" style="position:absolute;right:0;top:0;margin:0 3em 0 0;text-align:center;">
				<p><?php _e( 'Follow me elsewhere' , 'coothemes-icons' ); ?></p>
                
                	<a href="https://www.coothemes.com/coothemes-icons/"><?php _e( 'Update to Pro' , 'coothemes-icons' ) ?></a>
					<a href="https://profiles.wordpress.org/coothemes/"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/../../images/wordpress-icon.png"></a>
					<a href="https://www.coothemes.com/feed/"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>/../../images/rss_icon.png"></a><br />
			</div>
			<?php
				settings_fields( 'ctic_icons_settings_page' );
				do_settings_sections( 'ctic_icons_settings_page' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

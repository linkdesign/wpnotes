<?php

/*

@package Notes

	========================
		ADMIN PAGE
	========================
*/

function edulink_add_admin_page() {


	//Generate Admin Page
	add_menu_page( 'Notes for Wordpress', 'Notes W', 'manage_options', 'edulink_notes_adicional', 'edulink_theme_contacto_page', 'dashicons-editor-paste-word', 15 );


}
add_action( 'admin_menu', 'edulink_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'edulink_custom_settings' );

function edulink_custom_settings() {

  register_setting( 'edulink-theme-contacto', 'texto_adicional_notes' );

  //DATOS DE CONTACTO
  register_setting( 'edulink-theme-contacto', 'edulink_theme_contacto' );
  add_settings_section( 'sunset-contacto-options', 'by Edulink', 'edulink_theme_contacto', 'edulink_notes_adicional');
}






//Template submenu functions
//Recoger los valores

function edulink_theme_contacto_page() {
	require_once( plugin_dir_path( __FILE__ ) . 'templates/theme-contacto.php' );
}

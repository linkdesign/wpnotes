<?php

/*

@package sunsettheme

	========================
		ADMIN PAGE
	========================
*/

function sunset_add_admin_page() {
  

	//Generate Sunset Admin Page
	add_menu_page( 'Opciones del Tema', 'Bestdrive Admin', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 10 );
//add_menu_page add_theme_page (era lo que iba arriba)
	//Generate Sunset Admin Sub Pages
  add_submenu_page( 'alecaddd_sunset', 'Contacto', 'Datos de contacto', 'manage_options', 'alecaddd_sunset_contacto', 'sunset_theme_contacto_page');
	add_submenu_page( 'alecaddd_sunset', 'Sidebar Options', 'Redes Sociales', 'manage_options', 'alecaddd_sunset', 'sunset_theme_create_page' );
	add_submenu_page( 'alecaddd_sunset', 'Theme Options', 'Opciones del tema', 'manage_options', 'alecaddd_sunset_theme', 'sunset_theme_support_page' );
	add_submenu_page( 'alecaddd_sunset', 'Contact Form', 'Formulario de Contacto', 'manage_options', 'alecaddd_sunset_theme_contact', 'sunset_contact_form_page' );
  add_submenu_page( 'alecaddd_sunset', 'CSS Options', 'CSS Personalizado', 'manage_options', 'alecaddd_sunset_css', 'sunset_theme_settings_page');
  add_submenu_page( 'alecaddd_sunset', 'Info', 'Ayuda', 'manage_options', 'alecaddd_sunset_info', 'sunset_info_page' );

}
add_action( 'admin_menu', 'sunset_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'sunset_custom_settings' );

function sunset_custom_settings() {
	//Sidebar Options
	register_setting( 'sunset-settings-group', 'profile_picture' );
	register_setting( 'sunset-settings-group', 'first_name' );
	register_setting( 'sunset-settings-group', 'last_name' );
	register_setting( 'sunset-settings-group', 'user_description' );
	register_setting( 'sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler' );
	register_setting( 'sunset-settings-group', 'facebook_handler' );
	register_setting( 'sunset-settings-group', 'gplus_handler' );

  // register settings sunset Theme contacto
  register_setting( 'sunset-theme-contacto', 'email_contacto' );
  register_setting( 'sunset-theme-contacto', 'textolegal_nombre' );
  register_setting( 'sunset-theme-contacto', 'textolegal_direccion' );
  register_setting( 'sunset-theme-contacto', 'textolegal_email' );
  register_setting( 'sunset-theme-contacto', 'direccion_contacto' );
  register_setting( 'sunset-theme-contacto', 'ciudad_contacto' );
  register_setting( 'sunset-theme-contacto', 'cp_contacto' );
  register_setting( 'sunset-theme-contacto', 'provincia_contacto' );
  register_setting( 'sunset-theme-contacto', 'telefono_1_contacto' );
  register_setting( 'sunset-theme-contacto', 'telefono_2_contacto' );
  register_setting( 'sunset-theme-contacto', 'texto_adicional_contacto' );
  register_setting( 'sunset-theme-contacto', 'nombre_contacto' );

	add_settings_section( 'sunset-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'alecaddd_sunset');

	add_settings_field( 'sidebar-profile-picture', ' Imagen de perfil', 'sunset_sidebar_profile', 'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-name', 'Nombre', 'sunset_sidebar_name', 'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-description', 'Descripción', 'sunset_sidebar_description', 'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter', 'sunset_sidebar_twitter', 'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook', 'sunset_sidebar_facebook', 'alecaddd_sunset', 'sunset-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+', 'sunset_sidebar_gplus', 'alecaddd_sunset', 'sunset-sidebar-options');
  //add_settings_field( 'sidebar-email', 'email', 'sunset_theme_contacto', 'alecaddd_sunset', 'sunset-sidebar-options');

	//Theme Support Options
	//register_setting( 'sunset-theme-support', 'post_formats' );
	register_setting( 'sunset-theme-support', 'custom_header' );
	register_setting( 'sunset-theme-support', 'custom_background' );

	add_settings_section( 'sunset-theme-options', 'Selecciona las opciones del tema', 'sunset_theme_options', 'alecaddd_sunset_theme' );

	//add_settings_field( 'post-formats', 'Formato de los Post', 'sunset_post_formats', 'alecaddd_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-header', 'Funciones Wordpress', 'sunset_custom_header', 'alecaddd_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-background', 'Personalizacion de la apariencia del tema', 'sunset_custom_background', 'alecaddd_sunset_theme', 'sunset-theme-options' );

	//Contact Form Options
	register_setting( 'sunset-contact-options', 'activate_contact' );

	add_settings_section( 'sunset-contact-section', 'Contact Form', 'sunset_contact_section', 'alecaddd_sunset_theme_contact');

	add_settings_field( 'activate-form', 'Activar formulario de contacto', 'sunset_activate_contact', 'alecaddd_sunset_theme_contact', 'sunset-contact-section' );

	//Custom CSS Options
	register_setting( 'sunset-custom-css-options', 'sunset_css', 'sunset_sanitize_custom_css' );

	add_settings_section( 'sunset-custom-css-section', 'CSS Personalizado', 'sunset_custom_css_section_callback', 'alecaddd_sunset_css' );

	add_settings_field( 'custom-css', 'Introduce tu CSS', 'sunset_custom_css_callback', 'alecaddd_sunset_css', 'sunset-custom-css-section' );

  //DATOS DE CONTACTO
  register_setting( 'sunset-theme-contacto', 'sunset_theme_contacto' );
  add_settings_section( 'sunset-contacto-options', 'Opciones de Contacto', 'sunset_theme_contacto', 'alecaddd_sunset_contacto');
  //add_settings_field( 'sunset-contacto-fields', 'AAA', 'sunset_contacto_fields_callback', 'alecaddd_sunset_contacto', 'sunset-contacto-fields-section' );
	//Ayuda
  //register_setting( 'sunset-theme-info', 'sunset_theme_info' );
  //add_settings_section( 'sunset-info-options', 'Informacion', 'sunset_theme_info', 'alecaddd_sunset_info');
}

function sunset_custom_css_section_callback() {
	echo 'Personaliza el tema con CSS';
}

#sunset_css { position: relative; width: 800px; height: 500px; }
function sunset_custom_css_callback() {
	$css = get_option( 'sunset_css' );
	$css = ( empty($css) ? '/* CSS Personalizado */' : $css );
	echo '<textarea id="sunset_css" name="sunset_css" style="display:inline;visibility:;position: relative; width: 800px; height: 500px;">'.$css.'</textarea>';
}

function sunset_theme_options() {
	echo 'Activa las opciones específicas del tema';
}

function sunset_contact_section() {
	echo 'Activar y desactivar el formulario de contacto integrado';
}

function sunset_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

function sunset_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function sunset_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 0 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Quitar barra de wordpress</label>';
}

function sunset_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Desactivar colores personalizados y opciones avanzadas</label>';
}

// Sidebar Options Functions
function sunset_sidebar_options() {
	echo 'Personaliza tu información';
}

function sunset_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Subir foto de perfil" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Subir foto de perfil</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Cambiar foto de perfil" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Cambiar foto de perfil</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="sunset-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}

}
function sunset_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="Nombre" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Apellido" />';
}
function sunset_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Descripción" /><p class="description">Escribe algo bonito.</p>';
}
function sunset_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Cuenta de Twitter" /><p class="description">Introduce tu usuario de Twitter con una @ delante.</p>';
}
function sunset_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Cuenta de Facebook" />';
}
function sunset_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Cuenta de Google+" />';
  echo "<br>";
}




//Sanitization settings
function sunset_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function sunset_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

//Template submenu functions
//Recoger los valores
$directorio = plugin_dir_path( __FILE__ );
?><div style="padding-left:300px;padding-top:50px">
  <?php echo $directorio;?>
</div>
<?php
function sunset_theme_create_page() {
	require_once( echo $directorio . 'templates/sunset-admin.php' );
}

function sunset_theme_support_page() {
	require_once( echo $directorio . 'templates/sunset-theme-support.php' );
}

function sunset_contact_form_page() {
	require_once( echo $directorio . 'templates/sunset-contact-form.php' );
}

function sunset_theme_settings_page() {
	require_once( echo $directorio . 'templates/sunset-custom-css.php' );
}

function sunset_theme_contacto_page() {
	require_once( echo $directorio . 'templates/sunset-theme-contacto.php' );
}

function sunset_info_page() {
	require_once( echo $directorio . 'templates/info-page.php' );
}

<h1>Notes Wordpress</h1>
<?php settings_errors(); ?>
<style>
 .input-dimension{width:100%;background-color:#23282D; color:white}
 .panel-lectura{position:fixed;right:0px;top:0px;padding:35px;background-color:#23282D;color:white;width:300px}
 .cabecera-panel{background-color:#F7A703;width:100%}
 .estilotextarea {width:300px;height:300px;border: 2px solid #990000;}
 .estilotextarea2 {width:90%;height:300px;border: 2px solid #414956;}
  @media screen and (max-width: 992px) {
 .ocultar-movil{display:none}
 .input-dimension{width:100%}
}
</style>
<?php
function edulink_theme_contacto() {
  echo "<div style='width:80%'>";
  echo "<h4 style='background-color:#0073AA;padding:10px;color:white'>Notes Wordpress</h4>";
  $texto_adicional_notes = esc_attr( get_option( 'texto_adicional_notes' ) );
  echo '<textarea rows="30" cols="50" class="input-dimension" name="texto_adicional_notes" placeholder="Add your notes for Wordpress" />'.$texto_adicional_notes.'</textarea>';
  echo "</div>";
}
?>

<?php
  $texto_adicional_notes = esc_attr( get_option( 'texto_adicional_notes' ) );
?>



<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'edulink-theme-contacto' ); ?>
	<?php do_settings_sections( 'edulink_notes_adicional' ); ?>
	<?php submit_button(); ?>
</form>

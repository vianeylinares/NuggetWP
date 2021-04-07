<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

function register_business_options_settings(){

	register_setting( 'business_general_options_settings-group', 'business_creation_date' );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_type_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_type', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_name_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_name', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_logo_image_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_logo_image', $args );

	/*$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_content_title_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_content_title', $args );*/

	register_setting( 'business_general_options_settings-group', 'business_content' );

	/*$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_feature_1_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_feature_1', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_feature_2_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_feature_2', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_feature_3_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_feature_3', $args );*/

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_promo_image_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_promo_image', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_coupon_image_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_coupon_image', $args );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_precoupon_image_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_precoupon_image', $args );

	register_setting( 'business_general_options_settings-group', 'business_coupon_prefix' );

	register_setting( 'business_general_options_settings-group', 'business_total_coupons' );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_form_title_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_form_title', $args );

	register_setting( 'business_general_options_settings-group', 'business_form_color' );

	register_setting( 'business_general_options_settings-group', 'business_form_button_color' );

	register_setting( 'business_general_options_settings-group', 'business_contact_email' );

	/*$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_legend_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_legend', $args );*/

	register_setting( 'business_general_options_settings-group', 'business_contact_legend' );

	register_setting( 'business_general_options_settings-group', 'business_address' );

	register_setting( 'business_general_options_settings-group', 'business_map' );

	register_setting( 'business_general_options_settings-group', 'business_font_code' );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_font_family_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_font_family', $args );

	register_setting( 'business_general_options_settings-group', 'business_background_color' );

	$args = array(
        'type' => 'string', 
        'sanitize_callback' => 'business_background_image_sanitize',
	);
	register_setting( 'business_general_options_settings-group', 'business_background_image', $args );

	register_setting( 'business_general_options_settings-group', 'business_content_color');

	register_setting( 'business_general_options_settings-group', 'business_content_text_color');

	register_setting( 'business_general_options_settings-group', 'business_address_text_color');

	register_setting( 'business_general_options_settings-group', 'business_enable_marketing_tag');

	register_setting( 'business_general_options_settings-group', 'business_pixel_tag_code');

	register_setting( 'business_general_options_settings-group', 'business_enable_pixel_tag');

	register_setting( 'business_general_options_settings-group', 'business_enable');

}

function business_general_options(){

	echo "<h1>Características del negocio</h1>";
	settings_errors();
	?>

	<form method="post" action="options.php" enctype="multipart/form-data">
	    <?php settings_fields( 'business_general_options_settings-group' ); ?>
	    <?php do_settings_sections( 'business_general_options_settings-group' ); ?>    

	    <table class="form-table">

	    	<tr valign="top">
	        	<th scope="row">Tipo</th>
	        	<td>	        		
	        		<?php
	        			$checked_value = (get_option('business_type') === false)? "" : get_option('business_type') ;
	        			$basic = ($checked_value == 'basic')? "checked" : "" ;
	        			$simple = ($checked_value == 'simple')? "checked" : "" ;
	        			$medium = ($checked_value == 'medium')? "checked" : "" ;
	        		?>
	        		<input type="radio" name="business_type" value="basic" <?php echo $basic; ?>> Básico
				    <input type="radio" name="business_type" value="simple" <?php echo $simple; ?>> Simple
					<input type="radio" name="business_type" value="medium" <?php echo $medium; ?>> Medio
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Fecha de creacíon</th>
	        	<td>
	        		<!--<span class="option-name-space">Google+:</span><input class="option-link-space" type="text" name="master_general_social_network_google" value="<?php // echo get_option('master_general_social_network_google'); ?>" /><br />-->
	        		<input class="option-link-space" type="text" name="business_creation_date" id="business_creation_date" value="<?php echo get_option('business_creation_date'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Nombre</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_name" value="<?php echo get_option('business_name'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Logo</th>
	        	<td>
	        		<!--<input class="option-link-space" type="text" name="business_logo" value="<?php //echo get_option('business_logo'); ?>" />-->
	        		<input id="business_logo_image" type="text" name="business_logo_image" value="<?php echo esc_attr( get_option('business_logo_image') ); ?>" placeholder="Upload PGN" />
					<input id="business_logo_image_button" type="button" value="Upload Image" onclick="image_upload('business_logo_image')" />
					<?php
						if(get_option('business_logo_image') != ""){
							?>
								<div style="width: 200px; height: auto;">
									<img src="<?php echo get_option('business_logo_image'); ?>" style="width: 100%;" />
								</div>
							<?php
						}
					?>
	        	</td>
	        </tr>

	        <!--<tr valign="top" class="all">
	        	<th scope="row">Título del Contenido</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_content_title" value="<?php //echo get_option('business_content_title'); ?>" />
	        	</td>
	        </tr>-->

	        <tr valign="top" class="all">
	        	<th scope="row">Contenido</th>
	        	<td>
	        		<?php
		        		$content = get_option('business_content');
	          			wp_editor( $content, 'business_content', $settings = array('textarea_rows'=> '10', 'media_buttons' => false) );
	          		?>
	        	</td>
	        </tr>

	        <!--<tr valign="top" class="all">
	        	<th scope="row">Característica 1</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_feature_1" value="<?php //echo get_option('business_feature_1'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Característica 2</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_feature_2" value="<?php //echo get_option('business_feature_2'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Característica 3</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_feature_3" value="<?php //echo get_option('business_feature_3'); ?>" />
	        	</td>
	        </tr>-->

	        <tr valign="top" class="basic">
	        	<th scope="row">Imagen de promoción</th>
	        	<td>
	        		<input id="business_promo_image" type="text" name="business_promo_image" value="<?php echo esc_attr( get_option('business_promo_image') ); ?>" placeholder="Upload PGN" />
					<input id="business_promo_image_button" type="button" value="Upload Image" onclick="image_upload('business_promo_image')" />
					<?php
						if(get_option('business_promo_image') != ""){
							?>
								<div style="width: 200px; height: auto;">
									<img src="<?php echo get_option('business_promo_image'); ?>" style="width: 100%;" />
								</div>
							<?php
						}
					?>
	        	</td>
	        </tr>

	         <tr valign="top" class="simple">
	        	<th scope="row">Imagen de cupón</th>
	        	<td>
	        		<input id="business_coupon_image" type="text" name="business_coupon_image" value="<?php echo esc_attr( get_option('business_coupon_image') ); ?>" placeholder="Upload PGN" />
					<input id="business_coupon_image_button" type="button" value="Upload Image" onclick="image_upload('business_coupon_image')" />
					<?php
						if(get_option('business_coupon_image') != ""){
							?>
								<div style="width: 200px; height: auto;">
									<img src="<?php echo get_option('business_coupon_image'); ?>" style="width: 100%;" />
								</div>
							<?php
						}
					?>
	        	</td>
	        </tr>

	         <tr valign="top" class="simple">
	        	<th scope="row">Imagen de pre-cupón</th>
	        	<td>
	        		<input id="business_precoupon_image" type="text" name="business_precoupon_image" value="<?php echo esc_attr( get_option('business_precoupon_image') ); ?>" placeholder="Upload PGN" />
					<input id="business_precoupon_image_button" type="button" value="Upload Image" onclick="image_upload('business_precoupon_image')" />
					<?php
						if(get_option('business_precoupon_image') != ""){
							?>
								<div style="width: 200px; height: auto;">
									<img src="<?php echo get_option('business_precoupon_image'); ?>" style="width: 100%;" />
								</div>
							<?php
						}
					?>
	        	</td>
	        </tr>

	        <tr valign="top" class="simple">
	        	<th scope="row">Prefijo de cupón</th>
	        	<td>
	        		<input class="option-link-space" type="number" name="business_coupon_prefix" value="<?php echo get_option('business_coupon_prefix'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="simple">
	        	<th scope="row">Total de cupones</th>
	        	<td>
	        		<input class="option-link-space" type="number" name="business_total_coupons" value="<?php echo get_option('business_total_coupons'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="simple">
	        	<th scope="row">Cupones generados</th>
	        	<td>
	        		<?php

	        			$args = array(
					        'post_type' => 'coupon',
					        'posts_per_page' => -1,
					    );
					    $the_query = new WP_Query($args);

					    $business_generated_coupons = $the_query->post_count;

	        		?>
	        		<input class="option-link-space" type="number" name="business_generated_coupons" value="<?php echo $business_generated_coupons; ?>" disabled />
	        	</td>
	        </tr>

	        <tr valign="top" class="simple">
	        	<th scope="row">Cupones disponibles</th>
	        	<td>
	        		<?php	        			

					    $business_available_coupons = (int)get_option('business_total_coupons') - $business_generated_coupons;

	        		?>
	        		<input class="option-link-space" type="number" name="business_available_coupons" value="<?php echo $business_available_coupons; ?>" disabled />
	        	</td>
	        </tr>

	        <tr valign="top" class="medium">
	        	<th scope="row">Título de formulario</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_form_title" value="<?php echo get_option('business_form_title'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="medium">
	        	<th scope="row">Color de forma</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_form_color" id="business_form_color" value="<?php echo get_option('business_form_color'); ?>" />
	        	</td>
	        </tr>

	         <tr valign="top" class="medium">
	        	<th scope="row">Color de botón de forma</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_form_button_color" id="business_form_button_color" value="<?php echo get_option('business_form_button_color'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="simple medium">
	        	<th scope="row">Correo electrónico de contacto</th>
	        	<td>
	        		<input class="option-link-space" type="email" name="business_contact_email" value="<?php echo get_option('business_contact_email'); ?>" />
	        	</td>
	        </tr>	        

	        <!--<tr valign="top" class="all">
	        	<th scope="row">Leyenda de negocio</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_legend" value="<?php //echo get_option('business_legend'); ?>" />
	        	</td>
	        </tr>-->

	        <tr valign="top" class="all">
	        	<th scope="row">Leyenda de contacto</th>
	        	<td>
	        		<?php
		        		$content = get_option('business_contact_legend');
	          			wp_editor( $content, 'business_contact_legend', $settings = array('textarea_rows'=> '10', 'media_buttons' => false) );
	          		?>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Dirección</th>
	        	<td>
	        		<?php
		        		$content = get_option('business_address');
	          			wp_editor( $content, 'business_address', $settings = array('textarea_rows'=> '10', 'media_buttons' => false) );
	          		?>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Mapa</th>
	        	<td>
	        		<textarea class='option-link-space' name='business_map' rows='4' cols='50'>
	        			<?php echo get_option('business_map');
	        			//$content = get_option('business_map');
	          			//wp_editor( $content, 'business_map', $settings = array('textarea_rows'=> '10', 'media_buttons' => false) );
	          			?>
	        		</textarea>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Fuente - Código</th>
	        	<td>
	        		<textarea class="option-link-space" name="business_font_code" rows="4" cols="50">
	        			<?php echo get_option('business_font_code'); ?>
	        		</textarea>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Fuente - Familia</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_font_family" value="<?php echo get_option('business_font_family'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Color de fondo</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_background_color" id="business_background_color" value="<?php echo get_option('business_background_color'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Imagen de fondo</th>
	        	<td>
	        		<input id="business_background_image" type="text" name="business_background_image" value="<?php echo esc_attr( get_option('business_background_image') ); ?>" placeholder="Upload PGN" />
					<input id="business_background_button" type="button" value="Upload Image" onclick="image_upload('business_background_image')" />
					<?php
						if(get_option('business_background_image') != ""){
							?>
								<div style="width: 200px; height: auto;">
									<img src="<?php echo get_option('business_background_image'); ?>" style="width: 100%;" />
								</div>
							<?php
						}
					?>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Color de contenido</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_content_color" id="business_content_color" value="<?php echo get_option('business_content_color'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Color de texto de contenido</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_content_text_color" id="business_content_text_color" value="<?php echo get_option('business_content_text_color'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Color de texto de dirección</th>
	        	<td>
	        		<input class="option-link-space" type="text" name="business_address_text_color" id="business_address_text_color" value="<?php echo get_option('business_address_text_color'); ?>" />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Habilitar Marketing Tag</th>
	        	<td>
	        		<?php
	        			$checked_value = (get_option('business_enable_marketing_tag') === false)? "" : get_option('business_enable_marketing_tag') ;
	        			$checked = ($checked_value == "")? "" : "checked";
	        		?>
	        		<input class="option-link-space" type="checkbox" name="business_enable_marketing_tag" value="1" <?php echo $checked; ?> />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Código de etiqueta Pixel</th>
	        	<td>
	        		<textarea class="option-link-space" rows="4" cols="50" name="business_pixel_tag_code">
	        			<?php echo get_option('business_pixel_tag_code'); ?>
	        		</textarea>
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Habilitar etiqueta Pixel</th>
	        	<td>
	        		<?php
	        			$checked_value = (get_option('business_enable_pixel_tag') === false)? "" : get_option('business_enable_pixel_tag') ;
	        			$checked = ($checked_value == "")? "" : "checked";
	        		?>
	        		<input class="option-link-space" type="checkbox" name="business_enable_pixel_tag" value="1" <?php echo $checked; ?> />
	        	</td>
	        </tr>

	        <tr valign="top" class="all">
	        	<th scope="row">Habilitar negocio</th>
	        	<td>
	        		<?php
	        			$checked_value = (get_option('business_enable') === false)? "" : get_option('business_enable') ;
	        			$checked = ($checked_value == "")? "" : "checked";
	        		?>
	        		<input class="option-link-space" type="checkbox" name="business_enable" value="1" <?php echo $checked; ?> />
	        	</td>
	        </tr>

	        	       
	    </table>
	    
	    <?php submit_button(); ?>

	</form>

	<!--<script type="text/javascript">
		
		/*jQuery('#submit').click(function(){

			if(jQuery("input[name=master_general_social_network_google]").val() == ""){
				alert("Add social network link");
				return false;
			}

		});*/

	</script>-->

	<?php

}
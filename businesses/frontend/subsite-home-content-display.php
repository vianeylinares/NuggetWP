<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

function subsite_home_content( $content ) {
	//if(is_front_page()){ echo "Front page"; } else { echo "No front page"; } echo "<br/>";
	//if(is_home()){ echo "Home"; } else { echo "No home"; } echo "<br/>";
	//echo get_site_url(); echo "<br/>";
	//echo network_site_url(); echo "<br/>";
    if ( ((is_front_page() || is_home()) && (get_site_url() . "/" != network_site_url())) || isset($_POST['rating']) ) {

    	?>
    		<style>
    			/* For theme Nugget */
    			header,
    			footer,
    			#secondary{
    				display: none;
    			}
    			body,
    			.post,
    			.page,
    			.entry-content{
    				margin: 0 !important;
    			}
    			.background-div{
					background-repeat: no-repeat;
				    background-attachment: fixed;
				    background-position: center;
				    padding-top: 10px;
				    padding-bottom: 30px;
				    height: 100%;
				}

				/* For microsite homepage */
				.logo{
					display: inline-block;
					/*max-width: 300px;
					width: 100%;*/
					height: auto;
				}

				.main-content-box{
					padding-top: 20px;
					padding-bottom: 20px;
					margin-top: 20px;
				}

				#preload{
					display: none;
				}

				#content,
				#page,
				#primary,
				#main,
				article,
				.entry-content{
					min-height: 100%;
				}

				.row{
					margin: 0;
				}

				/*body, html {
				  height: 100%;
				}*/

				.star{
					background-image: url(<?php echo home_url(); ?>/wp-content/plugins/businesses/images/off.png);
				}

				.starBox{
					display: block;
					margin-left: auto;
					margin-right: auto;
					width: 250px;
					margin-bottom: 25px;
				}							
				.star{					
					float: left;
					height: 50px;
					width: 50px;					
				}
				.business-form{
					display: block;
					margin: 0 auto;
					width: 100%;
					max-width: none;
				}
				.business-form input{
					height: 40px;
				}
				.business-form textarea{
					height: 60px;
				}
				.business-form input,
				.business-form textarea{
					width: 100%;
					margin-bottom: 10px;
					color: #000000;
					font-size: 14px;
				}
				.send_coupon{
					background-position: center !important;
					background-size: cover !important;
					height: 318px;
					color: transparent !important;
					width: 381px;
					border: none !important;
					border-radius: 0 !important;
					display: inline-block;
				}

				ul{
					margin-top: 10px;
					margin-bottom: 40px;
					margin-left: 0;
				}


				.background-div{
					padding-bottom: 0;
				}
				.coupon-placement-box{
					position: relative;
					display: inline-block;
				}
				.sent-message,
				.coupon-placement-box form{
					position: absolute;
					top: 70px;
					left: 70px;
					width: 300px;
					margin-top: 0;
				}
				.coupon-placement-box form input{
					margin-bottom: 20px;
				    width: 80%;
				    display: block;
				    height: 32px;
				    font-size: 14px;
				    padding: 5px;
				}

				.sent-message-error{
					position: absolute;
					top: 25px;
					left: 70px;
					width: 300px;
					margin-top: 0;
					text-align: left;
				}			

				.map iframe{
					height: 250px;
				}


				@media(min-width:992px){

					.business-form{ max-width: 300px; }

				}
				@media(min-width:768px) and (max-width: 991px){



				}
				@media(max-width: 767px){

					.coupon-placement-box form{
						position: relative;
					    top: initial;
					    left: initial;
					    margin-left: auto;
					    margin-right: auto;
					    margin-top: 20px;
					}
					.coupon-placement-box form input{
						margin-bottom: 20px;
					    width: 100%;
					}

				}

    		</style>

    		<script type="text/javascript">
    			
    			rateFlag = 0;
				userPosition = "page";
				home_url = "<?php echo home_url(); ?>";

				jQuery(function() {	

					jQuery('.star').click(function(){
						//alert("hello");
							if(rateFlag == 0){
								var position = jQuery('.star').index(this);
								//alert(position);
								  
								for(i = position; i >= 0; i--){
									jQuery('.star:eq('+ i +')').css({
										//"background-color": "white",
										"background-image": "url('<?php echo home_url(); ?>/wp-content/plugins/businesses/images/on.png')",
								 	});
								}
								rateFlag = 1;
								clickFlag = 1;
								clickScore = position + 1;
								//process(clickScore, idR, idDevice, userPosition);

								jQuery.post(
									home_url + '/wp-admin/admin-ajax.php', {	
										
										action: 'get_rating',
											
										data: { rating_entry: clickScore }
									
										
									}, function(data){	
								
										jQuery( "#rating-box" ).html(data);
									
								});	


							}	
							
						});
					
					
						jQuery('.star').hover(
							function() {		
								if(rateFlag == 0){
									var position = jQuery('.star').index(this);	
									for(i = position; i >= 0; i--){
										jQuery('.star:eq('+ i +')').css({
											//"background-color": "white",
											"background-image": "url('<?php echo home_url(); ?>/wp-content/plugins/businesses/images/on.png')",
										});
									}
								}
							}, function() {
								if(rateFlag == 0){
									jQuery('.star').css({
										//"background-color": "grey",
										"background-image": "url('<?php echo home_url(); ?>/wp-content/plugins/businesses/images/off.png')",
									});
								}
							}
						);
					
					
				});

    		</script>
    	<?php
    	 	
		if(get_option('business_font_code') != "") {
			echo get_option('business_font_code');
		}		    	

        $enable = (get_option('business_enable') == "")? "" : get_option('business_enable') ;

	    if($enable == ""){
	    	?>
	    		<script type="text/javascript">
	    			window.location.replace("https://google.com");
	    		</script>
	    	<?php
	    }

	    // Page body
	    $background_styles = (get_option('business_background_image') != "")? "background-image: url(" . get_option('business_background_image') . "); "  : "" ;
	    $background_styles .= (get_option('business_background_color') != "")? "background-color: " . get_option('business_background_color') . "; "  : "" ;

	    if(get_option('business_font_family') != "") { 
			$font_style = get_option('business_font_family');
		} else {
			$font_style = "font-family: Arial, Helvetica, sans-serif;";
		}

	    ?>
		    <div class="background-div" style="<?php echo $background_styles . " " . $font_style; ?>;">

		    	<div class="row" style="text-align: center;">
		    		<img src="<?php echo get_option('business_logo_image'); ?>" alt="<?php echo get_option('business_name'); ?> logo" class="logo" />
		    	</div>

		    	<?php

		    		if(get_option('business_content_color') != ""){

			    		$color = get_option('business_content_color');

			    		if ($color[0] == '#' ) {
				        	$color = substr( $color, 1 );
				        }
						
						$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
						$rgb =  array_map('hexdec', $hex);
						$content_background_color = 'background-color: rgba('.implode(",",$rgb).',0.75)';

					} else {
						$content_background_color = '';
					}

					$content_text_color = (get_option('business_content_text_color') != "")? "color: " . get_option('business_content_text_color') . "; "  : "" ;

		    	?>

		    	<div class="main-content-box" style="<?php echo $content_background_color . "; " . $content_text_color; ?>">

		    		<div class="container">
		    			<div class="row">

		    				<?php

		    					if(!isset($_POST['send_coupon']) && !isset($_POST['descargar'])){

		    						?>

						    			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						    				<h2 style="<?php echo $font_style; ?> font-weight: bold;">
						    					<?php echo get_bloginfo('name'); ?>
						    				</h2>				
												
											<div style="margin-bottom: 15px;">
												<?php echo get_option('business_content'); ?>
											</div>
											
											<?php
												
												/*if((get_option('business_feature_1') != "") || 
													(get_option('business_feature_2') != "") || 
													(get_option('business_feature_3') != ""))
												{
												?>

													<!--<ul style="margin-bottom: 40px; margin-left: 0;">
														<?php if(get_option('business_feature_1') != ""){ ?>
															<li><?php echo get_option('business_feature_1'); ?></li>
														<?php } ?>
														<?php if(get_option('business_feature_2') != ""){ ?>
															<li><?php echo get_option('business_feature_2'); ?></li>
														<?php } ?>
														<?php if(get_option('business_feature_3') != ""){ ?>
															<li><?php echo get_option('business_feature_3'); ?></li>
														<?php } ?>
													</ul>-->

												<?php 
												}*/
											
											?>
						    				
						    			</div>

						    			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						    				<?php		
												
												if(get_option('business_type') == 'basic'){								
													
													?>
															
													<div class = "coupon text-center">
														
														<img src="<?php echo get_option('business_promo_image'); ?>" class="img-responsive" style="display: inline-block;" />
														
													</div>
													
													<?php
												
												}													
												
												if(get_option('business_type') == 'simple'){

													$args = array(
												        'post_type' => 'coupon',
												        'posts_per_page' => -1,
												    );
												    $the_query = new WP_Query($args);

												    $business_generated_coupons = $the_query->post_count;

												    $business_available_coupons = (int)get_option('business_total_coupons') - $business_generated_coupons;
													
													if($business_generated_coupons != (int)get_option('business_total_coupons')){			
													
														?>
														
														<div class="coupon text-center">
															<div class = "alternateStarSystem">
																<!--<div class = "back"></div>-->
																<div class = "front">
																	<p style = "margin: 5px; font-size: 18px; font-weight: bold; margin-bottom: 20px;">&iquest;Que te parece esta promoci&oacute;n?</p>
																	<div class = "starBox">
																		<div class = "star"></div>
																		<div class = "star"></div>
																		<div class = "star"></div>
																		<div class = "star"></div>
																		<div class = "star"></div>
																		<div class = "clearfix"></div>
																	</div>
																</div>
															</div>													
															<!--<a href="#" onclick = "return clicks();" style="text-align: center;">
																<img class="img-responsive" style="display: inline-block;" src="<?php //echo get_option('business_coupon_image'); ?>">
															</a>-->
															<form action="" method="post" style="text-align: center;">
																<div id="rating-box">
																	<input type="hidden" name="rating" value="0" />
																</div>
																<input type="submit" name="send_coupon" value="" class="send_coupon" style="background-image: url(<?php echo get_option('business_coupon_image'); ?>);">
															</form>
													
														</div>
														
														<?php
												
													} else if($business_generated_coupons == (int)get_option('business_total_coupons')){
														
														?>
														
														<div class = "coupon text-center" style = "margin: 5px; font-size: 16px; margin-bottom: 20px;">							
															No hay cupones disponibles.									
														</div>											
														
														<?php					
														
													}
												
												} else if(get_option('business_type') == 'medium'){

													?>
													
													<div class = "form">
														
														<?php												
															
															if(isset($_POST['enviar'])){

																$error_pop = 0;
			                        
										                        if((isset($_POST['nombre']) && $_POST['nombre'] == "") || 
										                        	(isset($_POST['telefono']) && $_POST['telefono'] == "") || 
										                        	(isset($_POST['correo']) && $_POST['correo'] == "") || 
										                        	(isset($_POST['correo2']) && $_POST['correo2'] == "")){

										                            $error_pop = 1;
										                            $error_legend = "Introduzca los datos requeridos.";
										                              
										                        }
										                            
										                        if (preg_match('/[\'^£$%&*()}{#@~?><>,|=+¬-]/', $_POST['nombre']) || 
										                        	preg_match('/[\'^£$%&*()}{#@~?><>,|=_+¬]/', $_POST['telefono']) ||
										                        	preg_match('/[\'^£$%&*()}{#~?><>,|=+¬]/', $_POST['correo']) || 
										                        	preg_match('/[\'^£$%&*()}{#~?><>,|=+¬]/', $_POST['correo2'])){

										                            $error_pop = 1;
										                            $error_legend = "No use caracteres especiales.";

										                        }

										                        if(($_POST['correo'] != "" && $_POST['correo2'] != "") && ($_POST['correo'] != $_POST['correo2'])){

										                            $error_pop = 1;
										                            $error_legend = "Hay un error en el correo electrónico.";
										                              
										                        }
										                        
										                        if($error_pop == 0){                        
										                        
										                            $info_legend = "Tu mensaje ha sido enviado correctamente. En breve nos pondremos en contacto contigo.";

										                            $to = array(get_option( 'business_contact_email' ), 'btst91@gmail.com');

										                            $subject = 'Consulta - ' . $_POST['nombre'];
										                            $body = '<div><strong>Nombre: </strong>' . $_POST['nombre'];                                        
										                            $body .= '<br /><strong>Correo electrónico: </strong>' . $_POST['correo'];
										                            $body .= '<br /><strong>Teléfono: </strong>' . $_POST['telefono'];
										                            $body .= '<br /><strong>Mensaje: </strong>' . $_POST['mensaje'];
										                            $body .= '</div>';

										                            $headers = array('Content-Type: text/html; charset=UTF-8','From: ' . get_bloginfo( 'name' ) . ' <' . get_option( 'admin_email' ) . '>');             

										                            $sent_email = wp_mail( $to, $subject, $body, $headers );

										                            $new_register_entry = array(
																	  'post_title'	=> $_POST['nombre'],
																	  'post_status'	=> 'publish',
																	  'post_type'	=> 'form'
																	);

																	$new_register_id = wp_insert_post( $new_register_entry );

																	date_default_timezone_set('America/Los_Angeles');
																	$test_date_and_time = date("Y-m-d h:i:sa");

																	update_post_meta($new_register_id, 'form_date_and_time', $test_date_and_time);
																	update_post_meta($new_register_id, 'form_email', $_POST['correo']);
																	update_post_meta($new_register_id, 'form_phone', $_POST['telefono']);
										                        	update_post_meta($new_register_id, 'form_message', $_POST['mensaje']);

										                        }
										                        
										                    }

										                    if(isset($sent_email) && $sent_email == true){                    
										                        echo "<div style='margin-top: 20px;'>" . $info_legend . "</div>";
										                    }
										                    
										                    if(isset($error_pop) && $error_pop == 1){
										                        unset($_POST['enviar']);
										                        ?>
										                        <div style="color: red; font-size: 14px; margin-top: 10px; margin-bottom: 10px; padding-left: 5%;">
										                            <?php echo $error_legend; ?>
										                        </div>
										                        <?php
										                    }

										                    if(!isset($_POST['enviar'])){
															?>	
																<form class="business-form" <?php if(get_option('business_form_color') != "") { echo "style = \"background-color: " . get_option('business_form_color') . "\"";  } ?> action="" method="post" name="business-form" accept-charset="UTF-8">
																	<?php echo "<div style='text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px;'>" . get_option('business_form_title') . "</div>"; ?>
																	<input class="business-input" type="text" name="nombre" placeholder="Nombre*" required />
																	<input class="business-input" type="text" name="telefono" placeholder = "Telefono*" required />
																	<input class="business-input" type="email" name="correo" placeholder="Correo Electronico*" required />
																	<input class="business-input" type="email" name="correo2" placeholder="Conforma tu correo Electronico*" required />
																	<textarea class="business-message" name="mensaje" placeholder="Mensaje"></textarea>
																	
																	<?php 
																	
																		//$button_style = $style_placeholder . " ";
																	
																		if(get_option('business_form_button_color') != "") {
																			$button_style = "background-color: " . get_option('business_form_button_color') . "; border-color: " . get_option('business_form_button_color');
																		}
																		
																	?>

																	<input class="business-button" style="<?php echo $button_style; ?>" type="submit" name="enviar" value = "ENVIAR" />	
																	
																</form>
															<?php
															}													
																								
															
															//}
														?>

														
													</div>
												<?php	
												}
												?>
												
												<div class = "clearfix"></div>									
												
											</div>
											
											<?php if(get_option('business_type') == 'simple'){ ?>
												<div id="preload">
												   <img src="<?php echo home_url(); ?>/wp-content/plugins/businesses/images/on.png" width="1" height="1"/>
												   <img src="<?php echo home_url(); ?>/wp-content/plugins/businesses/images/off.png" width="1" height="1"/>
												</div>
											<?php } ?>
						    				
						    			</div>

						    		</div>

					    		</div>

					    		<div class="business-footer">

					    			<div class="container" style="text-align: center;">

					    				<?php
					    					$styles = (get_option('business_address_text_color') != "" )? "style='color: " . get_option('business_address_text_color') . "'" : "" ;
					    				?>

					    				<div class="row" <?php echo $styles; ?>>
						
											<div class="contact-information col-lg-6 col-md-6 col-sm-12 col-xs-12">
												<div style="margin-top: 50px; font-size: 20px; font-weight: bold;">
													<?php echo get_option('business_contact_legend'); ?>
												</div>
												<div style="font-size: 20px; font-weight: bold;">
													
												</div>
												<div style="font-size: 20px; margin-top: 30px;">
													<?php echo get_option('business_address'); ?>
												</div>
												
											</div>
											
											<div class="map col-lg-6 col-md-6 col-sm-12 col-xs-12">
												
												<div style="margin-top: 50px;">
													<?php echo get_option('business_map'); ?>
												</div>
												
											</div>
											
											

										</div>

									</div>
									<!--div id="entuciudad" style="position:fixed; bottom: 0;  right: 0;  width: 300px; transform: rotate(270deg); padding-left:80px;"><a href="http://entuciudad.net"><img src="http://entuciudad.net/etclogo.png"></div>
							</a>	</div-->

							<?php

						}

						if(isset($_POST['descargar'])){

							$error_pop = 0;

	                        if((isset($_POST['nombre']) && $_POST['nombre'] == "") || 
	                        	(isset($_POST['correo']) && $_POST['correo'] == "") || 
	                        	(isset($_POST['correo2']) && $_POST['correo2'] == "")){

	                            $error_pop = 1;
	                            $error_legend = "Introduzca los datos requeridos.";
	                              
	                        }
	                            
	                        if (preg_match('/[\'^£$%&*()}{#@~?><>,|=+¬-]/', $_POST['nombre']) || 
	                        	preg_match('/[\'^£$%&*()}{#~?><>,|=+¬]/', $_POST['correo']) || 
	                        	preg_match('/[\'^£$%&*()}{#~?><>,|=+¬]/', $_POST['correo2'])){

	                            $error_pop = 1;
	                            $error_legend = "No use caracteres especiales.";

	                        }

	                        if(($_POST['correo'] != "" && $_POST['correo2'] != "") && ($_POST['correo'] != $_POST['correo2'])){

	                            $error_pop = 1;
	                            $error_legend = "Hay un error en el correo electrónico.";
	                              
	                        }
	                        
	                        if($error_pop == 0){                        
	                        
	                            $info_legend = "El cup&oacute;n ha sido enviado a tu correo.<br/><br/>&iexcl;GRACIAS!";

								
								/*$logo = $row['logo'];
								$precoupon_image = $row['precoupon_image'];
								
								$coupons_generated = $row['coupons_generated'] + 1;
								$coupons_available = $row['coupons_available'] - 1;
								
								$business_name = $row['business_name'];
								$business_email = $row['contact_email'];*/

								$args = array(
							        'post_type' => 'coupon',
							        'posts_per_page' => -1,
							    );
							    $the_query = new WP_Query($args);

							    $business_generated_coupons = $the_query->post_count;

							    //$business_available_coupons = (int)get_option('business_total_coupons') - $business_generated_coupons;
								
								//if($business_generated_coupons != (int)get_option('business_total_coupons')){			
															


	                            // Create Image From Existing File
								$png_image =  imagecreatefrompng(get_option('business_precoupon_image'));
								
								// Allocate A Color For The Text
								$black_text = imagecolorallocate($png_image, 0, 0, 0);
								$white_box = imagecolorallocate($png_image, 255, 255, 255);
								
								// Set Path to Font File
								$font_path = WP_PLUGIN_DIR . '/businesses/frontend/arial.ttf';

								$nombre = $_POST['nombre'];
								$nombre_sin_espacios = str_replace(" ", "_", $nombre);
								$nombre_negocio_sin_espacios = str_replace(" ", "_", get_option("business_name"));
								//$numero = "000";
								$numero = (int)get_option("business_coupon_prefix") + $business_generated_coupons + 1;
								
								// Set Text to Be Printed On Image
								$text_name = "Nombre: " . $nombre;
								$text_coupon_number = "No. Cupon: " . $numero;
								$text_validation = "Validado";
								
											
								$box = @imagettfbbox(14,0,$font_path,$text_name);
								$width = abs($box[4] - $box[0]);
								$height = abs($box[5] - $box[1]);
								
								imagefilledrectangle($png_image, 45, 50, $width+55, $height+58, $white_box);
								imagettftext($png_image, 14, 0, 50, 70, $black_text, $font_path, $text_name);
								
								
								$box = @imagettfbbox(14,0,$font_path,$text_coupon_number);
								$width = abs($box[4] - $box[0]);
								$height = abs($box[5] - $box[1]);
								
								imagefilledrectangle($png_image, 45, 85, $width+55, $height+93, $white_box);
								imagettftext($png_image, 14, 0, 50, 105, $black_text, $font_path, $text_coupon_number);
								
								
								$box = @imagettfbbox(14,0,$font_path,$text_validation);
								$width = abs($box[4] - $box[0]);
								$height = abs($box[5] - $box[1]);
								
								imagefilledrectangle($png_image, 45, 150, $width+55, $height+163, $white_box);
								imagettftext($png_image, 14, 0, 50, 170, $black_text, $font_path, $text_validation);

								$coupon_jpg = $nombre_negocio_sin_espacios . "-" . $nombre_sin_espacios . "-" . $numero . ".jpg";
								
								
								imagejpeg($png_image, WP_PLUGIN_DIR . '/businesses/' . $coupon_jpg);

								//var_dump($png_image);
								
								imagedestroy($png_image);


	                            //$to = array($_POST['correo'], 'btst91@gmail.com');
	                            $to = array($_POST['correo']);

	                            $subject = 'Cupón de ' . get_option('business_name');

	                            $body = '<p>&iexcl;Gracias por descargar nuestra promoci&oacute;n! 
										<br/><br/>
										Adjuntamos a este correo el archivo que podr&aacute;s imprimir para hacer v&aacute;lido el descuento. 
										<br/><br/>
										&iexcl;Hasta pronto!</p>';

	                            $headers = array('Content-Type: text/html; charset=UTF-8','From: ' . get_bloginfo( 'name' ) . ' <' . get_option( 'admin_email' ) . '>');

	                            $attachments = array(WP_PLUGIN_DIR . '/businesses/' . $coupon_jpg);

	                            $sent_email = wp_mail( $to, $subject, $body, $headers, $attachments );

	                            $new_register_entry = array(
								  'post_title'	=> $_POST['nombre'],
								  'post_status'	=> 'publish',
								  'post_type'	=> 'coupon'
								);

								$new_register_id = wp_insert_post( $new_register_entry );

								
								date_default_timezone_set('America/Los_Angeles');
								$test_date_and_time = date("Y-m-d h:i:sa");

								update_post_meta($new_register_id, 'coupon_date_and_time', $test_date_and_time);
								update_post_meta($new_register_id, 'coupon_email', $_POST['correo']);
								update_post_meta($new_register_id, 'coupon_number', $numero);
								if(isset($_POST['rating'])){
									update_post_meta($new_register_id, 'coupon_rating', $_POST['rating']);
								}
								
								unlink(WP_PLUGIN_DIR . '/businesses/' . $coupon_jpg);
										
						
							}								
							
	                        
	                    }

	                    if(isset($sent_email) && $sent_email == true){                    
	                       // echo "<div style='margin-top: 20px;'>" . $info_legend . "</div>";
	                    }
	                    
	                    if(isset($error_pop) && $error_pop == 1){
	                        //unset($_POST['descargar']);
	                        //$error_legend;
	                    }


	                    if(isset($_POST['send_coupon']) || isset($_POST['descargar'])){

							?>

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">

									<div style="<?php echo $content_text_color . "; " . $font_style . ";" ?> font-size: 40px; padding-top: 20px; padding-bottom: 40px;">
										CUP&Oacute;N DESCARGABLE
									</div>

									<div class="coupon-placement-box">
										<img src="<?php echo get_option('business_precoupon_image'); ?>" style="display: inline-block;" />

										<?php

											
											if(isset($error_pop) && $error_pop == 1){

												?>

												<div class="sent-message-error" style="color: red; font-size: 14px; margin-top: 10px; margin-bottom: 10px;">
							                           <?php echo $error_legend; ?>
							                	</div>												

												<?php

											}
 
											if(isset($_POST['send_coupon']) || (isset($error_pop) && $error_pop == 1)){

												?>
												<!--<form action = "coupon.php?device=<?php //echo $device; ?>&idR=<?php //echo $idR; ?>"  method = "post">-->
												<form action=""  method="post">
													<?php

														if(isset($_POST['rating'])) {
															?>
																<input type="hidden" name="rating" value="<?php echo $_POST['rating']; ?>" />
															<?php
														}

													?>
													<input type="text" name="nombre" value="<?php echo (isset($_POST['nombre']))? $_POST['nombre'] : '' ; ?>" placeholder="Nombre" required />
													<input type="text" name="correo" value="<?php echo (isset($_POST['correo']))? $_POST['correo'] : '' ; ?>" placeholder="Email" required />
													<input type="text" name="correo2" value="<?php echo (isset($_POST['correo2']))? $_POST['correo2'] : '' ; ?>" placeholder="Confirma tu Email" required />
													<!--<div style = "background-color: #ffffff; border-radius: 3px; border: 1px solid white; padding-left: 8px; padding-right: 8px; width: 70%;">
														No. Cup&oacute;n: <input class = "number-space" style = "width: 40%; <?php //echo $font_family; ?>;" type = "text" name = "numero" value = "<?php //echo $cupon_numero; ?>" readonly = "readonly">
													</div>
													<br /><br />-->
													<!--<input type="submit" name="descargar" value="Descargar" class="button-space" onclick="return printCoupon();" />-->
													<input type="submit" name="descargar" value="Descargar" class="button-space" />
												</form>

												<?php

											}

										?>

										<?php

											if(isset($_POST['descargar']) && (isset($error_pop) && $error_pop == 0)){

												?>

												<div class="sent-message" style="; font-size: 14px; margin-top: 10px; margin-bottom: 10px;">
							                           <?php echo $info_legend; ?>
							                	</div>												

												<?php

											}

										?>
									</div>


								</div>

							<?php

						}

							
						if(get_option('business_enable_marketing_tag') == 1){
									
							//echo $row['form']; 

						}
						
					?>
		    		
		    	</div>
		    	
		    </div>
	    <?php
    }
 
}
add_filter( 'the_content', 'subsite_home_content' );


function nugget_business_scripts() {
	
	// Styles
    wp_enqueue_style( 'business-css', plugins_url( 'business.css', __FILE__ ) );
    // JS
    //wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), "", true);
	//wp_enqueue_script( 'jquery' );
	
}
add_action( 'wp_enqueue_scripts', 'nugget_business_scripts', 12 );



function get_rating(){
		
	$rating_entry = $_POST['data']['rating_entry'];

	$new_register_entry = array(
	  'post_title'	=> '',
	  'post_status'	=> 'publish',
	  'post_type'	=> 'rating'
	);

	$new_register_id = wp_insert_post( $new_register_entry );

	/*update_post_meta($new_register_id, 'coupon_date_and_time', $test_date_and_time);
	update_post_meta($new_register_id, 'coupon_email', $_POST['correo']);*/
	update_post_meta($new_register_id, 'rating_value', $rating_entry);

	$add_rating_entry = '<input type="hidden" name="rating" value="' . $new_register_id . '" />';

	echo $add_rating_entry;
		
	die();
}
add_action('wp_ajax_get_rating', 'get_rating');


function add_facebook_pixel_at_header(){

	echo get_option('business_pixel_tag_code');

}
add_action('wp_head', 'add_facebook_pixel_at_header');
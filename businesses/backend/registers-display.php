<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

function register_options(){

	?>

		<h1>Registros</h1>

		<?php

		if(network_site_url() != home_url() . "/"){

			$business_type = (get_option('business_type') === false)? "" : get_option('business_type') ;

			if($business_type == 'simple'){
				//echo "Simple";

				$args = array(
			        'post_type' => 'coupon',
			        'posts_per_page' => -1,
			    );
			    $the_query = new WP_Query($args);

			    ?>

			    <table style="width: 100%; text-align: left;">

			    	<tr>
			    		<th style="width: 5%;"></th>
			    		<th style="width: 10%;">Nombre</th>
			    		<th style="width: 15%;">Fecha</th>
			    		<th style="width: 15%;">Email</th>
			    		<th style="width: 10%;">Número</th>
			    		<th style="width: 10%;">Rating</th>
			    		<!--<th style="width: 45%;">Mensaje</th>-->
			    	</tr>

			    	
				    <?php

				    	//var_dump($the_query);

				    	$counter = 1;

					    while($the_query->have_posts()) : $the_query->the_post();

					    	?>
					    		<tr>
					    			<td style="width: 5%;"><?php echo $counter; ?></td>
							    	<td style="width: 10%;"><?php echo get_the_title(); ?></td>
							    	<td style="width: 15%;"><?php echo get_post_meta(get_the_ID(), 'coupon_date_and_time', true); ?></td>
									<td style="width: 15%;"><?php echo get_post_meta(get_the_ID(), 'coupon_email', true); ?></td>
									<td style="width: 10%;"><?php echo get_post_meta(get_the_ID(), 'coupon_number', true); ?></td>
									<td style="width: 10%;"><?php //echo get_post_meta(get_the_ID(), 'coupon_rating', true); ?>

										<?php											

										    $rating_id = (int)get_post_meta(get_the_ID(), 'coupon_rating', true);						    

											echo get_post_meta($rating_id, 'rating_value', true);										

										?>

									</td>											
					            	<!--<td style="width: 45%;"><?php //echo get_post_meta(get_the_ID(), 'form_message', true); ?></td>-->
				            	</tr>
				            <?php

				            $counter++;

						endwhile; wp_reset_postdata();

					?>
					

				</table>

				<h1 style="margin-top: 40px;">Ratings</h1>

				<?php

				$args = array(
			        'post_type' => 'rating',
			        'posts_per_page' => -1,
			    );
			    $the_query = new WP_Query($args);

			    ?>

			    <!--<table style="width: 100%; text-align: left;">

			    	<tr>
			    		<th style="width: 5%;"></th>
			    		<th style="width: 10%;">Rating</th>
			    	</tr>-->

			    	
				    <?php

				    	//var_dump($the_query);

				    	/*$counter = 1;

					    while($the_query->have_posts()) : $the_query->the_post();

					    	?>
					    		<!--<tr>
					    			<td style="width: 5%;"><?php echo $counter; ?></td>
							    	<td style="width: 10%;"><?php echo get_post_meta(get_the_ID(), 'rating_value', true); ?></td>
				            	</tr>-->
				            <?php

				            $counter++;

						endwhile; wp_reset_postdata();*/

					?>
					

				<!--</table>-->

				<?php

					$counter_0 = 0;
	            	$counter_1 = 0;
	            	$counter_2 = 0;
	            	$counter_3 = 0;
	            	$counter_4 = 0;
	            	$counter_5 = 0;	
	            	//$counter = 0;	

					while($the_query->have_posts()) : $the_query->the_post();
			            			            	
		            	$rating_value = get_post_meta(get_the_ID(), 'rating_value', true);

		            	switch ($rating_value) {

		            		case "1":
		            			$counter_1++;
		            			break;

		            		case '2':
		            			$counter_2++;
		            			break;

		            		case '3':
		            			$counter_3++;
		            			break;

		            		case '4':
		            			$counter_4++;
		            			break;

		            		case '5':
		            			$counter_5++;
		            			break;

		            		default:
		            			$counter_0++;
		            			break;
		            	}

			            //$counter++;

					endwhile; wp_reset_postdata();

					echo "Rating 5: " . $counter_5 . "<br/>";
					echo "Rating 4: " . $counter_4 . "<br/>";
					echo "Rating 3: " . $counter_3 . "<br/>";
					echo "Rating 2: " . $counter_2 . "<br/>";
					echo "Rating 1: " . $counter_1 . "<br/>";
					echo "------------------" . "<br/>";
					echo "Total -----> " . ($counter_5 + $counter_4 + $counter_3 + $counter_2 + $counter_1);
					//echo "Rating 0: " . $counter_0 . "<br/>";

			}

			if($business_type == 'medium'){
				//echo "Medio";

				$args = array(
			        'post_type' => 'form',
			        'posts_per_page' => -1,
			    );
			    $the_query = new WP_Query($args);

			    ?>

			    <table style="width: 100%; text-align: left;">

			    	<tr>
			    		<th style="width: 5%;"></th>
			    		<th style="width: 10%;">Nombre</th>
			    		<th style="width: 15%;">Fecha</th>
			    		<th style="width: 15%;">Email</th>
			    		<th style="width: 10%;">Teléfono</th>
			    		<th style="width: 45%;">Mensaje</th>
			    	</tr>

			    	
				    <?php

				    	$counter = 1;

					    while($the_query->have_posts()) : $the_query->the_post();

					    	?>
					    		<tr>
					    			<td style="width: 5%;"><?php echo $counter; ?></td>
							    	<td style="width: 10%;"><?php echo get_the_title(); ?></td>
							    	<td style="width: 15%;"><?php echo get_post_meta(get_the_ID(), 'form_date_and_time', true); ?></td>
									<td style="width: 15%;"><?php echo get_post_meta(get_the_ID(), 'form_email', true); ?></td>
									<td style="width: 10%;"><?php echo get_post_meta(get_the_ID(), 'form_phone', true); ?></td>
					            	<td style="width: 45%;"><?php echo get_post_meta(get_the_ID(), 'form_message', true); ?></td>
				            	</tr>
				            <?php

				            $counter++;

						endwhile; wp_reset_postdata();

					?>
					

				</table>

				<?php

			}

		}

		if(network_site_url() == home_url() . "/"){

			?>

			<h3>Red de sitios</h3>

			<style type="text/css">
    				
				.site-name{
					text-align: center;
					width: 100%;
				}
				.site-box{
					width: 33.33%;
					float: left;
					height: 200px;
				}
				.site-box img{
					width: 80%;
					margin: 20px auto;
					display: block;
				}
				@media(max-width: 767px){
					.site-box{
						width: 100%;
					}
				}

			</style>

			<?php

			$subsites = get_sites();

			//echo "<pre>";
			//print_r($subsites);
			//echo "</pre>";

			foreach( $subsites as $subsite ) {

				$subsite_id = get_object_vars($subsite)["blog_id"];

				if($subsite_id != 1){ // 1 = root site

					$subsite_name = get_blog_details($subsite_id)->blogname;
					echo '<div class="site-box">';
						echo '<img src="' . get_blog_option($subsite_id, 'business_logo_image') . '" />';
						echo '<div class="site-name">' . $subsite_name . '</div>';
					echo '</div>';
					
				}
			}

		}

}
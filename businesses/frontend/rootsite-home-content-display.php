 <?php

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

function root_home_content( $content ) {
	
    if ( (is_front_page() || is_home()) && (get_site_url() . "/" == network_site_url()) ) {

    		?>
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

			echo '<div style="float: none; clear: both;"></div>';
	    
    }
 
}
add_filter( 'the_content', 'root_home_content' );
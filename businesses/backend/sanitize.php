<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

function business_type_sanitize($data){

	$type = null;
    $message = null;

	if($data == ""){
		$type = 'error';
        $message = 'Elije un tipo de negocio';

        add_settings_error(
	        'business_type',
	        'settings_updated',
	        $message,
	        $type
		);

		return (false === get_option( 'business_type' ))? "" : get_option( 'business_type' ) ;

	} else if($data != ""){
    	return $data;

	}

}

function business_name_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Nombre - ";

	if($data == ''){

		$type = 'error';
        $message = $field . 'Escribe un nombre para el negocio';

        add_settings_error(
	        'business_name',
	        'settings_updated',
	        $message,
	        $type
		);

		return '' ;

	} else if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_name',
		        'settings_updated',
		        $message,
		        $type
			);

			return '';

		} else{

			return $data;

		}    	

	}
	
}


function business_logo_image_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Logo - ";

	if($data == ""){
		$type = 'error';
        $message = $field . 'Elige una imagen';

        add_settings_error(
	        'business_logo_image',
	        'settings_updated',
	        $message,
	        $type
		);

		return "" ;

	} else if($data != ""){

		if(!strpos($data, '.png') !== false){

			$type = 'error';
	        $message = $field . 'La imagen debe ser tipo PNG';

	        add_settings_error(
		        'business_logo_image',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_content_title_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Título de contenido - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_content_title',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_feature_1_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Característica 1 - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_feature_1',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_feature_2_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Característica 2 - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_feature_2',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_feature_3_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Característica 3 - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_feature_3',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_form_title_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Título de formulario - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_form_title',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_legend_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Leyenda de negocio - ";

	if($data != ""){

		if(preg_match('/[\'^£$%&*()}{#~?<>,|=+¬]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_legend',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_font_family_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Fuente - Familia - ";

	if($data != ""){

		if(preg_match('/[\^£$%&*()}{#~?<>|=+¬.]/', $data )){

			$type = 'error';
	        $message = $field;
	        $message .= 'No se pueden usar los caracteres: [ ] { } \ ^ + " \' ; : = | , > < £ $ % & * ( ) # ~ ? ¬';

	        add_settings_error(
		        'business_font_family',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_background_image_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Imagen de fondo - ";

	if($data != ""){

		if(!strpos($data, '.png') !== false){

			$type = 'error';
	        $message = $field . 'La imagen debe ser tipo PNG';

	        add_settings_error(
		        'business_background_image',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_promo_image_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Imagen de promoción - ";

	if($data != ""){

		if(!strpos($data, '.png') !== false){

			$type = 'error';
	        $message = $field . 'La imagen debe ser tipo PNG';

	        add_settings_error(
		        'business_promo_image',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_coupon_image_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Imagen de cupon - ";

	if($data != ""){

		if(!strpos($data, '.png') !== false){

			$type = 'error';
	        $message = $field . 'La imagen debe ser tipo PNG';

	        add_settings_error(
		        'business_coupon_image',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}


function business_precoupon_image_sanitize($data){

	$type = null;
    $message = null;
    $field = "En campo Imagen de precupon - ";

	if($data != ""){

		if(!strpos($data, '.png') !== false){

			$type = 'error';
	        $message = $field . 'La imagen debe ser tipo PNG';

	        add_settings_error(
		        'business_precoupon_image',
		        'settings_updated',
		        $message,
		        $type
			);

			return "";

		} else{

			return $data;

		}    	

	}
	
}
/* Business plugin js functionality */


jQuery("document").ready(function(){

	//business_type = jQuery('input[name=business_type]:checked').val();

	business_type = get_business_type();

	show_business_type_options(business_type);

	jQuery('input[name=business_type]').on('change', function() {

		business_type = get_business_type();
		
		jQuery(".simple, .basic, .medium").css({
			"display": "none",
		});

		show_business_type_options(business_type);

	});	

	jQuery('#business_creation_date').datepicker({
		dateFormat : 'yy-mm-dd'
	});

});

function get_business_type(){

	type = jQuery('input[name=business_type]:checked').val();

	return type;

}

function show_business_type_options(type){

	jQuery("." + type).css({
		"display": "table-row",
	});

}

function image_upload(image_upload_id){

	formfield = jQuery('#' + image_upload_id).attr('name');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#' + image_upload_id).val(imgurl);
		tb_remove();
	}

}
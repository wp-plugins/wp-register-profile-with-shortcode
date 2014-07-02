<?php

function register_widget_pro_afo_shortcode( $atts ) {
     global $post;
	 extract( shortcode_atts( array(
	      'title' => '',
     ), $atts ) );
     
	ob_start();
	$wid = new register_wid;
	if($title){
		echo '<h2>'.$title.'</h2>';
	}
	$wid->registerForm();
	$ret = ob_get_contents();	
	ob_end_clean();
	return $ret;
}
add_shortcode( 'rp_register_widget', 'register_widget_pro_afo_shortcode' );


function get_user_data_afo( $atts ) {
     global $post;
	 extract( shortcode_atts( array(
	      'field' => '',
		  'user_id' => '',
     ), $atts ) );
     
	 $error = false;
	 if($atts['user_id'] == '' and is_user_logged_in()){
	 	$user_id = get_current_user_id();
	 } elseif($atts['user_id']){
	 	$user_id = $atts['user_id'];
	 } else if($atts['user_id'] == '' and !is_user_logged_in()){
	 	$error = true;
	 }
	 if(!$error){
	 	$ret = get_the_author_meta( $atts['field'], $user_id );
	 } else {
	 	$ret = 'Sorry. no user was found!';
	 }
		
	 return $ret;
}
add_shortcode( 'rp_user_data', 'get_user_data_afo' );

function rp_user_data_func($field='',$user_id=''){
	echo do_shortcode('[rp_user_data field="'.$field.'" user_id="'.$user_id.'"]');
}
?>
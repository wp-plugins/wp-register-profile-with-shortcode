<?php
class register_settings {
	
	function __construct() {
		$this->load_settings();
	}
	
	function register_widget_afo_save_settings(){
		if($_POST['option'] == "register_widget_afo_save_settings"){
			
			update_option( 'thank_you_page_after_registration_url', $_POST['thank_you_page_after_registration_url'] );
			
			update_option( 'password_in_registration', $_POST['password_in_registration'] );
			
			update_option( 'firstname_in_registration', $_POST['firstname_in_registration'] );
			update_option( 'is_firstname_required', $_POST['is_firstname_required'] );
			
			update_option( 'lastname_in_registration', $_POST['lastname_in_registration'] );
			update_option( 'is_lastname_required', $_POST['is_lastname_required'] );
			
			update_option( 'displayname_in_registration', $_POST['displayname_in_registration'] );
			update_option( 'is_displayname_required', $_POST['is_displayname_required'] );
			
			update_option( 'userdescription_in_registration', $_POST['userdescription_in_registration'] );
			update_option( 'is_userdescription_required', $_POST['is_userdescription_required'] );
			
			update_option( 'userurl_in_registration', $_POST['userurl_in_registration'] );
			update_option( 'is_userurl_required', $_POST['is_userurl_required'] );
			
			$_SESSION['msg'] = 'Plugin data updated successfully.';
			$_SESSION['msg_class'] = 'success_msg_rp';
		}
		
		
	}
	
	
	private function error_message(){
		if($_SESSION['msg']){
			echo '<div class="'.$_SESSION['msg_class'].'">'.$_SESSION['msg'].'</div>';
			unset($_SESSION['msg']);
			unset($_SESSION['msg_class']);
		}
	}
	
	
	function  register_widget_afo_options () {
	global $wpdb;
	
	$thank_you_page_after_registration_url = get_option('thank_you_page_after_registration_url');
	
	$password_in_registration = get_option( 'password_in_registration' );
	
	$firstname_in_registration = get_option( 'firstname_in_registration' );
	$is_firstname_required = get_option( 'is_firstname_required' );
	
	$lastname_in_registration = get_option( 'lastname_in_registration' );
	$is_lastname_required = get_option( 'is_lastname_required' );
	
	$displayname_in_registration = get_option( 'displayname_in_registration' );
	$is_displayname_required = get_option( 'is_displayname_required' );
	
	$userdescription_in_registration = get_option( 'userdescription_in_registration' );
	$is_userdescription_required = get_option( 'is_userdescription_required' );
	
	$userurl_in_registration = get_option( 'userurl_in_registration' );
	$is_userurl_required = get_option( 'is_userurl_required' );
	
	//$this->donate_form_register();
	$this->error_message();
	?>
	<form name="f" method="post" action="">
	<input type="hidden" name="option" value="register_widget_afo_save_settings" />
	<table width="100%" border="0">
	  <tr>
		<td colspan="2"><h1>WP Register Profile Settings</h1></td>
	  </tr>
	  <tr>
		<td><strong>Thank You Page</strong></td>
		<td><?php
				$args = array(
				'depth'            => 0,
				'selected'         => $thank_you_page_after_registration_url,
				'echo'             => 1,
				'show_option_none' => '--',
				'id' 			   => 'thank_you_page_after_registration_url',
				'name'             => 'thank_you_page_after_registration_url'
				);
				wp_dropdown_pages( $args ); 
			?></td>
	  </tr>
	   <tr>
		<td colspan="2"><h2>Form Fields</h2></td>
	  </tr>
	   <tr>
		<td colspan="2">
		
			<table width="100%" border="0" style="border:1px dotted #999999;" class="field_form_table">
			  <tr style="background-color:#FFFFFF;">
				<td width="10%"><h3>Field</h3></td>
				<td width="10%"><h3>Required</h3></td>
				<td width="40%"><h3>Show In Registration</h3></td>
			  </tr>
			  <tr>
				<td><strong>User Name</strong></td>
				<td align="center"><input type="checkbox" checked="checked" disabled="disabled" /></td>
				<td><span>This field is required and cannot be removed.</span></td>
			  </tr>
			 <tr style="background-color:#FFFFFF;">
				<td><strong>User Email</strong></td>
				<td align="center"><input type="checkbox" checked="checked" disabled="disabled" /></td>
				<td><span>This field is required and cannot be removed.</span></td>
			  </tr>
			  <tr>
				<td><strong>Password Field </strong></td>
				<td align="center"><input type="checkbox" checked="checked" disabled="disabled" /></td>
				<td><input type="checkbox" name="password_in_registration" value="Yes" <?php echo $password_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable password field in registration form. Otherwise the password will be auto generated and Emailed to user.</span></td>
			  </tr>
			 <tr style="background-color:#FFFFFF;">
				<td><strong>First Name </strong></td>
				<td align="center"><input type="checkbox" name="is_firstname_required" value="Yes" <?php echo $is_firstname_required == 'Yes'?'checked="checked"':'';?>/></td>
				<td><input type="checkbox" name="firstname_in_registration" value="Yes" <?php echo $firstname_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable first name in registration form.</span></td>
			  </tr>
			   <tr>
				<td><strong>Last Name </strong></td>
				<td align="center"><input type="checkbox" name="is_lastname_required" value="Yes" <?php echo $is_lastname_required == 'Yes'?'checked="checked"':'';?>/></td>
				<td><input type="checkbox" name="lastname_in_registration" value="Yes" <?php echo $lastname_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable last name in registration form.</span></td>
			  </tr>
			  <tr style="background-color:#FFFFFF;">
				<td><strong>Display Name </strong></td>
				<td align="center"><input type="checkbox" name="is_displayname_required" value="Yes" <?php echo $is_displayname_required == 'Yes'?'checked="checked"':'';?>/></td>
				<td><input type="checkbox" name="displayname_in_registration" value="Yes" <?php echo $displayname_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable display name in registration form.</span></td>
			  </tr>
			  <tr>
				<td><strong>About User </strong></td>
				<td align="center"><input type="checkbox" name="is_userdescription_required" value="Yes" <?php echo $is_userdescription_required == 'Yes'?'checked="checked"':'';?>/></td>
				<td><input type="checkbox" name="userdescription_in_registration" value="Yes" <?php echo $userdescription_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable about user in registration form.</span></td>
			  </tr>
			 <tr style="background-color:#FFFFFF;">
				<td><strong>User Url </strong></td>
				<td align="center"><input type="checkbox" name="is_userurl_required" value="Yes" <?php echo $is_userurl_required == 'Yes'?'checked="checked"':'';?>/></td>
				<td><input type="checkbox" name="userurl_in_registration" value="Yes" <?php echo $userurl_in_registration == 'Yes'?'checked="checked"':'';?>/><span>Check this to enable user url in registration form.</span></td>
			  </tr>
			  
			  <tr style="background-color:#FFFFFF;">
				<td colspan="3"><input type="submit" name="submit" value="Save" class="button button-primary button-large" /></td>
			  </tr>
			  
			</table>

		</td>
	  </tr>
	  
	   <tr>
		<td colspan="2">
			<table width="100%" border="0" style="background-color:#FFFFFF; padding:10px; border:1px dotted #999999;">
			  <tr>
				<td><h2>Shortcodes</h2></td>
			  </tr>
			  <tr>
				<td>1. Use this <span style="color:#000066;">[rp_register_widget]</span> shortcode to display registration form in post or page.<br />
		 Example: <span style="color:#000066;">[rp_register_widget title="User Registration"]</span>
		 <br />
		 <br />
		 2. Use This shortcode to retrieve user data <span style="color:#000066;">[rp_user_data field="first_name" user_id="2"]</span>. user_id can be blank. if blank then the data is retrieve from currently loged in user. Or else you can use this function in your template file.
		 <span style="color:#000066;">&lt;?php rp_user_data_func("first_name","2"); ?&gt;</span>
		 </td>
			  </tr>
			</table>
		</td>
	  </tr>
	 
	</table>
	</form>
	<?php }
	
	function register_widget_afo_menu () {
		add_options_page( 'Register Widget', 'WP Register Settings', 1, 'register_widget_afo', array( $this,'register_widget_afo_options' ));
	}
	
	function load_settings(){
		add_action( 'admin_menu' , array( $this, 'register_widget_afo_menu' ) );
		add_action( 'admin_init', array( $this, 'register_widget_afo_save_settings' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
	}
	
	public function register_plugin_styles() {
		wp_enqueue_style( 'style_register_widget', plugins_url( 'wp-register-profile/style_register_widget.css' ) );
	}

	
	function donate_form_register(){?>
	<table width="98%" border="0" style="background-color:#FFFFD2; border:1px solid #E6DB55;">
	 <tr>
	 <td align="right"><h3>Even $0.60 Can Make A Difference</h3></td>
		<td><form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			  <input type="hidden" name="cmd" value="_xclick">
			  <input type="hidden" name="business" value="avifoujdar@gmail.com">
			  <input type="hidden" name="item_name" value="Donation for plugins (Register)">
			  <input type="hidden" name="currency_code" value="USD">
			  <input type="hidden" name="amount" value="0.60">
			  <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="Make a donation with PayPal">
			</form></td>
	  </tr>
	</table>
	<?php }
}

new register_settings;
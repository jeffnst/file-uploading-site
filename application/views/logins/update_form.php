<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	$this->load->view('includes/header');
	$this->load->view('includes/topbarB');
	echo br(2);
	echo heading("Note: <br> If you need to change only your email, you should enter your username as well. And vice versa :)",1);	  
?> 

<?php
	echo form_open('site/update_info');
	echo form_label('Change both (*)');
?>
	<input type="text"  name = "email" placeholder= "email" required/>
	<input type="text"  name = "username" placeholder= "username" required/>

<?php
	echo form_submit('submit', 'Update');
	echo form_close();
	echo form_open('site/update_pswd');
	echo form_label('Password');
?>
	<input type="text"  name = "password" placeholder= "new password" required/>

<?php echo form_submit('submit', 'Change'); ?>
<?php echo validation_errors('<p class="error">'); ?>




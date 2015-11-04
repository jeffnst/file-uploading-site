<?php

$this->load->view('includes/header'); 
$this->load->view('includes/topbarA');

echo form_open('login/validate_credentials');
echo form_label('Welcome');
?>

<input type="text" value="username" name="username" onblur="if (this.value == '') {this.value = 'username';}"  onfocus="if (this.value == 'username') {this.value = '';}" />
<input type="password" value="password" name="password" onblur="if (this.value == '') {this.value = 'password';}"  onfocus="if (this.value == 'password') {this.value = '';}" />

<?php

echo form_submit('submit', 'Login');
echo form_close(); ?>

<div id=logo><?php echo img('/assets/img/suse_white.png');?></div>
	



<div id="topbar">
<?php	 
	 echo anchor('login/logout', 'welcome',array('onClick'=>"return confirm('Exit for sure? Your cookies will be cleared.')"));
	 echo "&nbsp";
	 $ud=$this->session->userdata('username');
	 echo anchor('site/update_info', $ud);	
?> 
</div>


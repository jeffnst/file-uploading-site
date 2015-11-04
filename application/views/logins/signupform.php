<?php 
$this->load->view('includes/header');
?> 

<form class="signup_form" action="create_user" method="post" name="signup_form" accept-charset="utf-8"> 
    <ul>
        <li>            
            <input type="text"  name = "first_name" placeholder= "first name" required />
        </li>
		<li>            
            <input type="text"  name="last_name" placeholder="last name" required />
        </li>
        <li>            
            <input type="email" name="email" placeholder="email address" required />
		</li>
		<li>            
            <input type="text" name="username" placeholder="username" required />
			 <span class="form_hint">4-25 characters</span>
		</li>
		<li>            
            <input type="text" name="password" placeholder="password" required />
			 <span class="form_hint">4-32 characters</span>
		</li>
		<li>            
            <input type="text" name="password2" placeholder="confirm password" required />
		</li>
		
  </ul>  
        	<button class="submit" type="submit">Create Account</button> 
			
<?php echo validation_errors('<p class="error">'); 

?>
<div id=logo><?php echo img('/img/suse_white.png');?></div>



</body>
</html>


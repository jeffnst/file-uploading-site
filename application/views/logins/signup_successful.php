<style type="text/css">
body{margin:0;padding:0;background:#f9f9f9; text-align:center;}
html{margin:0; padding:0;}
a{color:#008000;}a:hover{color:orange; text-decoration:none; }
p{margin:0;padding:0;color:#666;font-family:Verdana;font-size:11px;line-height:18px;}
h1{font-family: Verdana ;font-size: 16px;font-weight: normal;color: #666;border-bottom: 1px solid #343434;margin-bottom: 15px;padding-bottom: 8px;margin-top: 20px; text-shadow: none;}
#logoB{float:left;position:fixed;bottom:0%;}
</style>
<?php 
echo heading('Your account has been created!',1);
echo img('/assets/img/success.png');
echo "<p>";

$u = $this->input->post('username');
$l = $this->input->post('last_name');
$f = $this->input->post('first_name');
$e = $this->input->post('email');

echo br(1);
echo "<u>Your details:</u>";
echo br(1);
echo "Username:  $u<br/>";
echo "First Name:  $f<br/>"; 
echo "Last Name:  $l<br/>";
echo "Email:  $e"; 


echo br(2);
echo anchor('login', 'Login Now');
?>
<div id=logoB><?php echo img('/assets/img/suse_green.png');?></div>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload-Ur-Filez</title>

<base href="<?php echo base_url() ?>" /> <!-- so u don't have to call it everytime -->
<link rel="stylesheet" type="text/css" href="js/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" language="javascript" src="js/uploadify/jquery.uploadify-3.1.min.js"></script>
  

	<script type="text/javascript" language="javascript">
		$(document).ready(function(){		
		
					$("#slideToggle").click(function () {
					$('#flist').slideToggle('slow');
					});
							
										
					$("#upload").uploadify({
							'swf': 'js/uploadify/uploadify.swf',
							'uploader': '<?php echo base_url();?>js/uploadify/uploadify.php',
							'cancelImg': 'js/uploadify/cancel.png',
							'checkExisting': 'js/uploadify/check-exists.php',
							'auto':false,
							'buttonText': 'select',
							'fileTypeDesc':'csv',
							'fileTypeExts':'*.csv',
							'scriptAccess': 'always',
							'multi': true,					
							'width':50,
							'queueSizeLimit':20,
							'onUploadSuccess' : function(file, data, response) {
											  	alert(data);
												},
							'onDialogClose'  : function(queueData) {
											    alert('Selected: ' + queueData.filesSelected + ' Errored: '+queueData.filesErrored);
												},
							'onUploadComplete': function(file) {
												// you can use here jQuery AJAX method to send info at server-side.
			   				   	   	   			$.post("<?php echo base_url();?>index.php/dtbl/add", { name: file.name, size: file.size, type: file.type });
												}
					});
					
				});
		
		
	</script>
</head>

<body>
<div id="uplbox">        
			
	 	<input type="file" name="upload" id="upload" />
        <a href="javascript:$('#upload').uploadify('upload','*');">Send</a> ||
		<a href="javascript:$('#upload').uploadify('cancel','*');">Cancel</a>
		  
</div> 

<div id="slideToggle"></div> 
<div id="flist"><?php $this->load->view('datatable');?></div>

</body>
</html>
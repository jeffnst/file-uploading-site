<base href="<?php echo base_url() ?>" />
<!-- themes can go here -->
<link type="text/css" rel="stylesheet" href="css/trontastic/ui.theme.css" />
<link type="text/css" rel="stylesheet" href="css/trontastic/ui.all.css" />
<link type="text/css" rel="stylesheet" href="css/trontastic/ui.core.css" />
<link type="text/css" rel="stylesheet" href="css/demo_table.css" />
<!--<link type="text/css" rel="stylesheet" href="css/smoothness/jquery-ui-1.8.2.custom.css" />-->
<!--<link type="text/css" rel="stylesheet" href="css/styles1.css" />-->




<div id="ajaxLoadAni">
    <img src="assets/img/ajax-loader.gif" alt="Ajax Loading Animation" />
    <span>Loading...</span>
</div>

<!--<div id="flist"> only por out calls-->
<div id="tabs">
    
    <ul>
        <li><a href="#read">All Files</a></li>
    </ul>
    
    <div id="read">
        <table id="records">
		<tbody>
            <thead>
                <tr>
                    <th>File Id</th>
                    <th>Name</th>
                    <th>Owner</th>
					<th>Size</th>
					<th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
			</tbody>           
        </table>
<?php
$map = directory_map('../uploads/');
$sum = count($map);
echo "Total files in target-folder: $sum";
?>

  	 </div>
   
</div> <!-- end tabs -->

 <!--</div> don't put that unless you call the view 'outside' -->

<!-- delete confirmation dialog box -->
<div id="delConfDialog" title="Confirm">
    <p>Are you sure?</p>
</div>



<!-- message dialog box -->
<div id="msgDialog"></div>



<script type="text/javascript" src="js/datatables/jquery-ui-1.8.2.min.js"></script>
<script type="text/javascript" src="js/datatables/jquery-templ.js"></script>
<script type="text/javascript" src="js/datatables/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/datatables/jquery.dataTables.min.js"></script>

<script type="text/template" id="readTemplate">
    <tr id="${file_id}">
        <td>${file_id}</td>
        <td>${name}</td>
        <td>${owner}</td>
		<td>${size}</td>
		<td>${type}</td>
        <td><a class="updateBtn" href="${dnlLink}">Download</a> | <a class="deleteBtn" href="${deleteLink}">Delete</a></td>
    </tr>
</script>

<script type="text/javascript" src="js/datatables/all.js"></script>
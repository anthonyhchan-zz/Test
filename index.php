<!DOCTYPE html> 
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1; user-scalable=no;"> 
	<title>Multi-page template</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.css" />
    <link rel="stylesheet" href="doodle.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0rc1/jquery.mobile-1.0rc1.min.js"></script>
    <script>
	$(document).ready(function(){
		$('input[type="datetime"]').addClass("ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c");
		$('#save').click(function() {
			$('form').submit();
		});
		$('#refresh').click(function() {
			location.reload();
		});
	});
	</script>
</head> 

	
<body> 

<!-- start of view page -->
<div data-role="page" id="view">

<?php
include('mysql_connect.php');

$q = "SELECT * FROM event";

$r = mysql_query($q, $dbc);
?>

	<div data-role="header">
    	<a href="#" data-icon="refresh" id="refresh">Refresh</a>
		<h1>Events</h1>
	</div>

	<div data-role="content">	
 		<ul data-role="listview">
<?php 
		if($r) {
			while($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
?>
				<li><a href="index.php#detailed_view?id=<?php echo($row['event_id']) ?>" rel="external"><?php echo stripslashes($row['title']) ?></a></li>
<?php
			}
		}
?>
       </ul>
	</div>
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="#view" class="ui-btn-active ui-state-persist">View</a></li>
                <li><a href="#create">Create</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of view page-->
<!-- start of detailed view page -->
<div data-role="page" id="#detailed_view" data-add-back-btn="true">

<?php
$id = $row['event_id'];

$q = "SELECT * FROM datetime WHERE event_id = $id";

$r = mysql_query($q, $dbc);
?>

	<div data-role="header">
		<h1>Event Details</h1>
	</div>

	<div data-role="content">	
    <ul data-role="listview">
<?php 
	if($r) {
			while($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
?>
				<li data-role="list-divider">Details</li>
                <li><?php echo stripslashes($row['datetime']) ?></a></li>
<?php
			}
		}
?>
    </ul>
    
	</div>
    
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="#view" class="ui-btn-active ui-state-persist">View</a></li>
                <li><a href="#create">Create</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of detailed view page-->
<!-- start of create page -->
<div data-role="page" id="create">

	<div data-role="header">
		<a href="index.php#view" data-icon="delete">Cancel</a>
        <h1>Create Task</h1>
        <a href="#" data-icon="check" data-theme="b" id="save">Save</a>
	</div>

	<div data-role="content">	
    	<form action="form.php" method="post" data-ajax="false">
        <div data-role="fieldcontain">
        	<label for="title">Event title:</label>
   		    <input type="text" name="title" id="title" value=""  />
            <label for="name">Who are you?</label>
   		    <input type="text" name="name" id="name" value=""  />
            <label for="email">Email:</label>
   		    <input type="email" name="email" id="email" value=""  />
        </div>
        
        Select Dates and Times: <br>
        <div data-role="fieldcontain">
            <input type="datetime" name="datetime1" id="datetime1" value="" /> <br>
            <input type="datetime" name="datetime2" id="datetime2" value="" /> <br>
            <input type="datetime" name="datetime3" id="datetime3" value="" /> <br>
        </div>       
        </form>
	</div>
	
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
            	<li><a href="#view" data-direction="reverse" >View</a></li>
                <li><a href="#create" class="ui-btn-active ui-state-persist">Create</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of create page-->
</body>
</html>

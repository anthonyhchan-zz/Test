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
</head> 

	
<body> 
<!-- start of create page -->
<div data-role="page" id="create">

	<div data-role="header">
		<h1>Create Task</h1>
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
            <input type="datetime" name="datetime1" id="datetime1" value=""  />	<br>
            <input type="datetime" name="datetime2" id="datetime2" value=""  step="15"/> <br>
            <input type="datetime" name="datetime3" id="datetime3" value=""  />	<br>
        <input type="submit" value="Organize!" />
        
        </form>
	</div>
	
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
            	<li><a href="#create" class="ui-btn-active ui-state-persist">Create</a></li>
                <li><a href="#view">View</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of create page-->
<!-- start of view page -->
<div data-role="page" id="view">

<?php
include('mysql_connect.php');

$q = "SELECT * FROM event";

$r = mysql_query($q, $dbc);
?>

	<div data-role="header">
		<h1>Events</h1>
	</div>

	<div data-role="content">	
        <div data-role="controlgroup">
<?php 
		if($r) {
			while($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
?>
        		<a href="index.html" data-role="button"><?php echo $row['title'] ?></a>
<?php
			}
		}
?>
       </div>
	</div>
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
            	<li><a href="#create" data-direction="reverse" >Create</a></li>
                <li><a href="#view" class="ui-btn-active ui-state-persist">View</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of view page-->
</body>
</html>

<?php
include ('header.php');
include ('mysql_connect.php');
?>

<!-- start of detailed view page -->
<div data-role="page" id="detailed_view" data-add-back-btn="true">

<?php
$id = $_GET['id'];

$q = "SELECT * FROM datetime WHERE event_id = $id";

$r = mysql_query($q, $dbc);

?>

	<div data-role="header">
		<h1>Event Details</h1>
	</div>

	<div data-role="content">
    <label for="name">Name:</label>	
    <input type="text" name="name" id="name" value="" /> <br><br><br>
    <ul data-role="listview">
    <li data-role="list-divider">Details</li>
<?php 
	if($r) {
			while($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
?>
                <li class="event_datetime"><?php echo date("j M Y (D), ga", strtotime($row['datetime'])) ?>
                	<div class="no_score"></div>
                    <div class="yes_score"></div>
                    <div class="check_mark"></div>
                    <div class="cross_mark"></div>
               	</li>
<?php
			}
		}
?>
    </ul>
    
	</div>
    
	<div data-role="footer" data-id="foo1" data-position="fixed">
        <div data-role="navbar">
            <ul>
                <li><a href="index.php#view" class="ui-btn-active ui-state-persist" rel="external">View</a></li>
                <li><a href="index.php#create" rel="external">Create</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of detailed view page-->
<?php
include ('footer.php');
?>
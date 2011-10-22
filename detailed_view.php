<?php
include ('header.php');
include ('mysql_connect.php');
?>

<!-- start of detailed view page -->
<div data-role="page" id data-add-back-btn="true">

<?php
$id = $_GET['id'];

$q = "SELECT * FROM datetime WHERE event_id = $id";

$r = mysql_query($q, $dbc);

?>

	<div data-role="header">
		<h1>Event Details</h1>
	</div>

	<div data-role="content">	
    <ul data-role="listview">
    <li data-role="list-divider">Details</li>
<?php 
	if($r) {
			while($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
?>
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
<?php
include ('footer.php');
?>
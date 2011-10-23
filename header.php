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
		$('.check_mark').css('display', 'none');
		$('#save').click(function() {
			$('form').submit();
		});
		$('#event_save').click(function() {
			$('#form2').submit();
		});
		$('#refresh').click(function() {
			location.reload();
		});
		$('.event_datetime').click(function() {
			$('.check_mark').css('display', 'block');
			$('.cross_mark').css('display', 'none');
		});
		
	});
	</script>
</head> 

	
<body> 
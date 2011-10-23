$(document).ready(function(){
	$('input[type="datetime"]').addClass("ui-input-text ui-body-null ui-corner-all ui-shadow-inset ui-body-c");
	$('.check_mark').css('display', 'none');
	$('#save').click(function() {
		$('form').submit();
	});
	$('#event_save').click(function() {
		$('form').submit();
	});
	$('#refresh').click(function() {
		location.reload();
	});
});
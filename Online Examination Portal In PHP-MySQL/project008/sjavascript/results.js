$('.details').click(function() {
	var attempt_id=$(this).parent().parent().children("#attempt_id").text();
	window.location="http://localhost/project008/sphp/displayResult.php?attempt_id="+attempt_id;
});

$(".show").click(function(){
  var s_id=$(this).parent().parent().children("#rid").text();
  //alert(test_id);
  window.location="http://localhost/project008/php/resultsByAttempt.php?sid="+s_id+"&test_id="+test_id;
});
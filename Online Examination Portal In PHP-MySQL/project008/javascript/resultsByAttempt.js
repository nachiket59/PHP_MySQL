$(".show").click(function(){
  var s_id=$(this).parent().parent().children("#rid").text();
  //alert(test_id);
  window.location="http://localhost/project008/php/displayResult.php?attempt_id="+s_id;
});
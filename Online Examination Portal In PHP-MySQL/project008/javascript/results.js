$(".show_result").click(function(){
  var test_id=$(this).parent().parent().children("#testid").text();
  //alert(test_id);
  window.location="http://localhost/project008/php/resultsByStudent.?id="+test_id;
});
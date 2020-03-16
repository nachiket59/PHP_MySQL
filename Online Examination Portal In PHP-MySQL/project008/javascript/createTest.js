$(document).ajaxStart(function(){
  $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
 $.LoadingOverlay("hide");
});
$(".activate").click(function(e) {
	var j=$(this);
    var i=$(this).parent().parent().children("#testid").text();
    var tdata={"activateid":i};

    $.ajax({
          type: "POST",
          data:tdata,
          datatype:"json",
          url: "createTestX.php",
          success: function(result){
            j.html("activated");
            j.attr("disabled","true");
            alert(result);
          }
      });
	
});
$(".deactivate").click(function(e) {
	var j=$(this);
    var i=$(this).parent().parent().children("#testid").text();
    var tdata={"deactivateid":i};

    $.ajax({
          type: "POST",
          data:tdata,
          datatype:"json",
          url: "createTestX.php",
          success: function(result){
            j.html("deactivated");
            j.attr("disabled","true");
            alert(result);
          }
      });
	
});

$(".delete").click(function (argument) {
  if (confirm("This will delete all test Dependancies!!!")) {
  var j=$(this);
    var i=$(this).parent().parent().children("#testid").text();
    var tdata={"deleteid":i};

    $.ajax({
          type: "POST",
          data:tdata,
          datatype:"json",
          url: "createTestX.php",
          success: function(result){
            j.html("deleted");
            j.attr("disabled","true");
            alert(result);
          }
      });
  }
});

$(".addQuestions").click(function(){
  var test_id=$(this).parent().parent().children("#testid").text();
  //alert(test_id);
  window.location="http://localhost/project008/php/testQuestions.php?id="+test_id;
});

$(".editbtn").click(function(){
  var test_id=$(this).parent().parent().children("#testid").text();
  //alert(test_id);
  window.location="editTest.php?id="+test_id;
});
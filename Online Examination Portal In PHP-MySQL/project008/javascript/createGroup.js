$(document).ajaxStart(function(){
  $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
 $.LoadingOverlay("hide");
});
		
$(".mbtn").click(function(){
	var gid = $(this).parent().parent().children(".gid").text();
	//alert(gid);
	//document.write(gid);
	/*var arr = {};
	arr['id']=gid;*/
				
	//$.post("editGroup.php",{id:"2"});
	 window.location="http://localhost/project008/php/manageGroup.php?id="+gid;
});

$(".editbtn").click(function () {
	var id=	 $(this).parent().parent().children(".gid").text();
	window.location="http://localhost/project008/php/editGroup.php?id="+id;
});

var group_id;
$(".assign_test").click(function () {
	 group_id= $(this).parent().parent().children(".gid").text();
	
});
$("#assign").click(function () {
	var i=$(this);
	var test_id=$("#tests").val();
	assign_test={group_id:null,test_id:null};
		assign_test.group_id=group_id;
		assign_test.test_id=test_id;
		$.ajax({
          type: "POST",
          data:assign_test,
          datatype:"json",
          url: "createGroupX.php",
          success: function(result){
           //display_questions(result);
           alert(result);
           //i.attr("disabled","true");
           //add_function();
          }
      });
});

$(".deletebtn").click(function (){
	if(confirm("Confirm delering this group??!")){
		var j=$(this);
		var i=$(this).parent().parent().children(".gid").text();
		var sdata={"removeid":i};
			$.ajax({
	 		type: "POST",
	 		data:sdata,
	 		datatype:"json",
	 		url: "createGroupX.php",
				success: function(result){
					j.html("removed");
					j.attr("disabled","true");
					//$('#show').html(result);
					//alert(result);
				}
			});
	}
});
request_questions($("#qbselect").val());


$("#qbselect").change(function () {
      	var pqua=$("#qbselect").val();
      	request_questions(pqua);
});

function request_questions(id) {
	obj={qbid:null,tid:null};
	obj.qbid=id;
	obj.tid=test_id;
	$.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "testQuestionsX.php",
          success: function(result){
           display_questions(result);
           //alert(result);
           add_function();
          }
      });
}

function display_questions(response) {
	data=JSON.parse(response);
	var whole="";
	var append;
	var i=0;
	for(x in data){
		append="<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+i+"\">"+data[x].question+"</a></h4><button class=\"btn btn-success addbtn \">add</button></div><div id=\"collapse"+i+"\" class=\"panel-collapse collapse \"><ul class=\"list-group\" id=\"list\"> <li class=\"list-group-item\" id=\"id\">"+data[x].qid+"</li><li class=\"list-group-item\">(A) "+data[x].option1+"</li><li class=\"list-group-item\">(B) "+data[x].option2+"</li><li class=\"list-group-item\">(C) "+data[x].option3+"</li><li class=\"list-group-item\">(D) "+data[x].option4+"</li><li class=\"list-group-item\"> ANSWER:"+data[x].answer+"</li></ul><div class=\"panel-footer\"><button class=\"btn btn-danger remove\"><span class=\"fa  fa-trash\"></span> Delete</button></div></div></div>";
		whole+=append;
		i++;
	}
	document.getElementById("accordion").innerHTML = whole;
}

function add_function() {
	$(".addbtn").click(function () {
		var i=$(this);
		var x=$(this).parent().parent().children(".panel-collapse").children().children("#id").text();
		qid={qid:null,testid:null};
		qid.qid=x;
		qid.testid=test_id;
		$.ajax({
          type: "POST",
          data:qid,
          datatype:"json",
          url: "testQuestionsX.php",
          success: function(result){
           //display_questions(result);
           alert(result);
           i.attr("disabled","true");
           //add_function();
          }
      });
	});
}

		


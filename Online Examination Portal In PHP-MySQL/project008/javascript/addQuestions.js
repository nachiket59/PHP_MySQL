$(document).ajaxStart(function(){
  $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
 $.LoadingOverlay("hide");
});

request_questions(q_id);

$(document).ready(function(){
  $("#question_search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#accordion .panel-heading").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
  
});


function remove() {
$(".remove").click(function(){
	var i=$(this).parent().parent().children("#list").children("#id").text();
	var j=$(this);
	var qdata={"removeid":i};

    $.ajax({
          type: "POST",
          data:qdata,
          datatype:"json",
          url: "addQuestionsX.php",
          success: function(result){
            j.html("Deleted");
            j.attr("disabled","true");
            alert(result);
          }
      });
});
}
$("#sel1").change(function (argument) {
  var qb=$("#sel1").val();
  request_questions(qb);
});

function request_questions(qb_id) {
   obj={qbid:null};
  obj.qbid=qb_id;
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "addQuestionsX.php",
          success: function(result){
           display_questions(result);
           remove();
          }
      });
}
function display_questions(response) {
  data=JSON.parse(response);
  var whole="";
  var append;
  var i=0;
  for(x in data){
    append="<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+i+"\">"+data[x].question+"</a></h4></div><div id=\"collapse"+i+"\" class=\"panel-collapse collapse \"><ul class=\"list-group\" id=\"list\"> <li class=\"list-group-item\" id=\"id\">"+data[x].qid+"</li><li class=\"list-group-item\">(A) "+data[x].option1+"</li><li class=\"list-group-item\">(B) "+data[x].option2+"</li><li class=\"list-group-item\">(C) "+data[x].option3+"</li><li class=\"list-group-item\">(D) "+data[x].option4+"</li><li class=\"list-group-item\"> ANSWER:"+data[x].answer+"</li></ul><div class=\"panel-footer\"><button class=\"btn btn-danger remove\"><span class=\"fa  fa-trash\"></span> Delete</button></div></div></div>";
    whole+=append;
    i++;
  }
  document.getElementById("accordion").innerHTML = whole;
}
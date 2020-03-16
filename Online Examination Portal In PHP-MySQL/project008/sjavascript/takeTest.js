/*$(document).ajaxStart(function(){
  $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
 $.LoadingOverlay("hide");
});*/
var over=0;
var i=sr_no+1;
request_current_question();
request_summery();
$("#next").click(function () {
  var answer=$("input[name='answer']:checked").val();
  request_next_question(answer);
  
});
$("#previous").click(function (){
  request_prev_question();
  
});
$("#finish").click(function (){
  window.location.href="http://localhost/project008/sphp/testComplete.php";
});
$("#refresh").click(function() {
  request_summery();
  
});



var timer=setInterval(function(){
  $("#sec").empty();
  var a = Math.floor(testTime/3600); //hours
    var x = testTime%3600;
    var b = Math.floor(x/60); //minutes
    var c = testTime%60; //seconds
  var time_string=a+"hours "+b+"Min "+c+"sec";
  $("#sec").append(time_string);
  testTime--;
  
  if(testTime<0){
    clearInterval(timer);
    $("#sec").remove();
    $("#msg").empty();
    $("#msg").append("test is over");
    
  }
},1000);




function request_current_question(){
  obj={current_question:null};
  obj.current_question=1;
  $("#question").LoadingOverlay('show');
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
            
           if(result=="error"){
            alert("error");
           }
           else if(result=="complete"){
            var over=1;
            //window.location="http://localhost/project008/sphp/testComplete.php";
           }
           else
           display_questions(result);
           
           if(over==1){
            window.location.href="http://localhost/project008/sphp/testComplete.php";
            }  
            $("#question").LoadingOverlay('hide');
          }
      });
  
}
function request_next_question(ans){
	obj={next_question:null};
  if(ans!=""){
    //obj.answer=ans;
  }
	obj.next_question=1;
  $("#question").LoadingOverlay('show');
	$.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
            
           if(result=="error"){
            alert("error");
           }
           else if(result=="complete"){
            //window.location="http://localhost/project008/sphp/testComplete.php";
            var over=1;
           }
           else{
            i++;
            display_questions(result);
            }
            if(over==1){
            window.location.href="http://localhost/project008/sphp/testComplete.php";
            }
            $("#question").LoadingOverlay('hide');
          }
      });
  
}
function request_prev_question(){
  obj={prev_question:null};
  obj.prev_question=1;
  $("#question").LoadingOverlay('show');
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
            
           if(result=="error"){
            alert("error");
           }
           else if(result=="complete"){
            var over=1;
            //window.location="http://localhost/project008/sphp/testComplete.php";
           }
           else{
            i--;
            display_questions(result);
           
           }
           if(over==1){
            window.location.href="http://localhost/project008/sphp/testComplete.php";
            }
            $("#question").LoadingOverlay('hide');
           //radio_function();
          }
      });
  
}

function display_questions(res){
  data=JSON.parse(res);
  var whole="";
  var append;
  
  for(x in data){
    if(data[x].option3==null&&data[x].option4==null){
      if(data[x].sanswer==1){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" checked  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div></div>";    
      }
      else if(data[x].sanswer==2){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" checked >"+data[x].option2+"</label></div></div>";    
      }
      else
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div></div>";
    }
    else if(data[x].option4==null){
      if(data[x].sanswer==1){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  checked >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div></div>";       
      }
      else if(data[x].sanswer==2){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" checked >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div></div>";        
      }
      else if(data[x].sanswer==3){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" checked>"+data[x].option3+"</label></div></div>";        
      }
      else
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div></div>";  
    }
    else{
      if(data[x].sanswer==1){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" checked>"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"4\" >"+data[x].option4+"</label></div></div>";
      }
      else if(data[x].sanswer==2){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" checked>"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"4\" >"+data[x].option4+"</label></div></div>";
      }
      else if(data[x].sanswer==3){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" checked>"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"4\" >"+data[x].option4+"</label></div></div>";
      }
      else if(data[x].sanswer==4){
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"4\" checked >"+data[x].option4+"</label></div></div>";
      }
      else
        append="<div class=\"form-group\"><label class=\"control-label\" style=\"font-size:20px; \">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"1\" >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"3\" >"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"answer\" value=\"4\" >"+data[x].option4+"</label></div></div>";
    }
    whole+=append;
  }

  $("#form1").empty();
  $("#form1").append(whole);
  //document.getElementById("form1").innerHTML = whole;
          $("input:radio").change(function () {
              var answer=$("input[name='answer']:checked").val();
              change_answer(answer);
              });

}

function request_summery(){
  obj={summery:null};
  obj.summery=1;
  $("#summery").LoadingOverlay('show');
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){

           if(result=="error"){
            alert("error");
           }
           else if(result=="complete"){
            var over=1;
            //window.location="http://localhost/project008/sphp/testComplete.php";
           }
           else{
            //alert(result);
            display_summery(result);
            jump_to_question();
           }
           if(over==1){
            window.location.href="http://localhost/project008/sphp/testComplete.php";
            }
           //radio_function();
           $("#summery").LoadingOverlay('hide');
          }
      });
  
}

function display_summery(res) {
  data=JSON.parse(res);
  var whole="";
  var append;
  j=0;
  for(x in data){
    if(data[x].sanswer!=null){  
    append="<div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+j+"\">"+data[x].question+"</a></h4></div><div id=\"collapse"+j+"\" class=\"panel-collapse collapse \"><ul class=\"list-group\" id=\"list\"> <li class=\"list-group-item\" id=\"id\" style=\"display:none\">"+data[x].qid+"</li><li class=\"list-group-item\">(A) "+data[x].option1+"</li><li class=\"list-group-item\">(B) "+data[x].option2+"</li><li class=\"list-group-item\">(C) "+data[x].option3+"</li><li class=\"list-group-item\">(D) "+data[x].option4+"</li><li class=\"list-group-item\">YOUR ANSWER:"+data[x].sanswer+"</li></ul><div class=\"panel-footer\"><button class=\"btn btn-primary jump\"> JUMP</button></div></div></div>";
    }
    else{
    append="<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"+j+"\">"+data[x].question+"</a></h4></div><div id=\"collapse"+j+"\" class=\"panel-collapse collapse \"><ul class=\"list-group\" id=\"list\"> <li class=\"list-group-item\" id=\"id\" style=\"display:none\">"+data[x].qid+"</li><li class=\"list-group-item\">(A) "+data[x].option1+"</li><li class=\"list-group-item\">(B) "+data[x].option2+"</li><li class=\"list-group-item\">(C) "+data[x].option3+"</li><li class=\"list-group-item\">(D) "+data[x].option4+"</li><li class=\"list-group-item\">YOUR ANSWER:"+data[x].sanswer+"</li></ul><div class=\"panel-footer\"><button class=\"btn btn-primary jump\"> JUMP</button></div></div></div>";
    }
    whole+=append;
    j++;
  }
  document.getElementById("accordion").innerHTML = whole;
}

function jump_to_question(){
  $(".jump").click(function(){
      var o=$(this);
      var qid=$(this).parent().parent().children().children("#id").text();
      obj={jump_id:null};
      var ans=$("input[name='answer']:checked").val();
      if(ans!=""){
        //obj.answer=ans;
      }
      obj.jump_id=qid;
      $("#question").LoadingOverlay('show');
       $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
           if(result=="error"){
            alert("error");
           }
           else{
            //alert(result);
            display_questions(result);
           }
           
           //radio_function();
           $("#question").LoadingOverlay('hide');
          }
      });
      //alert(qid);
  });
}

function change_answer(ans) {
  obj={answer:null};
  if(ans!=""){
    obj.answer=ans;
  }
  $("#question").LoadingOverlay('show');
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
           if(result=="error"){
            alert("error");
           }
           else if(result=="complete"){
            var over=1;
            //window.location="http://localhost/project008/sphp/testComplete.php";
           }
           if(over==1){
            window.location.href="http://localhost/project008/sphp/testComplete.php";
            }
            $("#question").LoadingOverlay('hide');
          }
      });
  
}
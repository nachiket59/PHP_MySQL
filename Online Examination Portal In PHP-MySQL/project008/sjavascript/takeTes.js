//$("#sec").append("1");
//$("#sec").empty();

//request_questions(current_q);
$("#next").click(function (){
	request_questions();
});
$("#previous").click(function (){
	request_questions();
});
/*var sec=$("#sec");

var timer=setInterval(function(){
	$("#sec").empty();
	var a = Math.floor(testTime/3600); //hours
    var x = testTime%3600;
    var b = Math.floor(x/60); //minutes
    var c = testTime%60; //seconds
	var time_string=a+"hours "+b+"Min "+c+"sec";
	$("#sec").append(time_string);
	testTime--;
	if(testTime<90){
		var checkS=setInterval(function () {
	checkSession();
},2000);
	}
	if(testTime<0){
		clearInterval(timer);
		$("#sec").remove();
		$("#msg").remove();
		
	}
},1000);
*/

$("#finish").click(function(){
	window.location="http://localhost/project008/sphp/TestComplete.php";
});

function request_questions(qid){
	obj={next_question:null};
	obj.next_question=1;
	$.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "takeTestX.php",
          success: function(result){
           alert(result);

           //display_questions(result);
           //radio_function();
          }
      });
}

function display_questions(res){
	data=JSON.parse(res);
	var whole="";
	var append;
	var i=1;
	for(x in data){
		if(data[x].option3==null&&data[x].option4==null){
		append="<div class=\"form-group\"><label class=\"control-label\">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"2\" >"+data[x].option2+"</label></div></div>";
		}
		else if(data[x].option4==null){
		append="<div class=\"form-group\"><label class=\"control-label\">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"1\"  >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"3\" >"+data[x].option3+"</label></div></div>";	
		}
		else{
		append="<div class=\"form-group\"><label class=\"control-label\">Q"+i+" "+data[x].question+"</label><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"1\" >"+data[x].option1+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"2\" >"+data[x].option2+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"3\" >"+data[x].option3+"</label></div><div class=\"radio\"><label><input type=\"radio\" name=\""+data[x].qid+"\" value=\"4\" >"+data[x].option4+"</label></div></div>";
		}
		whole+=append;
		i++;
	}
	$("#form1").empty();
	$("#form1").append(whole);
	//document.getElementById("form1").innerHTML = whole;

}

function radio_function(){
	$(".r1").click(function() {
		alert($(this).val());
	});
}

function checkSession(){
	$.ajax({
          type: "GET",
          url: "checkSession.php",
          success: function(result){
          	if (result=="true") {
          		$('#form1').submit();
          		//window.location="http://localhost/project008/sphp/TestComplete.php";
          	}
          }
      });
}


//"<div class=\"form-group\"><label class=\"control-label\">Whats your name?</label><div class=\"radio\"><label><input type=\"radio\" name=\"optradio\" >Option 1</label></div><div class=\"radio\"><label><input type=\"radio\" name=\"optradio\" >Option 2</label></div></div>";
//<div class="form-group col-sm-4"><input type="submit" class="form-control btn-primary" id="submit"  value="submit"></div>
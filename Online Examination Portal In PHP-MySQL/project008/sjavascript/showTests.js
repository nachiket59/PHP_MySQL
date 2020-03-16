var test=null;

$(".takeTest").click(function(){
	var tid=$(this).parent().parent().children("#testid").text();
	test=tid;
	 obj={test_id:null};
  	obj.test_id=tid;
  	var allw="";
  $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "checkAttempts.php",
          success: function(result){
          	 if(result=="allowed"){
          	 	allw="allowed"
          	 }
          	 if(tid==test_ongoing || test_ongoing==null){
				if(allw=="allowed"){
			
				window.location="http://localhost/project008/sphp/startTest.php?test_id="+tid;	
				}
				else
					$("#myModal").modal("show");
			}
			else{
				alert("you have another test going on!");
			}
             
          }
      });
});

$("#submit").click(function(){
	if(test!=null){
	obj={password:null,test:null};
  	obj.password=$("#password").val();
  	obj.test=test;
	 $.ajax({
          type: "POST",
          data:obj,
          datatype:"json",
          url: "checkAttempts.php",
          success: function(result){
         	if(result=="succeed"){
         		
         		window.location="http://localhost/project008/sphp/startTest.php?test_id="+test;	
         	}
         	else
         		alert("Wrong password!");
         }
      });
	}
	else{
		alert("error");
	}		 
});
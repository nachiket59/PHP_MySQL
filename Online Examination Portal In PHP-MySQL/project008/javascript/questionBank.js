$(".qblink").click(function(){
				var qbid = $(this).parent().children(".qbid").html();
				//document.write(gid);
				/*var arr = {};
				arr['id']=gid;*/
				
				//$.post("editGroup.php",{id:"2"});
				 window.location="http://localhost/project008/php/addQuestions.php?id="+qbid;
});
$('.delete').click(function() {
					var j=$(this);
					var i = $(this).parent().parent().children(".qbid").html();
					var sdata={qbid:null};
					sdata.qbid=i;
					$.ajax({
	 				type: "POST",
	 				data:sdata,
	 				datatype:"json",
	 				url: "questionBankX.php",
					success: function(result){
						j.html("removed");
						j.attr("disabled","true");
						//$('#show').html(result);
						alert(result);

					}
					});
				});
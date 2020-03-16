				
				$('.addbtn').click(function() {
					var j=$(this);
					var i=$(this).parent().parent().children(".sid").text();
					var sdata={"addid":i};
					$.ajax({
	 				type: "POST",
	 				data:sdata,
	 				datatype:"json",
	 				url: "manageGroupX.php?id="+gid,
					success: function(result){
						j.html("added");
						j.attr("disabled","true");
						//$('#show').html(result);
						//alert(result);

					}
					});
				});


				$('.removebtn').click(function() {
					var j=$(this);
					var i=$(this).parent().parent().children(".rid").text();
					var sdata={"removeid":i};
					$.ajax({
	 				type: "POST",
	 				data:sdata,
	 				datatype:"json",
	 				url: "manageGroupX.php?id="+gid,
					success: function(result){
						j.html("removed");
						j.attr("disabled","true");
						//$('#show').html(result);
						//alert(result);
					}
					});
				});
					$('#search1').keyup(function(){  
                	search_table($(this).val(),$('#table1 tr'));  
           			}); 
           			$('#search2').keyup(function(){  
                		search_table($(this).val(),$('#table2 tr'));  
           			});


				/* function search_table2(value){  
                $('#table2 tr').each(function(){  
                     var found1 = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found1 = 'true';  
                          }  
                     });  
                     if(found1 == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           } 
           

           
           function search_table1(value){  
                $('#table1 tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }*/
           function search_table(value,obj){  
                obj.each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           } 


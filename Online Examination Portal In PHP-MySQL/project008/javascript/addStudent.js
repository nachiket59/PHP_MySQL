$(document).ajaxStart(function(){
  $.LoadingOverlay("show");
});

$(document).ajaxComplete(function(){
 $.LoadingOverlay("hide");
});

$('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#sdata tr').each(function(){  
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

$('.remove').click(function() {
    if(confirm("All the student dependancies will be deleted!!")){
    var j=$(this);
    var i=$(this).parent().parent().children("#rid").text();

    var sdata={"removeid":i};

    $.ajax({
          type: "POST",
          data:sdata,
          datatype:"json",
          url: "addStudentX.php",
          success: function(result){
            j.html("Deleted");
            j.attr("disabled","true");
            alert(result);
          }
      });
  }
});

$(".edit").click(function () {
  var i=$(this).parent().parent().children("#rid").text();
  window.location="editStudent.php?id="+i;
});
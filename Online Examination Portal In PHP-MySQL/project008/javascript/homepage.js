 var count=0;
		 
		$("#tgbtn").click(function(e) {
				count++;
				if(count%2==0)
				{
					e.preventDefault();
					$(".main").css({"margin-left":"0px"});
					$(".navbar").css({"margin-left":"0px"});
					$(".sidenav").css({"width":"0px"});
				}
				else
				{
					e.preventDefault();
					$(".main").css({"margin-left":"250px"});
					$(".navbar").css({"margin-left":"250px"});
					$(".sidenav").css({"width":"250px"});

				}	
		});

$("#mySidenav").append("<a href=\"createTest.php\">Tests</a> <a href=\"questionBank.php\">Question Banks</a><a href=\"results.php\">Results</a>");
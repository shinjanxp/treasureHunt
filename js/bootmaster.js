function postAnswer() {
      
    var answer = document.getElementById("user_answer").value;
    
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                var output = JSON.parse(xmlhttp.responseText);
                if(output.result === 1) {
                    
                    document.getElementById("popupmodalbody").innerHTML = '<h3 class="text-success">Correct! You got the right answer!</h3><h4>Explanation</h4><p>'+output.explanation+'</p>';
                    $("#popupmodal").modal();
                    $("#submitButton").button('reset');
                    document.getElementById("levelno").innerHTML = "<strong>LEVEL "+output.level+"</strong>";
                    document.getElementById("nav_level").innerHTML = "Level "+output.level;
                    document.getElementById("madeit").innerHTML = output.passed + " made it!";
                    document.getElementById("htmlquestion").innerHTML = output.newquestion;
                    document.getElementById("user_answer").value = '';
                    document.getElementById("submitButton").setAttribute("onclick","postAnswer();");
                    
                }else if(output.result === 2) {
                    document.getElementById("popupmodalbody").innerHTML = '<h3 class="text-success">Correct! You got the right answer!</h3><h4>Explanation</h4><p>'+output.explanation+'</p>';
                    $("#popupmodal").modal();
                    $("#submitButton").button('reset');
                    document.getElementById("htmlquestion").innerHTML = '<div class="row"><div class="well"><h1 align="center">Congratulations!<h1><h3 align="center">You have completed the Treasure Hunt!</h3><br><div class="col-md-2"></div><div class="col-md-8"><img class="img img-responsive img-thumbnail" src="http://rack.1.mshcdn.com/media/ZgkyMDEzLzA4LzA1L2NkL2ZhaXJseW9kZHBhLmM2MTVjLmdpZgpwCXRodW1iCTg1MHg1OTA-CmUJanBn/cd76b13a/5d7/fairly-odd-parents.jpg"/></div><div class="col-md-2"></div></div></div>';
                    document.getElementById("nav_level").innerHTML = 'Completed';
                    document.getElementById("madeit").innerHTML = output.passed + " made it!";
                    document.getElementById("levelno").innerHTML = 'Completed';
                    document.getElementById("controls").innerHTML = '';
                }
                else {
                    
                    document.getElementById("popupmodalbody").innerHTML = '<h3 class="text-danger">Oops!'+output.reply+'</h3>';
                    $("#popupmodal").modal();
                    $("#submitButton").button('reset');
                }
            }
      }
     xmlhttp.open("GET","class/operator.php?a="+escape(answer),true);
     xmlhttp.send();
    
}
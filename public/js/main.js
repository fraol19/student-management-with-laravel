$(document).ready(function(){
  $("#studForm input[name=bus]").click(function() {
  	var x = $("#modalViewer");
    if($(this).val() == "1"){
      x.removeClass('hide');
      $("#studForm input[name=bgFname]").attr("required",true);
      $("#studForm input[name=bgMname]").attr("required",true);
      $("#studForm input[name=bgLname]").attr("required",true);
      $("#studForm input[name=bkebele]").attr("required",true);
    }
    else{
      x.addClass('hide');
      $("#studForm input[name=bgFname]").removeAttr("required");
      $("#studForm input[name=bgMname]").removeAttr("required");
      $("#studForm input[name=bgLname]").removeAttr("required");
      $("#studForm input[name=bkebele]").removeAttr("required");
    }	
  });
  
  $("#studForm button[type=reset]").click(function() {
    $("#modalViewer").addClass('hide');
    $("#modalViewer2").addClass('hide');
  });

  $("#studForm input[name=nschool]").click(function() {
    var x = $("#modalViewer2");
    if($(this).val() == "1"){
      x.removeClass('hide');
      $("#studForm input[name=school]").attr("required",true);
      $("#studForm input[name=preclass]").attr("required",true);
      $("#studForm input[name=gpa]").attr("required",true);
      $("#studForm input[name=behave]").attr("required",true);
    }
    else{
      x.addClass('hide');
      $("#studForm input[name=school]").removeAttr("required");
      $("#studForm input[name=preclass]").removeAttr("required");
      $("#studForm input[name=gpa]").removeAttr("required");
      $("#studForm input[name=behave]").removeAttr("required");
    } 
  });
  
  

});



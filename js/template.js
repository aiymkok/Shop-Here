//____________GLOBAL________________

$(document).ready(function() {


	/////////////////////// MAIN PAGE   \\\\\\\\\\\\\\\\\\\
	$('#left_button').mouseover(function()
	{
		$("#left_back").stop().fadeIn(500);
	});
	$('#left_button').mouseout(function()
	{
		$("#left_back").stop().fadeOut(500);
	});

	$('#right_button').mouseover(function()
	{
		$("#right_back").stop().fadeIn(500);
	});
	$('#right_button').mouseout(function()
	{
		$("#right_back").stop().fadeOut(500);
	});

	////////  Help for inputs \\\\\\\\\\
	$("#firstName").focus(function(){$("#firstNameHelp").slideDown(500);}).blur(function(){$("#firstNameHelp").slideUp(500);});
	$("#lastName").focus(function(){$("#lastNameHelp").slideDown(500);}).blur(function(){$("#lastNameHelp").slideUp(500);});
	$("#title").focus(function(){$("#titleHelp").slideDown(500);}).blur(function(){$("#titleHelp").slideUp(500);});
	$("#phone").focus(function(){$("#phoneHelp").slideDown(500);}).blur(function(){$("#phoneHelp").slideUp(500);});
	////////////\\\\\\\\\\\\\\\\\\
	

	$("#registerNewEmployee").on('click', function() {
		clearEmployeesContainers();
   		$("#registerForm").fadeIn(1500);
   	});

   	$("#ListEmployee").on('click', function() {
   		clearEmployeesContainers();
   		$("#employeeList").fadeIn(1500);
   	});
   	$("#editEmployee").on('click', function() {
   		clearEmployeesContainers();
   		$("#editEmployeeData").fadeIn(1500);
   	});

      $("#find").on('click', function() {
         clearEmployeesContainers();
         $("#theBestEmployee").fadeIn(1500);
      });

   	$("#issueOrder").on('click', function() {
   		$("#issueOrderTable").fadeIn(1500);
   	});


    $("#transactionButton").on('click', function() {
   		document.getElementById("transactionList").style.display="none";
   		$("#transaction").fadeIn(1500);
   	});
   	$("#allTransaction").on('click', function() {
   		document.getElementById("transaction").style.display="none";
   		$("#transactionList").fadeIn(1500);
   	});
   	
   	function clearEmployeesContainers(){
   		document.getElementById("registerForm").style.display="none";
   		document.getElementById("employeeList").style.display="none";
   		document.getElementById("editEmployeeData").style.display="none";
   		
   	}
  });
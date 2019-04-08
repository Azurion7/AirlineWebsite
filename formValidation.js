function validateForm() {
  var x = document.forms["login"]["username"].value;
  if (x == "") {
    alert("username must be filled out");
    return false;
   }
  if (document.forms["login"]["psw"].value == "") {
  	alert("password empty!");
  	return false;
  }
  //passConfirm();
} 



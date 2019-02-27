function validateForm() {
  var x = document.forms["login"]["uname"].value;
  if (x == "") {
    alert("username must be filled out");
    return false;
   }
  if (document.forms["login"]["psw"].value == "") {
  	alert("password empty!");
  	return false;
  }
  passConfirm();
} 

function passConfirm() {
	var txt;
  var person = prompt("Please enter your password again:");
  person.setAttribute("type","password");
  var pass = document.forms["login"]["psw"].value;
  if (person != pass || person == "") {
    alert("Wrong password");
    return false;
  } else {
    confirm("password confirmed");
  }
  document.getElementById("demo").innerHTML = txt;

}


       
function login() {
     var username = document.getElementById("adminUsername").value;
     var password = document.getElementById("adminPassword").value;

     
     var hardcodedUsername = "admin";
     var hardcodedPassword = "password";

     if (username === hardcodedUsername && password === hardcodedPassword) {
         alert("Login successful!");
         
         window.location.href = "admindashboard.php";
     } else {
         alert("Invalid username or password.");
     }
 }

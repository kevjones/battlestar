<?php

require('db.php');

// Create the variables, while encrypting the password and
// preventing SQL injection
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);
	$pw = md5($password);
$email = mysql_real_escape_string($_POST["email"]);
$paypal = mysql_real_escape_string($_POST["paypal"]);

//Check to see if the username is already taken
$query = "SELECT * FROM clients";
$result = mysql_query($query) or die(mysql_error()); // Get an array with the clients
while($row = mysql_fetch_array($result)){ // For each instance, check the username
	if($row['username'] == $username){
		$usernameTaken = true;
	}else{$usernameTaken = false;}
}

// If the username is invalid, tell the user.
// Or else if the password is invalid, tell the user.
// Or else if the email or PayPal address is invalid, tell the user.
// Else, if everything is ok, insert the data into the database and tell
   // the user they’ve successfully signed up.

if($usernameTaken)
{
	echo "That username has been taken.";
}

else if(!preg_match('/^[a-zA-Z0-9]+$/', $username)) // If our username is invalid
{
     echo "The username can only contain letters or numbers."; // Tell the user
}

else if(!preg_match('/^[a-zA-Z0-9]+$/', $password)) // If our password is invalid
{
     echo "The password can only contain letters or numbers."; // Tell the user
}
// If our email or PayPal addresses are invalid
else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $email))
{
     echo "The email or PayPal address you entered is invalid."; // Tell the user
}
else{

// Inserts the data into the database
$result= MYSQL_QUERY(
		 "INSERT INTO clients (client_ID, username, password, email, paypal)".
		 "VALUES ('', '$username', '$pw', '$email', '$paypal')"
		 );
echo "Thank you for signing up.";

}

?>
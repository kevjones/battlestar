<?php

// Require the file that connect to the database.
// It is good practice to put the database connection
// information in a separate file.
require('db.php');

// Since we used the post method in our form, we can
// securely call our data using the $_POST predefined
// variable, with parameters specified by the name
// attribute in our form.
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string(md5($_POST["password"]));
$email = mysql_real_escape_string($_POST["email"]);
$FirstName = mysql_real_escape_string($_POST["FirstName"]);
$LastName = mysql_real_escape_string($_POST["LastName"]);

// If the username is invalid, tell the user.
// Or else if the password is invalid, tell the user.
// Or else if the email or PayPal address is invalid, tell the user.
// Else, if everything is ok, insert the data into the database and tell
 // the user they’ve successfully signed up.

if(!preg_match('/^[a-zA-Z0-9]+$/', $username)) // If our username is invalid
{
     return "The username can only contain letters or numbers."; // Tell the user
}

else if(!preg_match('/^[a-zA-Z0-9]+$/', $password)) // If our password is invalid
{
     return "The password can only contain letters or numbers."; // Tell the user
}
// If our email or PayPal addresses are invalid
else if(!preg_match("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $email))
{
     return "The email address you entered is invalid."; // Tell the user
}
else if(!preg_match('/^a-zA-Z', $FirstName)) // If our name is invalid
{
     return "Your name can only contain letters."; // Tell the user
}
else{

// Finally, we use a MYSQL_QUERY to insert our information
// into the database. INSERT INTO defines what fields we want
// to insert information, and VALUES defines the values that
// we are entering.
$result= MYSQL_QUERY(
		 "INSERT INTO clients (client_ID, username, password, email, paypal)".
		 "VALUES ('', '$username', '$pw', '$email', '$FirstName', '$LastName')"
		 );
echo "Thank you for signing up.";

}

?>
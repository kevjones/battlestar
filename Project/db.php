<?php

// Replace these parameters with your own database information.
// I'm running on my own server, so my username is automatically
// root and I have no password. This will be different on a server.
$conn = mysql_connect("localhost","root","");

// mysql_select_db is a predefined function in MySQL
// It let's us call the database, so we can save it
// in our variable $db
$db = mysql_select_db("share");

// When a file contains only PHP, it is a good practice
// to not end the file with "?>"
<?php
// code for inserting the email from the form (index.html)
// into to the db

//get data from the form
$email= $_POST['email'];

if (!empty($email)){
    // db credentials
    $host = "";
	$dbUsername = "";
	$dbPassword = "";
	$dbName = "";

	//conection to db
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // making it sql inject save
	$save_email = mysqli_real_escape_string($conn, $email);

    // checking for connection error
	if (mysqli_connect_error()){
        // throw error
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else{
        // inserting the line into to the tabel
		$sql = "INSERT INTO mail (mail) VALUES('$save_email');";
		mysqli_query($conn, $sql);
	}
}


//redirect - going back to the index.html because php is wierd
header("Location:../index.html");
?>
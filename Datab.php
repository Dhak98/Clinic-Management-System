<?php

session_start();

$name = "";
$age = "";
$illness = "";
$address = "";
$mobileno = "";
$date = "";
$time = "";

$errors = array();

//connection to db
$db = mysqli_connect('localhost','root','','rpmpatient') or die("Could not connect with database");

// Entring patient

$name = mysqli_real_escape_string($db,$_POST['name']);
$age = mysqli_real_escape_string($db,$_POST['age']);
$illness = mysqli_real_escape_string($db,$_POST['illness']);
$address = mysqli_real_escape_string($db,$_POST['address']);
$mobileno = mysqli_real_escape_string($db,$_POST['mobileno']);
$date = mysqli_real_escape_string($db,$_POST['date']);
$time = mysqli_real_escape_string($db,$_POST['time']);

/*if (empty($name)) {
	array_push($errors,"Name is required")
};
if (empty($illness) {
	array_push($errors,"illness is required")
};
if (empty($mobileno) {
	array_push($errors,"mobileno is required")
};*/



$query = "INSERT INTO rpmpatient (name, age, illness, address, mobileno, date(d-m-Y), time(h:i:sa)) VALUES ('$name', $age, $illness, $address, $mobileno, $date, $time)";

mysqli_query ($db, $query);
$_SESSION['name'] = $name;
$_SESSION['success'] = "Patient details saved";


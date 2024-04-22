<?php 
 include("conn.php");


extract($_POST);

$selExamineeFullname = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_fullname='$fullname' ");
$selExamineeEmail = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username' ");


if($gender == "0")
{
	$res = array("res" => "noGender");
}
else if($year_level == "0")
{
	$res = array("res" => "noSection");
}
else if($selExamineeFullname->rowCount() > 0)
{
	$res = array("res" => "fullnameExist", "msg" => $fullname);
}
else if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "usernameExist", "msg" => $username);
}
else
{
	$insData = $conn->query("INSERT INTO examinee_tbl(exmne_fullname,exmne_gender,exmne_birthdate,exmne_year_level,exmne_email,exmne_password) VALUES('$nameField','$genderField','$birthdateField','$sectionField','$username','$password')  ");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $username);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>
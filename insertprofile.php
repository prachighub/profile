<?php

$con = mysqli_connect("localhost","dabase","y2tellU");   
mysqli_select_db($con,"profiledb");

$name = $_POST['nmdata'];
$email = $_POST['emaildata'];
$profilepic = $_FILES['profilepic']['name'];             
$contact = $_POST['phdata'];    


mysqli_query($con,"insert into userprofile 
(
name,
email,
profilepic,
contactno,
status,
currentDate,
currentTime
)
values
(
'".$name."',
'".$email."',
'".$profilepic."',
'".$contact."',
1,
curdate(),
curtime()
)
");

?>
<!--<table>
	<tr>
		<th>Name:</th>
		<th>Email:</th>
		<th>Profile Pic:</th>
		<th>Contact No:</th>
	</tr>
	<tr>
		<td><?php //echo $name; ?></td>
		<td><?php //echo $email; ?></td>
		<td><?php //echo $profilepic; ?></td>
		<td><?php //echo $contact; ?></td>
	</tr>
</table>-->
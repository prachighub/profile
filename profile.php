<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery-1.12.0.min.js"></script>
<script>
function submitForm() {

	var name = $('#nmdata').val();
	var email = $('#emaildata').val();
	
	var name_regex = /^[a-zA-Z]+$/;
	var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
	// To Check Empty Form Fields.
	if (name.length == 0) {
		$('#head').text("* All fields are mandatory *"); // This Segment Displays The Validation Rule For All Fields
		$("#nmdata").focus();
		return false;
	} else if (!name.match(name_regex) || name.length == 0) {
		$('#p1').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
		$("#name").focus();
		return false;
	} else if (!email.match(email_regex) || email.length == 0) {
		$('#p2').text("* Please enter a valid email address *"); // This Segment Displays The Validation Rule For Email
		$("#email").focus();
		return false;
	} else{
            
		  var form_data = new FormData(document.getElementById("profform"));
		  form_data.append("label", "WEBUPLOAD");
		  $.ajax({
			  url: "insertprofile.php",
			  type: "POST",
			  data: form_data,
			  processData: false,  // tell jQuery not to process the data
			  contentType: false   // tell jQuery not to set contentType
		  }).done(function( data ) {
			alert("Data inserted successfully");   
			//$("#displaytable").html(data);
			   
		  });
		  //return false;    
	}
		  
}

</script>
</head>
<body>
<a href = "viewprofile.php">View Profiles</a>
<br/><br/>
<form name="profform" id="profform" enctype="multipart/form-data" method="post" action="#" onsubmit="return submitForm();">  
	<center><font color="red"><p id="head"></p></font></center>   			
    <table width="500" border="0" align="center" cellpadding="5" cellspacing="0">
		 <tr>
            <td align="left" colspan="4" valign="top" bgcolor="#557aa1" style="border-radius: 5px;">   
				<font color="red"><b><center>Profile</center></b></font>
			</td>
         </tr>
		
		 <tr>
			<td align="left" valign="top"><b>Name :</b></td><center><font color="red"><p id="p1"></p></font></center>
			<td align="left" valign="top" width="180px">       
					<input type="text" id="nmdata" name="nmdata" />				
			</td> 
        </tr>
		<tr>
			<td align="left" valign="top"><b>Email :</b></td><center><font color="red"><p id="p2"></p></font></center>
			<td align="left" valign="top" width="180px">       
					<input type="email" id="emaildata" name="emaildata" />
			</td> 
        </tr>
		<tr>
			<td align="left" valign="top"><b>Profile Pic</b></td>      
            <td align="left" valign="top" width="280px">              
					<input type="file" name="profilepic" id="profilepic" />     
			</td>   
        </tr>
		 <tr>
			<td align="left" valign="top"><b>Phone Number :</b></td>
			<td align="left" valign="top" width="180px">       
					<input type="text" id="phdata" name="phdata" />       
			</td> 
        </tr>
		<tr>   
			<td align="left" colspan="4" valign="top" bgcolor="#557aa1" style="border-radius: 5px;">   
				<center><input type="submit" id="submitform" name="submitform" value="Submit" /></center>       
			</td>
		</tr>
	</table> 
</form><br/>   
<center><div id="displaytable" name="displaytable"> </div></center>
</body>
</html>
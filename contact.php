<?php
/* Written by Sofina Pradhan
 * Date: 2015/05/12
 * Usage: show the contact information for all Agencies, as well as all agents under each agencies.
 */
require("header.php");
include("db.php");
//$header_style = ["contact.css"];
          
?>
<link href="contact.css" type="text/css" rel="stylesheet">   

<script>
     var address = "";  
	function changeMousePointer(i)
	{
		document.getElementById("leftcol"+ i).style.cursor = "pointer";
	}
    	 
	function mouseClick(agencyid)
	{ 
	    var newwin;							/*passing agencyid from contact page to contactdetail page*/
		newwin = window.open("contactdetail.php?id='" + agencyid +"'",'','width=870 height=400 menubar=no');   
		newwin.moveTo(300,250);
	}

    function validate()
	{
	     var message = "";
		 var myform = document.getElementById("frmcontact");
	     if (myform.fname.value == "")
		 {
		    
			 message = message + "First name";
			 myform.fname.style.backgroundColor ="#F7BB86";
		  }
		  
		  if (myform.lname.value == "")
		  {
		     if (message != "")
		     {
		    	message = message + ",";
	         }
		      message = message + "Last Name";
			  myform.lname.style.backgroundColor ="#F7BB86";
		  }
		  
		  if (myform.email.value == "")
		  {
		     if ( message != "")
			 {
			    message = message +",";
			 }
			 message = message + "Email Address";
			 myform.email.style.backgroundColor ="#F7BB86";
		   }
		   
		   if (myform.comments.value == "")
		   {
		      if (message != "")
			 {
			    message = message +",";
			 }
			 message = message + "Comments";
			 myform.comments.style.backgroundColor ="#F7BB86";
		   }
		   
		   if (message == "")
		   {
		      return true;
		   }
		   else
		   {
				message = message + " must not be blank!";
				document.getElementById("error").innerHTML = message;
				document.getElementById("error").style.color = "red";
				return false;
		   }  	
	}
</script>



 

<!-- <style>
     p 
	 {
	    color:black;
	 }
	 
	.imgfeildset
	{
		position:absolute;
		top:0%;
		height:100%;
		width:40%;
		overflow-y:visible;
		overflow-x:hidden;
		border:0px solid black;
		visibility:visible;
		padding:20px;
		left:2px;
		
	}

	.emailfeildset
	{
		position:absolute;
		left:43.5%;
		top:0%;
		width:44%;
		border:1px solid black;
		visibility:visible;
		padding:10px;
	}
	
		
	
	.label
	{
		padding: 5px;
		margin-right: 10px;
		text-align: left;
		width: 10%;
		display: inline-table;
	} 
</style> -->


<!DOCTYPE Html>


<html>
   <head>
       
   </head>

<body>
<main> 
	<div class="imgfeildset">
		<h3><center>Agencies Contact Information:</center></h3><br/>
		<?php
		$query = "select * from Agencies";
		$result = mysqli_query($con, $query) or die (" SQL query error");
		$i=0;
		while ($row = mysqli_fetch_assoc($result))
		{
			echo " <table>";
			echo "<tr><td width=200 >";
			
			$mainaddress = "";
			$mainaddress  = "Address:$row[AgncyAddress]<br />";
			$mainaddress .= "$row[AgncyCity] \n";
			$mainaddress .= "$row[AgncyProv] <br />";
			$mainaddress .= "$row[AgncyPostal] \n";
			$mainaddress .= "$row[AgncyCountry] <br />";
			$mainaddress .= "Phone No: .$row[AgncyPhone] <br />";
			$mainaddress .= "Fax No: .$row[AgncyFax] <br />";
			echo "<p id='leftcol$i' onmouseover='changeMousePointer($i)' onClick='mouseClick($row[AgencyId])'>";
     		echo "$mainaddress";
			
			/*echo "Address: ".$row["AgncyAddress"]."<br />";
			echo $row["AgncyCity"].","."\n";
			echo $row["AgncyProv"]."<br />";
			echo $row["AgncyPostal"].","."\n";
			echo $row["AgncyCountry"]."<br />";
			echo "Phone No: ".$row["AgncyPhone"]."<br />";
			echo "Fax No: ".$row["AgncyFax"]."<br />"; */
			
			echo "</p>";
			//echo "</td></tr>";
			$outimage = "<iframe width='369' height='150' frameborder='1' scrolling='no' marginheight='0' marginwidth='0' src='";
			$outimage .= $row["Map"];
			$outimage .= "'></iframe>";
			print("$outimage <br />");
			echo "<hr>";
			echo "</td></tr>";
			echo "<tr height=8></tr>";
			$i = $i + 1;
			echo "</table>";
		}
		mysqli_close($con);
		?>
		
	</div>
	
	
	<div class="emailfeildset"> 
	      <p><h3>If you have any questions, please call us or submit your contact information.</h3></p> 
		  
		  
		  <p id="error"></p>
		  <form id="frmcontact" method="post" action="sent.php">
		        <table cellpadding="3" cellspacing="0" border="0" width="98%" align="left">
			        <tr>
				       <td class="tblleftcol"><label for="fname">Your First Name:</td>
					   <td class="tblrightcol"><input tabindex=1 type="text" name="fname" size=40></td>
				    </tr>
				    <tr>
				      <td class="tblleftcol"><label for="lname">Your Last Name:</label></td>
					  <td class="tblrightcol"><input tabindex=2 type="text" name="lname" size=40></td>
				    </tr>
				    <tr>
				       <td class="tblleftcol"><label for="email">Your Email Address:</label></td>
					   <td class="tblrightcol"><input tabindex=3 type="email" name="email" size=40></td>
				    </tr>
				    <tr>
				       <td class="tblleftcol"><label for="phoneno">Phone Number:</label></td> 
					   <td align="left"><input type="number" tabindex=4 maxlength=40 size=40 name="phoneno"></td>   <!-- --- <input type="number" tabindex=5 tabindex=5 maxlength=3 size=3 name="tel1" value="">-<input type="number" tabindex=6 maxlength=4 size=4 name="tel2" value=""></td> -->
				    </tr>
				    <tr>
				       <td class="tblleftcol"><label for="comments">Comments:</label></td>
					   <td class="tblrightcol"><textarea tabindex=7 name="comments" rows="4" cols="40"></textarea></td>
				    </tr>
			   	    <tr>
				       <td></td><td ><input tabindex=8 type="submit" value="Submit" class="btn btn-default" onclick="return validate()">
				        <input tabindex=9 type="reset" value="Reset" class="btn btn-default" class="tblrightcol"></td>
				    </tr>
			    </table>
		  </form>
		 
		  
	</div>


</main> 

</body>

</html>

<?php
require ("footer.php");
?>

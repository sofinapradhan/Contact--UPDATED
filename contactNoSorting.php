<script>
    function changeColorOn(i)
	{
	 
	  document.getElementById("h"+i).style.color="red";
	  document.getElementById("h"+i).style.cursor="pointer";
	
	}

    function changeColorOut(i)
	{
	  document.getElementById("h"+i).style.color="#220CED";
	}
	
	function sortBy(heading)
	{
	
	}

</script>



<?php
   
   include("db.php");
   //include("header.php");
   
   $agentid =$_GET['id'];
   
   
   $query = "select * from Agencies where Agencyid = $agentid ";
   $result = mysqli_query($con, $query) or die (" SQL query error");
   while ($row = mysqli_fetch_assoc($result))
   {
        $mainaddress = "";
		$mainaddress  = "<p><h4>Address: $row[AgncyAddress]<br />";
		$mainaddress .= "$row[AgncyCity] \n";
		$mainaddress .= "$row[AgncyProv] <br />";
		$mainaddress .= "$row[AgncyPostal] \n";
		$mainaddress .= "$row[AgncyCountry] <br />";
		$mainaddress .= "Phone No: .$row[AgncyPhone] <br />";
		$mainaddress .= "Fax No: .$row[AgncyFax] <br /></h></p>";
		print($mainaddress);
   }
   
	
   $sql = "select AgtFirstName,AgtMiddleInitial,AgtLastName,AgtBusPhone,AgtEmail,AgtPosition from agents where Agencyid = $agentid order by AgtFirstName";
   $result = mysqli_query($con, $sql) or die("SQL Error");
   $rowcount = mysqli_num_rows($result);
   if ($rowcount > 0 )
   { 
       $datatable = "<table border='1' cellpadding='5 cellspacing='0'>";
	   $datatable .= "<thead>
	                     <tr>
						    <th class='tableheader' onmouseover='changeColorOn(1)' onmouseout='changeColorOut(1)'><p id='h1'>First Name</p></th>
							<th class='tableheader'>Middle Name</th>
							<th class='tableheader'>Last Name</th>
							<th class='tableheader'>Business Phone Number</th>
							<th class='tableheader'>Email Address</th>
							<th class='tableheader'>Position</th>
						 </tr>
					   </thead>";	 
	   
	   while($row = mysqli_fetch_row($result))
	   {
		  $datatable .= "<tr>";
		  foreach ($row as $col)
		  {
			 $datatable .= "<td>$col</td>";
		  }
		  $datatable .= "</tr>";
	   }
	   $datatable .= "</table>";
	}  
   mysqli_close($con);
   
?>



	  
<!DOCTYPE html>

<style>
	.tableheader
      { 
	   color: #220CED;
	   background-color:#d6ba65
	  }
     
	 h4
	 {
	   color: #220CED;
	 
	 }
	 
	
	
</style>

<html>
	
    
	<head>
		<title>Agents Information</title>
		<!-- <link href="global.css" type="text/css" rel="stylesheet">  -->
	</head>

	<body bgcolor=#FACFAA> 
	<!--<button type="button" size="10">Sort by First Name</button>
	<button type="button" size="10">Sort by First Name</button>
	<button type="button" size="10">Sort by First Name</button> -->
	
	<?php
	   if ($rowcount > 0 )
       {
	     
		  print($datatable);
       }
      else
       {
         print ("No record found!");
       }
    ?>
	
</body>
	
</html> 
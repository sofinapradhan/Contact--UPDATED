
 <?php  
 include("db.php");
 
// $sortby = "";
  //var $sortyby;
  
   function showagent($sortby)
 {
      if ($sortby == "")
	  {
         $sql = "select AgtFirstName,AgtMiddleInitial,AgtLastName,AgtBusPhone,AgtEmail,AgtPosition from agents order by AgtFirstName";
	  }
      else
      {
          $sql = "select AgtFirstName,AgtMiddleInitial,AgtLastName,AgtBusPhone,AgtEmail,AgtPosition from agents order by $sortby";
      }   
	   mysqli_query($con, $sql) or die("SQL Error");
}
?> 
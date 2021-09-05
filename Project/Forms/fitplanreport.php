<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/tableStylesheet.css">
    <title>Website Design Using Bootstrap</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		h1 {
            color: white;
            font: center;
            padding: 20px;
        }
	</style>
</head>

<body>
	<div class="forms" id="forms">
		<h1 class="title">Report</h1>
	</div>

	<?php  // creating a database connection 

	   $db_sid = 
	   "(DESCRIPTION =
		(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.10.27)(PORT = 1521))
		(CONNECT_DATA =
		  (SERVER = DEDICATED)
		  (SERVICE_NAME = hunaid)
		)
	  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
	  
		$db_user = "scott";   // Oracle username e.g "scott"
		$db_pass = "1234";    // Password for user e.g "1234"
		$con = oci_connect($db_user,$db_pass,$db_sid); 
		if($con){
			if(isset($_POST['submit'])){
				$memid = $_POST["memid"];
				
				$query = "SELECT * FROM Member WHERE MemberID=$memid";
				$query_id = oci_parse($con, $query); 		
				$r = oci_execute($query_id);
				$row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
				$currfit = $row['CURRENTFITNESS'];
				$fitgoal = $row['FITNESSGOAL']; 

				$query = "SELECT * from FitnessPlan WHERE CurrentFitness='$currfit' and FitnessGoal='$fitgoal'";
				$query_id = oci_parse($con, $query); 		
				$r = oci_execute($query_id);
				
				echo "<table>";	
				echo "<tr><th>Calorie Intake</th><th>Suggested Foods</th><th>Nutritional Details</th></tr>";
				while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					echo "<tr><td>" .$row['CALORIEINTAKE']."</td><td>".$row['SUGGESTEDFOODS']."</td><td>".$row['NUTRITIONALDETAILS']."</td></tr>"; 
				}	
				echo "</table>"; 
		
			}
		}
		else {
			die('Could not connect to Oracle: ');
		}
		 
	?>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style1.css">
    <title>Website Design Using Bootstrap</title>
</head>

<body>

    <!-- This Section Utilize Boothstrap for the NavBar Design -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="../../index.html" class="navbar-brand ml-3 mr-5">
            <img src="../images/logo2.png" height="55" alt="fitMe">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  py-2 px-5 mr-auto">
                <li class="nav-item active mr-3">
                    <a class="nav-link" href="../../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link active" href="">Workout Plan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="image set-bg" style="background-image: url('../images/form3.jpg');">
        <form action="workoutplan.php" method="post">
            <div class="Member" id="Member">
                <h1 class="title">Workout Plan</h1>
                <div class="form"></div>
                <div class="form_input">
                    <input type="number" name="memid" required min="1" placeholder="Member ID">
                </div>

                <div class="form_input">
                    <input type="number" name="worktime" required min="1" placeholder="Work Out Time (Minutes)">
                </div>

                <div class="form_input">
                    <input type="number" name="workdays" required min="1" placeholder="Workout Days">
                </div>

                <div class="form_input">
                    <input type="text" name="tmg" required placeholder="Targetted Muscle Groups">
                </div>

                <div class="form_input">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

    <div class="footer">
        <a href="#">@ Database Project</a>
    </div>
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
		
		if (isset($_POST['submit'])) {
			if ($con) {
				$memid = $_POST["memid"];
				$worktime = $_POST["worktime"];
				$workdays = $_POST["workdays"];
				$tmg = $_POST["tmg"];

				$query = "INSERT INTO WorkoutPlan(WorkoutTime,WorkoutDays,TargettedMuscleGroups) values($worktime,$workdays,'$tmg')";
				$query_id = oci_parse($con, $query);
				$r = oci_execute($query_id);

				$query = "UPDATE Member SET PlanID=seq_workout.currval WHERE MemberID=$memid";
				$query_id = oci_parse($con, $query);
				$r = oci_execute($query_id);
				if ($r) {
					echo ("<script LANGUAGE='JavaScript'>
					window.alert('Workout plan Added Sucessfully');
					window.location.href='../../index.html';
					</script>");
					exit();
				} else {
					echo ("Error in Query");
				}
			} 
			else {
				die('Could not connect to Oracle: ');
			}
		}
		 
	?>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style2.css">
    <title>Website Design Using Bootstrap</title>
</head>

<body>

    <!-- This Section Utilize Boothstrap for the NavBar Design -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand ml-3 mr-5">
            <img src="../images/logo2.png" height="55" alt="fitMe">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  py-2 px-5 mr-auto">
                <li class="nav-item active mr-3">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link active" href="#Member">Member</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="image set-bg" style="background-image: url('../images/form1.jpg');">
        <form action="member.php" method="post">
            <div class="Member" id="Member">
                <h1 class="title">Member info form</h1>
                <div class="form"></div>
                <div class="form_input">
                    <input type="text" name="name" placeholder="Name">
                </div>
				
				<div class="form_input">

                    <h5 class="title">Gender</h5>
                    <input type="radio" id="gender" name="gender" value="Female" required>
                    <label for="Female">Female</label>
                    &nbsp
                    <input type="radio" id="gender" name="gender" value="Male" required>
                    <label for="Male">Male</label><br>
                </div>

                <div class="form_input">
                    <input type="date" required name="date" placeholder="Date of Birth">
                </div>

                <div class="form_input">
                    <input type="number" name="weight" required min="1" placeholder="Weight(kg)">
                </div>

                <div class="form_input">
                    <input type="number" name="height" min="1" required placeholder="Height(cm)">
                </div>

                <div class="form_input">
                    <input type="number" name="plan" min="101" required placeholder="Workout Plan">
                </div>
				
				<div class="form_input">
                    <!-- <input type="text" name="fitgoal" placeholder="Fitness Goal">  -->
					
					<h5 class="title">Fitness Goal</h5>
				   <input type="radio" id="fitgoal" name="fitgoal" required value="Muscle Gain">
				   <label for="Muscle Gain">Muscle Gain</label>
				   &nbsp
				   <input type="radio" id="fitgoal" name="fitgoal" required value="Weight Lose">
				   <label for="Weight Lose">Weight Lose</label>
				   &nbsp
				   <input type="radio" id="fitgoal" name="fitgoal" required value="Get Fit">
				   <label for="Get Fit">Get Fit</label><br>
                </div>
				
				<div class="form_input">
                    <!-- <input type="text" name="currgoal" placeholder="Current Fitness"> -->
					<h5 class="title">Current Fitness</h5>
				   <input type="radio" id="currgoal" name="currgoal" required value="Worst">
				   <label for="Worst">Worst</label>
				   &nbsp
				   <input type="radio" id="currgoal" name="currgoal" required value="Bad">
				   <label for="Bad">Bad</label>
				   &nbsp
				   <input type="radio" id="currgoal" name="currgoal" required value="Good">
				   <label for="Good">Good</label><br>
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
		$con = oci_connect($db_user,$db_pass,$db_sid); 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['submit'])) {
				if ($con) {
					$name = $_POST["name"];
					$gender = $_POST["gender"];
					$dob = $_POST["date"];
					$weight = $_POST["weight"];
					$height = $_POST["height"];
					$plan = $_POST["plan"];
					$fitgoal = $_POST["fitgoal"];
					$currgoal = $_POST["currgoal"];
					$newdate = date('d-M-y', strtotime($dob));

					$query = "INSERT INTO Member(PlanID,Name,Gender,DateOfBirth,FitnessGoal,CurrentFitness,Weight,Height) values($plan,'$name','$gender','$newdate','$fitgoal','$currgoal',$weight,$height)";
					$query_id = oci_parse($con, $query);
					$r = oci_execute($query_id);
					if ($r) {
						echo ("<script LANGUAGE='JavaScript'>
							window.alert('Member Registered Successfully');
							window.location.href='../../index.html';
							</script>");
						exit();
					}
				} 
				else {
					die('Could not connect to Oracle: ');
				}
			}
		}
		 
	?>

</body>

</html>
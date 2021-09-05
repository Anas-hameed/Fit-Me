<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style1.css">
    <title>Website Design Using Bootstrap</title>
	<style>
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
	</style>
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
        <form action="exerfitreport.php" method="post">
            <div class="Member" id="Member">
                <h1 class="title">Exercises Based on Fitness Goal</h1>
                <div class="form"></div>
				
				<div class="form_input">					
					<h5 class="title">Fitness Goal</h5>
				   <input type="radio" id="fitgoal" name="fitgoal" value="Muscle Gain">
				   <label for="Muscle Gain">Muscle Gain</label>
				   &nbsp
				   <input type="radio" id="fitgoal" name="fitgoal" value="Weight Lose">
				   <label for="Weight Lose">Weight Lose</label>
				   &nbsp
				   <input type="radio" id="fitgoal" name="fitgoal" value="Get Fit">
				   <label for="Get Fit">Get Fit</label><br>
                </div>				

                <div class="form_input">
                    <a href="exerfitreport.php">
                    <input type="submit" name="submit" value="Search">
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="footer">
        <a href="#">@ Database Project</a>
    </div>
    </div>

	

</body>

</html>
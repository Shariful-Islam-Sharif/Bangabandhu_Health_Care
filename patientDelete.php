<?php
	session_start();
	if(!isset($_SESSION['adminName']))
	{
		header("Location:adminLogin.php");
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bhc";
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//Resistration
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	    $admitID = $_POST['admitID'];
   
        $sql = " DELETE FROM `bill` WHERE admitID='$admitID' ;";
        $sql2 = " DELETE FROM `admit` WHERE admitID='$admitID' ;";

		if ($conn->query($sql) === TRUE) {
			if ($conn->query($sql2) === TRUE) {
				echo "Patient Released successfully";
			}
		} else {
		    //echo "Error: " . $sql . "<br>" . $conn->error;
		    //echo "Invalid Info";
		}
    }

    $conn->close();
    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Release Patient | BANGABANDHU HEALTH CARE</title>
	<link rel="stylesheet" href="css/patientDelete.css">
	<link rel="shortcut icon" href="images/adminicon5.JPG">
</head>
<body>
	<!-- ------------------------------------------------------------------------------------- -->
		<!-- Add Patient Icon -->
		<div class="iconToHover">
			<a href="patientManagement.php"><img class="api" src="images/adddoctoricon.png" alt="Add Patient Icon"></a>
			<span class="hoverText">REGISTER PATIENT</span>
		</div>
		<!-- Admit Patient Icon -->
		<div class="iconToHover">
			<a href="admitPatient.php"><img class="admitPatientIcon" src="images/admiticon.jpg" alt="Add Patient Icon"></a>
			<span class="hoverText">ADMIT PATIENT</span>
		</div>
		<!-- Delete Patient Icon -->
		<div class="iconToHover">
			<a href="patientDelete.php"><img class="dpi" src="images/deletedoctoricon.png" alt="Delete Patient Icon"></a>
			<span class="hoverText">RELEASE PATIENT</span>
		</div>
		<!-- Update Patient Icon -->
		<div class="iconToHover">
			<a href="patientModify.php"><img class="upi" src="images/updatedoctoricon.png" alt="Update Patient Icon"></a>
			<span class="hoverText">MODIFY PATIENT</span>
		</div>
		<!-- View Patient Icon -->
		<div class="iconToHover">
			<a href="patientViewA.php"><img class="vpi" src="images/viewicon.png" alt="View Patient Icon"></a>
			<span class="hoverText">VIEW PATIENT</span>
		</div>
		<!-- Search Patient Icon -->
		<div class="iconToHover">
			<a href="patientFind.php"><img class="spi" src="images/searchicon.png" alt="Search Patient Icon"></a>
			<span class="hoverText">SEARCH PATIENT</span>
		</div>
		<!-- ---------------------------------------------------------------------------- -->

		<div class="register">
			<!-- Greeting -->
			<h2>RELEASE PATIENT</h2><br>
			<!-- Form -->
			<form class="form" action="" method="post">
			  <!-- Admit Name -->
			  <label for="admitID">User Name:</label>
			  <input class="formBox" type="text" id="admitID" name="admitID" placeholder=" Enter Admit ID" required><br><br>
			
			 <input style="background-color:white;" type="submit" value="RELEASE" name="resistration">
			</form>
		</div>

		<!-- Back -->
		<div>
			<a href="adminPanel.php"><img class="back" src="images/backicon.png" alt="Back Icon"></a>
		</div>
</body>
</html>
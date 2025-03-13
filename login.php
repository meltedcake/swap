
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "swap project";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
	die("connection error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];

	// using parameterized queries to prevent sql injection
    $stmt = mysqli_prepare($data, "SELECT * FROM users WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    if ($row) {
        if ($row["Role"] == "HR Manager") {
            // if user is manager, will log into manager homepage 
            $_SESSION["email"] = $email;
            header("location: home_hr.php");
        } elseif ($row["Role"] == "Employee") {
            // if user is employee, will log into employee homepage
            $_SESSION["email"] = $email;
            header("location: home_employee.php");
        }
    } else {
        ?>
		<div class="alert alert-danger" role="alert">Incorrect email or password
    </div>
    <?php
    }

    mysqli_stmt_close($stmt);
    mysqli_close($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title> login </title>
</head>

<body>
	<div class="header">
		<h1>TP AMC</h1>
		<button class="login-btn"><i class="fa fa-user"></i> Guest </button>
	</div>

	<!-- navigation bar -->
	<nav class="navbar justify-content-center">
		<a class="nav px-5" href="home_hr.php"> <img src="img/home.jpg" alt="Home"></a>
		<ul class="nav">
			<a class="nav-link px-5" href="">View Employee Records</a>
			<a class="nav-link px-5" href="#">Accept/Deny Leave</a>
			<a class="nav-link px-5" href="#">View Consultations</a>
		</ul>
	</nav>

	<!-- login form -->
	<center>
		<br><br>
		<h3>Login Form</h3>
		<form method="POST">
			<div>
				<label>Email</label>
				<input type="text" name="email" required>
			</div>
			<br><br>
			<div>
				<label>Password</label>
				<input type="password" name="password" required>
			</div>
			<br><br>
			<div>
				<input type="submit" value="Sign In">
			</div>
		</form>
		<br><br>
		</div>
</body>

</html>
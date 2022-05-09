<?php

// Check if the user is already logged in, if yes then redirect him to welcome page
if (!empty($_SESSION["user_id"])) {
    header("location: index.php");
    exit;
}

$username = $password = "";
$usernameError = $passwordError = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $usernameError = "Please enter username";
    } else {
        $username = trim($_POST["username"]);
    }
    
    if (empty(trim($_POST["password"]))) {
        $passwordError = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if (empty($usernameError) && empty($passwordError)) {
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE username = :username";
        
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST["username"]);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            
                            $_SESSION["user_id"] = $id;
                            $_SESSION["login"] = $username;
                            $_SESSION["user_real_name"] = $username;
                            
                            header("location: index.php");
                        } else {
                            $passwordError = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $usernameError = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            
            unset($stmt);
        }
    }
    
    unset($pdo);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap, FontAwesome, Custom Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>

	<title>Login</title>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Header -->
<?php include "assest/header.php" ?>
<!-- </Header> -->

<!-- Main -->
<main class="main">

	<!-- Latest Articles -->
	<div class="section jumbotron mb-0 h-100">
		<!-- container -->
		<div class="container d-flex flex-column justify-content-center align-items-center h-100">

			<div class="wrapper my-0 pt-3 bg-white w-50 text-center">
				<img src="img/logo/logo.png" alt="dev culture logo" style="width: 100px;height: auto;">
			</div>

			<!-- row -->
			<div class="wrapper bg-white rounded px-4 py-4 w-50">

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username"
						       class="form-control <?= (!empty($usernameError)) ? 'is-invalid' : ''; ?>" value="">
						<span class="invalid-feedback"><?= $usernameError; ?></span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password"
						       class="form-control <?= (!empty($passwordError)) ? 'is-invalid' : ''; ?>">
						<span class="invalid-feedback"><?= $passwordError; ?></span>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Login">
					</div>
					<p><a href="#" class="text-muted">Lost your password?</a></p>
				</form>
			</div>

			<!-- /row -->

		</div>
		<!-- /container -->
	</div>


</main><!-- </Main> -->




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</body>

</html>
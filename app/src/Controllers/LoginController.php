<?php
namespace Controllers;

use Models\User;

class LoginController{
    public function __invoke(){

if (!empty($_SESSION["user_id"])) {
    header("location: index.php");
    exit;
}

$username = $password = "";
$usernameError = $passwordError = "";

?>

<!-- Main -->
<main class="main">

	<!-- Latest Articles -->
	<div class="section jumbotron mb-0 h-100">
		<!-- container -->
		<div class="container d-flex flex-column justify-content-center align-items-center h-100">
			
			<!-- row -->
			<div class="wrapper bg-white rounded px-4 py-4 w-50">

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="form-group">
						<label>Benutzername</label>
						<input type="text" name="login"
						       class="form-control <?= (!empty($usernameError)) ? 'is-invalid' : ''; ?>" value="">
						<span class="invalid-feedback"><?= $usernameError; ?></span>
					</div>
					<div class="form-group">
						<label>Passwort</label>
						<input type="password" name="pass"
						       class="form-control <?= (!empty($passwordError)) ? 'is-invalid' : ''; ?>">
						<span class="invalid-feedback"><?= $passwordError; ?></span>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success" value="Login">
					</div>
				</form>
			</div>

			<!-- /row -->

		</div>
		<!-- /container -->
	</div>
</main><!-- </Main> -->

<?php
    }
	
	public function post(){
        if (empty(trim($_POST["login"]))) {
            $loginError = "Please enter login";
        } else {
            $login = trim($_POST["login"]);
        }
        
        if (empty(trim($_POST["pass"]))) {
            $passError = "Please enter your password.";
        } else {
            $password = trim($_POST["pass"]);
        }
        
        // Validate credentials
        if (empty($loginError) && empty($passError)) {
            $user = new User();
			$user->fetch();
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                
                $param_username = trim($_POST["username"]);
                
                if ($stmt->execute()) {
                    if ($stmt->rowCount() == 1) {
                        if ($row = $stmt->fetch()) {
                            $id = $row["id"];
                            $login = $row["username"];
                            $hashedPassword = $row["password"];
                            if (password_verify($password, $hashedPassword)) {
                                session_start();
                                
                                $_SESSION["user_id"] = $id;
                                $_SESSION["login"] = $login;
                                $_SESSION["user_real_name"] = $login;
                                
                                header("location: index.php");
                            } else {
                                $passError = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        $loginError = "No account found with that username.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                
                unset($stmt);
            
        }
        
        unset($pdo);
    }
}
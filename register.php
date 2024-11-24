<?php
session_start();
include('db_connect.php');

if(isset($_POST['register'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $type = 3; // Default to user type (3)
    
    // Check if email already exists
    $check = $conn->query("SELECT * FROM users where email ='$email'")->num_rows;
    if($check > 0){
        $error = "Email already exists";
    }else{
        // Hash password
        $hashed_password = md5($password);
        
        // Insert new user
        $save = $conn->query("INSERT INTO users (firstname, lastname, email, password, type) 
            VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$type')");
            
        if($save){
            $_SESSION['success'] = "Registration successful. Please login.";
            header("Location: login.php");
            exit;
        }else{
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration | Task Management System</title>
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box" style="width: 450px;">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Register</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new account</p>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="login.php">I already have an account</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html> 
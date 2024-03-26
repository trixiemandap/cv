<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Liam | Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
             padding: 0;    
        }

        .banner {
	position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: -1;
        }

        .banner video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:focus {
            box-shadow: none;
        }

        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 3px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>

</head>

<body>
<div class="banner">
		<video autoplay muted loop>
			<source src="img/bf.mp4" type="video/mp4">
		</video>
		
	</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="img/logo3.png" alt="Apple Logo" width="175" height="100">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <h2>Login to Your Account</h2>
            <p class="lead">Welcome back to BLIS!</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>



            <?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect('localhost', 'root', '', 'finals');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Check if the provided email and password match in the 'registration' table
        $checkCredentialsQuery = "SELECT id, name, is_admin FROM registration WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $checkCredentialsQuery);

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            if ($user['is_admin'] == 1) {
                // Admin login
                header("Location: admin.php");
                exit();
            } else {
                // Non-admin login
                header("Location: homepage.php");
                exit();
            }
        } else {
            $error = "Invalid email or password.";
        }

        $conn->close();
    }
}
?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <p>Don't have an account? <a href="register.php">Create an account</a></p>
        </div>
    </div>
</div>

</body>
</html>

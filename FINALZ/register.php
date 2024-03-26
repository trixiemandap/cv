<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Liam | Sign Up</title>
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
        <source src="img/wp.mp4" type="video/mp4">
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
            
            <h2>Create Your Account</h2>
            <p class="lead">Join the exclusive community of iPhone enthusiasts at Boss Liam's Store!</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                </div>
            </form>
            
            <?php
            session_start();
            $error = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Validate form data
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Connect to the database (replace with your database credentials)
                $conn = mysqli_connect('localhost', 'root', '', 'finals');

                if ($conn->connect_error) {
                    die('Connection Failed: ' . $conn->connect_error);
                } else {
                    // Create a new table 'registration' (if it does not exist already)
                    $createTableQuery = "CREATE TABLE IF NOT EXISTS registration (
						id INT AUTO_INCREMENT PRIMARY KEY,
						name VARCHAR(50) NOT NULL,
						email VARCHAR(100) NOT NULL,
						password VARCHAR(100) NOT NULL,
						join_date DATETIME NOT NULL
					)";
                    mysqli_query($conn, $createTableQuery);

                    // Check if the provided email already exists in the table
                    $checkEmailQuery = "SELECT id FROM registration WHERE email = '$email'";
                    $result = mysqli_query($conn, $checkEmailQuery);

                    if (mysqli_num_rows($result) > 0) {
                        $error = "Email address already registered.";
                    } else {

                        // Set the timezone to "Asia/Manila"
                        date_default_timezone_set("Asia/Manila");
                        
                        // Get the current date and time
                        $joinDate = date('Y-m-d H:i:s');

                        // Insert the user data into the 'registration' table
                        $stmt = $conn->prepare("INSERT INTO registration (name, email, password, join_date) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $name, $email, $password, $joinDate);

                        if ($stmt->execute()) {
                            // User registration successful
                            $_SESSION['user_id'] = $stmt->insert_id; // Get the auto-generated user ID
                            $_SESSION['email'] = $email;
                            // Redirect to login page
                            header("Location: login.php");
                            exit();
                        } else {
                            $error = "Error occurred during registration.";
                        }

                        $stmt->close();
                    }

                    $conn->close();
                }
            }
            ?>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </div>
</div>

</body>
</html>

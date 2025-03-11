<?php
    if(isset($_SESSION['userid']))
    {
        echo "<script>
            window.location='index';
        </script>";
    }
    include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="IT Knowledge Hub - Your Gateway to a Career in IT">
    <title>IT Knowledge Hub</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .login-section {
        background: url('signup_page.jpeg') no-repeat center center/cover; /* Add your background image */
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: white;
        text-align: center;
    }

    .login-overlay {
        background: rgba(0, 0, 0, 0.6); /* Dark overlay */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .login-container {

        /*padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        z-index: 2; /* Ensure it appears above the overlay //
        width: 100%;
        max-width: 500px;
    }

    .login-container h2 {
        color: #343a40;
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #495057;
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
    }

    .submit-btn {
        background-color: #495057;
        color: #fff;
        width: 100%;
        margin-top: 15px;
    }

    .submit-btn:hover {
        background-color: #343a40;
    }
</style>

   
</head>

<body>
     <!-- Background Section Start -->
    <div class="login-section">
        <div class=""></div> <!-- Overlay effect -->
        <div class="login-container">
            <h2 class="text-Info">Login In To IT Knowledge Hub</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label"></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="mb-3">
                    <a href="forgetpassword.php">Forget Password?</a>
                </div>
                <button type="submit" name="login" class="btn submit-btn btn-primary btn btn-info">Login</button>
                <p class="mt-3"><a href="signup.php">If you are not registered yet, Click Here</a></p>
            </form>
        </div>
    </div>
    <!-- Background Section End -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    include_once('footer.php');
?>
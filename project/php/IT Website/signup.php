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

    .signup-section {
         background: url('signup_page.jpeg') no-repeat center center/cover; /* Add your background image */
        min-height: 100vh; /* Full screen height */
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: white; /* Text color */
        text-align: center;
    }

    .signup-overlay {
       /* background: rgba(0, 0, 0, 0.6); /* Overlay to darken the background */
/*        position: absolute;//
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .signup-container {
/*        background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for the form //
        /*padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        z-index: 2; /* Place form above overlay //
        width: 100%;
        max-width: 500px;
    }

    .signup-container h1 {
        margin-bottom: 20px;
        color: #343a40; /* Header color */
    }

    .submit-btn {
        background-color: #495057;
        color: #fff;
        width: 100%;
        margin-top: 15px;
    }

    .submit-btn:hover {
        background-color: #343a40;<br><br>
    }
</style>


   
</head>

<body>
    <div class="signup-section">
        <div class=""></div>
        <div class="signup-container"><br><br><br><br><br>
            <h1 class="text-Info">Signup</h1>
            <form method="POST" action="signup">
                <div class="mb-3">
                    <label for="firstname" class="form-label"></label>
                    <input type="text"  class="form-control" id="firstname" name="first_name" placeholder="Enter first name" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label"></label>
                    <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Enter last name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"></label>
                    <input type="tel" class="form-control" id="phone" name="phone_number" placeholder="Enter phone number" pattern="[0-9]{10}" required>
                </div>
                
                
                <button type="submit" name="submit" class="btn submit-btn btn btn-primary btn btn-light">Sign Up</button>
                <p class="mt-3"><a href="login.php">If you are already registered, Click Here</a></p>
            </form>
        </div>
    </div>
</body>


</html>
<?php
    include_once('footer.php');
    ?>
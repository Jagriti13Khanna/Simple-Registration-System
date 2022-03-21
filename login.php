<?php

include("/home/jkhanna1/data/data.php");

// echo "$valid_user $encrypted_pass";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo "$username $password";

    if ( $username == $valid_user && password_verify($password, $encrypted_pass)) {

        // echo "its all good";

        session_start();
        $_SESSION['bhjvbdjhnbdjvbn=jagriti'] = session_id();    
        $_SESSION['username'] = $username;  
        header("Location:admin/insert.php");
    }
    else {
        $message = "Invalid login. Please try again!";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>    
    <header>
        <h1>Pet Fun Run</h1>
        <h3>Login</h3>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Public</a></li>
            <li><a href="admin/insert.php">Insert</a></li>
        </ul>
    </nav>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">          
  
        <input type="submit" value="Login!" name="login">  
        
        <?php 
            if($message) {
                echo "<p class='msg-bad'>$message</p>";;
            }
        ?>
    </form>

    <footer>
        <p>Jagriti Khanna &copy; 2021 | All content for academic purposes </p>
    </footer>
</body>
</html>
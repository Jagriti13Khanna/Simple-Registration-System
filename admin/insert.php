<?php

session_start();

if (isset($_SESSION['bhjvbdjhnbdjvbn=jagriti'])) {
    $message = "You are logged in!";
}
else {
    header("Location:../login.php");
}

if (isset($_POST['register'])) {
    $ownername = $_POST['ownername'];
    $phone = $_POST['phone'];
    $petname = $_POST['petname'];
    $petType = $_POST['petType'];

    // echo "$ownername $phone $timeDate";
    
    if ($ownername && $phone && $petname && $petType) {  
        // echo "good";      
        saveRegistration($ownername, $phone, $petname, $petType);

        "$messageGood = Thank you for the information!";
    }

    else {
        $messageBad = "*Please fill in all the fields*";
        // echo "bad";
    }
}

function saveRegistration($nameOfOwner, $phoneOfOwner, $nameOfPet, $typeOfPet) {
    
    //$timeDate = $phoneOfOwner = $phone = $ownername = $old_stuff = $new_stuff = $nameOfOwner = $messageGood = $messageBad = " ";

    // echo "Inside my function";

    $timeDate = date("l, F d, Y @ g:i a");
    // echo $timeDate;

    //echo "$ownername $phone $timeDate";
    
    //STEP-1
    $file = fopen("registration.txt", "r");
    if ($file) {
        while (!feof($file)) {
            $buffer = fgets($file, 4096);
            $old_stuff .=$buffer;
        }
        fclose($file);
    }

    //STEP-2
    $new_stuff = "<div class=\"registrant\">\n";
    $new_stuff .= "<p class='ownername'>$nameOfOwner</p>\n";
    $new_stuff .= "<p class='phone'>$phoneOfOwner</p>\n";
    $new_stuff .= "<p class='petname'>$nameOfPet | $typeOfPet</p>\n";
    // $new_stuff .= "<p class='pet-type'>$typeOfPet</p>\n";
    $new_stuff .= "<p class='time'>$timeDate</p>\n";
    $new_stuff .= "</div>";

    $file = fopen("registration.txt", "w");

    //STEP-3
    $all_stuff = $new_stuff . $old_stuff;
    
    //STEP-4
    fwrite($file, $all_stuff);
    fclose($file);

    // "$messageGood = Thank you for the information!";
//
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>    
    <header>
        <h1>Pet Fun Run</h1>
        <h3>Insert</h3>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Public</a></li>
            <li><a href="insert.php">Insert</a></li>
        </ul>
    </nav>

    <form action="" method="POST"> 
        
    <?php echo "<p class='msg-good'>$message</p>";  ?>

        <label for="ownername">Owner Name</label>
        <input type="text" id="ownername" name="ownername" value="<?php echo $ownername; ?>">

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>">

        <label for="petname">Pet Name</label>
        <input type="text" id="petname" name="petname" value="<?php echo $petname; ?>">

        <label for="petType">Pet Type</label>
        <select name="petType" id="petType" value="<?php echo $petType; ?>">
            <option>Please select type of pet</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Ferret">Ferret</option>
            <option value="Other">Other</option>
        </select>  

        <?php echo "<p class='msg-bad'>$messageBad</p>"; ?>          
  
        <input type="submit" value="Register" name="register">        
    </form>

    <footer>
        <p>Jagriti Khanna &copy; 2021 | All content for academic purposes </p>
    </footer>
</body>
</html>
 <?php
$insert = false; 
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    
    $con = mysqli_connect($server, $username, $password);

    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['dob'];
    $gender = $_POST['gender'];
   
    $sql = "INSERT INTO `sign`.`sign` (`name`, `email`, `password`, `dob`, `gender`, `timestamp`) VALUES ('$name', '$email', '$password', '$date', '$gender', current_timestamp());";
    // INSERT INTO `sign` (`s.no`, `name`, `e-mail`, `password`, `dob`, `gender`, `timestamp`) VALUES ('2', 'sdsdsdsdsdsd', 'hyuj@gmsil.com', '12wse3', '2022-05-03', 'female', current_timestamp());
    if($con->query($sql) == true){
     
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";

    }


    $con->close();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SignUp Form</title> 
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
 </head>
<body>
    <img class="bg" src="bg1.jpg" alt="IIT Kharagpur">
     <div class="container">
        <h1>Sign Up Here</h3>
        <p>Enter your details and submit this form.</p> 
    <?php
        if($insert == true){
            header("Location:anth.html");
            
            // echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?> 
         <form action="index.php" name="myForm" onsubmit="return validateForm()" method="post" >
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="date" name="age" id="age" placeholder="Enter your Date of Birth">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
           
          
            <button class="btn">Submit</button> 
            <!-- <button class="btn">RESET</button>  -->
        </form> 
    </div>
     <script src="index.js"></script>
     
</body>
</html>




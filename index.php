<?php
$insert=false;
if(isset($_POST['name'])){
    //set connection variable
    $server='localhost';
    $username="root";
    $password="";

    //creating a database connection
    $con=mysqli_connect($server,$username,$password);

    //check for connection success
    if(!$con)
    {
        die("connection failed:".mysqli_connect_error());
    }
    else
    {
        //success connection to database
        $name=$_POST['name'];
        $fathername=$_POST['fathername'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $phone=$_POST['phone']; 
        $sql="INSERT INTO `registration`.`form` (`name`,`father name`,`email`,`gender`,`dob`,`address`,`phone`,`dt`) VALUES('$name','$fathername','$email','$gender','$dob','$address','$phone',current_timestamp());";

        if($con-> query($sql)==true){
            $insert=true;
        }
        else{
            echo"Error: $sql".mysqli_connect_error();
        }
        mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Simple Registration Form</title>
</head>
<body>
 <img class="bg" src="bhoot.jpg" alt="img">
   <div class="container">
    <h1><b>Registration Form</b></h1>
    <p><u>Enter your details to conform your<br> ....registration....</u></p>
    <?php
    if($insert==true){
        echo "<p class='submitMsg'>Thanks for Submitting your form..</p>";
    }
    ?>
<form action="index.php" method ="post">
    <fieldset>
    <label>Name:<input type="text" name="name" id="name" placeholder="Enter your full name here" required>
</label><br/>
<label>Father's Name:<input type="text" name="fathername" id ="fathername" placeholder= "Enter your father's name here" required>
</label><br/>
<label>Email: <input type="email" name="email" id="email" placeholder="Enter a valid email here" required>
</label><br/>
<label>Gender:</label>
<span>
  <label>Male<input type="radio" name="gender" id="gender" value="male"></label>
  <label>Female<input type="radio" name="gender" id="gender" value="male"></label></span>
<br>
<label>Date of Birth:<input type="date" name="dob" id="dob"></label>
<br>
<label>Enter your Address:</label>
<textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your full address here" required></textarea>
<br>
<label>Phone:<input type="phone" name="phone" id="phone" placeholder="Enter your mobile number"></label>
<br>
<button class="btn" type="submit" >Submit</button>
  <button class="btn" type="reset">Reset</button>
    </fieldset>
</form>
  </div>
  <!-- <script src="script.js"></script> -->
</body>
</html>

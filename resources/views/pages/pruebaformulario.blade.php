<?php
//initialize variables and set to empty values
$name = $phone = $email = $business = $industry= "";
$nameErr = $phoneErr = $emailErr = $businessErr = $industryErr="";

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    //check if name contains letters and white-space
    if (empty($_POST["name"])) {

        $valid = false;

        $nameErr = "Please fill out this field";
        echo 'name is empty<br>';
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ,.-]*$/", $name)) {

            $valid = false;

            $nameErr = "*Only Letters and white-spaces are allowed*";
        } /* else {
          echo'name is valid<br>';
          } */
    }

    //check if phone contains numbers
    if (empty($_POST["phone"])) {

        $valid = false;

        $phoneErr = "Please fill out this field";
        echo'phone is empty<br>';
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9 ,+.-]*$/", $phone)) {

            $valid = false;

            $phoneErr = "*Only numbers are allowed*";
        
        }

        /*   else {
          echo'  phone is valid<br>';
          } */
    }

    //check if email is valid
    if (empty($_POST["email"])) {

        $valid = false;

        $emailErr = "Please fill out this field";
        echo'email is empty<br>';
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $valid = false;

            $emailErr = "*Invalid email address*";
           
        }

        /*  else {
          echo'email is valid<br>';
          }
         */
    }
	
	      //check if industry is filled
	 if (empty($_POST["industry"])) {
		 $industryErr = "Please Select an item";
	} else 
	{$industry = test_input($_POST["industry"]);}
	
	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name= "robots" content= "noindex, nofollow">
        <meta charset="UTF-8">
        <meta name= "author" content= "Kelly James">
        <link href= "style.css" rel= "stylesheet" type= "text/css">
        <title> Contact form </title>
    </head>

    <body>

        <img src= "images/logo.gif" border= "0" width= "240" height="160">

        <br>
        <div class="form">

            <form method= "get" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >

                <h4 id="h4form"> Please fill the form below to kick start your project. <br> <br> <font color="red"> *required field </font> </h4>

                <br> What is your name? <input type= "text" class= "input" name= "name"  placeholder= "e.g Nelson Mandela" value="<?php echo $name; ?>"  required> <span class= "error"> * <br> <?php echo $nameErr; ?> </span>

                <br> <br>What is your phone number? <input type= "text" class= "input" name= "phone"  value="<?php echo $phone; ?>" placeholder= "e.g 0722222222" required> <span class= "error"> * <br> <?php echo $phoneErr; ?> </span>

                <br> <br> What is your email address? <input type= "email" class= "input" name= "email" placeholder= "will not be published" value="<?php echo $email; ?>" required> <span class= "error"> * <br> <?php echo $emailErr; ?> </span>
				
				<br> <br> What industry is your business? <span class= "error"> * <?php echo $industryErr;?> </span>
                    <select class= "input" name="industry" required>
                     <option value= "" > Select  Industry </option>
                     <option value= "Air_and_Travel" >Air & Travel </option>
                     <option value= "Agriculture">Agriculture</option> 
					 <option value= "Architecture and Structural"> Architecture and Structural </option> 
					 <option value="Attorney & legal"> Attorney & Legal </option> 
					 <option value="Automotive"> Automotive </option>
                     <option value= "Consultation"> Consultation </option>
					 </select> 
					 
				<br> <br> <button class="submit" type= "submit" value= "Submit"> Submit  Form </button>



            </form>
        </div>
    </body>
</html>
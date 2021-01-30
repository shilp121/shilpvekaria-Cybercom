
<!DOCTYPE html>
<html>
<head>

	<style> 
		.error{color: #FF0000;}
	</style>
</head>
<body>
<?php
	$nameErr = $emailErr = $genderErr =$course = "";
    $username = $email = $gender = $class = $course = $subject = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    	if(empty($_POST['username'])){
    		$nameErr = 'Name is Required';
    	}else{
    		$username = test_input($_POST['username']);
    	}

    	if(empty($_POST['email'])){
    		$emailErr = 'Email is Required';
    	}else{
    		$email = test_input($_POST['email']);
    		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    			$emailErr = "Invalide Email id";
    		}
    	}
    	if (empty($_POST["course"])) {
               $course = "";
            }else {
               $course = test_input($_POST["course"]);
        }

    	if(empty($_POST['gender'])){
    		$genderErr = 'Gender is Required';
    	}else{
    		$gender = test_input($_POST['gender']);
    	}

    	if(empty($_POST['subject'])){
    		$subject = '';
    	}else{
    		$subject = test_input($_POST['subject']);
    	}

    }

    function test_input($data){
    	$data = trim($data);
    	$data = stripcslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }


?>

<h1>Class Registration Form</h1>
<p><span class="error">* Required Fields</span></p>

<form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
	
	<tr>
		<td>Name:</td>
		<td>
			<input type="text" name="username">
			<span class="error">*<?php echo $nameErr ?></span>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>
			<input type="email" name="email">
			<span class="error">*<?php echo $emailErr?></span>
		</td>
	</tr>
	<tr>
		<td>Course:</td>
		<td>
			<input type="text" name="course">
		</td>
	</tr>
	<tr>
		<td>Classes</td>
		<td>
			<textarea name = "classes"  rows="8" cols="20"></textarea> 
		</td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>
			<input type="radio" name="gender" value="Female">Female
			<input type="radio" name="gender" value= "Male">Male
	    	<span class="error">*<?php echo $genderErr ?></span>
		</td>
	</tr>
    <tr>
        <td>Select:</td>
        <td>
            <select name = "subject[]" size = "4" multiple>
                <option value = "Android">Android</option>
                <option value = "Java">Java</option>
                <option value = "C#">C#</option>
                <option value = "Data Base">Data Base</option>
                <option value = "Hadoop">Hadoop</option>
                <option value = "VB script">VB script</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td>Agree</td>
    	<td><input type="checkbox" name="agree"></td>
    </tr>
    <tr>
    	<td><input type="submit" name="Submit"></td>
    </tr>
</table>
</form>
<?php

	echo "<h2>Your given values are :</h2>";
	echo ("<p>your name is $username</p>");
	echo ("<p>Your Email ID is $email</p>");
	echo ("<p>Your course is $course</p>");
	echo ("<p>Your Class info is $class</p>");
	echo ("<p>Your gender is $gender</p>");

 ?>
</body>
</html>
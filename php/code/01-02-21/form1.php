<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="form1.css">
	<script type="text/javascript" src="form1.js"></script>
</head>
<body>
	
<form name ="myform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  onsubmit="return validateform();" >
<table>
	<tr>
		<th colspan="2" class="heading">User Form</th>
	</tr>
	<tr>
		<td>Enter Name</td>
		<td><input type="text" name="name" id="name"></td>
	</tr>
	<tr>
		<td>Enter Password</td>
		<td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td>Enter address</td>
		<td><textarea name = "address"></textarea></td>
	</tr>
		<tr>
			<td>Select Game</td>
			<td>
				<input type="checkbox" name="game[]" value = 'Hockey'>Hockey:<br>
				<input type="checkbox" name="game[]" value = 'Football'>Football:<br>
				<input type="checkbox" name="game[]" value = 'Badminton'>Badminton:<br>
				<input type="checkbox" name="game[]" value = 'Cricket'>Cricket:<br>
				<input type="checkbox" name="game[]" value = 'Volleyball'>Volleyball:
			</td>
		</tr>
	<tr>
		<td>Gender</td>
		<td>
			<input type="radio" name="gender[]" value="Male">Male 
			<input type="radio" name="gender[]" value="Female">Female
		</td>
	</tr>
	<tr>
		<td>Select your age</td>
		<td>
			<select name  = "age">
				<option>Age</option>
				<option>0 t0 9yrs old</option>
				<option>10 to 21yrs old</option>
				<option>21+ age old</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td colspan="2">
			<input type="file" name="file" value="Choose file">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="reset" name="reset" value="Reset">
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>
</form>

<?php
$link = mysqli_connect('localhost','root','','form1');

if($link === false){
	die("Error: could not connect".mysqli_connect_error());
}

 	@$name = htmlentities($_POST['name']);
    @$password = htmlentities($_POST['password']);
    @$address = htmlentities($_POST['address']);
    @$game = $_POST['game'];
    @$gamestring = htmlentities(implode(',', $game));
    @$gender = $_POST['gender'];
    @$genderstring =htmlentities(implode(',',$gender));
    @$age = htmlentities($_POST['age']);
    @$file = $_POST['file']['name'];
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST['name'])){
            echo '<br>Name: '.$name.'<br>';
		}
		if(!empty($_POST['password'])){
			echo 'Password: '.$password.'<br>';
		}
		if(!empty($_POST['address'])){
            echo 'Address: '.$address.'<br>';
		}
		if(!empty($gamestring)){
            echo 'Games: '.$gamestring;
		}
		if(!empty($genderstring)){
			echo '<br>Gender: '.$genderstring;
		}
		if(!empty($_POST['age'])){
			echo '<br>Age: '.$age;
		}
		if(!empty($_POST['file'])){
			echo '<br>File Name: '.$file;
		}
	}

	$input_name = mysqli_real_escape_string($link,$name);
	$input_password = mysqli_real_escape_string($link,$password);
	$input_address = mysqli_real_escape_string($link,$address);
	$input_gamestring = mysqli_real_escape_string($link,$gamestring);
	$input_genderstring = mysqli_real_escape_string($link,$genderstring);
	$input_age = mysqli_real_escape_string($link,$age);
	$input_file = mysqli_real_escape_string($link,$file);

	$query = "INSERT INTO form1(name,password,address,game,gender,age,file) VALUES ('$input_name','$input_password','$input_address','$input_gamestring','$input_genderstring','$input_age','$input_file')";

	if($query_run = mysqli_query($link,$query)){
		echo "<br>successfully submited data";
	}else{
		echo "Query failed";
	}
?>
 </body>
</html>

